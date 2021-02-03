<?php if(isset($files)) { ?>
<li><?php echo $this->Html->link(__('<< Back'), array('action' => 'report_admin'));?></li>
<fieldset>
 <h2><u><center><?php echo "Showing Uploaded Files Between  ".$start."  and  " .$end." ";?></center></u></h2>
	<table width="50%" border="1" align= "center">
 
 <tr>
	
	<th width="18%" style="white-space:nowrap;"><?php echo __('Client Organisation'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Filename'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Number of Candidates'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Amount'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Request Status'); ?></th>	
	<th width="18%" style="white-space:nowrap;"><?php echo __('Date Uploaded'); ?></th>	
    	
</tr>

   <?php

 for($i=0;$i<sizeof($files);$i++){

?>
  <tr>

	<td><?php echo $files[$i]['ClientOrganization']['org_name'] ?></td>
	<td><?php echo   $files[$i]['FileUpload']['filename'] ?></td>
	 <td><?php echo  $files[$i]['FileUpload']['no_of_candidates'] ?></td>
	<td><?php echo   $files[$i]['FileUpload']['amount_due'] ?></td>
	<td><?php echo   $files[$i]['Statu']['description'] ?></td>
	<td><?php echo   $files[$i]['FileUpload']['created_timestamp'] ?></td>
	
	<?php } ?>
	
  </tr>
</table>
	</fieldset>
<?php } else { ?>
<br><fieldset>
<legend><b><?php echo __('Select The Institution  And Date Range For Uploaded Files'); ?></b></legend>
<br>

<?php
 echo $this->Form->create('FileUpload');		
?>		
		<table>
		 <tr><th><?php echo $this->Form->label('Institution Type'); ?></th><td><?php 
		 echo $this->Form->select('institution',$institutions,array('empty'=>'--Please Select--','selected'=>false));
		 ?></td></tr>
		  <tr><th>
			<?php echo $this->Form->label('Start Date:');?>
			</th><td><?php
			$options = array(
			'label' => '',
			'type' => 'date',
			'separator'=>'-'
		);
			echo $this->Form->input('s_date',$options,array('label'=>false));?></td></tr>
			<tr><th>
			<?php echo $this->Form->label('End Date:');?>
			</th><td>
			<?php
			echo $this->Form->input('e_date',$options,array('label'=>false));?></td></tr>
			<tr><th colspan ='3'>
			&nbsp;
			<?php echo $this->Form->end('List files'); ?></th></tr>
			</table>
	
</fieldset>

<?php		
		}
?>