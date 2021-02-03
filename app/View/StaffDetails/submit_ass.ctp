<div class="staffDetails form">

<?php echo $this->Form->create('StaffDetail', array('type' => 'file'));?>
	<fieldset>
		<legend><?php echo __('Submit Assignment'); ?></legend>
	<?php
		    echo "<br />";
			echo "<br><b>";
		echo $this->Form->label('Upload Assignment');
		echo "<br>";
		echo "</b><br><br>";
		echo $this->Form->input('Browse_File', array('type' => 'file'));
		echo "<br>";
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
			echo "<br />";
			echo $this->Form->label('Category');
			echo $this->Form->select('department_code',$dptmnts,array('empty'=>'--Please Select--','selected'=>false));
			echo "<br />";
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

