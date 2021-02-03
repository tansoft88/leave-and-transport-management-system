<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('Xml', 'Utility');
App::uses('AuthComponent', 'Controller/Component');
App::import('Vendor', '/Classes/PHPExcel/IOFactory'); //import statement for Excel editing classes
App::import('Vendor', '/Classes/PHPExcel/Cell/MyValueBinder'); //import statement for Excel editing classes


/**
 * StaffDetails Controller
 *
 * @property StaffDetail $StaffDetail
 */
class StaffDetailsController extends AppController {
var $components = array("Email","Session",'RequestHandler');
var $helpers = array("Html","Form","Session",'Js');
	
	public function beforeFilter(){
 	parent::beforeFilter();
	  /* $this->Auth->allow('add');
	   $this->Auth->allow('index'); 
	   $this->Auth->allow('edit'); 
	   $this->Auth->allow('delete'); 
	   $this->Auth->allow('user_search'); */
	   $this->Auth->deny();
	   $this->Auth->allow('add_stud');
	   $this->Auth->allow('register_stud');
	   $this->Auth->allow('apply_leave');
	   $this->Auth->allow('admin_leave_index');
	   $this->Auth->allow('user_search');
	   $this->Auth->allow('approve_leave');
	   $this->Auth->allow('disapprove_leave');
	   $this->Auth->allow('update_accruals');
	   $this->Auth->allow('enter_leave');
	   $this->Auth->allow('staff_leave');
	   $this->Auth->allow('staff_leave_excel');
	   $this->Auth->allow('admin_leave_ndex_excel');
	   $this->Auth->allow('index_leave_excel');
	   $this->Auth->allow('department_approve');
	   $this->Auth->allow('department_disapprove_leave');
	   $this->Auth->allow('supervisor_search');
	   $this->Auth->allow('supervisor_view');
	   $this->Auth->allow('update_accruals2');
	   $this->Auth->allow('main_report');
	   $this->Auth->allow('main_report_excel');
	   $this->Auth->allow('supervisor_view_leave');
	   
	}

/**
 * index method
 *
 * @return void
 */
 
 public function supervisor_view_leave() {
	        $this->loadModel('LeaveApplication');	 
			$ecNmLogInUsr = $this->Session->read('Auth.User.ecnumber');
    	// find log in user details i.e department
		$usrData = $this->StaffDetail->find('first',array('conditions'=>array('StaffDetail.ecnumber'=>$ecNmLogInUsr)));
		$dptUsr = $usrData['StaffDetail']['department_code'];		
									
	    $staffEcNm  = $this->StaffDetail->find('list',
							array('conditions'=>array('StaffDetail.department_code'=>$dptUsr),
							      'fields'=>array('StaffDetail.ecnumber')));
							
		$leaveEcNm = $this->LeaveApplication->find('list',
							array('conditions'=>array('LeaveApplication.ec_number'=>$staffEcNm),
								  'fields'=>array('LeaveApplication.ec_number')));
													  
		$staffData  = $this->StaffDetail->find('all',
							array('conditions'=>array('StaffDetail.ecnumber'=>$leaveEcNm)));
		
		$this->set(compact('staffData'));
 }
  
 public function main_report_excel() {
			
			$this->loadModel('LeaveApplication');	 
			$ecNmLogInUsr = $this->Session->read('Auth.User.ecnumber');
		
		// find log in user details i.e department
		$usrData = $this->StaffDetail->find('first',array('conditions'=>array('StaffDetail.ecnumber'=>$ecNmLogInUsr)));
		$dptUsr = $usrData['StaffDetail']['department_code'];
		
		$staffEcNms = $this->StaffDetail->find('list',array('fields'=>'StaffDetail.ecnumber'));
											
											
		// find data for each staff i.e monthly leave stats
		foreach($staffEcNms as $staffEcNm){
			
	    $staffDetails = $this->StaffDetail->find('first',array('conditions'=>array('StaffDetail.ecnumber'=>$staffEcNm)));
		$this->loadModel('MonthlyTakenDay');	
		$janData = $this->MonthlyTakenDay->find('first',
							array('conditions'=>array('MonthlyTakenDay.ec_number'=>$staffEcNm,
							                          'MonthlyTakenDay.month'=>1)));
		$febData = $this->MonthlyTakenDay->find('first',
							array('conditions'=>array('MonthlyTakenDay.ec_number'=>$staffEcNm,
							                          'MonthlyTakenDay.month'=>2)));
		$marchData = $this->MonthlyTakenDay->find('first',
							array('conditions'=>array('MonthlyTakenDay.ec_number'=>$staffEcNm,
							                          'MonthlyTakenDay.month'=>3)));
		
		$aprilData = $this->MonthlyTakenDay->find('first',
							array('conditions'=>array('MonthlyTakenDay.ec_number'=>$staffEcNm,
							                          'MonthlyTakenDay.month'=>4)));
        $mayData = $this->MonthlyTakenDay->find('first',
							array('conditions'=>array('MonthlyTakenDay.ec_number'=>$staffEcNm,
							                          'MonthlyTakenDay.month'=>5)));
        $juneData = $this->MonthlyTakenDay->find('first',
							array('conditions'=>array('MonthlyTakenDay.ec_number'=>$staffEcNm,
							                          'MonthlyTakenDay.month'=>6)));
        $julyData = $this->MonthlyTakenDay->find('first',
							array('conditions'=>array('MonthlyTakenDay.ec_number'=>$staffEcNm,
							                          'MonthlyTakenDay.month'=>7)));
        $augData = $this->MonthlyTakenDay->find('first',
							array('conditions'=>array('MonthlyTakenDay.ec_number'=>$staffEcNm,
							                          'MonthlyTakenDay.month'=>8)));
        $septData = $this->MonthlyTakenDay->find('first',
							array('conditions'=>array('MonthlyTakenDay.ec_number'=>$staffEcNm,
							                          'MonthlyTakenDay.month'=>9)));
        $octData = $this->MonthlyTakenDay->find('first',
							array('conditions'=>array('MonthlyTakenDay.ec_number'=>$staffEcNm,
							                          'MonthlyTakenDay.month'=>10)));
        $novData = $this->MonthlyTakenDay->find('first',
							array('conditions'=>array('MonthlyTakenDay.ec_number'=>$staffEcNm,
							                          'MonthlyTakenDay.month'=>11)));
        $decData = $this->MonthlyTakenDay->find('first',
							array('conditions'=>array('MonthlyTakenDay.ec_number'=>$staffEcNm,
							                          'MonthlyTakenDay.month'=>12)));
        //leave data 
       $data[]=array(
					'janData'=>$janData,
					'febData'=>$febData,					
					'marchData'=>$marchData,					
					'aprilData'=>$aprilData,					
					'mayData'=>$mayData,					
					'juneData'=>$juneData,					
					'julyData'=>$julyData,					
					'augData'=>$augData,					
					'septData'=>$septData,					
					'octData'=>$octData,					
					'novData'=>$novData,					
					'decData'=>$decData,					
					'staffDetails'=>$staffDetails,					
					);		
			//debug($data);
		}
	$this->set(compact('data'));
	$this->render('main_report_excel','export_xls');
			
		}
 
 
 
