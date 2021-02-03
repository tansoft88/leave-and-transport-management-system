  <html>
    <head>
        <script src="../js/jquery.js" type="text/javascript"></script>
        <script src="../js/jquery.validate.js" type="text/javascript"></script>
    </head>

  
 

<?php if(isset($data)){
echo "<br />";
	?>
   
	
	<legend><b><?php echo __($route); ?></b></legend>
	<legend><b><?php echo __($booking_date.'   BOOKINGS' ); ?></b></legend>
	
	&nbsp;
	<table width="50%" border="1" align= "center">
	<tr>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Title'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Firstname'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Lastname'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Mobile'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Department'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Picking Time'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Picking Venue'); ?></th>
	</tr>
	
<?php for($i=0; $i < sizeof($data); $i++ ){?>
<tr>
	<td><?php echo $data[$i]['staffData']['StaffDetail']['title'] ?></td>	
	<td><?php echo $data[$i]['staffData']['StaffDetail']['firstname'] ?></td>	
	<td><?php echo $data[$i]['staffData']['StaffDetail']['lastname'] ?></td>	
	<td><?php echo "0".$data[$i]['staffData']['StaffDetail']['mobile'] ?></td>	
	<td><?php echo $data[$i]['staffData']['StaffDetail']['department_code'] ?></td>	
	<td><?php echo $data[$i]['bookData']['Booking']['pick_time'] ?></td>	
	<td><?php echo $data[$i]['bookData']['Booking']['pick_venue'] ?></td>	

	</tr>
	<?php
	    }
	 ?> 
</table>	 
</fieldset>&nbsp;
<br />
	<?php				
	}	
	?>