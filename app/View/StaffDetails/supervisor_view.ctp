	  <legend><b><?php echo __('Staff Details'); ?></b></legend>
<table border ="-10" %  cellpadding="2" cellspacing="2">
<tr>
       <th width="18%" style="white-space:nowrap;"><?php echo __('Ecnumber'); ?></th>
       <th width="18%" style="white-space:nowrap;"><?php echo __('Firstname'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Surname'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Designation'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Mobile'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Email'); ?></th>
</tr>
<?php for($i=0; $i < sizeof($staffData); $i++){ ?>
<tr>
    <td><?php echo $staffData[$i]['StaffDetail']['ecnumber'] ?></td>
   	<td><?php echo $staffData[$i]['StaffDetail']['firstname'] ?></td>
	<td><?php echo $staffData[$i]['StaffDetail']['lastname'] ?></td>
	<td><?php echo $staffData[$i]['StaffDetail']['designation'] ?></td>
	<td><?php echo $staffData[$i]['StaffDetail']['mobile'] ?></td>
	<td><?php echo $staffData[$i]['StaffDetail']['email_address'] ?></td>
</tr>
<?php }?>
</table>