 public function main_report() {
			
			$this->loadModel('LeaveApplication');	 
			$this->loadModel('LeaveDaysStat');	 
			$ecNmLogInUsr = $this->Session->read('Auth.User.ecnumber');
	//if ($this->request->is('post') || $this->request->is('put')) {
		
		// find log in user details i.e department
		$usrData = $this->StaffDetail->find('first',array('conditions'=>array('StaffDetail.ecnumber'=>$ecNmLogInUsr)));
		$dptUsr = $usrData['StaffDetail']['department_code'];
		//debug($usrData);die();
		//$ecnumber = $this->request->data['StaffDetail']['search'];
		// find staff in department
		$staffEcNms = $this->StaffDetail->find('list',array('fields'=>'StaffDetail.ecnumber'));
											
											//debug($staffEcNms);die();
		// find data for each staff i.e monthly leave stats
		foreach($staffEcNms as $staffEcNm){
			
	    $staffDetails = $this->StaffDetail->find('first',array('conditions'=>array('StaffDetail.ecnumber'=>$staffEcNm)));
		$this->loadModel('MonthlyTakenDay');	
		$janData = $this->MonthlyTakenDay->find('first',
							array('conditions'=>array('MonthlyTakenDay.ec_number'=>$staffEcNm,
							                          'MonthlyTakenDay.month'=>1)));
		$febData = $this->MonthlyTakenDay->find('first',
							array('conditions'=>array('MonthlyTakenDay.ec_number'=>$staffEcNm,
							                          'MonthlyTakenDay.month'=>2)));
		$marchData = $this->MonthlyTakenDay->find('first',
							array('conditions'=>array('MonthlyTakenDay.ec_number'=>$staffEcNm,
							                          'MonthlyTakenDay.month'=>3)));
		
		$aprilData = $this->MonthlyTakenDay->find('first',
							array('conditions'=>array('MonthlyTakenDay.ec_number'=>$staffEcNm,
							                          'MonthlyTakenDay.month'=>4)));
        $mayData = $this->MonthlyTakenDay->find('first',
							array('conditions'=>array('MonthlyTakenDay.ec_number'=>$staffEcNm,
							                          'MonthlyTakenDay.month'=>5)));
        $juneData = $this->MonthlyTakenDay->find('first',
							array('conditions'=>array('MonthlyTakenDay.ec_number'=>$staffEcNm,
							                          'MonthlyTakenDay.month'=>6)));
        $julyData = $this->MonthlyTakenDay->find('first',
							array('conditions'=>array('MonthlyTakenDay.ec_number'=>$staffEcNm,
							                          'MonthlyTakenDay.month'=>7)));
        $augData = $this->MonthlyTakenDay->find('first',
							array('conditions'=>array('MonthlyTakenDay.ec_number'=>$staffEcNm,
							                          'MonthlyTakenDay.month'=>8)));
        $septData = $this->MonthlyTakenDay->find('first',
							array('conditions'=>array('MonthlyTakenDay.ec_number'=>$staffEcNm,
							                          'MonthlyTakenDay.month'=>9)));
				if(empty($septData)){
				$septDat = $this->LeaveDaysStat->find('first',
							array('conditions'=>array('LeaveDaysStat.ec_number'=>$staffEcNm)),
							array('fields'=>array('LeaveDaysStat.days_left')));	
				$septDat = $septDat['LeaveDaysStat']['days_left'];
							//debug();
					
				}
        $octData = $this->MonthlyTakenDay->find('first',
							array('conditions'=>array('MonthlyTakenDay.ec_number'=>$staffEcNm,
							                          'MonthlyTakenDay.month'=>10)));
        $novData = $this->MonthlyTakenDay->find('first',
							array('conditions'=>array('MonthlyTakenDay.ec_number'=>$staffEcNm,
							                          'MonthlyTakenDay.month'=>11)));
        $decData = $this->MonthlyTakenDay->find('first',
							array('conditions'=>array('MonthlyTakenDay.ec_number'=>$staffEcNm,
							                          'MonthlyTakenDay.month'=>12)));
        //leave data
       $data[]=array(
					'janData'=>$janData,
					'febData'=>$febData,					
					'marchData'=>$marchData,					
					'aprilData'=>$aprilData,					
					'mayData'=>$mayData,					
					'juneData'=>$juneData,					
					'julyData'=>$julyData,					
					'augData'=>$augData,					
					'septData'=>$septData,					
					'octData'=>$octData,					
					'novData'=>$novData,					
					'decData'=>$decData,					
					'staffDetails'=>$staffDetails,					
					);		
			//debug($data);
			//debug($septDat);
		}
	//die();
		/*if(empty($staffData)){
			$this->Session->setFlash(__('No staff in your department applied for leave or search staff with ecnumber'));
			$this->redirect(array('controller'=> 'staff_details', 'action' => 'supervisor_search'));
			
		}
		*/
		//leave applications data
		/*$approved = $this->LeaveApplication->find('list',
							array('conditions'=>array('LeaveApplication.ec_number'=>$ecNm,
													  'LeaveApplication.approved'=>1)));*/
		
	//}
			$this->set(compact('data','septDat'));
			
		}
 
 
 
 
 public function staff_leave() {
	 $this->loadModel('LeaveApplication');	 
	 $logInUsr = $this->Session->read('Auth.User.ecnumber');
	if ($this->request->is('post') || $this->request->is('put')) {
		//debug($this->request->data);die();
		     $ecnumber = $this->request->data['StaffDetail']['search'];
			 $this->loadModel('LeaveApplication');
			 $this->loadModel('ApprovedLeaveApplication');
			 //all approved applications
			 $approvedLeaveData = $this->ApprovedLeaveApplication->find('all',array('conditions'=>array('ApprovedLeaveApplication.ec_number'=>$ecnumber)));
			 $this->loadModel('LeaveDaysStat');
			 $leaveData = $this->LeaveApplication->find('all',array('conditions'=>array('LeaveApplication.ec_number'=>$ecnumber)));
			 
			 
			 $leaveAcrualsStats = $this->LeaveDaysStat->find('first',
									array('conditions'=>array('LeaveDaysStat.ec_number'=>$ecnumber)));
									//debug($leaveAcrualsStats);die();
			 $accruals_days = $leaveAcrualsStats['LeaveDaysStat']['accruals_days'];
			 $days_left = $leaveAcrualsStats['LeaveDaysStat']['days_left'];
			 $days_taken = $leaveAcrualsStats['LeaveDaysStat']['days_taken'];
			 $staffData = $this->StaffDetail->find('first',array('conditions'=>array('StaffDetail.id_number'=>$ecnumber)));
		/*if(empty($leaveData and $approvedLeaveData)){
			$this->Session->setFlash(__('Invalid Ecnumber or No Leave Applications for the given Ecnumber'));
			$this->redirect(array('controller'=> 'staff_details', 'action' => 'staff_leave'));	
			
		}*/
			//debug($staffData);die();
			 $this->set(compact('approvedLeaveData','leaveData','ecnumber','staffData','accruals_days','days_left','days_taken','leaveAcrualsStats'));
	    }
	}
	
	//excel report staff leave 
	public function staff_leave_excel() {
		 
	 $logInUsr = $this->Session->read('Auth.User.ecnumber');
	if ($this->request->is('post') || $this->request->is('put')) {
		//debug($this->request->data);die();
		$date = date('d-m-y');
		     $ecnumber = $this->request->data['StaffDetails']['ecnumber'];
			 	 $this->loadModel('ApprovedLeaveApplication');
			 //all approved applications
			 $approvedLeaveData = $this->ApprovedLeaveApplication->find('all',array('conditions'=>array('ApprovedLeaveApplication.ec_number'=>$ecnumber)));
			 $this->loadModel('LeaveApplication');
			 $this->loadModel('LeaveDaysStat');
			 $leaveData = $this->LeaveApplication->find('all',array('conditions'=>array('LeaveApplication.ec_number'=>$ecnumber)));
			 
			 $leaveAcrualsStats = $this->LeaveDaysStat->find('first',
									array('conditions'=>array('LeaveDaysStat.ec_number'=>$ecnumber)));
									//debug($leaveAcrualsStats);die();
			 $accruals_days = $leaveAcrualsStats['LeaveDaysStat']['accruals_days'];
			 $days_left = $leaveAcrualsStats['LeaveDaysStat']['days_left'];
			 $days_taken = $leaveAcrualsStats['LeaveDaysStat']['days_taken'];
			 $staffData = $this->StaffDetail->find('first',array('conditions'=>array('StaffDetail.id_number'=>$ecnumber)));
			//debug($staffData);die();
			 $this->set(compact('approvedLeaveData','date','leaveData','ecnumber','staffData','accruals_days','days_left','days_taken','leaveAcrualsStats'));
			  $this->render('staff_leave_excel','export_xls');
	    }
	}
 
 
 
 
  public function update_accruals2($id = null) {
		$username=$this->Session->read('Auth.User.username');
		$date_approved = date('y-m-d');
		$time_out = date('H:i:s');
		$ip_add = $_SERVER['REMOTE_ADDR'];
		//$ecnumber = $this->Session->read('Auth.User.ecnumber');
		if ($this->request->is('post') || $this->request->is('put')) {
			
		
			$this->loadModel('LeaveApplication');
			$this->loadModel('LeaveDaysStat');
			
			//staff ec numbers			
			$staffDatas = $this->StaffDetail->find('list',array('fields'=>array('StaffDetail.ecnumber')));
			
			//debug($staffDatas);die();
			foreach($staffDatas as $ecNm){
				
				//get month as number
				$thisMonth = date("n");
				
				//find previous month
				$prvMonth = $thisMonth - 1;
				
				$leaveAcrualsStats = $this->LeaveDaysStat->find('first',
									array('conditions'=>array('LeaveDaysStat.ec_number'=>$ecNm,
															  'LeaveDaysStat.acrual_month'=>$prvMonth)));
					//balance days from previous month
				$prvBalance = $leaveAcrualsStats['LeaveDaysStat']['month_balance'];
				    //monthly accruals days
					$monthAcruals = 2.5;
					//days taken in current month
					
				
				debug($prvBalance);											  
				debug($leaveAcrualsStats);											  
				//debug($leaveAcrualsStats);											  
				/*$acrual_month = $leaveAcrualsStats['LeaveDaysStat']['acrual_month'];
				//debug($acrual_month);die();
				if($leaveAcrualsStats == false){
					//insert in table LeaveDaysStat
					$this->LeaveDaysStat->create();
						$this->LeaveDaysStat->set(array(
									'ec_number' => $ecNm,
									'accruals_days' =>2,
									'days_left' => 2,
									'days_taken'=> 0,
									'acrual_month'=> $thisMonth
												));
						 $this->LeaveDaysStat->save();
				}else{
					
					if($acrual_month != $thisMonth){
					
					//1. find days accruals ($ad) in (leave_days_stats) per staff							
						$ad = $leaveAcrualsStats['LeaveDaysStat']['accruals_days'];	
						$dL = $leaveAcrualsStats['LeaveDaysStat']['days_left'];	
						//increase days evry month by 2 days i.e accruaing leave days
						$adMonthly = $ad + 2;
						$dLMonthly = $dL +2;
						//update LeaveDaysStat				
						$this->LeaveDaysStat->updateAll(
						array('LeaveDaysStat.accruals_days'=>"'$adMonthly'",
							  'LeaveDaysStat.days_left'=>"'$dLMonthly'",
							  'LeaveDaysStat.acrual_month'=>"'$thisMonth'"
							  ),
						array('LeaveDaysStat.ec_number'=>$ecNm)
						);
				   }
				}*/
			}die();
				$this->Session->setFlash('The update run successfully','default',array('class' => 'success'));
				$this->redirect(array('controller'=> 'users', 'action' => 'home_reports'));
		}
			
	}
 
