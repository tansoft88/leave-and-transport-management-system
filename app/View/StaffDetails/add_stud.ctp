<div class="staffDetails form">

<?php echo $this->Form->create('StaffDetail', array('type' => 'file'));?>
	<fieldset>
		<legend><?php echo __('Add Student Detail'); ?></legend>
	<?php
		    echo "<br />";
			echo $this->Form->label('Firstname');
			echo $this->Form->input('firstname', array('label' =>'<font color="red">*</font>','size'=>40));
			echo "<br />";
			echo $this->Form->label('Surnname');
			echo $this->Form->input('surname', array('label' =>'<font color="red">*</font>','size'=>40));
		    echo "<br />";
			echo "<br><b>";
		echo $this->Form->label('Upload Assignment');
		echo "<br>";
		echo "</b><br><br>";
		echo $this->Form->input('Browse_File', array('type' => 'file'));
		echo "<br>";
			echo "<br />";
			//echo $this->Form->label('Programme');
			//echo $this->Form->input('programme', array('label' =>'<font color="red">*</font>','size'=>40));
		   // echo "<br />";
			echo $this->Form->input('StaffDetail.title',  array('label' =>'Title','class' => 'title',
			'options' => array('empty'=>'Please Select','Dr'=>'Dr','Eng'=>'Eng','Miss'=>'Miss','Mr'=>'Mr','Mrs'=>'Mrs','Ms'=>'Ms','Pastor'=>'Pastor','Prof'=>'Prof','Rev'=>'Rev','Sr'=>'Sr'),
					));
			echo "<br />";
			echo "<br />";
			$options = array(
					'label'=>'',
					'type'=>'date',
					'separator'=>'-'
					);
			echo $this->Form->label('Assignment Start Date');
			echo $this->Form->input('from_date',$options,array('label'=>false));
			echo "<br />";
			echo $this->Form->label('Assignment End Date');
			echo $this->Form->input('to_date',$options,array('label'=>false));
			echo "<br>";
			echo "<br>";
			
			echo $this->Form->label('ID Number');
			echo $this->Form->input('id_number', array('label' =>'<font color="red">*</font>','size'=>40));
		    echo "<br />";
		    echo "<br />";
			echo $this->Form->label('Department');
			echo $this->Form->select('department_code',$dptmnts,array('empty'=>'--Please Select--','selected'=>false));
			echo "<br />";
			echo "<br />";
		   	echo $this->Form->label('Programme');
			echo $this->Form->input('programme', array('label' =>'<font color="red">*</font>','size'=>40));
			//echo $this->Form->select('programme_code',$progs,array('empty'=>'--Please Select--','selected'=>false));
			echo "<br />";	
			echo "<br />";			
			echo $this->Form->label('Mobile Number');
			echo $this->Form->input('mobile', array('label' =>'<font color="red">*</font>','size'=>40));
			echo "<br />";
			
			echo $this->Form->label('Home Address');
			echo $this->Form->input('home_address', array('label' =>'<font color="red">*</font>','size'=>40));
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
		<li><?php echo $this->Html->link(__('List Students'), array('action' => 'index_stud')); ?></li>
	</ul>
</div>

