<?php

//App::uses('ChargeBee', 'Lib');

//require dirname(dirname(__FILE__)).DS.'lib'.DS.'ChargeBee.php';

App::uses('PHPMailer', 'Lib');
App::uses('htmlMimeMail','Lib');

class BeeController extends AppController{

	public $uses = array('User','Settings');

	public $site;

	public $publicKey;

	private $_mylifeEndPoint;

	function beforeFilter() {
        parent::beforeFilter();   
        //$this->layout = 'bootstrap';
        //$this->navsel_['users'] = 'active';
        App::import('Lib','ChargeBee');

        $settings = $this->getSettings();

    	$this->_mylifeEndPoint = $settings['MYLIFE_PATH'];

    	$this->site = $settings['CHARGEBEE_SITE'];

    	$this->publicKey = $settings['CHARGEBEE_KEY'];

        $this->Auth->Allow();

        $this->navsel_['subscriptions'] = 'active';
        $this->set('navsel_',$this->navsel_);
    }

    function index(){
    	//$this->Session->write('User.confirm_id',1717);  
    	//$this->sendMail('Confirm',null,array('ost.vas@mail.ru')); exit(0);
    	$sessionUserData = $this->Session->read('User.request');
    	if(empty($sessionUserData)){
    		$this->redirect('/');
    	}

    	

    	if($this->request->is('post')){
    		$this->redirect('https://'.$this->site.'.chargebee.com/hosted_pages/plans/'.$this->request->data['pay_obj']);
    		exit(0);
    	}

    	$this->setListPlans(); //exit(0);

    	//debug($settings); exit(0);
    	
    	/*if($this->request->is('post') || $this->request->is('put')){ exit(0);
    		debug($this->request->data);
    		$subscriptionId = $this->getSubsriptionByPaidId($settings['CHARGEBEE_SITE'],$settings['CHARGEBEE_KEY'],$settings['CUSTOMER_ID'],$this->request->data['pay_obj']);
    		$this->createInvoice($settings['CHARGEBEE_SITE'],$settings['CHARGEBEE_KEY'],$subscriptionId,$this->request->data['pay_obj']);
    	}   */
    	//$res = $this->getListAddons($settings['CHARGEBEE_SITE'],$settings['CHARGEBEE_KEY']);
    	//$this->set('addons',$res);
    }

    function pay(){
    	$user =  $this->Auth->user();
    	if(!empty($user)){
    		if($this->request->is('post')){
	    		$this->redirect('https://'.$this->site.'.chargebee.com/hosted_pages/plans/'.$this->request->data['pay_obj']);
	    		exit(0);
	    	}
    		$this->setListPlans(); //exit(0);
    		$this->render('index');
    	}else{
    		$this->redirect('/');
    	}    	
    }

    function trial(){
    	$sessionUserData = $this->Session->read('User.request');
    	if(empty($sessionUserData)){
    		$this->redirect('/');
    	}else{
    		$this->saveUser(true);
    	}
    	$this->redirect(array('controller'=>'users','action'=>'login','admin'=>false));
    }

    function create_s(){ exit(0);
    	App::import('Lib','ChargeBee');
    	ChargeBee_Environment::configure("mobileideaworks-test","test_ucu7p1sHISDNykU2M8cdbWMimNwmwWSRsU");
		$result = ChargeBee_Subscription::createForCustomer("2slhRVReP8E2I0DCy0", array(
		  "planId" => "enterprise_half_yearly", 'trialEnd'=>time()+43200));
		exit(0);
    }

    function success(){
    	file_put_contents(ROOT.DS.APP_DIR.DS.WEBROOT_DIR.DS.'files'.DS.'post-request.txt',print_r($this->request->data,true)." -------- \n".print_r($this->request->params,true)." -------- \n".print_r($this->request->query,true));
    	if(!empty($this->request->query)){ //echo 1;
    		$id = $this->Auth->user('id');
    		if($id){
    			$this->_saveSubscription($id);
    			$this->Subscription->updateAll(
					    array(
					    		'Subscription.subscription_status' => "'cancelled'",
					    		'Subscription.trial_end' => time(),
					    		'Subscription.current_term_end' => time()
					    	),
					    array('Subscription.user_id ' => $id,'Subscription.subscription_status'=>'trial')
					);
    			$this->redirect(array('controller'=>'users','action'=>'profile','admin'=>false));
    		}else{
    			$this->saveUser(false,true);    		
    		}
    	}    	
    	exit(0);
    }

