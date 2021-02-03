<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('Xml', 'Utility');
App::uses('AuthComponent', 'Controller/Component');
App::import('Vendor', '/Classes/PHPExcel/IOFactory'); //import statement for Excel editing classes
App::import('Vendor', '/Classes/PHPExcel/Cell/MyValueBinder'); //import statement for Excel editing classes



/**
 * CheckinOutLogs Controller
 *
 * @property CheckinOutLog $CheckinOutLog
 */
class CheckinOutLogsController extends AppController {

var $components = array("Email","Session",'RequestHandler');
var $helpers = array("Html","Form","Session",'Js');
	
	public function beforeFilter(){
 	parent::beforeFilter();
	/*$this->Auth->allow('login');
	$this->Auth->allow('add');
	 $this->Auth->allow('forgetpwd'); 
	   $this->Auth->allow('reset'); 
	   $this->Auth->allow('index'); 
	   $this->Auth->allow('edit'); 
	   $this->Auth->allow('delete'); 
	   $this->Auth->allow('user_search'); 
	   $this->Auth->allow('index_reports'); 
	   $this->Auth->allow('check_in'); 
	   $this->Auth->allow('check_out'); 
	   $this->Auth->allow('choose_type'); 
	   $this->Auth->allow('use_barcode'); 
	   $this->Auth->allow('check_in_barcode'); 
	   $this->Auth->allow('search_staff_logs'); 
	   $this->Auth->allow('force_check_out'); 
	   $this->Auth->allow('search_staff_logs_pdf'); 
	   $this->Auth->allow('search_staff_logs2'); */
	   $this->Auth->deny();
	}
	
	
//Media view
		public function prof_pic($regnumber = "") {
			
		if ($regnumber != "") {

            $this->viewClass = 'Media';
			$regnumber0 = strtoupper($regnumber);
			$regnumber1 = strtolower($regnumber);
			$regnumber2 = strtolower($regnumber);
			$regnumber3 = strtoupper($regnumber);
			
			$fileName = $regnumber . ".jpg";
			$fileName0 = $regnumber0 . ".jpg";
			$fileName1 = $regnumber1 . ".jpg";
			$fileName2 = $regnumber2 . ".JPG";
			$fileName3 = $regnumber3 . ".JPG";
            $params = array(
                 'id' => 	$fileName,
                 'name' => 	$regnumber,
				 'extension' => 'jpg',
                 'download' => false,
                 'path' => APP . 'staff_id'. DS
            );
			if(file_exists($params['path'].$fileName)){
				$this->set($params);
			}elseif(file_exists($params['path'].$fileName0)){
				$params = array(
					 'id' => 	$fileName0,
					 'name' => 	$regnumber0,
					 'extension' => 'jpg',
					 'download' => false,
					 'path' => APP . 'staff_id'. DS
            );
				$this->set($params);
			}elseif(file_exists($params['path'].$fileName1)){
				$params = array(
					'id' => 	$fileName1,
					'name' => 	$regnumber1,
					'extension' => 'jpg',
					'download' => false,
					'path' => APP . 'staff_id'. DS
				);
				$this->set($params);
			}elseif(file_exists($params['path'].$fileName2)){
				$params = array(
					'id' => 	$fileName2,
					'name' => 	$regnumber2,
					'extension' => 'JPG',
					'download' => false,
					'path' => APP . 'staff_id'. DS
				);
				$this->set($params);
			}elseif(file_exists($params['path'].$fileName3)){
				$params = array(
					'id' => 	$fileName3,
					'name' => 	$regnumber3,
					'extension' => 'JPG',
					'download' => false,
					'path' => APP . 'staff_id'. DS
				);
				
				$this->set($params);
			}
			else{
				$params['id'] = "sample1.jpg";
				$params['name'] = "sample1";
				$this->set($params);
			}
		}
	}


	
	
	
	
	public function choose_type(){
			$current_user['username'] = $this->Session->read('Auth.User.username');
			$userdata=$this->Auth->user();
			$ecnumber=$userdata['ecnumber'];
		/**check entry point***/
			$this->loadModel('CurrentLogInUser');
			$this->loadModel('EntryPoint');
			$entryID = $this->CurrentLogInUser->find('first',array(
								'conditions'=>array('CurrentLogInUser.ecnumber'=>$ecnumber),
								'fields'=>array('CurrentLogInUser.entry_point')));
			$entryID = $entryID['CurrentLogInUser']['entry_point'];
			
			$canCheck = $this->EntryPoint->find('first',array(
								'conditions'=>array('EntryPoint.id'=>$entryID),
								'fields'=>array('EntryPoint.check_in')));
								
			$canCheck = $canCheck['EntryPoint']['check_in'];
			
		$this->set(compact('canCheck'));
		
	}
	
	
		public function use_barcode(){
		// $entryID = $this->params['pass'];
		// debug($entryID);die();
		 $zuva = date('y-m-d');
		//debug($entryID);die();
		$current_user['username'] = $this->Session->read('Auth.User.username');
	$userdata=$this->Auth->user();
	$ecnumber=$userdata['ecnumber'];
	
	
		if($this->request->is('post')){
			
			/**check entry point***/
			$this->loadModel('CurrentLogInUser');
			 $entryID = $this->CurrentLogInUser->find('first',array(
								'conditions'=>array('CurrentLogInUser.ecnumber'=>$ecnumber),
								'fields'=>array('CurrentLogInUser.entry_point')));
			$entryID = $entryID['CurrentLogInUser']['entry_point'];
			//debug($this->request->data);die();
			
			 //debug($this->request->data);die();
		$this->loadModel('StaffDetail');
		$barcode = $this->request->data['CheckinOutLog']['barcode'];
		$userinfo = $this->StaffDetail->find('all',array('conditions'=>array('StaffDetail.barcode'=>$barcode)));
		if(empty($userinfo)){
			$this->Session->setFlash(__('Employee cannot be checked out on this exit point because it doesnot match the entry point'));
			$this->redirect(array('controller'=>'CheckinOutLogs','action' => 'choose_type'));	
		}
		//debug($userinfo);die();
		$ecnumber = $this->StaffDetail->find('first',array(
											'conditions'=>array('StaffDetail.barcode'=>$barcode),
											'fields'=>array('StaffDetail.ecnumber'),
						'recursive'=>-1));
		
		$ecnumber = $ecnumber['StaffDetail']['ecnumber'];
		/*$checkID = $this->CheckinOutLog->find('first',array(
									 'conditions'=>array('CheckinOutLog.ecnumber'=>$ecnumber)),
									 'fields'=>array('CheckinOutLog.check_in'));*/
									 
		 $checkID=$this->CheckinOutLog->find('first',array(
								'conditions'=>array('CheckinOutLog.ecnumber'=>$ecnumber),
								'fields'=>array('CheckinOutLog.check_in'),
								'order' => array('CheckinOutLog.id' => 'DESC')
								));
   
		
		$checkID = $checkID['CheckinOutLog']['check_in'];
		
	}
		$this->set(compact('userinfo','checkID','entryID'));
		
	}
	
	
	
	
		
