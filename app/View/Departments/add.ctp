<div class="departments form">
<?php echo $this->Form->create('Department');?>
	<fieldset>
		<legend><?php echo __('Add Department'); ?></legend>
	<?php
			
		echo "<br>";
			echo $this->Form->label('Department Code');
			echo $this->Form->input('code', array('before'=>'<br />','label' =>'<font color="red">*</font>','size'=>60));
		echo "<br>";
			echo $this->Form->label('Department Name');
			echo $this->Form->input('name', array('before'=>'<br />','label' =>'<font color="red">*</font>','size'=>60));
		echo "<br>";
			echo $this->Form->label('Faculty Code');
			echo $this->Form->input('faculty_code', array('before'=>'<br />','label' =>'<font color="red">*</font>','size'=>60));
		echo "<br>";
			echo $this->Form->label('Employee Turnover');
			echo $this->Form->input('employee_turnover', array('before'=>'<br />','label' =>'<font color="red">*</font>','size'=>60));
		
		
		
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Departments'), array('action' => 'index'));?></li>
	</ul>
</div>