    public function test(){
    	App::import('Lib','ChargeBee');
    	ChargeBee_Environment::configure("mobileideaworks-test","test_ucu7p1sHISDNykU2M8cdbWMimNwmwWSRsU");
    	/*$result = ChargeBee_Subscription::update("2slhRVReP8VqGq6TQG", array('billingCycles'=>1,'trialEnd'=>(time()+610)));*/

    	/*$result = ChargeBee_Subscription::changeTermEnd("2slhRVReP8VqdUTTR1", array(
  		"termEndsAt" => time()+86400));*/

    	/*$all = ChargeBee_Plan::all(array(
		  "limit" => 10));
		foreach($all as $entry){
		  $plan = $entry->plan();
		  debug($plan);
		}*/

		/*$result = ChargeBee_Subscription::createForCustomer("2slhRVReP8UvUnPSse", array(
		  "planId" => "tral2", ));*/

    	$all = ChargeBee_Subscription::subscriptionsForCustomer("2slhRVReP8VqGq6TQG", array(
		  "limit" => 5));
		foreach($all as $entry){
		  $subscription = $entry->subscription();
		  debug($subscription);
		}

		
		exit(0);
    }

    public function parse(){
    	$this->_parseSubscription();
    	exit(0);
    }

    private function _parseSubscription(){
    	$today = time();
    	$tomorow = strtotime(date('D').' +1 day');
    	$tomorow2 = strtotime(date('D').' +2 day');

    	/*$res = $this->Subscription->find('all',
    				array(
    					'conditions'=>array(
    						'Subscription.current_term_end between ? and ?'=>array(
	    															$tomorow,
	    															$tomorow2
    															)
    						)
    					)
    				);*/
    	$res = $this->Subscription->find('all',
    				array(
    					'conditions'=>array(
    						'Subscription.subscription_status' =>array('non_renewing','active'),
    						'Subscription.current_term_end <= ?'=>array(
	    															$tomorow2
    															)
    						)
    					)
    				);
    	//debug($res);
    	ChargeBee_Environment::configure($this->site,$this->publicKey);
    	foreach($res as $value){
    		$all = ChargeBee_Subscription::subscriptionsForCustomer($value['Subscription']['customer_id'], array("limit" => 10));
    		foreach($all as $subscription){
    			$subscription = $subscription->subscription();
    			if($subscription->status == 'cancelled'){
    				$this->_cancellSubscription($subscription);
    			}elseif($subscription->status == 'non_renewing' && $subscription->currentTermEnd <= $today){
    				$this->_cancellSubscription($subscription);
    			}else{
    				$this->_updateSubscription($subscription);
    			}
    			//debug($subscription);
    			//debug($subscription->id);
    			//debug($subscription->status);
    		}
    	}

    	$res = $this->Subscription->find('all',
    				array(
    					'conditions'=>array(
    						'Subscription.subscription_status' => array('in_trial','trial'),
    						'Subscription.trial_end <= ?'=>array(
	    															$tomorow2
    															)
    						)
    					)
    				);
    	//debug($res);
    	ChargeBee_Environment::configure($this->site,$this->publicKey);
    	foreach($res as $value){
    		if($value['Subscription']['subscription_status'] != 'trial'){
	    		$all = ChargeBee_Subscription::subscriptionsForCustomer($value['Subscription']['customer_id'], array("limit" => 10));
	    		foreach($all as $subscription){
	    			$subscription = $subscription->subscription();
	    			if($subscription->status == 'cancelled'){
	    				$this->_cancellSubscription($subscription);
	    			}elseif($subscription->status == 'non_renewing' && $subscription->trialEnd <= $today && $subscription->currentTermEnd <= $today){
	    				$this->_cancellSubscription($subscription);
	    			}else{
	    				$this->_updateSubscription($subscription);
	    			}
	    			//debug($subscription);
	    			//debug($subscription->id);
	    			//debug($subscription->status);
	    		}
	    	}else{
	    		if($value['Subscription']['trial_end'] <= $today){
	    			$this->Subscription->updateAll(
					    array(
					    		'Subscription.subscription_status' => "'cancelled'",
					    		'Subscription.trial_end' => time(),
					    		'Subscription.current_term_end' => time()
					    	),
					    array('Subscription.subscription_id ' => $value['Subscription']['subscription_id'])
					);
	    		}
	    	}
    	}
    }