	public function check_in_barcode(){
		$username=$this->Session->read('Auth.User.username');
		//debug($username);die();
		//$entryPointId = $this->params['pass']['0'];
		$ecnumber = $this->params['pass']['1'];
		//debug($ecnumber);die();
		$date_in = date('y-m-d');
		$time_in = date('H:i:s');
		$this->loadModel('CheckinOutLog');
		$this->loadModel('CurrentLogInUser');
		$this->loadModel('User');
		/******get the entry point of the logged in user******/
		$ecNmUsr = $this->User->find('first', array(
						'fields'=>array('User.ecnumber'),
										'conditions'=>array('User.username'=>$username),
						'recursive'=>-1));
		
		$ecNmUsr = $ecNmUsr['User']['ecnumber'];
		
		$entryPointID = $this->CurrentLogInUser->find('first', array(
						'fields'=>array('CurrentLogInUser.entry_point'),
										'conditions'=>array('CurrentLogInUser.ecnumber'=>$ecNmUsr),
						'recursive'=>-1));						
		$entryPointID = $entryPointID['CurrentLogInUser']['entry_point'];
		
		/******check if staff already checked in for the same date******/
		$check = $this->CheckinOutLog->find('list', array(
						'fields'=>array('CheckinOutLog.id'),
										'conditions'=>array('CheckinOutLog.ecnumber'=>$ecnumber,
										'CheckinOutLog.check_in' =>1,
										'CheckinOutLog.date_in' => $date_in),
						'recursive'=>-1));
				
		if(empty($check)){
			$this->CheckinOutLog->create();
				$this->CheckinOutLog->set(array(
										//'id' => $idd,
										'entry_point_id' => $entryPointID,
										'ecnumber' => $ecnumber,
										'time_in' => $time_in,
										'date_in' => $date_in,
										'checkin_user'=>$username,
										'time_out'=>0,
										'date_out'=>0,
										'check_in'=>1,
										'checkout_user'=>0,
										'created'=>$zuva,
										'checkin_ip_address'=>$_SERVER['REMOTE_ADDR']
												   ));
								 $this->CheckinOutLog->save();
			
						}
	
	//debug($this->CheckinOutLog->invalidFields($this->CheckinOutLog->save())); die();
								 
	$this->Session->setFlash('Staff Succesfully Check In','default',array('class' => 'success'));
	$this->redirect(array('controller'=>'CheckinOutLogs','action' => 'choose_type'));
		
		
	}
	

		
	public function check_out_barcode(){
		$username=$this->Session->read('Auth.User.username');
		$entryPointId = $this->params['pass']['0'];
		$ecnumber = $this->params['pass']['1'];
		//debug();die();
		$date_out = date('y-m-d');
		$time_out = date('H:i:s');
		$ip_add = $_SERVER['REMOTE_ADDR'];
		$this->loadModel('CurrentLogInUser');
		$this->loadModel('User');
		$this->loadModel('EntryPoint');
		/******get the entry point of the logged in user******/
		$ecNmUsr = $this->User->find('first', array(
						'fields'=>array('User.ecnumber'),
										'conditions'=>array('User.username'=>$username),
						'recursive'=>-1));
		
		$ecNmUsr = $ecNmUsr['User']['ecnumber'];
		
		/****entry point for the logged in user****/
		$entryPointID = $this->CurrentLogInUser->find('first', array(
						'fields'=>array('CurrentLogInUser.entry_point'),
										'conditions'=>array('CurrentLogInUser.ecnumber'=>$ecNmUsr),
						'recursive'=>-1));						
		$entryPointID = $entryPointID['CurrentLogInUser']['entry_point'];
		
		
		/************entry point name for the employee**********/
			$employeeEntrypointID = $this->CheckinOutLog->find('first', array(
						'fields'=>array('CheckinOutLog.entry_point_id'),
										'conditions'=>array('CheckinOutLog.ecnumber'=>$ecnumber,
										'CheckinOutLog.check_in' =>1),
						'recursive'=>-1));
			$employeeEntrypointID = $employeeEntrypointID['CheckinOutLog']['entry_point_id'];
			
						//debug($employeeEntrypointID);die();
			$entryName = $this->EntryPoint->find('first', array(
						'fields'=>array('EntryPoint.name'),
										'conditions'=>array('EntryPoint.id'=>$employeeEntrypointID),
						'recursive'=>-1));
			$entryName = $entryName['EntryPoint']['name'];
			
		/******check if staff checked in at the same entry point for the same date******/
		$dateIn = $this->CheckinOutLog->find('first', array(
						'fields'=>array('CheckinOutLog.date_in'),
						'conditions'=>array('CheckinOutLog.ecnumber'=>$ecnumber,'CheckinOutLog.check_in' =>1),
						'recursive'=>-1));
		$dateIn = $dateIn['CheckinOutLog']['date_in'];
		
		//debug($checkEntryPoint);die();
		if($employeeEntrypointID == $entryPointID){
			
		if($dateIn == $date_out){
			
			$this->CheckinOutLog->updateAll(
				array('CheckinOutLog.check_in' =>0,
					  'CheckinOutLog.checkout_user'=>"'$username'",
					  'CheckinOutLog.time_out'=>"'$time_out'",
					  'CheckinOutLog.checkout_ip_address'=>"'$ip_add'",
					  'CheckinOutLog.date_out'=>"'$date_out'"
					  
					  ),
				array('CheckinOutLog.ecnumber'=>$ecnumber,
					  'CheckinOutLog.check_in'=>1,
					  'CheckinOutLog.date_in'=>$date_out,
					  'CheckinOutLog.entry_point_id'=>$employeeEntrypointID)
				);						 
		
	$this->Session->setFlash('Staff Succesfully Checked Out','default',array('class' => 'success'));
	$this->redirect(array('controller'=>'CheckinOutLogs','action' => 'choose_type'));
		}
		
		
		/***condition to check if employeer didnt check out ystdy and should giv the reason***/
			if($dateIn != $date_out){
			$this->Session->setFlash(__('Reason for not checking out the previous day'));
			$this->redirect(array('controller'=>'CheckinOutLogs','action' => 'force_check_out',$ecnumber,$employeeEntrypointID));	
				
			}
			
				
		}
	
//debug($ecnumber);
//debug($employeeEntrypointID);
//debug($entryPointID);die();
		
	if($employeeEntrypointID != $entryPointID){
		$this->Session->setFlash(__('Employee Cannot Be Checked Out here because the employee checked in at::'.$entryName));
		$this->redirect(array('controller'=>'CheckinOutLogs','action' => 'choose_type'));
		}	
		
		
		
		
	}
	
	
	public function check_in(){
		$username=$this->Session->read('Auth.User.username');
		//debug($username);die();
		//$entryPointId = $this->params['pass']['0'];
		$ecnumber = $this->params['pass']['1'];
		$date_in = date('y-m-d');
		$time_in = date('H:i:s');
		$this->loadModel('CheckinOutLog');
		$this->loadModel('CurrentLogInUser');
		$this->loadModel('User');
		/******get the entry point of the logged in user******/
		$ecNmUsr = $this->User->find('first', array(
						'fields'=>array('User.ecnumber'),
										'conditions'=>array('User.username'=>$username),
						'recursive'=>-1));
		
		$ecNmUsr = $ecNmUsr['User']['ecnumber'];
		
		$entryPointID = $this->CurrentLogInUser->find('first', array(
						'fields'=>array('CurrentLogInUser.entry_point'),
										'conditions'=>array('CurrentLogInUser.ecnumber'=>$ecNmUsr),
						'recursive'=>-1));						
		$entryPointID = $entryPointID['CurrentLogInUser']['entry_point'];
		
		
		/******check if staff already checked in for the same date******/
		$check = $this->CheckinOutLog->find('list', array(
						'fields'=>array('CheckinOutLog.id'),
										'conditions'=>array('CheckinOutLog.ecnumber'=>$ecnumber,
										'CheckinOutLog.check_in' =>1,
										'CheckinOutLog.date_in' => $date_in),
						'recursive'=>-1));
				
		if(empty($check)){
			$this->CheckinOutLog->create();
				$this->CheckinOutLog->set(array(
										//'id' => $idd,
										'entry_point_id' => $entryPointID,
										'ecnumber' => $ecnumber,
										'time_in' => $time_in,
										'date_in' => $date_in,
										'checkin_user'=>$username,
										'time_out'=>0,
										'date_out'=>0,
										'check_in'=>1,
										'checkout_user'=>0,
										'created'=>$zuva,
										'checkin_ip_address'=>$_SERVER['REMOTE_ADDR']
												   ));
								 $this->CheckinOutLog->save();
			
						}
	
	//debug($this->CheckinOutLog->invalidFields($this->CheckinOutLog->save())); die();
								 
	$this->Session->setFlash('Staff Succesfully Check In','default',array('class' => 'success'));
	$this->redirect(array('controller'=>'CheckinOutLogs','action' => 'user_search'));
		
		
	}
	
	
	public function check_out(){
		$username=$this->Session->read('Auth.User.username');
		$entryPointId = $this->params['pass']['0'];
		$ecnumber = $this->params['pass']['1'];
		$date_out = date('y-m-d');
		$time_out = date('H:i:s');
		$ip_add = $_SERVER['REMOTE_ADDR'];
		$this->loadModel('EntryPoint');
		$this->loadModel('CurrentLogInUser');
		$this->loadModel('User');
		/**normall knock off time***/
		//$tau = "11:30:00";
		/******get the entry point of the logged in user******/
		$ecNmUsr = $this->User->find('first', array(
						'fields'=>array('User.ecnumber'),
										'conditions'=>array('User.username'=>$username),
						'recursive'=>-1));
		
		$ecNmUsr = $ecNmUsr['User']['ecnumber'];
		
		$entryPointID = $this->CurrentLogInUser->find('first', array(
						'fields'=>array('CurrentLogInUser.entry_point'),
										'conditions'=>array('CurrentLogInUser.ecnumber'=>$ecNmUsr),
						'recursive'=>-1));						
		$entryPointID = $entryPointID['CurrentLogInUser']['entry_point'];
		   
			/************entry point name for the employee**********/
			$employeeEntrypointID = $this->CheckinOutLog->find('first', array(
						'fields'=>array('CheckinOutLog.entry_point_id'),
										'conditions'=>array('CheckinOutLog.ecnumber'=>$ecnumber,
										'CheckinOutLog.check_in' =>1),
						'recursive'=>-1));
			$employeeEntrypointID = $employeeEntrypointID['CheckinOutLog']['entry_point_id'];
			
						//debug($employeeEntrypointID);die();
			$entryName = $this->EntryPoint->find('first', array(
						'fields'=>array('EntryPoint.name'),
										'conditions'=>array('EntryPoint.id'=>$employeeEntrypointID),
						'recursive'=>-1));
			$entryName = $entryName['EntryPoint']['name'];
	
	/**current location where the Check In Out user is currently logged in**/
	/************entry point name for the employer**********/
	$entryUserName = $this->EntryPoint->find('first', array(
						'fields'=>array('EntryPoint.name'),
										'conditions'=>array('EntryPoint.id'=>$entryPointId),
						'recursive'=>-1));
	$entryUserName = $entryUserName['EntryPoint']['name'];


    
	
	/******check if staff checked in at the same entry point for the same date******/
		$checkEntryPoint = $this->CheckinOutLog->find('first', array(
						'fields'=>array('CheckinOutLog.entry_point_id'),
						'conditions'=>array('CheckinOutLog.ecnumber'=>$ecnumber,'CheckinOutLog.check_in' =>1),
						'recursive'=>-1));
		$dateIn = $this->CheckinOutLog->find('first', array(
						'fields'=>array('CheckinOutLog.date_in'),
						'conditions'=>array('CheckinOutLog.ecnumber'=>$ecnumber,'CheckinOutLog.check_in' =>1),
						'recursive'=>-1));
		//debug($checkEntryPoint);die();
		$checkEntryPoint = $checkEntryPoint['CheckinOutLog']['entry_point_id'];
		$dateIn = $dateIn['CheckinOutLog']['date_in'];
	//debug($tau);die();
	/***condition to check if staff knock off at normal time*/
	$knockTime = "16:30:00";
	
	//$x = $knockTime < $time_out;
	//debug($x);
	//debug($knockTime < $time_out);
	
	//die();
	
		if($knockTime > $time_out){		
			$type = "E";
			$this->Session->setFlash(__('You are leaving work place before normal knock off time. Please give a reason for checking out before normal time'));
			$this->redirect(array('controller'=>'CheckinOutLogs','action' => 'force_check_out',$ecnumber,$checkEntryPoint,$type));
		}
	
	
	 /******condition to check the entry point******/
	//	if($checkEntryPoint == $entryPointID){			
			
			if($dateIn == $date_out){
				
				$this->CheckinOutLog->updateAll(
				array('CheckinOutLog.check_in' =>0,
					  'CheckinOutLog.checkout_user'=>"'$username'",
					  'CheckinOutLog.time_out'=>"'$time_out'",
					  'CheckinOutLog.checkout_ip_address'=>"'$ip_add'",
					  'CheckinOutLog.date_out'=>"'$date_out'"
					  
					  ),
				array('CheckinOutLog.ecnumber'=>$ecnumber,
					  'CheckinOutLog.check_in'=>1,
					  'CheckinOutLog.date_in'=>$date_out,
					  'CheckinOutLog.entry_point_id'=>$checkEntryPoint)
				);						 
								 
	
	
				
		
	$this->Session->setFlash('Staff Succesfully Checked Out','default',array('class' => 'success'));
	$this->redirect(array('controller'=>'CheckinOutLogs','action' => 'user_search'));
			}
			
			/***condition to check if employeer didnt check out ystdy and should giv the reason***/
			if($dateIn != $date_out){
			$this->Session->setFlash(__('You did not check out yesterday, give a reason for not checking out the previous day'));
			$this->redirect(array('controller'=>'CheckinOutLogs','action' => 'force_check_out',$ecnumber,$checkEntryPoint));	
				
			}
			
				
		//}
		/*******condition to deny chek out point if not check in point*********/
	/*if($checkEntryPoint != $entryPointID){
							 //debug($entryUserName);
							 //debug($entryName);die();
	$this->Session->setFlash(__('Employee Cannot Be Checked Out here because the employee checked in at::'.$entryName));
	//$this->Session->setFlash(__('Employee Cannot Be Checked Out here because the employee checked in at::'));
	$this->redirect(array('controller'=>'CheckinOutLogs','action' => 'choose_type'));
		}*/
		
		
	}
	
	
	public function force_check_out($ecnumber,$checkEntryPoint){
		
		 $zuva = date('y-m-d');
		 $time_out = date('H:i:s');
		if ($this->request->is('post')) {
			
			$reason = $this->request->data['CheckinOutLog']['check_out_reason'];
			$current_user['username'] = $this->Session->read('Auth.User.username');
			$username = $current_user['username'];
		    $ip_address = $_SERVER['REMOTE_ADDR'];
			
		/***condition to check normal time***/	
		$knockTime = "16:30:00";	
			if($knockTime > $time_out){	
				$type = "E";
				}else{
			$type = "N";	
				}
			
			
			
			//debug($ip_address);die();
			//debug($this->request->data);die();
			
			
			$this->loadModel('ForceCheckoutLog');
			$this->ForceCheckoutLog->create();
								$this->ForceCheckoutLog->set(array(
									'ecnumber' => $ecnumber,
									'entry_point_id'=> $checkEntryPoint,
									'reason_type'=>$type,
									'forced_date'=>$zuva,
									'forced_reason'=>$reason,
									'forced_by'=>$current_user['username'],
									'ip_address'=>$ip_address
									));
									$this->ForceCheckoutLog->save();
									
		//debug($this->ForceCheckoutLog->invalidFields($this->ForceCheckoutLog->save())); die();
									
			/***********update CheckInOutLogs *********/
			$this->CheckinOutLog->updateAll(
				array('CheckinOutLog.check_in' =>0,
					  'CheckinOutLog.checkout_user'=>"'$username'",
					  'CheckinOutLog.time_out'=>"'$time_out'",
					  'CheckinOutLog.checkout_ip_address'=>"'$ip_address'",
					  'CheckinOutLog.date_out'=>"'$zuva'"
					  
					  ),
				array('CheckinOutLog.ecnumber'=>$ecnumber,
					  'CheckinOutLog.check_in'=>1,
					  'CheckinOutLog.entry_point_id'=>$checkEntryPoint)
				);		
									
					$this->Session->setFlash('Staff Succesfully Checked Out','default',array('class' => 'success'));
	                $this->redirect(array('controller'=>'CheckinOutLogs','action' => 'choose_type'));				
		}
		
			
	}
	
		
	
