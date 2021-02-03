<?php	echo $this->Form->create('StaffDetail',array('action' => 'supervisor_search'));?>
	<fieldset>
	<legend><b><?php echo __('Staff Leave Application'); ?></b></legend>
	<table>
  <tr><th>
 <?php echo $this->Form->label('Search By:');?>
	</th><td>	
	<?php
	echo $this->Form->input('search',array('label'=>'Ecnumber','AutoComplete'=>'off'));?></td><td><?php
	//echo $this->Form->input('entryID',array('type'=>'hidden','value'=>$entryID));
	echo $this->Form->end(__('Search')); ?> </td></tr></table>
	
	 <br />
	 <br />
	 <?php
	 if(isset($leaveData)){
	 ?>
	  <legend><b><?php echo __('Staff Details'); ?></b></legend>
<table border ="-10" %  cellpadding="2" cellspacing="2">
<tr>
       <th width="18%" style="white-space:nowrap;"><?php echo __('Title'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Firstname'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Surname'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Designation'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Department'); ?></th>
</tr>
<tr>
    <td><?php echo $staffData['StaffDetail']['title'] ?></td>
	<td><?php echo $staffData['StaffDetail']['firstname'] ?></td>
	<td><?php echo $staffData['StaffDetail']['lastname'] ?></td>
	<td><?php echo $staffData['StaffDetail']['designation'] ?></td>
	<td><?php echo $staffData['StaffDetail']['department_code'] ?></td>
</tr>
</table>
<br />
<br />


 <legend><b><?php echo __('Leave Application Details'); ?></b></legend>
<table border ="-10" %  cellpadding="2" cellspacing="2">
	<tr>
	 
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Application Date'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Aproved'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Days Applied'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Balance'); ?></th>
       <th width="18%" style="white-space:nowrap;"><?php echo __('Leave From'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Leave To'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Leave Address'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Leave Type'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Approve'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('DisApprove'); ?></th>
   </tr>
   <?php 

for($i=0; $i < sizeof($leaveData); $i++ ){?>
<tr>		
	<td><?php echo $leaveData[$i]['LeaveApplication']['application_date'] ?></td>
	<td><?php 	
	if($leaveData[$i]['LeaveApplication']['approved'] == 0){
	$n = "NO";
	echo $n;
	}
	if($leaveData[$i]['LeaveApplication']['approved'] == 1){
	$sa = "SUPERVISOR APPROVED";
	echo $sa;
	}
	if($leaveData[$i]['LeaveApplication']['approved'] == 2){
	$sda = "SUPERVISOR DISAPPROVE";
	echo $sda;
	}
	if($leaveData[$i]['LeaveApplication']['approved'] == 3){
	$hra = "HR APPROVE";
	echo $hra;
	}
	if($leaveData[$i]['LeaveApplication']['approved'] == 4){
	$hrda = "HR DISAPPROVE";
	echo $hrda;
	}
	?></td>
	<td><?php echo $leaveData[$i]['LeaveApplication']['days_applied'] ?></td>
	<td><?php echo $leaveAcrualsStats['LeaveDaysStat']['days_left'] ?></td>
	<td><?php echo $leaveData[$i]['LeaveApplication']['leave_start_date'] ?></td>	
	<td><?php echo $leaveData[$i]['LeaveApplication']['leave_end_date'] ?></td>	
	<td><?php echo $leaveData[$i]['LeaveApplication']['leave_address'] ?></td>	
	<td><?php echo $leaveData[$i]['LeaveApplication']['type_leave'] ?></td>	
	<td><?php echo $this->Html->link('Approve', array('controller' => 'staff_details', 'action' => 'department_approve', $leaveData[$i]['LeaveApplication']['ec_number'],$leaveData[$i]['LeaveApplication']['id'])); ?></td>
	<td><?php echo $this->Html->link('DisApprove', array('controller' => 'staff_details', 'action' => 'department_disapprove_leave', $leaveData[$i]['LeaveApplication']['ec_number'],$leaveData[$i]['LeaveApplication']['id'])); ?></td>
	
	<?php } ?>
		
		
</tr>
	</table>
	
<?php } ?>