    private function _saveSubscription($user_id){
    	if(!empty($this->request->query)){
    		$data['user_id'] = $user_id;
    		$data['plan_id'] = $this->request->query['plan_id'];
    		$data['customer_id'] = $this->request->query['customer_id'];
    		$data['subscription_id'] = $this->request->query['subscription_id'];
    		$data['subscription_status'] = $this->request->query['subscription_status'];
    		$data['current_term_start'] = strtotime($this->request->query['current_term_start']);
    		$data['current_term_end'] = strtotime($this->request->query['current_term_end']);
    		$data['remaining_billing_cycles'] = $this->request->query['remaining_billing_cycles'];
    		$data['started_at'] = strtotime($this->request->query['started_at']);
    		$data['trial_start'] = strtotime($this->request->query['trial_start']);
    		$data['trial_end'] = strtotime($this->request->query['trial_end']);
    		$data = array('Subscription'=>$data);
    		$this->Subscription->save($data);
    		//debug($data);
    	}
    }

    private function _updateSubscription($subscription){
    	$this->Subscription->updateAll(
		    array(
		    		'Subscription.subscription_status' => "'".$subscription->status."'",
		    		'Subscription.trial_end' => $subscription->trialEnd ? $subscription->trialEnd : 0,
		    		'Subscription.current_term_end' => $subscription->currentTermEnd ? $subscription->currentTermEnd : 0
		    	),
		    array('Subscription.subscription_id ' => $subscription->id)
		);
    }

    private function _cancellSubscription($subscription){
    	$this->Subscription->updateAll(
		    array(
		    		'Subscription.subscription_status' => "'cancelled'",
		    		'Subscription.trial_end' => $subscription->trialEnd ? $subscription->trialEnd : 0,
		    		'Subscription.current_term_end' => $subscription->currentTermEnd ? $subscription->currentTermEnd : 0
		    	),
		    array('Subscription.subscription_id ' => $subscription->id)
		);
    }

    private function createInvoice($site,$publicKey,$subscriptionId, $addonId){
    	ChargeBee_Environment::configure($site,$publicKey);
		$result = ChargeBee_Invoice::chargeAddon(array(
			/*'customerId' => 'education_2uENY39VP87i7GH7ud',*/
		  "subscriptionId" => $subscriptionId,
		   "addonId" => $addonId,
		  "addonQuantity" => 1,
		  ));
		$invoice = $result->invoice();
		if($invoice->linkedTransactions[0]['txn_status'] == 'success'){
	    	$this->saveUser();
			/*$this->Session->setFlash(__('Payment was successful'),'flashgood');
			$this->redirect(array('controller'=>'users','action'=>'profile','admin'=>false));*/
		}elseif($invoice->linkedTransactions[0]['txn_status'] == 'timeout'){
			$this->Session->setFlash(__('Transaction failed because of Gateway not accepting the connection.'));
		}else{
			$this->Session->setFlash(__('Transaction failed.'));
		}
		//debug($invoice);
    }

    private function _getListSubscriptionForCustomer(){
    	//education_2uENY39VP87i7GH7ud    	
    	ChargeBee_Environment::configure("mobileideaworks-test","test_ucu7p1sHISDNykU2M8cdbWMimNwmwWSRsU");
    	$all = ChargeBee_Subscription::subscriptionsForCustomer("education_2uENY39VP87i7GH7ud", array(
		  "limit" => 100));
    	$planId = array();
		foreach($all as $entry){
		  $subscription = $entry->subscription();
		  if($entry->subscription()->status != 'cancelled'){
		  	$planId[] = $entry->subscription()->planId;
		  }
		  //debug($subscription);
		}
		 debug($planId);
    }

    private function getSubsriptionByPaidId($site,$publicKey,$customerId,$paidId = null){
    	if(is_null($paidId)){ return false;}
    	ChargeBee_Environment::configure($site,$publicKey);
    	$all = ChargeBee_Subscription::subscriptionsForCustomer($customerId, array(
		  "limit" => 100));
    	foreach($all as $entry){
		  $subscription = $entry->subscription();
		  if($entry->subscription()->status != 'cancelled' && $paidId == $entry->subscription()->planId){
		  	return $entry->subscription()->id;
		  }
		}
		return false;
    }

