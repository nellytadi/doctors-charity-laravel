<?php

namespace App\Http\Controllers;
use App\Project;
use App\Donate;
use App\Donateequip;
use App\Equipmentfile;
use App\Http\Requests;

use Validator;
use URL;
use Session;
use Redirect;
use Input;

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\PaymentExecution;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

use Illuminate\Http\Request;
class DonateController extends Controller
{
	
    /**
     * Create a new controller instance.
     *
     * @return void
    */

    public function __construct()
    {
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }


    public function index(){
        
    	return view('donate');

    }
    /**
     * Store a details of payment with paypal.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function paymentWithpaypal(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|string|email',
            'amount' => 'required|string',
            'project' => 'nullable|string',
            'message'=> 'nullable|string',
        ]);

           Session::put('name',$request->name);
            Session::put('email',$request->email);
            Session::put('amount', $request->amount);
           Session::put('message',$request->message);
            if ($request->project==''){
                Session::put('project','General Donation');
            }
            else{
                 Session::put('project',$request->project);
            }
           
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();

        $item_1->setName('Donation') /** item name **/
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->get('amount')); /** unit price **/

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->amount);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Donation to Doctors Charity');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('donate.status')) /** Specify return URL **/
            ->setCancelUrl(URL::route('donate.status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
            /** dd($payment->create($this->_api_context));exit; **/
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {

            if (\Config::get('app.debug')) {
                \Session::put('error','Connection timeout');
                return Redirect::route('donate.status');
              
            } 
            else {
                \Session::put('error','There was an error during payment please try again.');
                return Redirect::route('donate.status');
                
            }
        }

        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());

        if(isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }

        \Session::put('error','Unknown error occurred');
        return Redirect::route('donate.status');

    }

    public function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            \Session::put('error','Payment failed');
            return Redirect::route('donate');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        /** PaymentExecution object includes information necessary **/
        /** to execute a PayPal account payment. **/
        /** The payer_id is added to the request query parameters **/
        /** when the user is redirected from paypal back to your site **/
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        /** dd($result);exit; /** DEBUG RESULT, remove it later **/
        if ($result->getState() == 'approved') { 

             $donate= new Donate;

            $donate->name=Session::get('name');
            $donate->email=Session::get('email');
            $donate->message=Session::get('message');
            $donate->amount= Session::get('amount');
            $donate->project=Session::get('project');
           
            $donate->save();
            $mailHeading='Notification from Doctors Charity Website: Donation (money)';
       // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: <noreply@doctorscharity.com>' . "\r\n";
            //$headers .= 'Cc: nellytadi@gmail.com' . "\r\n";
            $message='<html><body><h2> Notification from Doctors Charity: Donation  </h2><table rules="all" style="border-color: #666;" cellpadding="10">';
             $message.="<tr style='background: #eee;'><td><strong>Name:</strong> </td>  <td>".$donate->name."</td></tr>";
            $message.="<tr><td><strong>Email:</strong> </td><td>" .$donate->email. "</td></tr><tr style='background: #eee;'><td><strong>Amount:</strong> </td><td>" .$donate->amount. "</td></tr><tr><td><strong>Project:</strong> </td><td>" .$donate->project. "</td></tr><tr style='background: #eee;'><td><strong>Message:</strong> </td><td>" .$donate->message. "</td></tr>";
            $message.='</body></html>';


       
        $mail=mail('drscharity@gmail.com', $mailHeading, $message, $headers );



            \Session::put('success','Payment success');
            return Redirect::route('donate');
        }
        \Session::put('error','Payment failed');

        return Redirect::route('donate');
    }



    public function createequip(Request $request)
    {
         $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|string|email',
            'project' => 'required|string',
            'equipmentname' =>'required|string',
            'state'=>'required',
            'location' => 'required',
            'message' => 'nullable',
            'ownership' =>'required',
            'expecteduse' =>'required',
            'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);

            $donateequip= new Donateequip;

            $donateequip->name=$request->name;
            $donateequip->email=$request->email;
            $donateequip->message=$request->message;
            $donateequip->equipmentname= $request->equipmentname;
             if ($request->project=='') {
               $donateequip->project='General Donation';
            }
            else{
                 $donateequip->project= $request->project;
            }
           
            $donateequip->state= $request->state;
            $donateequip->location= $request->location;
            $donateequip->ownership= $request->ownership;
            $donateequip->expecteduse= $request->expecteduse;
            
            $donateequip->save();

              if($request->hasfile('image')){
                foreach ($request->image as $image) {

                    $filename = $image->getClientOriginalName();

                    $image->storeAs('public',$filename);

                    $equipmentfile =new Equipmentfile;

                    $equipmentfile->donateequip_id= $donateequip->id;
                    $equipmentfile->file = $filename;

                    $equipmentfile->save();

                }
            }
              $mailHeading='Notification from Doctors Charity Website: Donation (equipment)';
       // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: <noreply@doctorscharity.com>' . "\r\n";
            //$headers .= 'Cc: nellytadi@gmail.com' . "\r\n";
            $message='<html><body><h2> Notification from Doctors Charity: Donation  </h2><table rules="all" style="border-color: #666;" cellpadding="10">';
            $message.="<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>".$donateequip->name."</td></tr>";
            $message.="<tr><td><strong>Email:</strong> </td><td>" .$donateequip->email. "</td></tr><tr style='background: #eee;'><td><strong>Name of Equipment:</strong> </td><td>" .$donateequip->equipmentname. "</td></tr><tr><td><strong>Project:</strong> </td><td>" .$donateequip->project. "</td></tr><tr style='background: #eee;'><td><strong>State of Equipment:</strong> </td><td>" .$donateequip->state. "</td></tr><tr><td><strong>Location:</strong> </td><td>" .$donateequip->location. "</td><tr style='background: #eee;'><td><strong>Expected Use:</strong> </td><td>" .$donateequip->expecteduse. "</td></tr></tr><tr><td><strong>Ownership:</strong> </td><td>" .$donateequip->ownership. "</td></tr><tr style='background: #eee;'><td><strong>Message:</strong> </td><td>" .$donateequip->message. "</td></tr>";
            $message.='</body></html>';


       
            $mail=mail('drscharity@gmail.com', $mailHeading, $message, $headers );

            return redirect()->back()->with('status','Your data has been stored successfully. We will get back to you shortly');
    }

    public function indexEach($id)
    {
        $projects=Project::find($id);

        return view('donateeach',compact('projects'));
    }
    public function indexequipEach($id)
    {
        $projects=Project::find($id);
        return view('donateequipeach',compact('projects'));
    }
}
