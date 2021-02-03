
<h2><?php echo __('Booking Details');?></h2>
<?php echo "<br />";	
 echo $this->Form->create('StaffDetails',array('action' => 'index_books_excel'));
echo $this->Form->input('ecnumber',array('type'=>'hidden','value'=>$ecnumber));
 /*echo $this->Form->input('kaYrFrm',array('type'=>'hidden','value'=>$kaYrFrm));
 echo $this->Form->input('kaMnthFrm',array('type'=>'hidden','value'=>$kaMnthFrm));
 */
 echo $this->Form->end('Download Excel Of The Report'); 
 echo "<br />"; 
	?>

<table width="50%" border="1" align= "center">
	<tr>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Booking Date'); ?></th>
       <th width="18%" style="white-space:nowrap;"><?php echo __('Picking Time'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Picking Venue'); ?></th>
   </tr>
<?php 

for($i=0; $i < sizeof($studData); $i++ ){?>
<tr>		
	<td><?php echo $studData[$i]['Booking']['pick_date'] ?></td>
	<td><?php echo $studData[$i]['Booking']['pick_time'] ?></td>
	<td><?php echo $studData[$i]['Booking']['pick_venue'] ?></td>	
	<?php } ?>
  </table> 
  
  
  