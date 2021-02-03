  <html>
    <head>
        <script src="../js/jquery.js" type="text/javascript"></script>
        <script src="../js/jquery.validate.js" type="text/javascript"></script>
    </head>

  
  <div class="staffDetails form">
  <div id = "content">
<?php	echo $this->Form->create('CheckinOutLog',array('action' => 'search_staff_logs'));?>
	<fieldset>
	<legend><b><?php echo __('SEARCH BY ECNUMBER'); ?></b></legend>
	<table>
  <tr><th>
 <?php echo $this->Form->label('Search By:');?>
	</th><td><?php
	$options = array('ecnumber'=>'EC Number');
	echo $this->Form->select('search_by',$options, array('empty'=>'Ecnumber','selected'=>false));?></td><td><?php
	echo $this->Form->input('search',array('label'=>false,'AutoComplete'=>'off'));?></td><td><?php
	//echo $this->Form->input('entryID',array('type'=>'hidden','value'=>$entryID));
	
	echo "<br>";
	echo "<br>";
	$options = array(
					'label'=>'',
					'type'=>'date',
					'separator'=>'-'
					);
	echo $this->Form->label('From Date');
	echo $this->Form->input('from_date',$options,array('label'=>false));
	echo $this->Form->label('To Date');
	echo $this->Form->input('to_date',$options,array('label'=>false));
	echo "<br>";
	echo "<br>";
	echo $this->Form->end(__('Search')); ?></td></tr></table><?php
	
	
	


 
 if(isset($userinfo)){  ?>
    </fieldset>&nbsp;
	
    <fieldset>
	<legend><b><?php echo __('EMPLOYEE DETAILS'); ?></b></legend>
	
	<?php 	
	echo "<br />";	
 echo $this->Form->create('CheckinOutLog',array('action' => 'search_staff_logs_excel'));
 echo $this->Form->input('ecnumber',array('type'=>'hidden','value'=>$ecnumber));
 echo $this->Form->input('kaYrFrm',array('type'=>'hidden','value'=>$kaYrFrm));
 echo $this->Form->input('kaMnthFrm',array('type'=>'hidden','value'=>$kaMnthFrm));
 echo $this->Form->input('kaDayFrm',array('type'=>'hidden','value'=>$kaDayFrm));
 echo $this->Form->input('kaYrTo',array('type'=>'hidden','value'=>$kaYrTo));
 echo $this->Form->input('kaMnthTo',array('type'=>'hidden','value'=>$kaMnthTo));
 echo $this->Form->input('kaDayTo',array('type'=>'hidden','value'=>$kaDayTo));
 echo $this->Form->end('Download Excel Of The Report'); 
 echo "<br />"; 
	?>
	
	
	<?php 
 /*echo "<br />";	
 echo $this->Form->create('CheckinOutLog',array('action' => 'search_staff_logs_pdf'));
 echo $this->Form->input('ecnumber',array('type'=>'hidden','value'=>$ecnumber));
 echo $this->Form->input('kaYrFrm',array('type'=>'hidden','value'=>$kaYrFrm));
 echo $this->Form->input('kaMnthFrm',array('type'=>'hidden','value'=>$kaMnthFrm));
 echo $this->Form->input('kaDayFrm',array('type'=>'hidden','value'=>$kaDayFrm));
 echo $this->Form->input('kaYrTo',array('type'=>'hidden','value'=>$kaYrTo));
 echo $this->Form->input('kaMnthTo',array('type'=>'hidden','value'=>$kaMnthTo));
 echo $this->Form->input('kaDayTo',array('type'=>'hidden','value'=>$kaDayTo));
  echo $this->Form->end('Download PDF Of The Report'); 	
	echo "<br />";	*/
	?>
	
	<table width="50%" border="1" align= "center">
	<tr>

	<th width="18%" style="white-space:nowrap;"><?php echo __('EC Number'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Title'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Firstname'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Lastname'); ?></th>
	 </tr>
<?php for($i=0; $i < sizeof($userinfo); $i++ ){?>
<tr>
	<td><?php echo $userinfo[$i]['StaffDetail']['ecnumber'] ?></td>	
	<td><?php echo $userinfo[$i]['StaffDetail']['title'] ?></td>	
	<td><?php echo $userinfo[$i]['StaffDetail']['firstname']?></td>
	<td><?php echo $userinfo[$i]['StaffDetail']['lastname']?></td>
	

  
  </table></fieldset>

	</div>
	 		
	<?php
	}
	 ?>
  		
</html>
<br />
<?php 

if(!empty($data)){  ?>



<fieldset>
	<legend><b><?php echo __('ATTENDANCE LOGS AS FROM: '."20".$date_from .'  TO  ' ."20".$date_to); ?></b></legend>
	
	
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

	<?php 
	if($username == 'tmutero'){?>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Edit'); ?></th>
	<?php } ?>
	
  </tr>
<?php for($i=0; $i < sizeof($data); $i++ ){

		/*if(!empty($data[$i]['chikonzero'])){
			$reason = $data[$i]['chikonzero'];
		}else{
		$reason = "NORMAL";
		
		}*/
?>
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
	
	<?php 		
	if($username == 'tmutero'){?>
	<td><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $data[$i]['id'])); ?></td>
	<?php } ?>
			<?php } ?>
 </table></fieldset>
		<?php
				}
			}	
	 ?>