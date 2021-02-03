<div class="users form">
<?php echo $this->Form->create('CheckinOutLog');?>
	<fieldset>
		<legend><h3><?php echo __('Force Check Out'); ?></h3></legend>
	<?php
			echo $this->Form->label('Reason for not checking out ');
			echo "<br>";
			echo "<br>";
			echo $this->Form->input('check_out_reason', array('label' =>'<font color="red">*</font>','size'=>80));
		
		echo "<br>";
		?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>

