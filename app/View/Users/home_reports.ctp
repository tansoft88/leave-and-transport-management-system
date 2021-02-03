<?php if($current_user['system_group_id']==1){ //HR Admin?>
<?php if($x != 0){ ?>
		<fieldset>
		<b><font color="red"><?php echo __($x. '   PENDING APPLICATION(S) TO BE APPROVED OR DISAPPROVED' ); ?></font></b>
		</fieldset>
		<?php } ?>
<fieldset>
		<h3><legend><b><?php echo __('Reports'); ?></b></legend></h3>
				
<fieldset>
<ul>

		<h4><?php echo __('Leave Reports'); ?></h4>
		<li><?php echo $this->Html->link(__('Main Report'), array('controller'=>'StaffDetails','action' => 'main_report')); ?></li>
		<li><?php echo $this->Html->link(__('Leave Application Statistics'), array('controller'=>'StaffDetails','action' => 'admin_leave_index')); ?></li>
		<li><?php echo $this->Html->link(__('Staff Leave Applications'), array('controller'=>'StaffDetails','action' => 'staff_leave')); ?></li>
    	<h4><?php echo __('Transport Reports'); ?></h4>		
		<li><?php echo $this->Html->link(__('Staff who booked per specific date'), array('controller'=>'StaffDetails','action' => 'dptmnt_studs'));  ?></li>



</ul>
</fieldset>
</fieldset>
<?php }?>
<?php if($current_user['system_group_id']==2){ //?>
</br>
<fieldset>
		<legend><b><?php echo __('Reports'); ?></b></legend>
		<br />
	
<ul><h3>
		<li><?php echo $this->Html->link(__('Staff Statistics'), array('controller'=>'CheckinOutLogs','action' => 'search_staff_logs'));  ?></li>
		<li><?php echo $this->Html->link(__('Departments'), array('controller'=>'Departments','action' => 'index'));  ?></li>
		<li><?php echo $this->Html->link(__('Users'), array('controller'=>'Users','action' => 'index'));  ?></li>
	
      </h3>
</ul>
</fieldset>
<?php }?>
<?php if($current_user['system_group_id']==5){ // Department Supervisor?>
</br>
<fieldset>
		<legend><b><?php echo __('Reports'); ?></b></legend>
		<br />
	
	
<ul><h3>
		<li><?php echo $this->Html->link(__('Approve Leave Application'), array('controller'=>'StaffDetails','action' => 'supervisor_search'));  ?></li>
		<li><?php echo $this->Html->link(__('View Staff Leave Applications'), array('controller'=>'StaffDetails','action' => 'supervisor_view_leave'));  ?></li>
	
      </h3>
</ul>
</fieldset>
<?php }?>
<?php if($current_user['system_group_id']==3){ //?>
<fieldset>
		<legend><b><?php echo __('Reports'); ?></b></legend>
				
<ul><h3>
		<li><?php echo $this->Html->link(__('View Booking History'), array('controller'=>'StaffDetails','action' => 'index_books'));  ?></li>
		<li><?php echo $this->Html->link(__('View Leave Applications'), array('controller'=>'StaffDetails','action' => 'index_leave'));  ?></li>
		
		
		</h3>
</ul>
</fieldset>
<?php }?>
<?php if($current_user['system_group_id']==4){ // check in and out user?>
<fieldset>
		<legend><b><?php echo __('Reports'); ?></b></legend>
		<br />
	
</fieldset>
<?php }?>