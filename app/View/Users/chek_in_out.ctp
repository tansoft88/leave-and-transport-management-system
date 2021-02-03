	
	<fieldset>
	
	<h4><?php echo $this->Html->link(__('Home'), array('controller'=>'Users','action' => 'home_reports')); ?>||
		<?php echo $this->Html->link(__('Manage Users'), array('controller'=>'users','action' => 'index')); ?>||
		<?php echo $this->Html->link(__('Manage Staff'), array('controller'=>'staff_details','action' => 'index')); ?>||
		<?php echo $this->Html->link(__('Systems Groups'), array('controller'=>'system_groups','action' => 'index')); ?>||
		<?php echo $this->Html->link(__('Change Password'), array('controller'=>'users','action' => 'admin_password')); ?>
	     </h4></fieldset>