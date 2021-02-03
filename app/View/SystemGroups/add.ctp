
<?php echo $this->Form->create('SystemGroup');?>
	<fieldset>
		<legend><b><?php echo __('Add System Group'); ?></b></legend>
	<?php
		echo $this->Form->input('account_type_name',array('size'=>60));
		echo "<br>"; 
		echo $this->Form->input('internal_account',array('label'=>'Internal Account(UZ Staff)'));
		//echo $this->Form->input('created_by');
		//echo $this->Form->input('modified_by');
		//echo $this->Form->input('create_ip');
		//echo $this->Form->input('modify_ip');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List System Groups'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