 public function update_accruals($id = null) {
		$username=$this->Session->read('Auth.User.username');
		$date_approved = date('y-m-d');
		$time_out = date('H:i:s');
		$ip_add = $_SERVER['REMOTE_ADDR'];
		//$ecnumber = $this->Session->read('Auth.User.ecnumber');
		if ($this->request->is('post') || $this->request->is('put')) {
			
		
			$this->loadModel('LeaveApplication');
			$this->loadModel('LeaveDaysStat');
			
			//staff ec numbers			
			$staffDatas = $this->StaffDetail->find('list',array('fields'=>array('StaffDetail.ecnumber')));
			
			//debug($staffDatas);die();
			foreach($staffDatas as $ecNm){
				
				$thisMonth = date('m');
				$leaveAcrualsStats = $this->LeaveDaysStat->find('first',
									array('conditions'=>array('LeaveDaysStat.ec_number'=>$ecNm)));
				$acrual_month = $leaveAcrualsStats['LeaveDaysStat']['acrual_month'];
				//debug($acrual_month);die();
				if($leaveAcrualsStats == false){
					//insert in table LeaveDaysStat
					$this->LeaveDaysStat->create();
						$this->LeaveDaysStat->set(array(
									'ec_number' => $ecNm,
									'accruals_days' => 2.5,
									'days_left' => 2.5,
									'days_taken'=> 0,
									'acrual_month'=> $thisMonth
												));
						 $this->LeaveDaysStat->save();
				}else{
					
					if($acrual_month != $thisMonth){
					
					//1. find days accruals ($ad) in (leave_days_stats) per staff							
						$ad = $leaveAcrualsStats['LeaveDaysStat']['accruals_days'];	
						$dL = $leaveAcrualsStats['LeaveDaysStat']['days_left'];	
						//increase days evry month by 2.5 days i.e accruaing leave days
						$adMonthly = $ad + 2.5;
						$dLMonthly = $dL +2.5;
						//update LeaveDaysStat				
						$this->LeaveDaysStat->updateAll(
						array('LeaveDaysStat.accruals_days'=>"'$adMonthly'",
							  'LeaveDaysStat.days_left'=>"'$dLMonthly'",
							  'LeaveDaysStat.acrual_month'=>"'$thisMonth'"
							  ),
						array('LeaveDaysStat.ec_number'=>$ecNm)
						);
						//update monthly_taken_days
						/*$month = date('n');
						$this->loadModel('MonthlyTakenDay');
						$this->MonthlyTakenDay->updateAll(
						array('MonthlyTakenDay.balance_days'=>"'$dLMonthly'"							  
							  ),
						array('MonthlyTakenDay.ec_number'=>$ecNm,
							  'MonthlyTakenDay.month'=>$month)
						);*/
						
				   }
				}
			}
				$this->Session->setFlash('The update run successfully','default',array('class' => 'success'));
				$this->redirect(array('controller'=> 'users', 'action' => 'home_reports'));
		}
			
	}
 
 
 public function supervisor_search() {
	 $this->loadModel('LeaveApplication');	 
	 $ecNmLogInUsr = $this->Session->read('Auth.User.ecnumber');
	if ($this->request->is('post') || $this->request->is('put')) {
		
		// find log in user details i.e department
		$usrData = $this->StaffDetail->find('first',array('conditions'=>array('StaffDetail.ecnumber'=>$ecNmLogInUsr)));
		$dptUsr = $usrData['StaffDetail']['department_code'];
		//debug($usrData);die();
		$ecnumber = $this->request->data['StaffDetail']['search'];
		// find staff in department
		$staffData = $this->StaffDetail->find('first',array('conditions'=>array(
											'StaffDetail.id_number'=>$ecnumber,
											'StaffDetail.department_code'=>$dptUsr )));
		if(empty($staffData)){
			$this->Session->setFlash(__('Invalid Ecnumber Or Staff is not in your department'));
			$this->redirect(array('controller'=> 'staff_details', 'action' => 'supervisor_search'));
			
		}
			 $this->loadModel('LeaveApplication');
			 $this->loadModel('LeaveDaysStat');
			 $leaveData = $this->LeaveApplication->find('all',array('conditions'=>array('LeaveApplication.ec_number'=>$ecnumber)));
			 
			 $leaveAcrualsStats = $this->LeaveDaysStat->find('first',
									array('conditions'=>array('LeaveDaysStat.ec_number'=>$ecnumber)));
									//debug($leaveAcrualsStats);die();
			 $accruals_days = $leaveAcrualsStats['LeaveDaysStat']['accruals_days'];
			 $days_left = $leaveAcrualsStats['LeaveDaysStat']['days_left'];
			 $days_taken = $leaveAcrualsStats['LeaveDaysStat']['days_taken'];
			 
			 
			 
			 
		if(empty($leaveData)){
			$this->Session->setFlash(__('Invalid Ecnumber or No Leave Applications for the given Ecnumber'));
			$this->redirect(array('controller'=> 'staff_details', 'action' => 'user_search'));	
			
		}
			//debug($staffData);die();
			 $this->set(compact('leaveData','ecnumber','staffData','leaveAcrualsStats'));
	    }
	}
 
 
 // hr approve staff leave application
	public function user_search() {
	 $this->loadModel('LeaveApplication');	 
	 $ecnumber = $this->Session->read('Auth.User.ecnumber');
	if ($this->request->is('post') || $this->request->is('put')) {
		//debug($this->request->data);die();
		$ecnumber = $this->request->data['StaffDetail']['search'];
			 $this->loadModel('LeaveApplication');
			 $this->loadModel('LeaveDaysStat');
			 $leaveData = $this->LeaveApplication->find('all',array('conditions'=>array('LeaveApplication.ec_number'=>$ecnumber)));
			 
			 $leaveAcrualsStats = $this->LeaveDaysStat->find('first',
									array('conditions'=>array('LeaveDaysStat.ec_number'=>$ecnumber)));
									//debug($leaveAcrualsStats);die();
			 $accruals_days = $leaveAcrualsStats['LeaveDaysStat']['accruals_days'];
			 $days_left = $leaveAcrualsStats['LeaveDaysStat']['days_left'];
			 $days_taken = $leaveAcrualsStats['LeaveDaysStat']['days_taken'];
			 
			 $staffData = $this->StaffDetail->find('first',array('conditions'=>array('StaffDetail.id_number'=>$ecnumber)));
		if(empty($leaveData)){
			$this->Session->setFlash(__('Invalid Ecnumber or No Leave Applications for the given Ecnumber'));
			$this->redirect(array('controller'=> 'staff_details', 'action' => 'user_search'));	
			
		}
			//debug($staffData);die();
			 $this->set(compact('leaveData','ecnumber','staffData','leaveAcrualsStats'));
	    }
	}
	
		
		//department disapprove leave
		
		
		
	public function department_disapprove_leave($ecNm, $id) {
		$username=$this->Session->read('Auth.User.username');
		$date_approved = date('y-m-d');
		$time_out = date('H:i:s');
		$ip_add = $_SERVER['REMOTE_ADDR'];
		$ecnumber = $this->Session->read('Auth.User.ecnumber');
		//$ecNm = $id;
		
			$this->loadModel('LeaveApplication');
			$this->LeaveApplication->updateAll(
				array('LeaveApplication.approved' =>2,
					  'LeaveApplication.approved_by'=>"'$username'",
					  'LeaveApplication.date_approved'=>"'$date_approved'",
					  'LeaveApplication.approve_ip_address'=>"'$ip_add'"
					  
					  ),
				array('LeaveApplication.ec_number'=>$ecNm,'LeaveApplication.id'=>$id)
				);
				
				$this->Session->setFlash('The leave application has been disapproved successfully','default',array('class' => 'success'));
				$this->redirect(array('controller'=> 'staff_details', 'action' => 'supervisor_search'));
		}
		
		//supervisor view leave applications
		
		public function supervisor_view() {
			
			$this->loadModel('LeaveApplication');	 
			$ecNmLogInUsr = $this->Session->read('Auth.User.ecnumber');
	//if ($this->request->is('post') || $this->request->is('put')) {
		
		// find log in user details i.e department
		$usrData = $this->StaffDetail->find('first',array('conditions'=>array('StaffDetail.ecnumber'=>$ecNmLogInUsr)));
		$dptUsr = $usrData['StaffDetail']['department_code'];
		//debug($usrData);die();
		//$ecnumber = $this->request->data['StaffDetail']['search'];
		// find staff in department
		$staffData = $this->StaffDetail->find('all',array('conditions'=>array(
											//'StaffDetail.id_number'=>$ecnumber,
											'StaffDetail.department_code'=>$dptUsr ),
											array('fields'=>'StaffDetail.ecnumber')));
											
											//debug($staffData);die();
	
		if(empty($staffData)){
			$this->Session->setFlash(__('No staff in your department applied for leave or search staff with ecnumber'));
			$this->redirect(array('controller'=> 'staff_details', 'action' => 'supervisor_search'));
			
		}
		
		//leave applications data
		/*$approved = $this->LeaveApplication->find('list',
							array('conditions'=>array('LeaveApplication.ec_number'=>$ecNm,
													  'LeaveApplication.approved'=>1)));*/
		
	//}
			$this->set(compact('staffData'));
			
		}
		// Department Approve Leave
		
