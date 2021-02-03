<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><h2><?php echo __('Edit User'); ?></h2></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('email_address',array('readonly'=>'readonly')); echo "<br>";
		echo $this->Form->input('password'); echo "<br>";
		echo $this->Form->input('account_status', array(
                                  'type'=>'checkbox', 
                                  'label'=>'Account Active?'));echo "<br>";
		echo $this->Form->input('system_group_id');echo "<br>";
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Quick Links'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index'));?></li>
		<?php if($system_group_id == 3){ ?>
		<li><?php echo $this->Html->link(__('List System Groups'), array('controller' => 'system_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New System Group'), array('controller' => 'system_groups', 'action' => 'add')); ?> </li>
		<?php } ?>
	</ul>
</div>
