
<h2><?php echo __('Leave Applications Details');?></h2>
<?php echo "<br />";	
 echo $this->Form->create('StaffDetails',array('action' => 'admin_leave_ndex_excel'));
//echo $this->Form->input('ecnumber',array('type'=>'hidden','value'=>$ecnumber));
 /*echo $this->Form->input('kaYrFrm',array('type'=>'hidden','value'=>$kaYrFrm));
 echo $this->Form->input('kaMnthFrm',array('type'=>'hidden','value'=>$kaMnthFrm));
 */
 echo $this->Form->end('Download Excel Of The Report'); 
 echo "<br />"; 
	?>

<table width="50%" border="1" align= "center">
	<tr>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Title'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Firstname'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Surname'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('EC Number'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Designation'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Department'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Total Days Accrued'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Days Taken'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Balance'); ?></th>

   </tr>
<?php 

for($i=0; $i < sizeof($data); $i++ ){?>
<tr>		
	<td><?php echo $data[$i]['staffData']['StaffDetail']['title'] ?></td>
	<td><?php echo $data[$i]['staffData']['StaffDetail']['firstname'] ?></td>
	<td><?php echo $data[$i]['staffData']['StaffDetail']['lastname'] ?></td>
	<td><?php echo $data[$i]['staffData']['StaffDetail']['ecnumber'] ?></td>
	<td><?php echo $data[$i]['staffData']['StaffDetail']['designation'] ?></td>
	<td><?php echo $data[$i]['staffData']['StaffDetail']['department_code'] ?></td>
	<td><?php echo $data[$i]['daysInfo']['LeaveDaysStat']['accruals_days'] ?></td>
	<td><?php echo $data[$i]['daysInfo']['LeaveDaysStat']['days_taken'] ?></td>
	<td><?php echo $data[$i]['daysInfo']['LeaveDaysStat']['days_left'] ?></td>
    
		
	
	<?php } ?>
  </table> 
  
  
  