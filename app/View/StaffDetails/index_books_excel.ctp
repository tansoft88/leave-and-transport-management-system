

<h2><?php echo __($title. '    '.$fname.'    '.$sname ); ?></h2>
<table width="50%" border="1" align= "center">
	<tr>
       <th width="18%" style="white-space:nowrap;"><?php echo __('Booking Date'); ?></th>
       <th width="18%" style="white-space:nowrap;"><?php echo __('Picking Time'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Picking Venue'); ?></th>
   </tr>
<?php 

for($i=0; $i < sizeof($bookData); $i++ ){?>
<tr>
	<td><?php echo $bookData[$i]['Booking']['pick_date'] ?></td>
	<td><?php echo $bookData[$i]['Booking']['pick_time'] ?></td>	
	<td><?php echo $bookData[$i]['Booking']['pick_venue'] ?></td>	
	<?php } ?>
  </table> 
  
  
  