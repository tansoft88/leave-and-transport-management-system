<div class="staffDetails form">

<?php echo $this->Form->create('StaffDetail', array('action' => 'register_stud'));?>
	<fieldset>
		<legend><?php echo __('Fill Your Details To Create Account'); ?></legend>
	<?php
		    
			echo "<br />";
			echo $this->Form->input('StaffDetail.title',  array('label' =>'Title','class' => 'title',
			'options' => array('empty'=>'Please Select','Dr'=>'Dr','Eng'=>'Eng','Miss'=>'Miss','Mr'=>'Mr','Mrs'=>'Mrs','Ms'=>'Ms','Pastor'=>'Pastor','Prof'=>'Prof','Rev'=>'Rev','Sr'=>'Sr'),
					));
			echo "<br />";
			echo $this->Form->label('Firstname');
			echo $this->Form->input('firstname', array('label' =>'<font color="red">*</font>','size'=>40));
			echo "<br />";
			echo $this->Form->label('Surnname');
			echo $this->Form->input('surname', array('label' =>'<font color="red">*</font>','size'=>40));
			echo "<br>";			
			echo $this->Form->label('ID Number');
			echo $this->Form->input('id_number', array('label' =>'<font color="red">*</font>','size'=>40));
		    echo "<br />";
			echo $this->Form->label('EC Number');
			echo $this->Form->input('ec_number', array('label' =>'<font color="red">*</font>','size'=>40));
		    echo "<br />";
			echo $this->Form->label('Designation');
			echo $this->Form->input('designation', array('label' =>'<font color="red">*</font>','size'=>40));
		    echo "<br />";
			echo $this->Form->label('Department');
			echo $this->Form->select('department_code',$dptmnts,array('empty'=>'--Please Select--','selected'=>false));
			echo "<br />";
			echo "<br />";
			echo $this->Form->label('Mobile Number');
			echo $this->Form->input('mobile', array('label' =>'<font color="red">*</font>','size'=>40));
			echo "<br />";			
			echo $this->Form->label('Email Address');
			echo $this->Form->input('email_address', array('label' =>'<font color="red">*</font>','size'=>40));
			echo "<br />";
			
			
			
			
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Login'), array('controller'=> 'users', 'action' => 'login')); ?></li>
	</ul>
</div>

