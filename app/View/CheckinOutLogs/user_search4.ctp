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
	 echo "<br />";
	 echo  $this->Html->link(__('SEARCH BY BARCODE SCANNER'), array('controller'=>'Checkin_out_logs','action' => 'use_barcode')); ?>
	 
	 <?php
	 echo "<br />";
	 echo "<br />";
	if(isset($userinfo)){
	 ?>

<table border ="0" % style="table-layout:fixed" cellpadding="2" cellspacing="2" bgcolor="#00FF00">
	<tr>
	<td ></td>
		<td style="word-wrap: break-word;"><b>UNIVERSITY OF ZIMBABWE</b></td>
		
		<td ><b>ATTENDANCE SYSTEM</td>
		</tr>
		
		<tr>
		<td ><?php echo $this->Html->image(array('controller'=>'CheckinOutLogs','action'=>'prof_pic',$ecnumber) ,array("alt"=>"ID Image","height"=>"220","width"=>"200",'align'=>'centre'));?>
		</td>
		<td style="word-wrap: break-word;"><?php echo h($userinfo['StaffDetail']['title']); ?></td>
		
		<td ><b><?php echo h($userinfo['StaffDetail']['firstname']); ?></td>
		<td ><?php echo h($userinfo['StaffDetail']['lastname']); ?></td>
		</tr>
		
		<tr>
		<td></td>
		<td style="word-wrap: break-word;"><b>DESIGNATION&nbsp;</b></td>
		
		<td ><b><?php echo h($userinfo['StaffDetail']['designation']); ?></td>
		<td ><?php echo h($userinfo['StaffDetail']['department_code']); ?></td>
		</tr>
		
		<tr>
		<td ></td>
		<td style="word-wrap: break-word;">CURRENT STATUS</td>
		
		<td ><b>Balance</td>
		<td >	<?php if ($checkID == 1){?>
				<?php echo 'CHECKED IN'; ?>
				<?php }?>
				<?php if ($checkID == 0){?>
				<?php echo 'CHECKED OUT'; ?>
				<?php }?>
		</td>
		</tr>

	</table>
	
<?php } ?>