    private function createSubcription(){
    	//ChargeBee_Environment::configure("mobileideaworks-test","test_ucu7p1sHISDNykU2M8cdbWMimNwmwWSRsU");
    	/*$customer_id = 'education_2uENY39VP87i7GH7ud';
    	$subscription = array();
    	$addons = $this->getListAddons();
    	foreach($addons as $k=>$v){
    		$subscription['addons'][] = array('id'=>$k);
    	}
    	debug($subscription); exit(0);*/
    	/*$result = ChargeBee_Subscription::create(array(
			  "planId" => "basic", 
			  "customer" => array(
			  	'id' => 'education_2uENY39VP87i7GH7ud',
			    "email" => "mobileidea.works@gmail.com", 
			    "firstName" => "John", 
			    "lastName" => "Filatov", 
			    "phone" => "1949888646487"
			  ), 
			  "billingAddress" => array(
			    "state" => "Florida", 
			    "country" => "United States"
			  )));
		 	debug($result->subscription());*/
		 	/*ChargeBee_Environment::configure("mobileideaworks-test","test_ucu7p1sHISDNykU2M8cdbWMimNwmwWSRsU");
			$result = ChargeBee_Subscription::createForCustomer("education_2uENY39VP87i7GH7ud", array(
			  "planId" => "basic", ));*/

    	 exit(0);
    }

    private function getListAddons($site,$publicKey){
    	ChargeBee_Environment::configure($site,$publicKey);
		$all = ChargeBee_Addon::all(array(
		  "limit" => 100,
		  ));
		$res = array();
		foreach($all as $key =>$entry){
		  $addon = $entry->addon();
		  //debug($addon);
		  if($addon->status == 'active'){
		  	$res[$addon->id] = $addon->name.'   ($ '.number_format($addon->price/100,2,'.','').')';
		  }		  
		}
		return $res;
    }

   
    private function getInvoice(){
		ChargeBee_Environment::configure("mobileideaworks-test","test_ucu7p1sHISDNykU2M8cdbWMimNwmwWSRsU");
		$all = ChargeBee_Invoice::all(array(
		  "limit" => 10));
		foreach($all as $entry){
		  $invoice = $entry->invoice();
		  //$invoice = $invoice->value();
		  $transaction = $invoice->linkedTransactions;

		  debug($transaction);
		}
    }

	private function testParams() {		 
		try{
		  // The code calling ChargeBee_Subscription::create
		  // ...
		 	//$result = ChargeBee_Subscription::retrieve('1rifg4iOsZUL4mBhF');
		 	$result = ChargeBee_Subscription::create(array(
			  "planId" => "basic", 
			  "customer" => array(
			    "email" => "mobileidea.works@gmail.com", 
			    "firstName" => "John", 
			    "lastName" => "Doe", 
			    "phone" => "+1-949-999-9999"
			  ), 
			  "billingAddress" => array(
			    "firstName" => "John", 
			    "lastName" => "Doe", 
			    "line1" => "PO Box 9999", 
			    "city" => "Walnut", 
			    "state" => "California", 
			    "zip" => "91789", 
			    "country" => "US"
			  )));
		 	debug($result->subscription());
		 	/*$subscription = $result->subscription();
			$customer = $result->customer();
			$card = $result->card();
			$invoice = $result->invoice();*/
			debug($result->customer());
			debug($result->card());
			debug($result->invoice());
		} catch (ChargeBee_PaymentException $e) {
		    // First check for card parameters entered by the user.
		    // We recommend you to validate the input at the client side itself to catch simple mistakes.
		    if ("card[number]" == $e->getParam()) {
		        // Ask your user to recheck the card number. A better way is to use 
		        // Stripe's https://github.com/stripe/jquery.payment for validating it in the client side itself.   
		      
		    //}else if(<other card params> == $e->getParam()){ 
		      // Similarly check for other card parameters entered by the user.
		      // ....

		    } else {
		        // Verfication or processing failures.
		        // Provide a standard message to your user to recheck his card details or provide a different card.
		        // Like  'Sorry,there was a problem when processing your card, please check the details and try again'. 
		    }
		} catch (ChargeBee_InvalidRequestException $e) {
		    // For coupons you could decide to provide specific messages by using 
		    // the 'api_error_code' attribute in the  error.
		    if ("coupon" == $e->getParam()) {
		        if ("resource_not_found" == $e->getApiErrorCode()) {
		            // Inform user to recheck his coupon code.
		        } else if ("resource_limit_exhausted" == $e->getApiErrorCode()) {
		            // Inform user that the coupon code has expired.
		        } else if ("invalid_request" == $e->getApiErrorCode()) {
		            // Inform user that the coupon code is not applicable for his plan(/addons).
		        } else {
		            // Inform user to recheck his coupon code.
		        }
		    } else {
		        // Since you would have validated all other parameters on your side itself, 
		        // this could probably be a bug in your code. Provide a generic message to your users.
		    }
		} catch (ChargeBee_OperationFailedException $e) {
		    // Indicates that the request parameters were right but the request couldn't be completed.
		    // The reasons might be "api_request_limit_exceeded" or could be due to an issue in ChargeBee side.
		    // These should occur very rarely and mostly be of temporary nature. 
		    // You could ask your user to retry after some time.
		} catch (ChargeBee_APIError $e) {
		    // Handle the other ChargeBee API errors. Mostly would be setup related 
		    // exceptions such as authentication failure.
		    // You could ask users contact your support.
		} catch (ChargeBee_IOException $e) {
		    // Handle IO exceptions such as connection timeout, request timeout etc.
		    // Possibly temporary . You could give a generic message to the customer to retry after sometime.
		    // The php client library uses curl_exec internally. If you prefer to handle the errors specifically
		    // please take a look at http://curl.haxx.se/libcurl/c/libcurl-errors.html
		    print("Curl Error Code is: " . $e->getCurlErrorCode());
		} catch (Exception $e) {
		    // These are unhandled exceptions (Could be due to a bug in your code or very rarely 
		    // in client library). You could ask users contact your support.
		}

		// print_r($result);
		//print_r($result->subscription()->currentTermEnasdd);
		//print_r($result->customer());
		//print_r($result->customer()->cfDateOfBirth);
		//print_r($result->customer()->cfGender);
		//debug($result->subscription());
	}

