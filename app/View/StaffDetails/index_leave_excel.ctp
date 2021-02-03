<br />
<h2><?php echo __($name ."  " .$sname);?></h2>
<?php echo __('Leave Applications Details');?>
<br />
<br />

<table width="50%" border="1" align= "center">
	<tr>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Application Date'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Days Applied'); ?></th>
       <th width="18%" style="white-space:nowrap;"><?php echo __('Leave From'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Leave To'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Address On Leave'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Type of Leave'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Certificates'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Encashed'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Advance Salary'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Approved'); ?></th>
   </tr>
<?php 

for($i=0; $i < sizeof($leaveData); $i++ ){?>
<tr>		
	<td><?php echo $leaveData[$i]['LeaveApplication']['application_date'] ?></td>
	<td><?php echo $leaveData[$i]['LeaveApplication']['days_applied'] ?></td>
	<td><?php echo $leaveData[$i]['LeaveApplication']['leave_start_date'] ?></td>	
	<td><?php echo $leaveData[$i]['LeaveApplication']['leave_end_date'] ?></td>	
	<td><?php echo $leaveData[$i]['LeaveApplication']['leave_address'] ?></td>	
	<td><?php echo $leaveData[$i]['LeaveApplication']['type_leave'] ?></td>	
	<td><?php echo $leaveData[$i]['LeaveApplication']['attach_cert'] ?></td>	
	<td><?php echo $leaveData[$i]['LeaveApplication']['encashed'] ?></td>	
	<td><?php echo $leaveData[$i]['LeaveApplication']['salary_paid'] ?></td>	
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
	<?php } ?>
  </table> 
  
  
  