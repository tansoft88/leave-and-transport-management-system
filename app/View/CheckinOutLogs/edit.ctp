<div class="checkinOutLogs form">
<?php echo $this->Form->create('CheckinOutLog');?>
	<fieldset>
		<legend><?php echo __('Edit Checkin Out Log'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('entry_point_id');
		echo $this->Form->input('ecnumber');
		echo $this->Form->input('time_in');
		echo $this->Form->input('date_in');
		echo $this->Form->input('checkin_user');
		echo $this->Form->input('time_out');
		echo $this->Form->input('date_out');
		echo $this->Form->input('checkout_user');
		echo $this->Form->input('ip_address');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CheckinOutLog.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('CheckinOutLog.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Checkin Out Logs'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('New Checkin Out Logs'), array('action' => 'add'));?></li>
		<li><?php echo $this->Html->link(__('List Entry Points'), array('controller' => 'entry_points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entry Point'), array('controller' => 'entry_points', 'action' => 'add')); ?> </li>
	
	</ul>
</div>
