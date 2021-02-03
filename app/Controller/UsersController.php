<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('Xml', 'Utility');
App::uses('AuthComponent', 'Controller/Component');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {
var $components = array("Email","Session",'RequestHandler');
var $helpers = array("Html","Form","Session",'Js');
	
	public function beforeFilter(){
 	parent::beforeFilter();
	$this->Auth->allow('login');
	$this->Auth->allow('add');
	 $this->Auth->allow('forgetpwd'); 
	   $this->Auth->allow('reset'); 
	   $this->Auth->allow('index'); 
	   $this->Auth->allow('edit'); 
	   $this->Auth->allow('delete'); 
	   $this->Auth->allow('user_search'); 
	   $this->Auth->allow('index_reports'); 
	   $this->Auth->allow('home_reports'); 
	   $this->Auth->allow('chek_in_out'); 
	   $this->Auth->allow('create_users'); 
	   $this->Auth->deny();
	  // $this->Auth->allow('initDB');
	}

	
	
	
	
	public function initDB() {
    $group = $this->User->Group;

    // Allow admins to everything
   // $group->id = 1;
  //  $this->Acl->allow($group, 'controllers');

    // allow managers to posts and widgets
    $group->id = 1;
    $this->Acl->deny($group, 'controllers');
    $this->Acl->allow($group, 'controllers/Users/login');
    $this->Acl->allow($group, 'controllers/CheckinOutLogs');

    // allow users to only add and edit on posts and widgets
/*    $group->id = 3;
    $this->Acl->deny($group, 'controllers');
    $this->Acl->allow($group, 'controllers/Posts/add');
    $this->Acl->allow($group, 'controllers/Posts/edit');
    $this->Acl->allow($group, 'controllers/Widgets/add');
    $this->Acl->allow($group, 'controllers/Widgets/edit');

    // allow basic users to log out
    $this->Acl->allow($group, 'controllers/users/logout');
*/
    // we add an exit to avoid an ugly "missing views" error message
    echo "all done";
    exit;
}
	
	
	public function create_users() {
		
			 $userdata=$this->Auth->user();
			 $username=$userdata['username'];
			 $ip_address = $_SERVER['REMOTE_ADDR'];
			 $today = date("Y-m-d");
		
		$this->loadModel('StaffDetail');
		$staffDetails = $this->StaffDetail->find('all');
		//debug($staffDetails);die();
		
		for ($c = 0; $c < sizeof($staffDetails); $c++) {
			
			$ecnumber = $staffDetails[$c]['StaffDetail']['ecnumber'];
			$email_address = $staffDetails[$c]['StaffDetail']['email_address'];
			
			
			$checkUsr  = $this->User->find('list', 
						array('fields'=>array('id','system_group_id'),
							  'conditions'=>array('ecnumber'=>$ecnumber),
							  'recursive'=>-1));
			
			if(empty($checkUsr)){				
				$this->User->create();
								$this->User->set(array(
									'ecnumber'=>$ecnumber,
									'email_address'=>$email_address,
									'password'=>$ecnumber,
									'account_status'=>1,
									'system_group_id'=>5,
									'password_expiry_date'=>0,
									'expiry_warning_date'=>0,
									'created_by'=>$username,
									'modified_by'=>$username,
									'modified'=>$today,
									'created'=>$today,
									'username'=>$ecnumber,
									'create_ip'=>$ip_address,
									'modify_ip'=>$ip_address
									));
				$this->User->save();
			}	
			
		
		
		}
		
		
		$this->Session->setFlash('Users successfully created','default',array('class' => 'success'));
		$this->redirect(array('action' => 'index'));
		
	}
	
	
	public function index_reports() {
	//user logged in
		 	$userdata=$this->Auth->user();
			$ecnumber=$userdata['ecnumber'];
			$this->loadModel('StaffDetail');
			//dptmnt code 
			/*$system_group= $this->StaffDetail->find('list',array('fields'=>array('department_code'),
														'conditions'=>array('StaffDetail.ecnumber'=>$current_user['username'])));*/
			
		$current_user['username'] = $this->Session->read('Auth.User.username');
		$system_group= $this->User->find('list',array('fields'=>array('system_group_id'),
														'conditions'=>array('User.username'=>$current_user['username'])));
		//user system group
		foreach($system_group as $sys_group){
			$system_group_id = $sys_group;
			}
	$this->loadModel('LeaveApplication');
	
    if($system_group_id == 1){
		$approvedData = $this->LeaveApplication->find('list',array('conditions'=>array(												  'LeaveApplication.approved'=>1)));
		$x = count($approvedData);	
	}	
     if($system_group_id == 5){
		
		$approvedData = $this->LeaveApplication->find('list',array('conditions'=>array(												  'LeaveApplication.approved'=>0)));
		$x = count($approvedData);	
	}	
		
		
		
			//debug($system_group_id);die();
		$this->set(compact('entryID','check_in_out','entryName','x','system_group_id'));
		
		}
		
		
	public function home_reports() {
		$username=$this->Session->read('Auth.User.username');
		$this->loadModel('LeaveApplication');
				$approvedData = $this->LeaveApplication->find('list',array('conditions'=>array(												  'LeaveApplication.approved'=>1)));
		$x = count($approvedData);
		$ecNmUsr = $this->User->find('first', array(
						'fields'=>array('User.ecnumber'),
										'conditions'=>array('User.username'=>$username),
						'recursive'=>-1));
		$ecNmUsr = $ecNmUsr['User']['ecnumber'];		
		$this->set(compact('entryName','$ecNmUsr','x'));
		
		}
		
	
	public function user_search(){
		if($this->request->is('post')){
			
		$username = $this->request->data['User']['search'];
		$userinfo = $this->User->find('all',array('conditions'=>array('User.username'=>$username)));
		
		if(empty($userinfo)){
		$this->Session->setFlash(__('User Cannot Be Found Due To The Following: Missing or Invalid Username'));
			$this->redirect(array('action' => 'index'));	
		}
			
		//debug($username);die();
		}
		$this->set(compact('userinfo'));
		
	}
	
	public function login(){
		$nguva = date("H:i:s", time());
	
	if($this->request->is('post')){
			$current_user['username'] = $this->Session->read('Auth.User.username');
			$userdata=$this->Auth->user();
			$ecnumber=$userdata['ecnumber'];
		
		$logincredentials=$this->data;
		
				foreach($logincredentials as $logg){
						$login=$logg;
						}

		$usernamelog = $logg['username'];		
		$ecnumber = $this->User->find('first', array(
						'fields'=>array('ecnumber'),
										'conditions'=>array('username'=>$usernamelog,
															'account_status'=>1),
						'recursive'=>-1));
		$ecnumber = $ecnumber['User']['ecnumber'];
		//debug($ecnumber);die();
				
				$groupmember = $this->User->find('first', array('fields'=>array('id','system_group_id'),'conditions'=>array('username'=>$usernamelog,'account_status'=>1),'recursive'=>-1));
				if($groupmember != false){
					$group = $groupmember['User']['system_group_id'];
					$grpmbr = $group; //did this so that if either variable was used the code will still run.
				}else{
				$this->Session->setFlash('Login details incorrect.Please try again');
				$this->redirect(array('controller'=>'Users','action'=>'login'));
				}
			if ($this->Auth->login() && $grpmbr == 3){//HR Admin assistant					
				$this->redirect($this->Auth->loginRedirect = array('controller'=>'Users', 'action'=> 'index_reports',$check_in_out));
			}
			elseif ($this->Auth->login() && $grpmbr == 4){//Check In and Out User
		
									
				$this->redirect($this->Auth->loginRedirect = array('controller' => 'Users', 'action'=> 'index_reports',$check_in_out));
			
			}
			elseif ($this->Auth->login() && $grpmbr == 2){//HR Admin
				
				$this->redirect($this->Auth->loginRedirect = array('controller' => 'Users', 'action'=> 'index_reports',$check_in_out));
			}
			elseif ($this->Auth->login() && $grpmbr == 1){//Superuser
				
				
			$this->redirect($this->Auth->loginRedirect = array('controller' => 'Users', 'action'=> 'index_reports',$check_in_out));
			//$this->redirect($this->Auth->loginRedirect = array('controller' => 'Users', 'action'=> 'chek_in_out',$entryPointID));
			}
			elseif ($this->Auth->login() && $grpmbr == 5){//Ordinary User
			
				
			$this->redirect($this->Auth->loginRedirect = array('controller' => 'Users', 'action'=> 'index_reports',$check_in_out));
			//$this->redirect($this->Auth->loginRedirect = array('controller' => 'Users', 'action'=> 'chek_in_out',$entryPointID));
			}
			else{
				$this->Session->setFlash('Login details incorrect.Please try again');
			}
		}
		if($this->Session->read('Auth.User.username') != null){
			$current_user['username'] = $this->Session->read('Auth.User.username');
			$usernamelog=$current_user['username'];
				$groupmember = $this->User->find('first', array('fields'=>array('id','system_group_id'),'conditions'=>array('username ='=>$usernamelog),'recursive'=>-1));

				if($groupmember != false){
					$group = $groupmember['User']['system_group_id'];
					$grpmbr = $group; //did this so that if either variable was used the code will still run.
				}

			if ($this->Auth->login() && $grpmbr == 3){//HR Admin assistant
				$this->redirect($this->Auth->loginRedirect = array('controller' => 'Users', 'action'=> 'index_reports'));
			}
			elseif ($this->Auth->login() && $grpmbr == 4){//Check In and Out User
			//debug($nguva);die();
				
				$this->redirect($this->Auth->loginRedirect = array('controller' => 'Users', 'action'=> 'index_reports'));
			}
			elseif ($this->Auth->login() && $grpmbr == 2){//HR Admin
				$this->redirect($this->Auth->loginRedirect = array('controller' => 'Users', 'action'=> 'index_reports'));
			}
			elseif ($this->Auth->login() && $grpmbr == 1){//Superuser
				$this->redirect($this->Auth->loginRedirect = array('controller' => 'Users', 'action'=> 'index_reports'));
				//$this->redirect($this->Auth->loginRedirect = array('controller' => 'Users', 'action'=> 'chek_in_out',$entryPointID));
			}
			elseif ($this->Auth->login() && $grpmbr == 5){//Ordinary User
				$this->redirect($this->Auth->loginRedirect = array('controller' => 'Users', 'action'=> 'index_reports'));
				//$this->redirect($this->Auth->loginRedirect = array('controller' => 'Users', 'action'=> 'chek_in_out',$entryPointID));
			}
			}
			
			//$entry_points=$this->EntryPoint->find('list',array('fields'=>array('id','name')));
			$this->set(compact('entry_points'));
	}
	
	
	public function logout(){
	$current_user['username'] = $this->Session->read('Auth.User.username');
	$userdata=$this->Auth->user();
	$ecnumber=$userdata['ecnumber'];
	
	$this->Session->destroy();
		$this->Session->setFlash('You are now logged out');
		$this->redirect($this->Auth->logout());
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {

	$users= $this->User->find('all');
	//debug($users);die();
	$this->set(compact('users'));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
	//user logged in
		$current_user['username'] = $this->Session->read('Auth.User.username');
		$system_group= $this->User->find('list',array('fields'=>array('system_group_id'),'conditions'=>array('User.username'=>$current_user['username'])));
		//user system group
			foreach($system_group as $sys_group){
			$system_group_id= $sys_group;
			}
			 $zuva = date('y-m-d');
		if ($this->request->is('post')) {
				//user logged in
		$current_user['username'] = $this->Session->read('Auth.User.username');
		$ip_address = $_SERVER['REMOTE_ADDR'];
			
		$userDetails = $this->User->find('list',array('conditions'=>array('User.ecnumber'=>$this->request->data['User']['ecnumber'])));
		$systemGroups = $this->User->SystemGroup->find('list',array('fields'=>array('id','account_type_name')));
		//find use department
		if(!empty($userDetails)){
			$this->Session->setFlash(__('User already exists'));
			$this->set(compact('systemGroups'));
			return false;
			//$this->redirect(array('action' => 'add'));
			}
		//$this->request->data['User']['username'] = $this->request->data['User']['email_address'];
		$ecnumber = $this->request->data['User']['ecnumber'];
		//$passwrd = $this->request->data['User']['password'];
		$account_status = $this->request->data['User']['account_status'];
		
		
		/*******find staff details*******/
		$this->loadModel('StaffDetail');
		$staffInfo = $this->StaffDetail->find('all',array(
													'conditions'=>array('StaffDetail.ecnumber'=>$ecnumber)));
												//	debug($staffInfo);die();
													
		
													
		if(empty($staffInfo)){
				$this->Session->setFlash(__('Staff Details not exists'));
				$this->redirect(array('controller'=>'StaffDetails','action' => 'add'));
				
			}
		//debug($staffInfo);die();
		$firstname = $staffInfo[0]['StaffDetail']['firstname'];
		$lastname = $staffInfo[0]['StaffDetail']['lastname'];
		//$firstChr = $firstname[0];
		$email_address = $staffInfo[0]['StaffDetail']['email_address'];
		/*****for the sake of saying username will be initial and surname eg tmutero***/
		$username = $firstname[0].$lastname;
		//debug($username);die();
		
		/*************check if user exists**************/
			$checkUsr = $this->User->find('list',array(
													'conditions'=>array('User.ecnumber'=>$ecnumber),
													'fields'=>array('id')));
			if(!empty($checkUsr)){
				$this->Session->setFlash(__('User already exists'));
				$this->redirect(array('action' => 'index'));
				
			}
			
			//debug($this->request->data);die();
			$user_type = $this->request->data['User']['system_group_id'];
			$lastname = strtoupper($lastname);
			//debug($lastname);die();
			if(empty($checkUsr)){
			
								$this->User->create();
								$this->User->set(array(
									'username' => $ecnumber,
									'password'=> $ecnumber,
									'system_group_id'=>$user_type,
									'ecnumber'=>$ecnumber,
									'created_by'=>$current_user['username'],
									'created'=>$zuva,
									'create_ip'=>$_SERVER['REMOTE_ADDR'],
									'account_status'=>$account_status,
									'email_address'=>$email_address
									));
									$this->User->save();	
				
			}
			
		//debug($this->request->data);die();
	
		//creator and ip
		$this->request->data['User']['create_ip']= $ip_address;
		$this->request->data['User']['created_by'] = $current_user['username'];
			//$this->User->create();
			//redirect after saving
			if ($this->User->save($this->request->data)and ($this->request->data['User']['system_group_id']==4)){
				$this->Session->setFlash('The user details has been saved','default',array('class'=>'success'));
				$this->redirect(array('controller'=>'Users','action' => 'index'));
			}
			elseif($this->User->save($this->request->data)and($this->request->data['User']['system_group_id']==2)){
				$email = $this->User->find('list',array('fields'=>array('email_address'),'conditions'=>array('User.ecnumber'=>$this->request->data['User']['ecnumber'])));
				
				if(!empty($email)){
						foreach($email as $email_adr){
								$email_addr=$email_adr;
				  if(!empty($email_addr)){
					  $message = "Attention New User: \n\n A new account has been created for u on ZBC Management System:\n\n 
					
					Username:$ecnumber \n\n
					Password: $ecnumber \n\n
					Click the link below to access the system \n\n
					Regards,\n\n
					ZBC Management System http://192.168.0.1/booking";
					$email = new CakeEmail();
					$email->config('smtp');
					$email->to($email_addr)
							->subject('New Account')
							->send($message);
							}
									}
									}
			$this->Session->setFlash('The user details has been saved','default',array('class'=>'success'));
			$email=$this->request->data['User']['email_address'];
			$this->set(compact('email','departments'));
				$this->redirect(array('controller'=>'Users','action' => 'add'));
			}
			else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		 //Superuser 
		 /*  if($system_group_id == 1){
			//$systemGroups = $this->User->SystemGroup->find('list',array('fields'=>array('id','account_type_name'),'conditions'=>array('SystemGroup.id'=>array(2,4))));
			$systemGroups = $this->User->SystemGroup->find('list',array('fields'=>array('id','account_type_name')));
		   }
		   //Security Head
		   if($system_group_id == 2){
			$systemGroups = $this->User->SystemGroup->find('list',array('fields'=>array('id','account_type_name'),'conditions'=>array('SystemGroup.id'=>3)));
		   }*/
		   $systemGroups = $this->User->SystemGroup->find('list',array('fields'=>array('id','account_type_name')));
		$this->set(compact('systemGroups'));
	}

	
	//Forgot password action
 function forgetpwd(){
        //$this->layout="signup";
        $this->User->recursive=-1;
        if(!empty($this->data))
        {
            if(empty($this->data['User']['email']))
            {
                $this->Session->setFlash('Please Provide Your Email Adress that You used to Register with Us');
            }
            else
            {
                $email=$this->data['User']['email'];
                $fu=$this->User->find('first',array('conditions'=>array('User.email_address'=>$email)));
                if($fu)
                {
                    //debug($fu);
                    if($fu['User']['status'])
                    {
                        $key = Security::hash(String::uuid(),'sha512',true);
                        $hash=sha1($fu['User']['username'].rand(0,100));
                        $url = Router::url( array('controller'=>'users','action'=>'reset'), true ).'/'.$key.'#'.$hash;
                        $ms=$url;
                        $ms=wordwrap($ms,1000);
                        //debug($url);
                        $fu['User']['tokenhash']=$key;
                        $this->User->id=$fu['User']['id'];
                        if($this->User->saveField('tokenhash',$fu['User']['tokenhash'])){
 
                            //============Email================//
                            /* SMTP Options */
                            $this->Email->smtpOptions = array(
                                'port'=>'25',
                                'timeout'=>'30',
                                'host' => '10.17.0.2',
                               // 'username'=>'accounts+example.com',
                               // 'password'=>'your password'
							   'log' => false
                                  );
                              $this->Email->template = 'resetpw';
                            $this->Email->from    = 'ZBC Management System <nonreply@zbc.co.zw>';
                            $this->Email->to      = $fu['User']['username'].'<'.$fu['User']['email_address'].'>';
                            $this->Email->subject = 'Reset Your ZBC Management System Password';
                            $this->Email->sendAs = 'both';
 
                                $this->Email->delivery = 'smtp';
                                $this->set('ms', $ms);
                                $this->Email->send();
                                $this->set('smtp_errors', $this->Email->smtpError);
                            $this->Session->setFlash(__('Check Your Email To Reset your password', true));
							$this->redirect(array('controller'=>'users','action'=>'login'));
 
                            //============EndEmail=============//
                        }
                        else{
                            $this->Session->setFlash("Error Generating Reset link");
                        }
                    }
                    else
                    {
                        $this->Session->setFlash('This Account is not Active yet.Check Your mail to activate it');
                    }
                }
                else
                {
                    $this->Session->setFlash('Email does Not Exist');
                }
            }
        }
    }
	
	//Reset password action
	function reset($token=null){
        //$this->layout="Login";
		
        $this->User->recursive=-1;
        if(!empty($token)){
            $u=$this->User->findBytokenhash($token);
			//debug($u);die();
            if($u){
                $this->User->id=$u['User']['id'];
                if(!empty($this->data)){
                    $this->User->data=$this->data;
                    $this->User->data['User']['username']=$u['User']['username'];
                    $new_hash=sha1($u['User']['username'].rand(0,100));//created token
                    $this->User->data['User']['tokenhash']=$new_hash;
                    if($this->User->validates(array('fieldList'=>array('password','password_confirm')))){
                        if($this->User->save($this->User->data))
                        {
                            $this->Session->setFlash('Password Has been Updated');
                            $this->redirect(array('controller'=>'users','action'=>'login'));
                        }
 
                    }
                    else{
 
                        $this->set('errors',$this->User->invalidFields());
                    }
                }
            }
            else
            {
                $this->Session->setFlash('Token Corrupted,,Please Retry.the reset link work only for once.');
            }
        }
 
        else{
            $this->redirect('/');
        }
    }
	
/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
		//user logged in
		$current_user['username'] = $this->Session->read('Auth.User.username');
		$system_group= $this->User->find('list',array('fields'=>array('system_group_id'),'conditions'=>array('User.username'=>$current_user['username'])));
		//user system group
			foreach($system_group as $sys_group){
			$system_group_id= $sys_group;
			
			}
		//if superuser
		 /*  if($system_group_id == 1){
			//$systemGroups = $this->User->SystemGroup->find('list',array('fields'=>array('id','account_type_name'),'conditions'=>array('SystemGroup.id'=>array(1,2,4))));
			$systemGroups = $this->User->SystemGroup->find('list',array('fields'=>array('id','account_type_name')));
		   }
		   //if its admin
		   if($system_group_id == 2){
			$systemGroups = $this->User->SystemGroup->find('list',array('fields'=>array('id','account_type_name'),'conditions'=>array('SystemGroup.id'=>array(2,3))));
		   }*/
		   $systemGroups = $this->User->SystemGroup->find('list',array('fields'=>array('id','account_type_name')));
		$this->set(compact('system_group_id','systemGroups'));
	}
	 //Fuction to change Admin password
	function admin_password() {

				$username=$this->Session->read('Auth.User.username');
         if ($this->request->is('post') || $this->request->is('put') ){

                        $id = $this->User->find('list',array('conditions'=>array('username'=>$username)));
						 $uid = $this->User->findById($id);
					 $old = AuthComponent::password($this->data['User']['old_password']);


                    if($old!= $uid['User']['password'] )
                       {
                                $this->Session->setFlash("Old password incorrect");
                        }
                        else if($this->data['User']['new_password'] != $this->data['User']['confirm_password'] or empty($this->data['User']['new_password']) ) {
                                $this->Session->setFlash("Password mismatch");
                        }
                  else {
              $this->User->id = $id ;
              foreach($id as $reg){
		       $no=$reg;
		        }

               $this->User->id = $no ;
                    $this->User->saveField('password',($this->data['User']['new_password']));

							 $this->Session->setFlash("Password updated",'default',array('class' => 'success'));
                                        $this->redirect(array('controller'=>'Users','action'=>'home_reports'));
                                }
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