	public function force_check_out2($ecnumber,$checkEntryPoint){
		
		 $zuva = date('y-m-d');
		 $time_out = date('H:i:s');
		if ($this->request->is('post')) {
			
			$reason = $this->request->data['CheckinOutLog']['check_out_reason'];
			$current_user['username'] = $this->Session->read('Auth.User.username');
			$username = $current_user['username'];
		    $ip_address = $_SERVER['REMOTE_ADDR'];
			//debug($ip_address);die();
			//debug($this->request->data);die();
			
			
			$this->loadModel('ForceCheckoutLog');
			$this->ForceCheckoutLog->create();
								$this->ForceCheckoutLog->set(array(
									'ecnumber' => $ecnumber,
									'entry_point_id'=> $checkEntryPoint,
									'reason_type'=>"E",
									'forced_date'=>$zuva,
									'forced_reason'=>$reason,
									'forced_by'=>$current_user['username'],
									'ip_address'=>$ip_address
									));
									$this->ForceCheckoutLog->save();
									
		//debug($this->ForceCheckoutLog->invalidFields($this->ForceCheckoutLog->save())); die();
									
			/***********update CheckInOutLogs *********/
			$this->CheckinOutLog->updateAll(
				array('CheckinOutLog.check_in' =>0,
					  'CheckinOutLog.checkout_user'=>"'$username'",
					  'CheckinOutLog.time_out'=>"'$time_out'",
					  'CheckinOutLog.checkout_ip_address'=>"'$ip_address'",
					  'CheckinOutLog.date_out'=>"'$zuva'"
					  
					  ),
				array('CheckinOutLog.ecnumber'=>$ecnumber,
					  'CheckinOutLog.check_in'=>1,
					  'CheckinOutLog.entry_point_id'=>$checkEntryPoint)
				);		
									
					$this->Session->setFlash('Staff Succesfully Checked Out','default',array('class' => 'success'));
	                $this->redirect(array('controller'=>'CheckinOutLogs','action' => 'choose_type'));				
		}
		
			
	}
	
	

	
	public function search_staff_logs2(){
			$userdata = $this->Session->read('Auth.User.username');
			$userdata=$this->Auth->user();
			$ecnumber=$userdata['ecnumber'];
			//debug($ecnumber);die();
    	if($this->request->is('post')){
			$username = $this->Session->read('Auth.User.username');
				 //debug($this->request->data);die();
					$this->loadModel('StaffDetail');
					//$ecnumber = $this->request->data['CheckinOutLog']['search'];
					//debug($ecnumber);die();
					/**get date from***/
					$kaYrFrm = $this->request->data['CheckinOutLog']['from_date']['year'];
					
					$kaMnthFrm = $this->request->data['CheckinOutLog']['from_date']['month'];
					$kaDayFrm = $this->request->data['CheckinOutLog']['from_date']['day'];
					$yrFrm = substr($kaYrFrm, -2);
					
					$date_from = $yrFrm."-".$kaMnthFrm."-".$kaDayFrm;
					//debug($date_from);die();
					/***get date to**/
					$kaYrTo = $this->request->data['CheckinOutLog']['to_date']['year'];
					$kaMnthTo = $this->request->data['CheckinOutLog']['to_date']['month'];
					$kaDayTo = $this->request->data['CheckinOutLog']['to_date']['day'];
					$yrTo = substr($kaYrFrm, -2);
					$date_to = $yrTo."-".$kaMnthTo."-".$kaDayTo;
					//debug($date_to);die();
					/***STAFF DETAILS**/
					$userinfo = $this->StaffDetail->find('all',array('conditions'=>array('StaffDetail.ecnumber'=>$ecnumber)));
					
//debug($username);die();
										
										
					$staffLogsIDs = $this->CheckinOutLog->find('list',array(
							'conditions'=>array('CheckinOutLog.ecnumber'=>$ecnumber,'mid((CheckinOutLog.date_in),1,10) between ? and ?'=>array(date($date_from),date($date_to))),
							'fields'=>array('id')));
										//debug($staffLogsIDs);
										//die();
							
							
		if(empty($staffLogsIDs)){
			$this->Session->setFlash(__('No log in and log out information for a given date range'));
			$this->redirect(array('controller'=>'CheckinOutLogs','action' => 'search_staff_logs2'));	
		}
		$this->loadModel('EntryPoint');
		$this->loadModel('ForceCheckoutLog');
			
		foreach($staffLogsIDs as $staffLogsID){
			
			/***entry point id and name***/
			$staffLogEntryID = $this->CheckinOutLog->find('first',array(
							'conditions'=>array('CheckinOutLog.id'=>$staffLogsID),
							'fields'=>array('entry_point_id')));
							
							
			$staffLogEntryID = $staffLogEntryID['CheckinOutLog']['entry_point_id'];	
			
				$logsData = $this->CheckinOutLog->find('first', array(
						'fields'=>array('CheckinOutLog.time_in',
										'CheckinOutLog.date_in',
										'CheckinOutLog.time_out','CheckinOutLog.date_out',
										'CheckinOutLog.checkin_user',
										'CheckinOutLog.checkout_user','CheckinOutLog.entry_point_id','CheckinOutLog.id'),
						'conditions'=>array('CheckinOutLog.id'=>$staffLogsID),
						'recursive'=>-1));
					
				//debug($logsData);die();		
				
				$entryName = $this->EntryPoint->find('first', array(
						'fields'=>array('EntryPoint.name'),
										'conditions'=>array('EntryPoint.id'=>$staffLogEntryID),
						'recursive'=>-1));
				$entryName = $entryName['EntryPoint']['name'];
				$id = $logsData['CheckinOutLog']['id'];
				$time_in = $logsData['CheckinOutLog']['time_in'];
				$date_in = $logsData['CheckinOutLog']['date_in'];
				$time_out = $logsData['CheckinOutLog']['time_out'];
				$date_out = $logsData['CheckinOutLog']['date_out'];
				$checkin_user = $logsData['CheckinOutLog']['checkin_user'];
		        $checkout_user = $logsData['CheckinOutLog']['checkout_user'];
				
				/***total hours worked for a day****/
				$worked_hours = $time_out - $time_in;
				/***month name**/
				$monthNameIn = date("F", strtotime($date_in)); 
				$monthNameOut = date("F", strtotime($date_out)); 
				
				/***get the the date as figure only**/
				$last2charsIn = substr($date_in, -2);
				$last2charsOut = substr($date_out, -2);
				$first2charsIn = substr($date_in, 0, 2);
				$first2charsOut = substr($date_out, 0, 2);
				
				/*******full date in words*******/
				$date_in = $last2charsIn.'-'.$monthNameIn.'-'."20".$first2charsIn;
				$date_out = $last2charsOut.'-'.$monthNameOut.'-'."20".$first2charsOut;
				
				//$result = substr($myStr, 0, 5);
				
				//debug($date_in);
				//debug($monthNameIn);
				//die();
				
				/*
				$this->loadModel('ForceCheckoutLog');

				$reason=$this->ForceCheckoutLog->find('first',array(
							'conditions'=>array('ecnumber'=>$ecnumber),
							'fields'=>array('forced_reason'),
							'order' => array('ForceCheckoutLog.forced_reason' => 'DESC')));
		
				$chikonzero = $reason['ForceCheckoutLog']['forced_reason'];*/
				
				
		$data[]=array(
					'id'=>$id,
					'entryName'=>$entryName,
					'time_in'=>$time_in,					
					'date_in'=>$date_in,					
					'time_out'=>$time_out,					
					'date_out'=>$date_out,					
					//'chikonzero'=>$chikonzero,					
					'worked_hours'=>$worked_hours,					
					'checkin_user'=>$checkin_user,					
					'checkout_user'=>$checkout_user,					
					);
				
				
			
			
		}//debug($data);die();
		
	}
		$this->set(compact('ecnumber','data','userinfo','staffLogs','entyPointNm','date_from','date_to','username'));
		
	}

		
	public function search_staff_logs(){
	
    	if($this->request->is('post')){
			$username = $this->Session->read('Auth.User.username');
				 //debug($this->request->data);
					$this->loadModel('StaffDetail');
					$ecnumber = $this->request->data['CheckinOutLog']['search'];
					//debug($ecnumber);die();
					/**get date from***/
					$kaYrFrm = $this->request->data['CheckinOutLog']['from_date']['year'];
					
					$kaMnthFrm = $this->request->data['CheckinOutLog']['from_date']['month'];
					$kaDayFrm = $this->request->data['CheckinOutLog']['from_date']['day'];
					$yrFrm = substr($kaYrFrm, -2);
					
					$date_from = $yrFrm."-".$kaMnthFrm."-".$kaDayFrm;
					//debug($date_from);
					/***get date to**/
					$kaYrTo = $this->request->data['CheckinOutLog']['to_date']['year'];
					$kaMnthTo = $this->request->data['CheckinOutLog']['to_date']['month'];
					$kaDayTo = $this->request->data['CheckinOutLog']['to_date']['day'];
					$yrTo = substr($kaYrFrm, -2);
					//debug($yrTo);
					$date_to = $yrTo."-".$kaMnthTo."-".$kaDayTo;
					//debug($date_to);die();
					/***STAFF DETAILS**/
					$userinfo = $this->StaffDetail->find('all',array('conditions'=>array('StaffDetail.ecnumber'=>$ecnumber)));
					
//debug($username);die();
										
										
					$staffLogsIDs = $this->CheckinOutLog->find('list',array(
							'conditions'=>array('CheckinOutLog.ecnumber'=>$ecnumber,'mid((CheckinOutLog.date_in),1,10) between ? and ?'=>array(date($date_from),date($date_to))),
							'fields'=>array('id')));
										//debug($staffLogsIDs);
										//die();
							
							
		if(empty($staffLogsIDs)){
			$this->Session->setFlash(__('Staff has no log in and log out information for a given date range'));
			$this->redirect(array('controller'=>'CheckinOutLogs','action' => 'search_staff_logs'));	
		}
		$this->loadModel('EntryPoint');
		$this->loadModel('ForceCheckoutLog');
			
		foreach($staffLogsIDs as $staffLogsID){
			
			/***entry point id and name***/
			$staffLogEntryID = $this->CheckinOutLog->find('first',array(
							'conditions'=>array('CheckinOutLog.id'=>$staffLogsID),
							'fields'=>array('entry_point_id')));
							
							
			$staffLogEntryID = $staffLogEntryID['CheckinOutLog']['entry_point_id'];	
			
				$logsData = $this->CheckinOutLog->find('first', array(
						'fields'=>array('CheckinOutLog.time_in',
										'CheckinOutLog.date_in',
										'CheckinOutLog.time_out','CheckinOutLog.date_out',
										'CheckinOutLog.checkin_user',
										'CheckinOutLog.checkout_user','CheckinOutLog.entry_point_id','CheckinOutLog.id'),
						'conditions'=>array('CheckinOutLog.id'=>$staffLogsID),
						'recursive'=>-1));
					
				//debug($logsData);die();		
				
				$entryName = $this->EntryPoint->find('first', array(
						'fields'=>array('EntryPoint.name'),
										'conditions'=>array('EntryPoint.id'=>$staffLogEntryID),
						'recursive'=>-1));
				$entryName = $entryName['EntryPoint']['name'];
				$id = $logsData['CheckinOutLog']['id'];
				$time_in = $logsData['CheckinOutLog']['time_in'];
				$date_in = $logsData['CheckinOutLog']['date_in'];
				$time_out = $logsData['CheckinOutLog']['time_out'];
				$date_out = $logsData['CheckinOutLog']['date_out'];
				$checkin_user = $logsData['CheckinOutLog']['checkin_user'];
		        $checkout_user = $logsData['CheckinOutLog']['checkout_user'];
				
				/***total hours worked for a day****/
				$worked_hours = $time_out - $time_in;
				/***month name**/
				$monthNameIn = date("F", strtotime($date_in)); 
				$monthNameOut = date("F", strtotime($date_out)); 
				
				/***get the the date as figure only**/
				$last2charsIn = substr($date_in, -2);
				$last2charsOut = substr($date_out, -2);
				$first2charsIn = substr($date_in, 0, 2);
				$first2charsOut = substr($date_out, 0, 2);
				
				/*******full date in words*******/
				$date_in = $last2charsIn.'-'.$monthNameIn.'-'."20".$first2charsIn;
				$date_out = $last2charsOut.'-'.$monthNameOut.'-'."20".$first2charsOut;
				
				//$result = substr($myStr, 0, 5);
				
				//debug($date_in);
				//debug($monthNameIn);
				//die();
				
				/*
				$this->loadModel('ForceCheckoutLog');

				$reason=$this->ForceCheckoutLog->find('first',array(
							'conditions'=>array('ecnumber'=>$ecnumber),
							'fields'=>array('forced_reason'),
							'order' => array('ForceCheckoutLog.forced_reason' => 'DESC')));
		
				$chikonzero = $reason['ForceCheckoutLog']['forced_reason'];*/
				
				
		$data[]=array(
					'id'=>$id,
					'entryName'=>$entryName,
					'time_in'=>$time_in,					
					'date_in'=>$date_in,					
					'time_out'=>$time_out,					
					'date_out'=>$date_out,					
					//'chikonzero'=>$chikonzero,					
					'worked_hours'=>$worked_hours,					
					'checkin_user'=>$checkin_user,					
					'checkout_user'=>$checkout_user,					
					);
				
				
			
			
		}//debug($data);die();
		
	}
		$this->set(compact('kaYrFrm','kaMnthFrm','kaDayFrm','kaYrTo','kaMnthTo','kaDayTo','ecnumber','data','userinfo','staffLogs','entyPointNm','date_from','date_to','username'));
		
	}


