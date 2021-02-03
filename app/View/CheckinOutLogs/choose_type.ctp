
<br />
<br />

	
	
	<table width="50%" border="1" align= "center">
 
 <tr>
 <?php if($canCheck == 1) {?>
 <h2><?php echo __('CHOOSE CHECK IN/OUT TYPE');?></h2>
 <fieldset>
	<br>	
<?php echo  $this->Html->link(__('BARCODE SCANNER'), array('controller'=>'Checkin_out_logs','action' => 'use_barcode')); ?>
<br>
<br>
<?php echo  $this->Html->link(__('SEARCH EC NUMBER'), array('controller'=>'Checkin_out_logs','action' => 'user_search')); ?>
<br>
<br>
</fieldset>
 
		
 <?php } ?>
 
  <?php if($canCheck == 0) {?>
   <h2><?php echo __('YOUR ENTRY POINT IS NOT ALLOWED TO CHECK IN AND CHECK OUT');?></h2>
   <?php } ?>


</tr>
</table>