
<h2><?php echo __('Staff Details');?></h2>
<table width="50%" border="1" align= "center">
	<tr>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Title'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Firstname'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Lastname'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Mobile'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Department'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Email'); ?></th>
	</tr>
</table>
<?php 
//debug($studData);die();
for($i=0; $i < sizeof($studData); $i++ ){?>
  <table width="50%" border="1" align= "center">
  
	<td><?php echo $studData[$i]['StudentDetail']['title'] ?></td>	
	<td><?php echo $studData[$i]['StudentDetail']['firstname'] ?></td>	
	<td><?php echo $studData[$i]['StudentDetail']['surname'] ?></td>	
	<td><?php echo $studData[$i]['StudentDetail']['mobile'] ?></td>	
	<td><?php echo $studData[$i]['StudentDetail']['department_code'] ?></td>	
	<td><?php echo $studData[$i]['StudentDetail']['email_address'] ?></td>	
 
  </table>
  <?php } ?>