	/**********excell report***********/
				
	public function search_staff_logs_excel(){
	
    	//if($this->request->is('post')){
			$username = $this->Session->read('Auth.User.username');
				// debug($this->request->data);die();
					$this->loadModel('StaffDetail');
					$ecnumber = $this->request->data['CheckinOutLog']['ecnumber'];
					//debug($ecnumber);die();
					/**get date from***/
					$kaYrFrm = $this->request->data['CheckinOutLog']['kaYrFrm'];
					
					$kaMnthFrm = $this->request->data['CheckinOutLog']['kaMnthFrm'];
					$kaDayFrm = $this->request->data['CheckinOutLog']['kaDayFrm'];
					$yrFrm = substr($kaYrFrm, -2);
					
					$date_from = $yrFrm."-".$kaMnthFrm."-".$kaDayFrm;
					//debug($date_from);die();
					/***get date to**/
					$kaYrTo = $this->request->data['CheckinOutLog']['kaYrTo'];
					$kaMnthTo = $this->request->data['CheckinOutLog']['kaMnthTo'];
					$kaDayTo = $this->request->data['CheckinOutLog']['kaDayTo'];
					$yrTo = substr($kaYrFrm, -2);
					$date_to = $yrTo."-".$kaMnthTo."-".$kaDayTo;
					//debug($date_to);die();
					/***STAFF DETAILS**/
					$userinfo = $this->StaffDetail->find('first',array('conditions'=>array('StaffDetail.ecnumber'=>$ecnumber)));
					
//debug($username);die();
										
										
					$staffLogsIDs = $this->CheckinOutLog->find('list',array(
							'conditions'=>array('CheckinOutLog.ecnumber'=>$ecnumber,'mid((CheckinOutLog.date_in),1,10) between ? and ?'=>array(date($date_from),date($date_to))),
							'fields'=>array('id')));
										//debug($staffLogsIDs);
										//die();
							
							
		if(empty($staffLogsIDs)){
			$this->Session->setFlash(__('Staff has no log in and log out information for a given date range'));
			$this->redirect(array('controller'=>'CheckinOutLogs','action' => 'search_staff_logs'));	
		}
		$this->loadModel('EntryPoint');
		$this->loadModel('ForceCheckoutLog');
			
		foreach($staffLogsIDs as $staffLogsID){
			
			/***entry point id and name***/
			$staffLogEntryID = $this->CheckinOutLog->find('first',array(
							'conditions'=>array('CheckinOutLog.id'=>$staffLogsID),
							'fields'=>array('entry_point_id')));
							
							
			$staffLogEntryID = $staffLogEntryID['CheckinOutLog']['entry_point_id'];	
			
				$logsData = $this->CheckinOutLog->find('first', array(
						'fields'=>array('CheckinOutLog.time_in',
										'CheckinOutLog.date_in',
										'CheckinOutLog.time_out','CheckinOutLog.date_out',
										'CheckinOutLog.checkin_user',
										'CheckinOutLog.checkout_user','CheckinOutLog.entry_point_id','CheckinOutLog.id'),
						'conditions'=>array('CheckinOutLog.id'=>$staffLogsID),
						'recursive'=>-1));
					
				//debug($logsData);die();		
				
				$entryName = $this->EntryPoint->find('first', array(
						'fields'=>array('EntryPoint.name'),
										'conditions'=>array('EntryPoint.id'=>$staffLogEntryID),
						'recursive'=>-1));
				$entryName = $entryName['EntryPoint']['name'];
				$id = $logsData['CheckinOutLog']['id'];
				$time_in = $logsData['CheckinOutLog']['time_in'];
				$date_in = $logsData['CheckinOutLog']['date_in'];
				$time_out = $logsData['CheckinOutLog']['time_out'];
				$date_out = $logsData['CheckinOutLog']['date_out'];
				$checkin_user = $logsData['CheckinOutLog']['checkin_user'];
		        $checkout_user = $logsData['CheckinOutLog']['checkout_user'];
				
				/***total hours worked for a day****/
				$worked_hours = $time_out - $time_in;
				/***month name**/
				$monthNameIn = date("F", strtotime($date_in)); 
				$monthNameOut = date("F", strtotime($date_out)); 
				
				/***get the the date as figure only**/
				$last2charsIn = substr($date_in, -2);
				$last2charsOut = substr($date_out, -2);
				$first2charsIn = substr($date_in, 0, 2);
				$first2charsOut = substr($date_out, 0, 2);
				
				/*******full date in words*******/
				$date_in = $last2charsIn.'-'.$monthNameIn.'-'."20".$first2charsIn;
				$date_out = $last2charsOut.'-'.$monthNameOut.'-'."20".$first2charsOut;
				
				//$result = substr($myStr, 0, 5);
				
				//debug($date_in);
				//debug($monthNameIn);
				//die();
				
				/*
				$this->loadModel('ForceCheckoutLog');

				$reason=$this->ForceCheckoutLog->find('first',array(
							'conditions'=>array('ecnumber'=>$ecnumber),
							'fields'=>array('forced_reason'),
							'order' => array('ForceCheckoutLog.forced_reason' => 'DESC')));
		
				$chikonzero = $reason['ForceCheckoutLog']['forced_reason'];*/
				
				
		$data[]=array(
					'id'=>$id,
					'entryName'=>$entryName,
					'time_in'=>$time_in,					
					'date_in'=>$date_in,					
					'time_out'=>$time_out,					
					'date_out'=>$date_out,					
					//'chikonzero'=>$chikonzero,					
					'worked_hours'=>$worked_hours,					
					'checkin_user'=>$checkin_user,					
					'checkout_user'=>$checkout_user,					
					);
				
				
			
			
		}//debug($data);die();
		
	//}
		$this->set(compact('data','userinfo','staffLogs','entyPointNm','date_from','date_to','username'));
		$this->render('search_staff_logs_excel','export_xls');
		
	}


