<?php
/*
  default.thtml design for CakePHP (http://www.cakephp.org)
  ported from http://www.oswd.org/ (open source template)
  
  The designs distributed at OSWD each carry their own seperate
  open source license which is chosen by the designer 
  when it is submitted to the site.
  
  ported by Shunro Dozono (dozono :@nospam@: gmail.com)
  2006/7/10
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php echo $this->Html->charset('UTF-8')?>
<meta name="description" content="_your description goes here_" />
<meta name="keywords" content="_your,keywords,goes,here_" />
<meta name="author" content="Taurai Mutero" />
<?php echo $this->Html->css('cake.forms', 'stylesheet', array("media"=>"all" ));?>
<?php echo $this->Html->css('andreas02', 'stylesheet', array("media"=>"screen" ));?>
<?php echo $this->Html->css('andreas02_print', 'stylesheet', array("media"=>"print" ));?>
<title>ZBC MANAGEMENT SYSTEM:: <?php echo $title_for_layout?></title>
</head>

<body>
<div id="toptabs">
</div>
	<div id="container">
	<div id="logo">
</div>						
<div id="desc">

</div>
<div class="left_links">
    <p>&nbsp;</p>
    <p><span class="news_title"></span><br />
<ul>
		<?php if($current_user['system_group_id']==3){ //Staff
		
		?>
		<h4><?php echo $this->Html->link(__('Home'), array('controller'=>'Users','action' => 'index_reports')); ?>||
		<?php echo $this->Html->link(__('Book Transport'), array('controller'=>'staff_details','action' => 'book')); ?>||
		<?php echo $this->Html->link(__('Apply Leave'), array('controller'=>'staff_details','action' => 'apply_leave')); ?>||
		<?php echo $this->Html->link(__('Change Password'), array('controller'=>'users','action' => 'admin_password')); ?>||
		</h4>
		<?php }?>	
		</ul>
		
		
		
		<ul>
		<?php if($current_user['system_group_id']==5){ // departmental supervisor ?>
		<h4><?php echo $this->Html->link(__('Home'), array('controller'=>'Users','action' => 'index_reports')); ?>||
		<?php echo $this->Html->link(__('View Staff'), array('controller'=>'staff_details','action' => 'supervisor_view')); ?>||
		<?php echo $this->Html->link(__('Approve Leave Application'), array('controller'=>'staff_details','action' => 'supervisor_search')); ?>||
		<?php echo $this->Html->link(__('Change Password'), array('controller'=>'users','action' => 'admin_password')); ?>
		</h4>
			<?php }?>	
		</ul>


<ul>
		<?php if($current_user['system_group_id']==1){    //HR Admin ?>
		<h4>
		<?php echo $this->Html->link(__('Home'), array('controller'=>'Users','action' => 'home_reports')); ?>||
		<?php // echo $this->Html->link(__('Enter Leave Details'), array('controller'=>'StaffDetails','action' => 'enter_leave')); ?>
		<?php echo $this->Html->link(__('Approve Leave'), array('controller'=>'StaffDetails','action' => 'user_search')); ?>||
		<?php echo $this->Html->link(__('Update Accruals'), array('controller'=>'StaffDetails','action' => 'update_accruals')); ?>||
		<?php // echo $this->Html->link(__('Accruals'), array('controller'=>'StaffDetails','action' => 'update_accruals2')); ?>
		<?php echo $this->Html->link(__('Change Password'), array('controller'=>'users','action' => 'admin_password')); ?>
	     </h4>
		
		<?php }?>	
		</ul>
		<ul>
		<?php if($current_user['system_group_id']==4){?>
		<h4>
		<?php echo $this->Html->link(__('Check IN/OUT'), array('controller'=>'CheckinOutLogs','action' => 'choose_type')); ?>||
		<?php echo $this->Html->link(__('Change Password'), array('controller'=>'users','action' => 'admin_password')); ?>
		
		
		 </h4>
		<?php }?>	
		</ul>
		
			</div>
		<div id="header">
			</div>
		<div id="content">
			<div style = "text-align: right;">
				<?php if($logged_in) {?>
				Welcome <?php echo $current_user['username'];?>.<?php echo $this->Html->link('Logout',array('controller'=>'users','action'=>'logout'));?>
				<?php } else {
					} ?>
			</div>
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->Session->flash('auth'); ?>

			<?php  echo $this->fetch('content'); ?>
		</div>		
</div>
</body>
<div id="footer">

<?php
	if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) echo $this->Js->writeBuffer();
	// Writes cached scripts
	?>
Copyright &copy; <?php echo date('Y'); ?> ZBC MANAGEMENT SYSTEM v1.0.1
</div>

</html>