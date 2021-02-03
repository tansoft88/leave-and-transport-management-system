  <html>
    <head>
        <script src="../js/jquery.js" type="text/javascript"></script>
        <script src="../js/jquery.validate.js" type="text/javascript"></script>
    </head>

  
  <div class="staffDetails form">
  <div id = "content">

	 <fieldset>
	<table width="50%" border="1" align= "center">
	<tr>

	<th width="18%" style="white-space:nowrap;"><?php echo __('EC Number'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Title'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Firstname'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Lastname'); ?></th>
	 </tr>

<tr>
	<td><?php echo $userinfo['StaffDetail']['ecnumber'] ?></td>	
	<td><?php echo $userinfo['StaffDetail']['title'] ?></td>	
	<td><?php echo $userinfo['StaffDetail']['firstname']?></td>
	<td><?php echo $userinfo['StaffDetail']['lastname']?></td>
	  
	 
	<legend><b><?php 
	
  echo __('ATTENDANCE LOGS AS FROM: '."20".$date_from .'  TO  ' ."20".$date_to);
  echo  "<br />";
  echo  "<br />";

  ?></b></legend>
	
	<br />
	<br />
	
	<table width="50%" border="1" align= "center">
	<tr>

	<th width="18%" style="white-space:nowrap;"><?php echo __('Entry Point'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Date In'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Time In'); ?></th>	
	<th width="18%" style="white-space:nowrap;"><?php echo __('Date Out'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Time Out'); ?></th>	
	<th width="18%" style="white-space:nowrap;"><?php echo __('Late'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Attended Hours'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Hours Lost'); ?></th>
	
  </tr>
<?php


 for($i=0; $i < sizeof($data); $i++ ) { ?>
<tr>
	<td><?php echo $data[$i]['entryName'] ?></td>
	
	<td><?php echo $data[$i]['date_in'] ?></td>
			<?php 
			$x = "08:10";

	if($data[$i]['time_in'] > $x){?>
			<td><font color="red"><?php echo $data[$i]['time_in'] ?></td></font>
			<?php }else{?>
			<td><font color="green"><?php echo $data[$i]['time_in'] ?></td></font>
			<?php 
			}
			?>	

		<td><?php echo $data[$i]['date_out']?></td>	

			<?php 
			$y = "16:30";
		if($data[$i]['time_out'] < $y){?>
			<td><font color="red"><?php echo $data[$i]['time_out'] ?></td></font>
			<?php }else{?>
			<td><font color="green"><?php echo $data[$i]['time_out'] ?></td></font>	
		<?php 
			}
			?>


<?php 
	$x = "08:10";
	if($data[$i]['time_in'] > $x){?>
	<td><font color="red"><?php echo "YES";?></td></font>
	<?php } ?>
	<?php if($data[$i]['time_in'] < $x){ ?>
	<td><font color="green"><?php echo "NO";?></td></font>
	<?php } ?>
	<td><?php 	
	$attendedHrs = $data[$i]['time_out'] - $data[$i]['time_in'];	
	echo $attendedHrs; 	
	?></td>
	<td><?php 	
	$hrsLost = 8.5 - $attendedHrs;	
	echo $hrsLost; 	
	?></td>
<?php } ?>


  </table></fieldset>

	</div>
	
	</html>
<br />