		public function department_approve($ecNm, $id) {
			
		$username=$this->Session->read('Auth.User.username');
		$date_approved = date('y-m-d');
		$time_out = date('H:i:s');
		$ip_add = $_SERVER['REMOTE_ADDR'];
		//find days left and validate with days applied
		$this->loadModel('LeaveDaysStat');
		$leaveAcrualsStats = $this->LeaveDaysStat->find('first',
							array('conditions'=>array('LeaveDaysStat.ec_number'=>$ecNm)));
		$daysLeft = $leaveAcrualsStats['LeaveDaysStat']['days_left'];
		
		$this->loadModel('LeaveApplication');
		$approved = $this->LeaveApplication->find('list',
							array('conditions'=>array('LeaveApplication.ec_number'=>$ecNm,
													  'LeaveApplication.approved'=>0)));
													  
		//find days applied
		$daysApld = $this->LeaveApplication->find('all',
							array('conditions'=>array('LeaveApplication.ec_number'=>$ecNm,
													  'LeaveApplication.id'=>$id,
													  'LeaveApplication.approved'=>0)));
													  //debug($daysApld);die();
		$daysApld = $daysApld[0]['LeaveApplication']['days_applied'];
													 // debug($daysApld);die();
													 
		if($daysApld > $daysLeft){
			$this->Session->setFlash(__('Staff Has fewer days left than days applied hence it cannot be approved'));
			$this->redirect(array('controller'=> 'staff_details', 'action' => 'supervisor_search'));
		}
		if(!empty($approved)){		
		$t = array('0','2');
			$this->LeaveApplication->updateAll(
				array('LeaveApplication.approved' =>1,
					  'LeaveApplication.approved_by'=>"'$username'",
					  'LeaveApplication.date_approved'=>"'$date_approved'",
					  'LeaveApplication.approve_ip_address'=>"'$ip_add'"					  
					  ),
				array('LeaveApplication.ec_number'=>$ecNm,
					  'LeaveApplication.approved'=>$t,
					  'LeaveApplication.id'=>$id,)
				);
				
	$this->Session->setFlash('The leave application has been approved successfully','default',array('class' => 'success'));
	$this->redirect(array('controller'=> 'staff_details', 'action' => 'supervisor_search'));
		  }
		}
		
		//HR Approve leave application
	public function approve_leave($ecNm, $id) {
		$username=$this->Session->read('Auth.User.username');
		$date_approved = date('y-m-d');
		$time_out = date('H:i:s');
		$ip_add = $_SERVER['REMOTE_ADDR'];
		//find days left and validate with days applied
		$this->loadModel('LeaveDaysStat');
		$leaveAcrualsStats = $this->LeaveDaysStat->find('first',
							array('conditions'=>array('LeaveDaysStat.ec_number'=>$ecNm)));
		$daysLeft = $leaveAcrualsStats['LeaveDaysStat']['days_left'];
		
		$this->loadModel('LeaveApplication');
		$approved = $this->LeaveApplication->find('list',
							array('conditions'=>array('LeaveApplication.ec_number'=>$ecNm,
													  'LeaveApplication.approved'=>1)));
													  
		//find days applied
		$daysApld = $this->LeaveApplication->find('all',
							array('conditions'=>array('LeaveApplication.ec_number'=>$ecNm,
													  'LeaveApplication.approved'=>1,'LeaveApplication.id'=>$id)));
		$daysApld = $daysApld[0]['LeaveApplication']['days_applied'];
							 //debug($daysApld);die();
													 
													 
													 
		if($daysApld > $daysLeft){
			$this->Session->setFlash(__('Staff Has fewer days left than days applied hence it cannot be approved'));
			$this->redirect(array('controller'=> 'staff_details', 'action' => 'user_search'));
		}
		if(!empty($approved)){		
		//debug($id);die();
			$this->LeaveApplication->updateAll(
				array('LeaveApplication.approved' =>3,
					  'LeaveApplication.approved_by'=>"'$username'",
					  'LeaveApplication.date_approved'=>"'$date_approved'",
					  'LeaveApplication.approve_ip_address'=>"'$ip_add'"					  
					  ),
				array('LeaveApplication.ec_number'=>$ecNm,
					  'LeaveApplication.id'=>$id,
					  'LeaveApplication.approved'=>1)
				    );
																  
				// deduct days if and only if the leave has been approved with HR
				
				/************************
				1. find days accruals ($ad) in (leave_days_stats) per staff
				2. find days taken ($dt) i.e those approved by HR(approved = 3) in (leave_applications) per staff
				3. update days left(balance) ($dL) i.e $ad - $dt and update in leave_days_stats  i.e accruals_days($ad)
				4. acrruals days ($ad) in (accruals_days) = leave days due ($Ldd)
				5. adds 2.5 days for each staff in leave_days_stats for each run, NB one run per month for each staff
				
				******************************************************/
				//1. find days accruals ($ad) in (leave_days_stats) per staff
								
				$leaveAcrualsStats = $this->LeaveDaysStat->find('first',
							array('conditions'=>array('LeaveDaysStat.ec_number'=>$ecNm)));
				$ad = $leaveAcrualsStats['LeaveDaysStat']['days_left'];	
				// all days taken
				$dd = $leaveAcrualsStats['LeaveDaysStat']['days_taken'];
				$accrual_days = $leaveAcrualsStats['LeaveDaysStat']['accruals_days'];
				
				//2. find days taken ($dt) i.e those approved by HR(approved = 3) in (leave_applications) per staff
				//find leave applications for each staff in leave-application
				$leaveStats = $this->LeaveApplication->find('first',
							array('conditions'=>array('LeaveApplication.ec_number'=>$ecNm,
													  'LeaveApplication.approved'=>3)));
							//array('group'=> 'ec_number'));
				$dt = $leaveStats['LeaveApplication']['days_applied'];
				//3. update days left(balance) ($dL) i.e $da - $dt and update in leave_days_stats  
				$dL = $ad - $dt;
				
				// update LeaveDaysStat table with current days taken $dt  + all days taken $dd = total days taken $tdt
				$tdt = $dt + $dd;
				$this->LeaveDaysStat->updateAll(
				array('LeaveDaysStat.days_left'=>"'$dL'",
					  //'LeaveDaysStat.accruals_days'=>"'$dL'",
					  'LeaveDaysStat.days_taken'=>"'$tdt'"
					  ),
				array('LeaveDaysStat.ec_number'=>$ecNm)
				);
				//update LeaveApplication table
				/*$this->LeaveApplication->updateAll(
				array('LeaveApplication.days_accruals'=>"'$accrual_days'"),
				array('LeaveApplication.ec_number'=>$ecNm,
					  'LeaveApplication.approved'=>3,
					  'LeaveApplication.id'=>$id)
				);*/
				
				
				
				
				//insert approved applications in approved_leave_applications table
				
				//========================save to Approved Leave Application Table=======================//
				$this->loadModel('ApprovedLeaveApplication');
				$approvedData = $this->LeaveApplication->find('first',
							array('conditions'=>array('LeaveApplication.ec_number'=>$ecNm,
													  'LeaveApplication.id'=>$id,
													  'LeaveApplication.approved'=>3)));
													  //debug($approvedData);die();
													  
				//$appDate = $approvedData['LeaveApplication']['application_date'];
				$ecnumber = $approvedData['LeaveApplication']['ec_number'];
				$daysApplied = $approvedData['LeaveApplication']['days_applied'];
				$leave_address = $approvedData['LeaveApplication']['leave_address'];
				$type_leave = $approvedData['LeaveApplication']['type_leave'];
				$attach_cert = $approvedData['LeaveApplication']['attach_cert'];
				$salary_paid = $approvedData['LeaveApplication']['salary_paid'];
				$dL = $approvedData['LeaveApplication']['days_left'];
				//$accrual_days = $approvedData['LeaveApplication']['days_accruals'];
				$application_date = $approvedData['LeaveApplication']['application_date'];
				$startZuva = $approvedData['LeaveApplication']['leave_start_date'];
				$endZuva = $approvedData['LeaveApplication']['leave_end_date'];
				$aprv = $approvedData['LeaveApplication']['approved'];
				//debug($approvedData);die();
				$approved_by = $approvedData['LeaveApplication']['approved_by'];
				$date_approved = $approvedData['LeaveApplication']['date_approved'];
				$approve_ip_address = $approvedData['LeaveApplication']['approve_ip_address'];
													  //debug($approvedData);die();
					    $this->ApprovedLeaveApplication->create();
						$this->ApprovedLeaveApplication->set(array(
									'application_date' => $application_date,
									'ec_number' => $ecNm,
									'days_applied' => $daysApplied,
									'leave_address' => $leave_address,
									'type_leave' => $type_leave,
									'attach_cert' => $attach_cert,
									'salary_paid' => $salary_paid,
									'days_left' => $dL,
									//'days_accruals' => $accrual_days,
									'leave_start_date'=> $startZuva,
									'approved_by'=> $approved_by,
									'date_approved'=> $date_approved,
									'approve_ip_address'=> $approve_ip_address,
									'leave_end_date'=> $endZuva,
									'approved'=>$aprv,
												));
						 $this->ApprovedLeaveApplication->save();
						 
						 
						 //insert in monthly_taken_days table
				//get month as number
				$thisMonth = date("n");
				$this->loadModel('MonthlyTakenDay');
				$monthDaysTaken = $this->MonthlyTakenDay->find('first',
							array('conditions'=>array('MonthlyTakenDay.ec_number'=>$ecNm,
													  'MonthlyTakenDay.month'=>$thisMonth)));
				if($monthDaysTaken == false){	

                $dddd = $this->LeaveDaysStat->find('first',
							array('conditions'=>array('LeaveDaysStat.ec_number'=>$ecNm)));
		        $ddL = $dddd['LeaveDaysStat']['days_left'];				
						$this->MonthlyTakenDay->create();
						$this->MonthlyTakenDay->set(array(
									'ec_number' => $ecNm,
									'days_taken' => $daysApplied,
									'balance_days' => $ddL,
									'month' => $thisMonth,
									));
						 $this->MonthlyTakenDay->save();
					
				}else{
					//find days applied for the current month so far and add with days applied
					$myDaysThisMnth = $monthDaysTaken['MonthlyTakenDay']['days_taken'];
					$balance_days = $monthDaysTaken['MonthlyTakenDay']['balance_days'];
					$totalDays = $myDaysThisMnth + $daysApplied;
					$totalBalanceDays = $balance_days - $daysApplied;
					//update table
				$this->MonthlyTakenDay->updateAll(
				array('MonthlyTakenDay.days_taken'=>"'$totalDays'",
					  'MonthlyTakenDay.balance_days'=>"'$totalBalanceDays'"),
				array('MonthlyTakenDay.ec_number'=>$ecNm,
					  'MonthlyTakenDay.month'=>$thisMonth)
				);
					
				}
						 
						 //delete entry in leave application when approved is successfully
			 $this->LeaveApplication->deleteAll(array('LeaveApplication.ec_number'=>$ecnumber,		
														 'LeaveApplication.id'=>$id,
														 'LeaveApplication.approved'=>3));
				
				
				$this->Session->setFlash('The leave application has been approved successfully','default',array('class' => 'success'));
				$this->redirect(array('controller'=> 'staff_details', 'action' => 'user_search'));	
					
				}else{
					$this->Session->setFlash(__('The leave application has not been approved, because either supervisor did not approve it yet, or you have already approved it'));
					$this->redirect(array('controller'=> 'staff_details', 'action' => 'user_search'));
				}
				
			
			
		}
		
