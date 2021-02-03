<div class="staffDetails form">
<?php echo $this->Form->create('StaffDetail');?>
	<fieldset>
		<legend><?php echo __('Edit Staff Detail'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('firstname');
		echo $this->Form->input('lastname');
		echo $this->Form->input('title');
		echo $this->Form->input('ecnumber');
		echo $this->Form->input('department_code');
		echo $this->Form->input('physical_address');
		echo $this->Form->input('contact_address');
		echo $this->Form->input('mobile');
		echo $this->Form->input('work_phone');
		echo $this->Form->input('home_phone');
		echo $this->Form->input('email_address');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('StaffDetail.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('StaffDetail.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Staff Details'), array('action' => 'index'));?></li>
	</ul>
</div>
