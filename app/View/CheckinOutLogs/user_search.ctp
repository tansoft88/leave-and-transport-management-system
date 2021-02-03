<?php	echo $this->Form->create('CheckinOutLog',array('action' => 'user_search'));?>
	<fieldset>
	<legend><b><?php echo __('Search By Ecnumber or Barcode Scanner'); ?></b></legend>
	<table>
  <tr><th>
 <?php echo $this->Form->label('Search By:');?>
	</th><td>	
	<?php
	$options = array('ecnumber'=>'EC Number');
	echo $this->Form->select('search_by',$options, array('empty'=>'Ecnumber','selected'=>false));
	// echo $this->Form->select('search_by',$options, array('empty'=>'Please Select','selected'=>false));
	?>	
	</td><td>	
	<?php
	echo $this->Form->input('search',array('label'=>false,'AutoComplete'=>'off'));?></td><td><?php
	//echo $this->Form->input('entryID',array('type'=>'hidden','value'=>$entryID));
	echo $this->Form->end(__('Search')); ?> </td></tr></table>
	
	<?php 
	 echo "<br />";
	 echo  $this->Html->link(__('SEARCH BY BARCODE SCANNER'), array('controller'=>'Checkin_out_logs','action' => 'use_barcode')); ?>
	  <br />
	  <br />
	 <?php
	 if(isset($userinfo)){
	 ?>

<table border ="-10" % style="table-layout:fixed" cellpadding="2" cellspacing="2">
	<tr>
		</tr>
		
		<tr>
		<td ><?php echo $this->Html->image(array('controller'=>'CheckinOutLogs','action'=>'prof_pic',$ecnumber) ,array("alt"=>"ID Image","height"=>"180","width"=>"160",'align'=>'centre'));?>
			<br />
			<b><?php echo h(strtoupper($userinfo['StaffDetail']['title'])); ?></b>
			<b><?php echo h(strtoupper($x)); ?></b>
			<b><?php echo h(strtoupper($userinfo['StaffDetail']['lastname'])); ?></b>
			<br />
			<b><?php echo h(strtoupper($userinfo['StaffDetail']['designation'])); ?></b>
			<br />
			<b><?php echo h(strtoupper($dptNm)); ?></b>
			<br />
			<b><?php if ($checkID == 1){?>
				<?php echo 'CHECKED IN'; ?>
				<?php }?>
				<?php if ($checkID == 0){?>
				<?php echo 'CHECKED OUT'; ?>
				<?php }?></b>
			</td>
		<td style="word-wrap: break-word;"><b><?php if ($checkID == 0){?>
 <br />
 <?php echo $this->Html->link('CHECK IN', array('action' => 'check_in',$userinfo['StaffDetail']['id'],$userinfo['StaffDetail']['ecnumber'])); ?> 
 <?php }?>
 <?php if ($checkID == 1){?>
 <?php echo $this->Html->link('CHECK OUT', array('action' => 'check_out',$userinfo['StaffDetail']['id'],$userinfo['StaffDetail']['ecnumber'])); ?> 
<?php }?></b></td>
		
		<td>
<legend><b><?php echo __('UNIVERSITY OF ZIMBABWE'); ?></b></legend>		
		</td>
		
		<tr>
	<br />
		<td style="word-wrap: break-word;"></td>
		<td style="word-wrap: break-word;"></td>
	<td ></td>
		</tr>
		
		</tr>
		
		<tr>
		<td></td>
		</tr>
		
		

	</table>
	
<?php } ?>