	/***********report**************/	
	
	
	/**********pdf report***********/
	
			
	public function search_staff_logs_pdf(){
	
    	//if($this->request->is('post')){
			$username = $this->Session->read('Auth.User.username');
				// debug($this->request->data);die();
					$this->loadModel('StaffDetail');
					$ecnumber = $this->request->data['CheckinOutLog']['ecnumber'];
					//debug($ecnumber);die();
					/**get date from***/
					$kaYrFrm = $this->request->data['CheckinOutLog']['kaYrFrm'];					
					$kaMnthFrm = $this->request->data['CheckinOutLog']['kaMnthFrm'];
					$kaDayFrm = $this->request->data['CheckinOutLog']['kaDayFrm'];
					$yrFrm = substr($kaYrFrm, -2);
					$date_from = $yrFrm."-".$kaMnthFrm."-".$kaDayFrm;
					//debug($date_from);die();
					/***get date to**/
					$kaYrTo = $this->request->data['CheckinOutLog']['kaYrTo'];
					$kaMnthTo = $this->request->data['CheckinOutLog']['kaMnthTo'];
					$kaDayTo = $this->request->data['CheckinOutLog']['kaDayTo'];
					$yrTo = substr($kaYrFrm, -2);
					$date_to = $yrTo."-".$kaMnthTo."-".$kaDayTo;
					//debug($date_to);die();
					/***STAFF DETAILS**/
					$userinfo = $this->StaffDetail->find('first',array('conditions'=>array('StaffDetail.ecnumber'=>$ecnumber)));
					
//debug($username);die();
										
										
					$staffLogsIDs = $this->CheckinOutLog->find('list',array(
							'conditions'=>array('CheckinOutLog.ecnumber'=>$ecnumber,'mid((CheckinOutLog.date_in),1,10) between ? and ?'=>array(date($date_from),date($date_to))),
							'fields'=>array('id')));
										//debug($staffLogsIDs);
										//die();
							
							
		if(empty($staffLogsIDs)){
			$this->Session->setFlash(__('Staff has no log in and log out information for a given date range'));
			$this->redirect(array('controller'=>'CheckinOutLogs','action' => 'search_staff_logs'));	
		}
		$this->loadModel('EntryPoint');
		$this->loadModel('ForceCheckoutLog');
			
		foreach($staffLogsIDs as $staffLogsID){
			
			/***entry point id and name***/
			$staffLogEntryID = $this->CheckinOutLog->find('first',array(
							'conditions'=>array('CheckinOutLog.id'=>$staffLogsID),
							'fields'=>array('entry_point_id')));
							
							
			$staffLogEntryID = $staffLogEntryID['CheckinOutLog']['entry_point_id'];	
			
				$logsData = $this->CheckinOutLog->find('first', array(
						'fields'=>array('CheckinOutLog.time_in',
										'CheckinOutLog.date_in',
										'CheckinOutLog.time_out','CheckinOutLog.date_out',
										'CheckinOutLog.checkin_user',
										'CheckinOutLog.checkout_user','CheckinOutLog.entry_point_id','CheckinOutLog.id'),
						'conditions'=>array('CheckinOutLog.id'=>$staffLogsID),
						'recursive'=>-1));
					
				//debug($logsData);die();		
				
				$entryName = $this->EntryPoint->find('first', array(
						'fields'=>array('EntryPoint.name'),
										'conditions'=>array('EntryPoint.id'=>$staffLogEntryID),
						'recursive'=>-1));
				$entryName = $entryName['EntryPoint']['name'];
				$id = $logsData['CheckinOutLog']['id'];
				$time_in = $logsData['CheckinOutLog']['time_in'];
				$date_in = $logsData['CheckinOutLog']['date_in'];
				$time_out = $logsData['CheckinOutLog']['time_out'];
				$date_out = $logsData['CheckinOutLog']['date_out'];
				$checkin_user = $logsData['CheckinOutLog']['checkin_user'];
		        $checkout_user = $logsData['CheckinOutLog']['checkout_user'];
				
				/***total hours worked for a day****/
				$worked_hours = $time_out - $time_in;
				/***month name**/
				$monthNameIn = date("F", strtotime($date_in)); 
				$monthNameOut = date("F", strtotime($date_out)); 
				
				/***get the the date as figure only**/
				$last2charsIn = substr($date_in, -2);
				$last2charsOut = substr($date_out, -2);
				$first2charsIn = substr($date_in, 0, 2);
				$first2charsOut = substr($date_out, 0, 2);
				
				/*******full date in words*******/
				$date_in = $last2charsIn.'-'.$monthNameIn.'-'."20".$first2charsIn;
				$date_out = $last2charsOut.'-'.$monthNameOut.'-'."20".$first2charsOut;
				
				//$result = substr($myStr, 0, 5);
				
				//debug($date_in);
				//debug($monthNameIn);
				//die();
				
				/*
				$this->loadModel('ForceCheckoutLog');

				$reason=$this->ForceCheckoutLog->find('first',array(
							'conditions'=>array('ecnumber'=>$ecnumber),
							'fields'=>array('forced_reason'),
							'order' => array('ForceCheckoutLog.forced_reason' => 'DESC')));
		
				$chikonzero = $reason['ForceCheckoutLog']['forced_reason'];*/
				
				
		$data[]=array(
					'id'=>$id,
					'entryName'=>$entryName,
					'time_in'=>$time_in,					
					'date_in'=>$date_in,					
					'time_out'=>$time_out,					
					'date_out'=>$date_out,					
					//'chikonzero'=>$chikonzero,					
					'worked_hours'=>$worked_hours,					
					'checkin_user'=>$checkin_user,					
					'checkout_user'=>$checkout_user,					
					);
				
				
			
			
		}//debug($data);die();
		
	//}
		$this->set(compact('data','userinfo','staffLogs','entyPointNm','date_from','date_to','username'));
		$this->layout = 'pdf'; //this will use the pdf.ctp layout
		$this->render();
		
	}


