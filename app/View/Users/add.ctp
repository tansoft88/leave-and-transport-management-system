<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><h3><?php echo __('Add User'); ?></h3></legend>
	<?php
		echo $this->Form->input('ecnumber',array('size'=>60));
		echo "<br>";
		echo $this->Form->input('account_status', array(
                                  'type'=>'checkbox', 
                                  'label'=>'Account Active?'
                                  ));
								  echo "<br>";
		echo $this->Form->input('system_group_id');echo "<br>";
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List System Groups'), array('controller' => 'system_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New System Group'), array('controller' => 'system_groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