		public function disapprove_leave($ecNm, $id) {
		$username=$this->Session->read('Auth.User.username');
		$date_approved = date('y-m-d');
		$time_out = date('H:i:s');
		$ip_add = $_SERVER['REMOTE_ADDR'];
		$ecnumber = $this->Session->read('Auth.User.ecnumber');
		//$ecNm = $id;
		
			$this->loadModel('LeaveApplication');
			$this->LeaveApplication->updateAll(
				array('LeaveApplication.approved' =>4,
					  'LeaveApplication.approved_by'=>"'$username'",
					  'LeaveApplication.date_approved'=>"'$date_approved'",
					  'LeaveApplication.approve_ip_address'=>"'$ip_add'"
					  
					  ),
				array('LeaveApplication.ec_number'=>$ecNm,'LeaveApplication.id'=>$id)
				);
				
				$this->Session->setFlash('The leave application has been disapproved successfully','default',array('class' => 'success'));
				$this->redirect(array('controller'=> 'staff_details', 'action' => 'user_search'));
		}

	public function book(){
	 
	$ecnumber = $this->Session->read('Auth.User.ecnumber');
	if ($this->request->is('post') || $this->request->is('put')) {
		
		$pickVenue = $this->request->data['StaffDetail']['pick_venue'];
		$route = $this->request->data['StaffDetail']['route'];
		//debug($pickVenue);die();
		$pickTym = $this->request->data['StaffDetail']['pick_time'];
		$staffData = $this->StaffDetail->find('first',array(
													'conditions'=>array('StaffDetail.ecnumber'=>$ecnumber)));
													//debug($this->request->data);die();
		$kaday = $this->request->data['StaffDetail']['pick_date']['day'];
		$kamonth = $this->request->data['StaffDetail']['pick_date']['month'];
		$gore = $this->request->data['StaffDetail']['pick_date']['year'];
		$kayear = substr($gore, -2);
		
		$bookingDate  = $kaday."-".$kamonth."-".$kayear;
		//debug($pickTym);die();
		
					/*$kaMnthTo= $this->request->data['StaffDetail']['to_date']['month'];
					$kaDayTo = $this->request->data['StaffDetail']['to_date']['day'];
					//$yrFrm = substr($kaYrFrm, -2);
					$to_date = $kaDayTo."-".$kaMnthTo."-".$kaYrTo;*/

					//valid not to book a day before 
					$nhasi = date('d-m-y');
				if($bookingDate < $nhasi){
					$this->Session->setFlash(__('You cant book a day before today. Choose today or day after today'));
					$this->redirect(array('controller'=> 'staff_details', 'action' => 'book'));	
				}
					 $this->loadModel('Booking');
					 $checkBooking = $this->Booking->find('list',array(
													'conditions'=>array('Booking.ec_number'=>$ecnumber,
																		//'Booking.pick_time'=>$pickTym,
																		'Booking.pick_date'=>$bookingDate),
													'fields'=>array('id')));			
					if(empty($pickTym)){						
						$this->Session->setFlash(__('Please select picking time'));
						$this->redirect(array('controller'=> 'staff_details', 'action' => 'book'));	
						
					}
					if(empty($pickVenue)){						
						$this->Session->setFlash(__('Please select picking venue'));
						$this->redirect(array('controller'=> 'staff_details', 'action' => 'book'));	
					}
					
					
					if(!empty($checkBooking)){
						$this->Session->setFlash(__('You already book for the date'));
						$this->redirect(array('controller'=> 'users', 'action' => 'index_reports'));
						
					}
		
					if(empty($checkBooking)){
		//========================save to Booking Table=======================//
					$this->Booking->create();
						$this->Booking->set(array(
									'ec_number' => $ecnumber,
									'pick_time' => $pickTym,
									'route' => $route,
									'pick_date'=> $bookingDate,
									'pick_venue'=>$pickVenue
												));
						     $this->Booking->save();
							 
				
				$this->Session->setFlash('The booking has been saved successfully','default',array('class' => 'success'));
				$this->redirect(array('controller'=> 'users', 'action' => 'login'));
		}
			
	    }
		     $this->loadModel('Route');
		    $routes=$this->Route->find('list',array('fields'=>array('description','name')));
			$this->set(compact('dpmnt_code','studData','dptmnts','dptmntNm','routes'));
	}
 
		// individual booking report
	public function index_books() {
			 $ecnumber = $this->Session->read('Auth.User.ecnumber');
			 $this->loadModel('Booking');
			 $studData = $this->Booking->find('all',array('conditions'=>array('Booking.ec_number'=>$ecnumber)));
			//debug($studData);die();
			 $this->set(compact('studData','ecnumber'));
			   }
			   
	
	
	
	
	public function admin_leave_ndex_excel() {
			 $ecnumber = $this->Session->read('Auth.User.ecnumber');
			 $date = date('d-m-y');
			 $this->loadModel('LeaveApplication');
			 $this->loadModel('LeaveDaysStat');
			 $leaveData = $this->LeaveApplication->find('all');
			 $leaveStats = $this->LeaveDaysStat->find('list',array('fields'=>'ec_number'));
			 foreach($leaveStats as $ecNm){
				 //leave days stats
				$daysInfo = $this->LeaveDaysStat->find('first',array('conditions'=>array('LeaveDaysStat.ec_number'=>$ecNm))); 
				
				//staff info
				$staffData = $this->StaffDetail->find('first',array('conditions'=>array('StaffDetail.ecnumber'=>$ecNm)));
				 
				 
				 $data[]=array(
					'daysInfo'=>$daysInfo,
					'staffData'=>$staffData,					
					);
					
			 }
			  $this->set(compact('leaveData','ecnumber','data','date'));
			  $this->render('admin_leave_ndex_excel','export_xls');
			   }
	
	public function admin_leave_index() {
			 $ecnumber = $this->Session->read('Auth.User.ecnumber');
			 $this->loadModel('LeaveApplication');
			 $this->loadModel('LeaveDaysStat');
			 $leaveData = $this->LeaveApplication->find('all');
			 $leaveStats = $this->LeaveDaysStat->find('list',array('fields'=>'ec_number'));
			 foreach($leaveStats as $ecNm){
				 //leave days stats
				$daysInfo = $this->LeaveDaysStat->find('first',array('conditions'=>array('LeaveDaysStat.ec_number'=>$ecNm))); 
				
				//staff info
				$staffData = $this->StaffDetail->find('first',array('conditions'=>array('StaffDetail.ecnumber'=>$ecNm)));
				 
				 
				 $data[]=array(
					'daysInfo'=>$daysInfo,
					'staffData'=>$staffData,					
					);
					
			 }
			  $this->set(compact('leaveData','ecnumber','data'));
			   }
	// individual leave application  report
	public function index_leave() {
			 $ecnumber = $this->Session->read('Auth.User.ecnumber');
			 $this->loadModel('LeaveApplication');
			 $leaveData = $this->LeaveApplication->find('all',array('conditions'=>array('LeaveApplication.ec_number'=>$ecnumber)));
			//debug($leaveData);die();
			 $this->set(compact('leaveData','ecnumber'));
			   }
	public function index_leave_excel() {
			 $ecnumber = $this->Session->read('Auth.User.ecnumber');
			 $this->loadModel('LeaveApplication');
			 $leaveData = $this->LeaveApplication->find('all',array('conditions'=>array('LeaveApplication.ec_number'=>$ecnumber)));
			 
			 $staffData = $this->StaffDetail->find('first',array('conditions'=>array('StaffDetail.ecnumber'=>$ecnumber)));
			 $name = $staffData['StaffDetail']['firstname'];
			 $sname = $staffData['StaffDetail']['lastname'];
			//debug($leaveData);die();
			 $this->set(compact('leaveData','ecnumber','name','sname'));
			 $this->render('index_leave_excel','export_xls');
			   }
 
		 // individual booking  excell report
	public function index_books_excel(){
			 $iD = $this->request->data['StaffDetails']['ecnumber'];
			 $staffData = $this->StaffDetail->find('first',array(
													'conditions'=>array('StaffDetail.id_number'=>$iD)));
													
			$fname = $staffData['StaffDetail']['firstname'];
			$sname = $staffData['StaffDetail']['lastname'];
			$title = $staffData['StaffDetail']['title'];
												//	debug($staffData);die();
			 $this->loadModel('Booking');
			 $bookData = $this->Booking->find('all',array('conditions'=>array('Booking.ec_number'=>$iD)));
			 $this->set(compact('bookData','fname','sname','title'));
			 $this->render('index_books_excel','export_xls');
			 
			}
 