	/*********************/
	
	
	public function user_search(){
		 $entryID = $this->params['pass'];
		//debug($entryID);die();
		if($this->request->is('post')){
		
		$this->loadModel('StaffDetail');
		$this->loadModel('Department');
		$ecnumber = $this->request->data['CheckinOutLog']['search'];
		$userinfo = $this->StaffDetail->find('first',array('conditions'=>array('StaffDetail.ecnumber'=>$ecnumber)));
		/*$checkID = $this->CheckinOutLog->find('first',array(
									 'conditions'=>array('CheckinOutLog.ecnumber'=>$ecnumber)),
									 'fields'=>array('CheckinOutLog.check_in'));*/
						//debug($userinfo);die();			 
		 $checkID=$this->CheckinOutLog->find('first',array(
							'conditions'=>array('ecnumber'=>$ecnumber),
							'fields'=>array('check_in'),
							'order' => array('CheckinOutLog.id' => 'DESC')));
		
		$checkID = $checkID['CheckinOutLog']['check_in'];
		
		$initial = $userinfo['StaffDetail']['firstname'];
		$x = substr($initial, 0, 1);
		/***find dept name**/
		$dptCode = $userinfo['StaffDetail']['department_code'];
		$dptNm = $this->Department->find('first',array(
									'conditions'=>array('Department.code'=>$dptCode)));
		$dptNm = $dptNm['Department']['name'];
		//debug($dptNm);die();
		
		if(empty($userinfo)){
		$this->Session->setFlash(__('Staff Cannot Be Found Due To The Following: Missing or Invalid Ecnumber'));
			$this->redirect(array('controller'=>'CheckinOutLogs','action' => 'user_search'));	
		}
	}
	
		$this->set(compact('dptNm','x','ecnumber','userinfo','checkID','entryID'));
		
	}



	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->loadModel('EntryPoint');
		$staffInfo= $this->CheckinOutLog->find('all');
		/*for($i=0; $i < sizeof($staffInfo); $i++ ){
			
			$entryPointID = $staffInfo[$i]['CheckinOutLog']['entry_point_id'];
			$entryPointName = $this->EntryPoint->find('first', array(
						'fields'=>array('EntryPoint.name'),
										'conditions'=>array('EntryPoint.id'=>$entryPointID),
						'recursive'=>-1));
			$entryPointName = $entryPointName['EntryPoint']['name'];
			
			//debug($entryPointName);
			}
		//die();*/
				
