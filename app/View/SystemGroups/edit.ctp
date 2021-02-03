<div class="systemGroups form">
<?php echo $this->Form->create('SystemGroup');?>
	<fieldset>
		<legend><?php echo __('Edit System Group'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('account_type_name');
		echo $this->Form->input('internal_account');
		echo $this->Form->input('created_by');
		echo $this->Form->input('modified_by');
		echo $this->Form->input('create_ip');
		echo $this->Form->input('modify_ip');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('SystemGroup.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('SystemGroup.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List System Groups'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