	public function index_stud() {
	 
	 $this->loadModel('StudentDetail');
	 $studData = $this->StudentDetail->find('all');
	 //debug($studData);die();	 
	 $this->set(compact('studData'));
	 
	}
	
	
	public function index_stud_excel() {
	 
	 $this->loadModel('StudentDetail');
	 $studData = $this->StudentDetail->find('all');
	 //debug($studData);die();
	 
	 $this->set(compact('studData'));
	 $this->render('index_stud_excel','export_xls');
	}
 
	public function index() {
		$this->StaffDetail->recursive = 0;
		$this->set('staffDetails', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->StaffDetail->id = $id;
		if (!$this->StaffDetail->exists()) {
			throw new NotFoundException(__('Invalid staff detail'));
		}
		$this->set('staffDetail', $this->StaffDetail->read(null, $id));
	}

	
	public function enter_leave() {
	 $this->loadModel('LeaveApplication');	 
	 $ecnumber = $this->Session->read('Auth.User.ecnumber');
	if ($this->request->is('post') || $this->request->is('put')) {
		//debug($this->request->data);die();
		$ecnumber = $this->request->data['StaffDetail']['search'];
			 $this->loadModel('LeaveApplication');
			 $leaveData = $this->LeaveApplication->find('all',array('conditions'=>array('LeaveApplication.ec_number'=>$ecnumber)));
			 
			 $staffData = $this->StaffDetail->find('first',array('conditions'=>array('StaffDetail.id_number'=>$ecnumber)));
		if(empty($leaveData)){
			$this->Session->setFlash(__('Invalid Ecnumber or No Leave Applications for the given Ecnumber'));
			$this->redirect(array('controller'=> 'staff_details', 'action' => 'user_search'));	
			
		}
			//debug($staffData);die();
			 $this->set(compact('leaveData','ecnumber','staffData'));
	    }
	}
	
	
	//staff apply leave
	public function apply_leave(){
	 $this->loadModel('LeaveApplication');	 
	 $ecnumber = $this->Session->read('Auth.User.ecnumber');
	if ($this->request->is('post') || $this->request->is('put')) {
		//debug($this->request->data);die();
		$leave_address = $this->request->data['StaffDetail']['leave_address'];
		$type_leave = $this->request->data['StaffDetail']['type_leave'];
		$attach_cert = $this->request->data['StaffDetail']['attach_cert'];
		$salary_paid = $this->request->data['StaffDetail']['salary_paid'];
		$encashed = $this->request->data['StaffDetail']['encashed'];
		$leave_reason = $this->request->data['StaffDetail']['leave_reason'];
		//debug($pickVenue);die();		
		$staffData = $this->StaffDetail->find('first',array(
													'conditions'=>array('StaffDetail.ecnumber'=>$ecnumber)));
			$email = $staffData['StaffDetail']['email_address'];										
		//leave start date
		$startDate = $this->request->data['StaffDetail']['start_date'];
		$startDate = $this->request->data['StaffDetail']['start_date']['day'];
		$kamonth = $this->request->data['StaffDetail']['start_date']['month'];
		$gore = $this->request->data['StaffDetail']['start_date']['year'];
		$kayear = substr($gore, -2);		
		$startZuva  = $startDate."-".$kamonth."-".$kayear;
		
		//leave end date
		$endDate = $this->request->data['StaffDetail']['end_date'];
		$endDate = $this->request->data['StaffDetail']['end_date']['day'];
		$kamonth1 = $this->request->data['StaffDetail']['end_date']['month'];
		$gore1 = $this->request->data['StaffDetail']['end_date']['year'];
		$kayear1 = substr($gore1, -2);		
		$endZuva  = $endDate."-".$kamonth1."-".$kayear1;


//find days applied
			$startt = $gore."-".$kamonth."-".$startDate;
			$enddt = $gore1."-".$kamonth1."-".$endDate;			
		    $date1 = new DateTime($startt);
			$date2 = new DateTime($enddt);
			$daysApplied  = $date2->diff($date1)->format('%a');
		   
		   //check if $daysApplied > 0 
		      if($daysApplied <= 0){
				$this->Session->setFlash(__('Please check your selection dates'));
				$this->redirect(array('controller'=> 'staff_details', 'action' => 'apply_leave'));
			  }
			  
			  //check if address is given
			  if($leave_address == ''){
				$this->Session->setFlash(__('Please provide leave address'));
				$this->redirect(array('controller'=> 'staff_details', 'action' => 'apply_leave')); 
			  }
			  //check leave type
			  if($type_leave == 'empty'){
				  $this->Session->setFlash(__('Please select leave type'));
				$this->redirect(array('controller'=> 'staff_details', 'action' => 'apply_leave'));
			  }
		  		
    	//validate not to apply a day(s) before 
		$nhasi = date('d-m-y');
		
				if($startZuva < $nhasi){
					$this->Session->setFlash(__('You cant apply a day before today. Choose days after today'));
					$this->redirect(array('controller'=> 'staff_details', 'action' => 'apply_leave'));	
				}
					 $this->loadModel('LeaveApplication');
					 $checkApplication = $this->LeaveApplication->find('list',array(
													'conditions'=>array('LeaveApplication.ec_number'=>$ecnumber,'LeaveApplication.leave_start_date'=>$startZuva),
													'fields'=>array('id')));			
					if(empty($startZuva)){						
						$this->Session->setFlash(__('Please select starting date of leave'));
						$this->redirect(array('controller'=> 'staff_details', 'action' => 'apply_leave'));	
						
					}
					if(empty($endZuva)){						
						$this->Session->setFlash(__('Please select ending date of leave'));
						$this->redirect(array('controller'=> 'staff_details', 'action' => 'apply_leave'));	
					}
					
					
					if(!empty($checkApplication)){
						$this->Session->setFlash(__('You already applied for the date'));
						$this->redirect(array('controller'=> 'users', 'action' => 'home_reports'));
						
					}
		
					if(empty($checkApplication)){
						
						//1. find days accruals ($ad) in (leave_days_stats) per staff
				$this->loadModel('LeaveDaysStat');				
				$leaveAcrualsStats = $this->LeaveDaysStat->find('first',
							array('conditions'=>array('LeaveDaysStat.ec_number'=>$ecnumber)));
				$dL = $leaveAcrualsStats['LeaveDaysStat']['days_left'];	
				// all days taken
				//$dd = $leaveAcrualsStats['LeaveDaysStat']['days_taken'];
				$accrual_days = $leaveAcrualsStats['LeaveDaysStat']['accruals_days'];
				//check if encashed days are more than yr balance days, also its a condition where one cannot just encash the days without going apply for leave
				if($encashed > $dL){
						$this->Session->setFlash(__('You cannot encash more days than your balance days'));
						$this->redirect(array('controller'=> 'users', 'action' => 'home_reports'));
				   }
				//check leave type, if special leave , you must give a reason
				if($type_leave == "Special Leave"){
					if($leave_reason == ""){
						$this->Session->setFlash(__('Please give a reason for special leave'));
						$this->redirect(array('controller'=> 'staff_details', 'action' => 'apply_leave'));
					}
				// special leave days shld be equal or less than 12 per year
				if($daysApplied >= 12){
					$this->Session->setFlash(__('You cannot apply more than 12 days for special leave'));
					$this->redirect(array('controller'=> 'staff_details', 'action' => 'apply_leave'));
					}
				}
				//check if you your applied days is equal or less than your days left
				if($daysApplied <= $dL){					
					//========================save to Leave Application Table=======================//
					    $this->LeaveApplication->create();
						$this->LeaveApplication->set(array(
									'ec_number' => $ecnumber,
									'days_applied' => $daysApplied,
									'leave_address' => $leave_address,
									'type_leave' => $type_leave,
									'attach_cert' => $attach_cert,
									'salary_paid' => $salary_paid,
									'days_left' => $dL,
									//'days_accruals' => $accrual_days,
									'application_date' => $nhasi,
									'leave_reason' => $leave_reason,
									'encashed' => $encashed,
									'leave_start_date'=> $startZuva,
									'leave_end_date'=> $endZuva,
									'approved'=>0
												));
						 $this->LeaveApplication->save();
						 
						 //debug($email);die();
						 // send email 
						/* $email = "taurai.mutero@zbc.co.zw";
						 if(!empty($email)){
						
				
					 $email_addr = $email;
					  $message = "You have successfully applied for leave : \n\n Waiting approval :\n\n 
					
					Days Applie:$daysApplied \n\n
					Leave Start: $startZuva \n\n
					Leave End: $endZuva \n\n
					Regards,\n\n
					ZBC Management System ";
					$email = new CakeEmail();
					$email->config('smtp');
					$email->to($email_addr)
							->subject('Leave Application')
							->send($message);
						
									
						 }*/
						 
									
				$this->Session->setFlash('The application has been saved successfully','default',array('class' => 'success'));
				$this->redirect(array('controller'=> 'users', 'action' => 'home_reports'));
				
				}
				else{
					$this->Session->setFlash(__('The days you applied is greater than your days left please apply for less days'));
					$this->redirect(array('controller'=> 'users', 'action' => 'home_reports'));
				}
		
		}
			$this->loadModel('Department');
			$dptmnts=$this->Department->find('list',array('fields'=>array('code','name')));
			$this->set(compact('dpmnt_code','studData','dptmnts','dptmntNm'));
	    }
	}

	public function dptmnt_studs(){
	 $this->loadModel('StudentDetail');
	 $this->loadModel('Department');
	 $this->loadModel('Booking');
	 $creator = $this->Session->read('Auth.User.username');
	if ($this->request->is('post') || $this->request->is('put')) {
		
		$route = $this->request->data['StaffDetail']['route'];
		$kaYrFrm = $this->request->data['StaffDetail']['book_date']['year'];
					$kaMnthFrm = $this->request->data['StaffDetail']['book_date']['month'];
					$kaDayFrm = $this->request->data['StaffDetail']['book_date']['day'];
					$yrFrm = substr($kaYrFrm, -2);
					$booking_date = $kaDayFrm."-".$kaMnthFrm."-".$yrFrm;
					
			
		$bookings = $this->Booking->find('all',array(
										'conditions'=>array('Booking.pick_date'=>$booking_date,
										                    'Booking.route'=>$route)));
													
		foreach($bookings as $booking){
		//	debug($b);die();
			$idNm = $booking['Booking']['ec_number'];	
			$bookData = $this->Booking->find('first',array(
													'conditions'=>array('Booking.ec_number'=>$idNm,
																		'Booking.pick_date'=>$booking_date)));
			$staffData = $this->StaffDetail->find('first',
											array('conditions'=>array('StaffDetail.id_number'=>$idNm)));
		
		$data[]=array(
					'bookData'=>$bookData,
					'staffData'=>$staffData,					
					);			
		}
		//debug($data);die();
		/*$dptmntNm = $this->Department->find('first',
											array('conditions'=>array('Department.code'=>$dpmnt_code),
											'fields',array('Department.name')));*/
													
		//$dptmntNm = $dptmntNm['Department']['name'];
		if(empty($data)){
			$this->Session->setFlash(__('no bookings for the selected date'));
			$this->redirect(array('action' => 'dptmnt_studs'));
		}
		
	}
	    	//$this->loadModel('Department');
			//$dptmnts=$this->Department->find('list',array('fields'=>array('code','name')));
			 $this->loadModel('Route');
		    $routes=$this->Route->find('list',array('fields'=>array('description','name')));
			$this->set(compact('data','booking_date','routes','route'));
	}


	public function booking_excell_report(){
	 $this->loadModel('StudentDetail');
	 $this->loadModel('Department');
	 $this->loadModel('Booking');
	 $creator = $this->Session->read('Auth.User.username');
	if ($this->request->is('post') || $this->request->is('put')) {
		
		$booking_date = $this->request->data['StaffDetail']['booking_date'];
		$route = $this->request->data['StaffDetail']['route'];
		/*$kaYrFrm = $this->request->data['StaffDetail']['book_date']['year'];
					$kaMnthFrm = $this->request->data['StaffDetail']['book_date']['month'];
					$kaDayFrm = $this->request->data['StaffDetail']['book_date']['day'];
					$yrFrm = substr($kaYrFrm, -2);
					//$booking_date = $kaDayFrm."-".$kaMnthFrm."-".$kaYrFrm;
					$booking_date = $kaDayFrm."-".$kaMnthFrm."-".$yrFrm;*/
					
			/*$kaYrTo = $this->request->data['StaffDetail']['to_date']['year'];
					$kaMnthTo= $this->request->data['StaffDetail']['to_date']['month'];
					$kaDayTo = $this->request->data['StaffDetail']['to_date']['day'];
					//$yrFrm = substr($kaYrFrm, -2);
					$to_date = $kaDayTo."-".$kaMnthTo."-".$kaYrTo;*/
		//debug($dpmnt_code);die();
		/*$studData = $this->StaffDetail->find('all',array(
													'conditions'=>array('StaffDetail.department_code'=>$dpmnt_code)));*/
		$bookings = $this->Booking->find('all',array(
										'conditions'=>array('Booking.pick_date'=>$booking_date,
										                    'Booking.route'=>$route)));
													
		foreach($bookings as $booking){
		//	debug($b);die();
			$idNm = $booking['Booking']['ec_number'];	
			$bookData = $this->Booking->find('first',array(
													'conditions'=>array('Booking.ec_number'=>$idNm,
																		'Booking.pick_date'=>$booking_date)));
			$staffData = $this->StaffDetail->find('first',
											array('conditions'=>array('StaffDetail.id_number'=>$idNm)));
		
		$data[]=array(
					'bookData'=>$bookData,
					'staffData'=>$staffData,					
					);			
		}
		//debug($data);die();
		/*$dptmntNm = $this->Department->find('first',
											array('conditions'=>array('Department.code'=>$dpmnt_code),
											'fields',array('Department.name')));*/
													
		//$dptmntNm = $dptmntNm['Department']['name'];
		if(empty($data)){
			$this->Session->setFlash(__('no bookings for the selected date'));
			$this->redirect(array('action' => 'dptmnt_studs'));
		}
		
	}
	    	//$this->loadModel('Department');
			//$dptmnts=$this->Department->find('list',array('fields'=>array('code','name')));
			$this->set(compact('data','booking_date','route'));
			$this->render('booking_excell_report','export_xls');
	}


	public function register_stud(){
	
	$this->loadModel('StudentDetail');
	$this->loadModel('User');
	 $creator = $this->Session->read('Auth.User.username');
	if ($this->request->is('post') || $this->request->is('put')) {
		 //debug($this->request->data);die();
		    $created = date('d-m-y');
			$firstname = $this->request->data['StaffDetail']['firstname'];
			$surname = $this->request->data['StaffDetail']['surname'];
			$title = $this->request->data['StaffDetail']['title'];
			$id_number = $this->request->data['StaffDetail']['id_number'];
			$category = $this->request->data['StaffDetail']['department_code'];
			$mobile = $this->request->data['StaffDetail']['mobile'];
			$ec_number = $this->request->data['StaffDetail']['ec_number'];
			$designation = $this->request->data['StaffDetail']['designation'];
			//$home_address = $this->request->data['StaffDetail']['home_address'];
			$email_address = $this->request->data['StaffDetail']['email_address'];
			$username=$firstname[0].$surname;
			/*
			$kaYrFrm = $this->request->data['StaffDetail']['from_date']['year'];
					$kaMnthFrm = $this->request->data['StaffDetail']['from_date']['month'];
					$kaDayFrm = $this->request->data['StaffDetail']['from_date']['day'];
					//$yrFrm = substr($kaYrFrm, -2);
					$from_date = $kaDayFrm."-".$kaMnthFrm."-".$kaYrFrm;
			$kaYrTo = $this->request->data['StaffDetail']['to_date']['year'];
					$kaMnthTo= $this->request->data['StaffDetail']['to_date']['month'];
					$kaDayTo = $this->request->data['StaffDetail']['to_date']['day'];
					//$yrFrm = substr($kaYrFrm, -2);
					$to_date = $kaDayTo."-".$kaMnthTo."-".$kaYrTo;*/
			
			if(empty($id_number)){
			$this->Session->setFlash(__('Please fill your ID Number'));
			$this->redirect(array('action' => 'register_stud'));	
				
			}
			if(empty($firstname)){
			$this->Session->setFlash(__('Please fill your first name'));
			$this->redirect(array('action' => 'register_stud'));	
				
			}
			if(empty($surname)){
			$this->Session->setFlash(__('Please fill your surname'));
			$this->redirect(array('action' => 'register_stud'));	
				
			}
		
		
		$checkStaff = $this->StaffDetail->find('list',array(
													'conditions'=>array('StaffDetail.id_number'=>$id_number),
													'fields'=>array('id')));	

			if(empty($checkStaff)){
				
			$this->StaffDetail->create();
						$this->StaffDetail->set(array(
									'firstname' => $firstname,
									'lastname'=> $surname,
									'title'=>$title,
									'id_number' => $id_number,
									'ecnumber' => $ec_number,
									'designation' => $designation,
									'department_code'=>$category,
									'mobile'=>$mobile,
									'email_address'=>$email_address
								    //'home_address'=>$home_address
												));
						$this->StaffDetail->save();	
			}
					
			if(!empty($checkStaff)){
				$this->Session->setFlash(__('Staff Details already exists please log in with your credentials'));
						
			}	
			
		
		/*************check if user exists**************/
			$checkUsr = $this->User->find('list',array(
													'conditions'=>array('User.ecnumber'=>$ec_number),
													'fields'=>array('id')));
			if(empty($checkUsr)){
			
								$this->User->create();
								$this->User->set(array(
									'username' => $username,
									'password'=> $ec_number,
									'system_group_id'=>3,
									'ecnumber'=>$id_number,
									//'created'=>$created,
									'account_status'=>1,
									//'created_by'=>$creator,
									'email_address'=>$email_address
									));
									$this->User->save();	
				
			}
			if(!empty($checkUsr)){
				$this->Session->setFlash(__('User already exists please log in with your credentials. Use your initial and surname as your username (eg: tmutero) and your ID number as your password to book.'));
				$this->redirect(array('controller'=>'users','action' => 'login'));
				
			}
		
		
			
	}
	if ($this->StudentDetail->save($this->request->data)) {
				$this->Session->setFlash(__('Staff detail has been saved. Use your initial and surname as your username (eg: tmutero) and your ID number as your password to book.'));
				$this->redirect(array('controller'=> 'users', 'action' => 'login'));
			} /*else {
				$this->Session->setFlash(__('The student detail could not be saved. Please, try again.'));
			}*/
	$this->loadModel('Department');
			
			$dptmnts=$this->Department->find('list',array('fields'=>array('code','name')));
			$this->set(compact('dptmnts','progs'));
}

/**
 * add method
 *
 * @return void
 */
	public function add_stud() {
	 $this->loadModel('StudentDetail');
	 $creator = $this->Session->read('Auth.User.username');
	if ($this->request->is('post') || $this->request->is('put')) {
		// debug($this->request->data);die();
		    $created = date('d-m-y');
			$firstname = $this->request->data['StaffDetail']['firstname'];
			$surname = $this->request->data['StaffDetail']['surname'];
			$title = $this->request->data['StaffDetail']['title'];
			$id_number = $this->request->data['StaffDetail']['id_number'];
			$department_code = $this->request->data['StaffDetail']['department_code'];
			$mobile = $this->request->data['StaffDetail']['mobile'];
			$home_address = $this->request->data['StaffDetail']['home_address'];
			$email_address = $this->request->data['StaffDetail']['email_address'];
			//$from_date = $this->request->data['StaffDetail']['from_date'];
			
			$kaYrFrm = $this->request->data['StaffDetail']['from_date']['year'];
					$kaMnthFrm = $this->request->data['StaffDetail']['from_date']['month'];
					$kaDayFrm = $this->request->data['StaffDetail']['from_date']['day'];
					//$yrFrm = substr($kaYrFrm, -2);
					$from_date = $kaDayFrm."-".$kaMnthFrm."-".$kaYrFrm;
			$kaYrTo = $this->request->data['StaffDetail']['to_date']['year'];
					$kaMnthTo= $this->request->data['StaffDetail']['to_date']['month'];
					$kaDayTo = $this->request->data['StaffDetail']['to_date']['day'];
					//$yrFrm = substr($kaYrFrm, -2);
					$to_date = $kaDayTo."-".$kaMnthTo."-".$kaYrTo;
					
			
			
			//debug($to_date);die();
			if(empty($id_number)){
			$this->Session->setFlash(__('Please Fill Student Details'));
			$this->redirect(array('action' => 'add_stud'));	
				
			}
			if(empty($firstname)){
			$this->Session->setFlash(__('Please Fill Student Details'));
			$this->redirect(array('action' => 'add_stud'));	
				
			}
			if(empty($surname)){
			$this->Session->setFlash(__('Please Fill Student Details'));
			$this->redirect(array('action' => 'add_stud'));	
				
			}
		
		
		
		 /*************check if student exists**************/
			$checkStud = $this->StudentDetail->find('list',array(
													'conditions'=>array('StudentDetail.id_number'=>$id_number),
													'fields'=>array('id')));
		 
		if(!empty($checkStud)){
				$this->Session->setFlash(__('Student with same details already exists'));
				$this->redirect(array('action' => 'add_stud'));
			
		}
		
		
		
		 if(empty($checkStud)){
			 
			 //Upload file
		    //making the directory with the supp email
			$files_dir = APP."uploads\\$email_address\\$id_number\\";
			if (!file_exists($files_dir)) {
			mkdir($files_dir, 0777, true); 
			}
			
			if(empty($this->request->data['StaffDetail']['Browse_File']['name'])){
			$this->Session->setFlash(__('No assignment file has been selected'));
			$this->redirect(array('action' =>'add_stud'));
			}
		    //file name
			$filename = $this->request->data['StaffDetail']['Browse_File']['name'];	
			$this->request->data['StaffDetail']['file_attachment'] =	$filename;
			$path = pathinfo($filename);
			//allowed formats				
			$acceptable = array("pdf","docx");
			if(!in_array($path['extension'],$acceptable)) {
           		$this->Session->setFlash('Error Uploading: Please upload files with .pdf file extension only');
				$this->redirect(array('action' =>'add_stud'));
              }
			 //upload file
			$filenames = $files_dir . $this->request->data['StaffDetail']['Browse_File']['name'];
			$success = move_uploaded_file($this->request->data['StaffDetail']['Browse_File']['tmp_name'],$filenames);
			 
			 
			//========================save to StudentDetail Table=======================//
					$this->StudentDetail->create();
						$this->StudentDetail->set(array(
									'id_number' => $id_number,
									'firstname' => $firstname,
									'surname'=> $surname,
									'title'=>$title,
									'department_code'=>$department_code,
									'mobile'=>$mobile,
									'from_date'=>$from_date,
									'to_date'=>$to_date,
									'email_address'=>$email_address,
								    'home_address'=>$home_address
												));
						$this->StudentDetail->save();
						
						
		     
		
			
		}
		if ($this->StudentDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The student detail has been saved'));
				$this->redirect(array('action' => 'add_stud'));
			} else {
				$this->Session->setFlash(__('The student detail could not be saved. Please, try again.'));
			}
		
		// debug($this->request->data);die();
	 }
			$this->loadModel('Department');
			$dptmnts=$this->Department->find('list',array('fields'=>array('code','name')));
			$progs=$this->Programme->find('list',array('fields'=>array('code','name')));
			$this->set(compact('dptmnts','progs'));
	 
 }
 
 	//Download tender responses
	public function download_files($id,$x) {
	// $x is email addres
	//$id is the ID Number
				// Get real path for our folder
				$rootPath = realpath('folder-to-zip');
				$rootPath = APP . 'uploads\\'.$x."\\".$id;
				// Initialize archive object
				$this->Zip = new ZipArchive();
				$this->Zip->open($id.".zip", ZipArchive::CREATE | ZipArchive::OVERWRITE);
				// Create recursive directory iterator
				/** @var SplFileInfo[] $files */
				$files = new RecursiveIteratorIterator(
					new RecursiveDirectoryIterator($rootPath),
					RecursiveIteratorIterator::LEAVES_ONLY
				);

				
				foreach ($files as $name => $file)
				{
					// Skip directories (they would be added automatically)
					if (!$file->isDir())
					{
						// Get real and relative path for current file
						$filePath = $file->getRealPath();
					
						$relativePath = substr($filePath, strlen($rootPath) + 1);
						// Add current file to archive
						$this->Zip->addFile($filePath, $relativePath);
					}
				}
				// Zip archive will be created only after closing object
			$this->Zip->close();
						
		//----------//
		
		
    $this->viewClass = 'Media';
    $path  = APP . 'webroot\\';
	$rootPath = realpath($path);
	//debug($path);die();
    // in this example $path should hold the filename but a trailing slash
    $params = array(
		'id' => "\\".$id.".zip",
       // 'name' => $id.".zip",
        'download' => true,
        'extension' => 'zip',
        'path' =>$rootPath
    );
    $this->set($params);
	}
	
	public function add() {
		$creator = $this->Session->read('Auth.User.username');
		$this->loadModel('User');
		if ($this->request->is('post')) {
			
			//debug($this->request->data);die();
			$created = date('d-m-y');
			$firstname = $this->request->data['StaffDetail']['firstname'];
			$lastname = $this->request->data['StaffDetail']['lastname'];
			$title = $this->request->data['StaffDetail']['title'];
			$ecnumber = $this->request->data['StaffDetail']['ecnumber'];
			$department_code = $this->request->data['StaffDetail']['department_code'];
			//$physical_address = $this->request->data['StaffDetail']['physical_address'];
			//$contact_address = $this->request->data['StaffDetail']['contact_address'];
			//$mobile = $this->request->data['StaffDetail']['mobile'];
			$designation = $this->request->data['StaffDetail']['designation'];
			//$work_phone = $this->request->data['StaffDetail']['work_phone'];
			//$home_phone = $this->request->data['StaffDetail']['home_phone'];
			$email_address = $this->request->data['StaffDetail']['email_address'];
			$user_type = $this->request->data['StaffDetail']['user_type'];
			$username=$firstname[0].$lastname;
			
			//===== generates default password i.e alpha numeric with 10 characters =====//
			//$default_password = substr( md5(mt_rand()), 0, 10);
		
		/*************check if user exists**************/
			$checkStaff = $this->StaffDetail->find('list',array(
													'conditions'=>array('StaffDetail.ecnumber'=>$ecnumber),
													'fields'=>array('id')));
													
		if(empty($checkStaff)){
			//========================save staff details to Staff Details Tables=======================//
					$this->StaffDetail->create();
						$this->StaffDetail->set(array(
									'ecnumber' => $ecnumber,
									'firstname' => $firstname,
									'lastname'=> $lastname,
									'title'=>$title,
									'designation'=>$designation,
									'department_code'=>$department_code,
									//'home_phone'=>$home_phone,
									//'work_phone'=>$work_phone,
									//'mobile'=>$mobile,
									'email_address'=>$email_address
									//'contact_address'=>$contact_address,
									//'physical_address'=>$physical_address
												));
						$this->StaffDetail->save();
			
		}
		if(!empty($checkStaff)){
				$this->Session->setFlash(__('Staff with same details already exists'));
				$this->redirect(array('action' => 'index'));
			
		}
	/*************check if user exists**************/
		/*	$checkUsr = $this->User->find('list',array(
													'conditions'=>array('User.ecnumber'=>$ecnumber),
													'fields'=>array('id')));
			if(empty($checkUsr)){
			
								$this->User->create();
								$this->User->set(array(
									'username' => $username,
									'password'=> $lastname,
									'system_group_id'=>$user_type,
									'ecnumber'=>$ecnumber,
									'created'=>$created,
									'account_status'=>1,
									'created_by'=>$creator,
									'email_address'=>$email_address
									));
									$this->User->save();	
				
			}
			if(!empty($checkUsr)){
				$this->Session->setFlash(__('User already exists'));
				$this->redirect(array('action' => 'index'));
				
			}*/
			
				
			
			if ($this->StaffDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The staff detail has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The staff detail could not be saved. Please, try again.'));
			}
		}
		    $this->loadModel('SystemGroup');
		    $this->loadModel('Department');
			$user_type=$this->SystemGroup->find('list',array('fields'=>array('id','account_type_name')));
			$dptmnts=$this->Department->find('list',array('fields'=>array('code','name')));
			$this->set(compact('user_type','dptmnts'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->StaffDetail->id = $id;
		if (!$this->StaffDetail->exists()) {
			throw new NotFoundException(__('Invalid staff detail'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->StaffDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The staff detail has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The staff detail could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->StaffDetail->read(null, $id);
		}
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
		$this->StaffDetail->id = $id;
		if (!$this->StaffDetail->exists()) {
			throw new NotFoundException(__('Invalid staff detail'));
		}
		if ($this->StaffDetail->delete()) {
			$this->Session->setFlash(__('Staff detail deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Staff detail was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
