  <html>
    <head>
        <script src="../js/jquery.js" type="text/javascript"></script>
        <script src="../js/jquery.validate.js" type="text/javascript"></script>
    </head>
<?php echo $this->Html->link(__('<< BACK'), array('controller'=>'CheckinOutLogs','action' => 'search_staff_logs2')); ?>
  
  <div class="staffDetails form">
  <div id = "content">
<?php	echo $this->Form->create('CheckinOutLog',array('action' => 'search_staff_logs2'));?>
	<fieldset>
	<legend><b><?php echo __('CHOOSE DATE RANGE TO VIEW YOUR ATTENDANCE STATISTICS'); ?></b></legend>
	
	<?php echo $this->Html->image(array('controller'=>'CheckinOutLogs','action'=>'prof_pic',$ecnumber) ,array("alt"=>"ID Image","height"=>"180","width"=>"160",'align'=>'centre'));?>
			
	<table>
  <tr><th>
 <?php // echo $this->Form->label('Search By:');?>
	</th><td><?php
	//$options = array('ecnumber'=>'EC Number');
	//echo $this->Form->select('search_by',$options, array('empty'=>'Please Select','selected'=>false));?></td><td><?php
	//echo $this->Form->input('search',array('label'=>false,'AutoComplete'=>'off'));
	// echo $this->Form->input('search',array('value'=>$written,'type'=>'hidden'));
	?></td><td><?php
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
	echo $this->Form->end(__('Search')); ?></td></tr></table><?php
	if(isset($userinfo)){
	 ?>
    </fieldset>&nbsp;
	
    <fieldset>
	<legend><b><?php echo __('EMPLOYEE DETAILS'); ?></b></legend>
	
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
	<legend><b><?php echo __('EMPLOYEE CHECK IN AND OUT DETAILS AS FROM: '."20".$date_from .'  TO  ' ."20".$date_to); ?></b></legend>
	
	
	<table width="50%" border="1" align= "center">
	<tr>

	<th width="18%" style="white-space:nowrap;"><?php echo __('Entry Point'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Date In'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Time In'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Date Out'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Time Out'); ?></th>
	
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
	if($username == 'tmutero'){?>
	<td><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $data[$i]['id'])); ?></td>
			
	<?php } ?>

  
 

<?php } ?>


 </table></fieldset>
<?php
	}
	}
	 ?>