	private function getListPlans(){
		ChargeBee_Environment::configure($this->site,$this->publicKey);
		return ChargeBee_Plan::all(array('limit' => 100));
	}

	private function setListPlans(){ // set list in view
		$plans = $this->getListPlans();
		$list = array();
		foreach ($plans as $value) {
			# code...
			$value = $value->plan();
			if($value->status == 'active'){
				$list[$value->id] = $value->name .'  ($ '. number_format($value->price/100,2,'.',','). ')';
			}
		}
		$this->set('plansList',$list);
	}

	private function createOrder(){
		ChargeBee_Environment::configure("mobileideaworks-test","test_ucu7p1sHISDNykU2M8cdbWMimNwmwWSRsU");
		try{
			$result = ChargeBee_Order::create(array(
					'invoiceId' => 'DemoInv_102',
					'status'=>'new',
					/*'referenceId' => 'KyVqPAP4tPPVmI',
					'id' => 'KyVqPAP4tPPVmI',
					'object' => 'order',
					'note' => 'for test',*/
					)
			);
			$order = $result->order();
			debug($order);
			/*ChargeBee_Environment::configure("mobileideaworks-test","test_ucu7p1sHISDNykU2M8cdbWMimNwmwWSRsU");
			$all = ChargeBee_Order::all(array( "limit" => 5));
			foreach($all as $entry){
			  $order = $entry->order();
			  debug($order);
			}*/
		} catch (ChargeBee_PaymentException $e) {
		    // First check for card parameters entered by the user.
		    // We recommend you to validate the input at the client side itself to catch simple mistakes.
		    if ("card[number]" == $e->getParam()) {
		        // Ask your user to recheck the card number. A better way is to use 
		        // Stripe's https://github.com/stripe/jquery.payment for validating it in the client side itself.   
		      
		    //}else if(<other card params> == $e->getParam()){ 
		      // Similarly check for other card parameters entered by the user.
		      // ....
		    	echo 'cart number';
		    } else {
		        // Verfication or processing failures.
		        // Provide a standard message to your user to recheck his card details or provide a different card.
		        // Like  'Sorry,there was a problem when processing your card, please check the details and try again'. 
		        echo '1 cart number';
		    }
		} catch (ChargeBee_InvalidRequestException $e) {
		    // For coupons you could decide to provide specific messages by using 
		    // the 'api_error_code' attribute in the  error.
		    if ("coupon" == $e->getParam()) {
		        if ("resource_not_found" == $e->getApiErrorCode()) {
		            // Inform user to recheck his coupon code.
		            echo 'resource_not_found';
		        } else if ("resource_limit_exhausted" == $e->getApiErrorCode()) {
		            // Inform user that the coupon code has expired.
		            echo 'resource_limit_exhausted';
		        } else if ("invalid_request" == $e->getApiErrorCode()) {
		            // Inform user that the coupon code is not applicable for his plan(/addons).
		            echo 'invalid_request';
		        } else {
		            // Inform user to recheck his coupon code.
		            echo 'Inform user to recheck his coupon code.';
		        }
		    } else {
		        // Since you would have validated all other parameters on your side itself, 
		        // this could probably be a bug in your code. Provide a generic message to your users.
		        echo 2;
		    }
		} catch (ChargeBee_OperationFailedException $e) {
		    // Indicates that the request parameters were right but the request couldn't be completed.
		    // The reasons might be "api_request_limit_exceeded" or could be due to an issue in ChargeBee side.
		    // These should occur very rarely and mostly be of temporary nature. 
		    // You could ask your user to retry after some time.
		    echo 'OperationFailedException Error code '.$e->getApiErrorCode();
		} catch (ChargeBee_APIError $e) {
		    // Handle the other ChargeBee API errors. Mostly would be setup related 
		    // exceptions such as authentication failure.
		    // You could ask users contact your support.
		    //print("Curl Error Code is: " . $e->getCurlErrorCode());
		    echo 'Error code '.$e->getApiErrorCode();
		} catch (ChargeBee_IOException $e) {
		    // Handle IO exceptions such as connection timeout, request timeout etc.
		    // Possibly temporary . You could give a generic message to the customer to retry after sometime.
		    // The php client library uses curl_exec internally. If you prefer to handle the errors specifically
		    // please take a look at http://curl.haxx.se/libcurl/c/libcurl-errors.html

		    print("Curl Error Code is: " . $e->getCurlErrorCode());
		}  catch (PaymentException $e){
			echo 'PaymentException';
		}catch (Exception $e) {
		    // These are unhandled exceptions (Could be due to a bug in your code or very rarely 
		    // in client library). You could ask users contact your support.
		    echo 'These are unhandled exceptions (Could be due to a bug in your code or very rarely
		    	 in client library). You could ask users contact your support.';
		}	
	}	

	private function getSettings(){
		return $this->Settings->find('list',array('fields'=>array('name','value')));
	}

	private function saveUser($trial = false,$sub = false){
		$sessionUserData = $this->Session->read('User.request');
		if(empty($sessionUserData)){ return false;}
		$sessionUserData['User']['paid'] = 1;
		$this->Session->delete('User.request');
		if($this->User->save($sessionUserData)){
			//$this->createUserOnMoodle($sessionUserData);	// save user in Moodle (in Mylife)		
			if($trial == true){
				$this->_setTrial($this->User->id);
			}
			if($sub == true){
				$this->_saveSubscription($this->User->id);
			}
			$user = $this->User->find('first',array('conditions'=>array('User.id'=>$this->User->id)));
			$this->sendMail('Complete Registration',null,array($user['User']['username']));
			$this->Session->write('User.confirm_id',$this->User->id);        
            $this->Session->setFlash(__('Registration was successful'),'flashgood');
            $this->redirect(array('controller'=>'users','action'=>'success','admin'=>false));
		}else{
			$this->Session->setFlash(__('Registration was not successful'));
			$this->redirect(array('controller'=>'users','action'=>'signup','admin'=>false));
		}
	}

	private function createUserOnMoodle($params){
		unset($params['User']['role_id']);
		unset($params['User']['country_id']);
		unset($params['User']['phone']);
		unset($params['User']['institute_name']);
		unset($params['User']['sub_domen']);
		unset($params['User']['paid']);
		$opts = array();
		$curl = curl_init();
		$url = $this->_mylifeEndPoint.'/users/save_user_from_education';
		 $opts[CURLOPT_POST] = 1;
            $opts[CURLOPT_POSTFIELDS] = http_build_query($params, null, '&');
         $opts[CURLOPT_URL] = $url;
        $opts[CURLOPT_RETURNTRANSFER] = true;
        $opts[CURLOPT_CONNECTTIMEOUT] = 50;
        $opts[CURLOPT_TIMEOUT] = 100;
        /*$userAgent = "Chargebee-PHP-Client" . " v" . ChargeBee_Version::VERSION;*/
        $headers = array(
            'Accept: application/json',
            /*"User-Agent: " . $userAgent*/);
        $opts[CURLOPT_HTTPHEADER] = $headers;
        //$opts[CURLOPT_USERPWD] = $env->getApiKey() . ':';
        debug($opts);
        curl_setopt_array($curl, $opts);
        try{
        	$response = curl_exec($curl); 

        //debug($response); exit(0);
        }catch (Exception $e){
        	return false;
        }
        return true;
	}

	private function sendMail($subject,$user = null,$email){
		//$email_content = $this->Settings->find('first',array('conditions'=>array('Settings.name'=>'EMAIL')));
		App::uses('CakeEmail', 'Network/Email');
                    /*$email = new CakeEmail();
                    $email->from('admin@educationhub.com')
                            ->to('ost.vas@mail.ru')
                            ->subject('Complete Registration')
                            ->template('default')
                            ->emailFormat('text')
                            ->viewVars();*/
		$html = $this->_createEmailView();
                    $Email = new CakeEmail();
                        $Email->config('smtp');
                        //$Email->helpers(array('Html', 'Text'));
                        //$Email->viewVars(array('siteName'=>$this->_siteName,'content'=>$email_content['Settings']['value']));
                        /*$Email->template('default')*/
                        $Email->emailFormat('html')
                            ->to($email)
                            ->from('cool.black1717@yandex.ru')
                            ->send($html);

		//debug($email_content); exit(0);
        /*$mail = new htmlMimeMail();
        $mail->setSubject($subject);
        //$mail->setReturnPath('sms-puch.com@mail.ru');
        //$mail->setFrom('sms-puch.com@mail.ru');
        $mail->setReturnPath('admin@educationhub.com');
        $mail->setFrom('admin@educationhub.com');
        $mail_body = $this->_createEmailView();
        //echo $mail_body; exit(0);
        //return true;
        $is_send = false;
        $mail->setHtml($mail_body, strip_tags($mail_body));        
        foreach ($email as $k=>$v){
            if(@$mail->send(array($v))){
                $is_send = true;
            }
        }
        return $is_send;*/
    }

    private function _setTrial($user_id){

    		$data['user_id'] = $user_id;
    		$data['plan_id'] = 'trial';
    		$data['customer_id'] = 'trial'.$user_id;
    		$data['subscription_id'] = 'trial'.$user_id;
    		$data['subscription_status'] = 'trial';
    		$data['current_term_start'] = 0;
    		$data['current_term_end'] = 0;
    		$data['remaining_billing_cycles'] =0;
    		$data['started_at'] = time();
    		$data['trial_start'] = time();
    		$data['trial_end'] = (time()+2592000);
    		$data = array('Subscription'=>$data);
    		$this->Subscription->save($data);
    }

    function admin_subscriptions(){
    	$this->paginate = array(
                'Subscription'=>array(
                    'order' => array('Subscription.id' => 'desc'),
                    'limit'=>10
                    )
                );
        $this->set('subscription',$this->paginate('Subscription'));
    }

    public function admin_viewemail(){
    	$this->layout = 'ajax';

    	App::uses('CakeEmail', 'Network/Email');
                    /*$email = new CakeEmail();
                    $email->from('admin@educationhub.com')
                            ->to('ost.vas@mail.ru')
                            ->subject('Complete Registration')
                            ->template('default')
                            ->emailFormat('text')
                            ->viewVars();*/
		$email_content = $this->Settings->find('first',array('conditions'=>array('Settings.name'=>'EMAIL')));
		$html = $this->_createEmailView();
                    $Email = new CakeEmail();
                        $Email->config('smtp');
                        /*$Email->helpers(array('Html', 'Text'));
                        $Email->viewVars(array('siteName'=>$this->_siteName,'content'=>$email_content['Settings']['value']));
                        $Email->template('default');*/
                        $Email->emailFormat('html')
                            ->to('ostapchyk.vasia@gmail.com')
                            ->from('cool.black1717@yandex.ru')                           
                            ->send($html);
                           // debug($Email); exit(0);
    	
    	//debug($view->layout); exit(0);
    	$this->set('html',$html);
    }

    private function _createEmailView(){
    	$view = new View($this, null);
    	$view->layout = 'Emails'.DS.'html'.DS.'default';
    	$email_content = $this->Settings->find('first',array('conditions'=>array('Settings.name'=>'EMAIL')));
    	$view->set('content',$email_content['Settings']['value']);
    	$html = $view->render('..'.DS.'Emails'.DS.'text'.DS.'default');
    	return $html;
    }
}