		$this->set(compact('staffInfo','entryPointName'));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->CheckinOutLog->id = $id;
		if (!$this->CheckinOutLog->exists()) {
			throw new NotFoundException(__('Invalid checkin out log'));
		}
		$this->set('checkinOutLog', $this->CheckinOutLog->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$current_user['username'] = $this->Session->read('Auth.User.username');
	    $current_user_ecnumber['ecnumber'] = $this->Session->read('Auth.User.ecnumber');
	    $username = $current_user['username'];
		if ($this->request->is('post')) {
			
			//debug($this->request->data);die();
			
			$entryPointID = $this->request->data['CheckinOutLog']['entry_point_id'];
			$ecnumber = $this->request->data['CheckinOutLog']['ecnumber'];
			$hour = $this->request->data['CheckinOutLog']['time_in']['hour'];
			$min = $this->request->data['CheckinOutLog']['time_in']['min'];
			$hour2 = $this->request->data['CheckinOutLog']['time_out']['hour'];
			$min2 = $this->request->data['CheckinOutLog']['time_out']['min'];
			$date_in = $this->request->data['CheckinOutLog']['date_in'];
			$date_out = $this->request->data['CheckinOutLog']['date_out'];
			
			$time_in = $hour."-".$min;
			$time_out = $hour2."-".$min2;
			
			
			//debug($this->request->data);die();
			
			//$x = "ccentre";
			//debug($time_in);die();
			$this->CheckinOutLog->create();
				$this->CheckinOutLog->SaveAll(array(
										//'id' => $idd,
										'entry_point_id' => $entryPointID,
										'ecnumber' => $ecnumber,
										'time_in' => $time_in,
										'date_in' => $date_in,
										'checkin_user'=>$x,
										'time_out'=>$time_out,
										'date_out'=>$date_out,
										'check_in'=>0,
										'checkout_user'=>0,
										'created'=>0,
										'checkin_ip_address'=>$_SERVER['REMOTE_ADDR']
												   ));
								 $this->CheckinOutLog->save();
			
		debug($this->CheckinOutLog->invalidFields($this->CheckinOutLog->save())); die();
				$this->Session->setFlash(__('The checkin out log has been saved'));
				$this->redirect(array('action' => 'search_staff_logs'));
				
				
		
		}
		$entryPoints = $this->CheckinOutLog->EntryPoint->find('list');
		$this->set(compact('entryPoints'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->CheckinOutLog->id = $id;
		if (!$this->CheckinOutLog->exists()) {
			throw new NotFoundException(__('Invalid checkin out log'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CheckinOutLog->save($this->request->data)) {
				$this->Session->setFlash(__('The checkin out log has been saved'));
				$this->redirect(array('action' => 'search_staff_logs'));
			} else {
				$this->Session->setFlash(__('The checkin out log could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->CheckinOutLog->read(null, $id);
		}
		$entryPoints = $this->CheckinOutLog->EntryPoint->find('list');
		$this->set(compact('entryPoints'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->CheckinOutLog->id = $id;
		if (!$this->CheckinOutLog->exists()) {
			throw new NotFoundException(__('Invalid checkin out log'));
		}
		if ($this->CheckinOutLog->delete()) {
			$this->Session->setFlash(__('Checkin out log deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Checkin out log was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
