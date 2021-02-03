<div class="staffDetails form">

<?php echo $this->Form->create('StaffDetail', array('action' => 'apply_leave'));?>
	<fieldset>
		<legend><h2><b><?php echo __('Fill Your Details To Apply Leave'); ?></b></h2></legend>
		<fieldset>
	<?php
					echo "<br />";	
		        	$options = array(
					'label'=>'',
					'type'=>'date',
					'separator'=>'-'
					);
					echo "<b>";
			echo $this->Form->label('Leave Start Date');
			echo $this->Form->input('start_date',$options,array('label'=>false));
			
			echo "<br />";	
			echo $this->Form->label('Leave End Date');
			echo $this->Form->input('end_date',$options,array('label'=>'<font color="black">Leave End Date</font>'));
			echo "<br />";
			// echo $this->Form->label('Days Encashed');
			echo $this->Form->input('encashed', array('label' =>'<font color="black">Days Encashed  </font>','size'=>20));
			echo "</b>";			
			?>
			<br />
			<?php
		
			echo "<b>";
			echo $this->Form->input('StaffDetail.type_leave',  array('label' =>'Type of Leave','class' => 'title',
			'options' => array('empty'=>'Please Select','Vacation Leave'=>'Vacation','Sick Leave'=>'Sick','Maternity Leave'=>'Maternity','Territorial Leave'=>'Territorial','Unpaid Leave'=>'Unpaid','Study Leave'=>'Study','Special Leave'=>'Special'),
					));
			echo "<br />";
			echo "<b>";
			echo $this->Form->input('StaffDetail.attach_cert',  array('label' =>'Medical Certificate Attached','class' => 'title',
			'options' => array('empty'=>'Please Select','YES'=>'YES','NO'=>'NO'),
					));
			echo "<br />";
			echo "<b>";
			echo $this->Form->input('StaffDetail.salary_paid',  array('label' =>'Salary Paid in Advance','class' => 'title',
			'options' => array('empty'=>'Please Select','YES'=>'YES','NO'=>'NO'),
					));
			echo "<br />";
			echo "<b>";
			//echo $this->Form->label('Address On Leave');
			echo $this->Form->input('leave_address', array('label' =>'<font color="black">Address On Leave</font>','size'=>60));
			echo "<br />";
			echo "<b>";
			//echo $this->Form->label('Address On Leave');
			echo $this->Form->input('leave_reason', array('label' =>'<font color="black">Reason for special leave</font>','size'=>60));
			echo "</b>";
			echo "</b>";
			?>
			</fieldset>
			<?php
				
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>



