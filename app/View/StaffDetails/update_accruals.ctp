<div class="staffDetails form">

<?php echo $this->Form->create('StaffDetail', array('action' => 'update_accruals'));?>
	<fieldset>
		<legend><?php echo __('Update Leave Accruals'); ?></legend>
	
	<h2><?php echo __('Run it once every month to update monthly accruals for each staff member');?></h2>
	
	</fieldset>
<?php echo $this->Form->end(__('Click Here To Run Accruals'));?>
</div>



