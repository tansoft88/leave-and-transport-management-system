<div class="staffDetails form">

<?php echo $this->Form->create('StaffDetail', array('action' => 'book'));?>
	<fieldset>
		<legend><?php echo __('Fill Your Details To Book'); ?></legend>
	<?php
		    
			
			echo "<br />";
			echo $this->Form->label('Picking Venue');
			echo $this->Form->input('pick_venue', array('label' =>'<font color="red">*</font>','size'=>40));
			echo "<br />";
			echo $this->Form->label('Picking Time');
			echo $this->Form->input('pick_time', array('label' =>'<font color="red">*</font>','size'=>40));
			echo "<br />";
			echo $this->Form->label('Route');
			echo $this->Form->select('route',$routes,array('empty'=>'--Please Select--','selected'=>false));
			echo "<br />";
			echo "<br />";
						
			$options = array(
					'label'=>'',
					'type'=>'date',
					'separator'=>'-'
					);
			echo $this->Form->label('Booking Date');
			echo $this->Form->input('pick_date',$options,array('label'=>false));
			echo "<br>";		    
				
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>



