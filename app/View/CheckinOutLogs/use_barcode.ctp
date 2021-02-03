  <html>
    <head>
        <script src="../js/jquery.js" type="text/javascript"></script>
        <script src="../js/jquery.validate.js" type="text/javascript"></script>
    </head>

  
  <div class="staffDetails form">
  <div id = "content">
<?php	echo $this->Form->create('CheckinOutLog');;?>
	<fieldset>
	<legend><b><?php echo __('SCAN WITH BARCODE READER'); ?></b></legend>
	<table>
  <tr>
 <fieldset>
	<?php

echo $this->Form->input('barcode');
echo $this->Form->end();
?>
</fieldset>
	
	
	</tr></table>
	
	
	
	<?php
	if(isset($userinfo)){
	 ?>
    </fieldset>&nbsp;
	
    <fieldset>
	<legend><b><?php echo __('STAFF DETAILS'); ?></b></legend>
	
	<table width="50%" border="1" align= "center">
	<tr>

	<th width="18%" style="white-space:nowrap;"><?php echo __('EC Number'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Title'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Firstname'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Lastname'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Status'); ?></th>
	<?php if ($checkID == 0){?>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Check In'); ?></th>
	<?php }?>
	    <?php if ($checkID == 1){?>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Check Out'); ?></th> 
	<?php }?>
	</tr>
<?php for($i=0; $i < sizeof($userinfo); $i++ ){?>
<tr>
	<td><?php echo $userinfo[$i]['StaffDetail']['ecnumber'] ?></td>	
	<td><?php echo $userinfo[$i]['StaffDetail']['title'] ?></td>	
	<td><?php echo $userinfo[$i]['StaffDetail']['firstname']?></td>
	<td><?php echo $userinfo[$i]['StaffDetail']['lastname']?></td>
	<?php if ($checkID == 1){?>
	<td><?php echo 'CHECKED IN'; ?></td>
	<?php }?>
	<?php if ($checkID == 0){?>
	<td><?php echo 'CHECKED OUT'; ?></td>
	<?php }?>
 
	 <?php if ($checkID == 0){?>
 
  <td><?php echo $this->Html->link('Check In', array('controller'=>'Checkin_out_logs','action' => 'check_in_barcode',$entryID,$userinfo[$i]['StaffDetail']['ecnumber'])); ?>   </td>
 <?php }?>
 <?php if ($checkID == 1){?>
 <td><?php echo $this->Html->link('Check Out', array('controller'=>'Checkin_out_logs','action' => 'check_out_barcode',$entryID,$userinfo[$i]['StaffDetail']['ecnumber'])); ?>   </td>	
<?php }?>	
	</tr>
  <?php } ?>
  </table></fieldset>

	</div>
	 

		
	<?php
	}
	 ?>
  		
</html>

<script type="text/javascript">
        document.getElementsByName('data[CheckinOutLog][barcode]')[0].focus();
</script>