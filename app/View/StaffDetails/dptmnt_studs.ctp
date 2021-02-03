  <html>
    <head>
        <script src="../js/jquery.js" type="text/javascript"></script>
        <script src="../js/jquery.validate.js" type="text/javascript"></script>
    </head>

  
 
 
<?php	echo $this->Form->create('StaffDetail',array('action' => 'dptmnt_studs'));?>
	<fieldset>
	<legend><b><?php echo __('SEARCH BY DATE'); ?></b></legend>
	<table>
  <tr>	
	<td>	
	<?php 
	       /* echo "<br />";
			echo $this->Form->label('Department');
			echo $this->Form->select('department_code',$dptmnts,array('empty'=>'--Please Select--','selected'=>false));
			echo "<br />";*/
			echo "<br />";
			$options = array(
					'label'=>'',
					'type'=>'date',
					'separator'=>'-'
					);
			echo $this->Form->label('Booking Date');
			echo $this->Form->input('book_date',$options,array('label'=>false));
			echo "<br />";
			echo "<br />";
			echo $this->Form->label('Route');
			echo $this->Form->select('route',$routes,array('empty'=>'--Please Select--','selected'=>false));
			echo "<br />";
	?>
	 </fieldset>&nbsp;
<?php	echo $this->Form->end(__('Search')); ?></td></tr></table>
	<?php if(isset($data)){
echo "<br />";
	?>
   
	
	<legend><b><?php echo __($route); ?></b></legend>
	<legend><b><?php echo __($booking_date.'   BOOKINGS' ); ?></b></legend>
	
	<?php 	
	echo "<br />";	
	echo $this->Form->create('StaffDetail',array('action' => 'booking_excell_report'));
	echo $this->Form->input('booking_date',array('type'=>'hidden','value'=>$booking_date));
	echo $this->Form->input('route',array('type'=>'hidden','value'=>$route));
	echo $this->Form->end('Download Excel Of The Report'); 
	?>
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