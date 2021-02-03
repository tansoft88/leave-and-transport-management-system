  <html>
    <head>
        <script src="../js/jquery.js" type="text/javascript"></script>
        <script src="../js/jquery.validate.js" type="text/javascript"></script>
    </head>

  
  <div class="staffDetails form">
  <div id = "content">
<?php	echo $this->Form->create('User',array('action' => 'user_search'));?>
	<fieldset>
	<legend><b><?php echo __('User Details'); ?></b></legend>
	<table>
  <tr><th>
 <?php echo $this->Form->label('Search By:');?>
	</th><td><?php
	$options = array('ecnumber'=>'EC Number','username'=>'Username','email'=>'Email');
	echo $this->Form->select('search_by',$options, array('empty'=>'Please Select','selected'=>false));?></td><td><?php
	echo $this->Form->input('search',array('label'=>false,'AutoComplete'=>'off'));?></td><td><?php
	echo $this->Form->end(__('Search')); ?></td></tr></table><?php
	if(isset($userinfo)){
	 ?>
    </fieldset>&nbsp;
	
    <fieldset>
	<legend><b><?php echo __('USER DETAILS'); ?></b></legend>
	
	<table width="50%" border="1" align= "center">
	<tr>

	<th width="18%" style="white-space:nowrap;"><?php echo __('EC Number'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Username'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Creator'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Email'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Status'); ?></th>
	<th width="18%" style="white-space:nowrap;"><?php echo __('Edit'); ?></th>    
	<th width="18%" style="white-space:nowrap;"><?php echo __('Deactivate'); ?></th>    
	<th width="18%" style="white-space:nowrap;"><?php echo __('Activate'); ?></th>    
	<th width="18%" style="white-space:nowrap;"><?php echo __('View'); ?></th>
</tr>
<?php for($i=0; $i < sizeof($userinfo); $i++ ){ ?>
<tr>
	<td><?php echo $userinfo[$i]['User']['ecnumber'] ?></td>	
	<td><?php echo $userinfo[$i]['User']['username']?></td>
	<td><?php echo $userinfo[$i]['User']['created_by'] ?></td>
	<td><?php echo $userinfo[$i]['User']['email_address'] ?></td>
	<td><?php echo $userinfo[$i]['User']['account_status'] ?></td>
  
	
  <td><?php echo $this->Html->link('Edit', array('action' => 'edit',$userinfo[$i]['User']['id'])); ?>   </td> 
  <td><?php echo $this->Html->link('Deactivate', array('action' => 'deactivate',$userinfo[$i]['User']['id'])); ?>   </td>
  <td><?php echo $this->Html->link('Activate', array('action' => 'activate',$userinfo[$i]['User']['id'])); ?>   </td>	
	  <td><?php echo $this->Html->link('View', array('action' => 'view',$userinfo[$i]['User']['id'])); ?>   </td>
  </tr>
  <?php } ?>
  </table></fieldset>

	</div>
	 
<table>
	 </table>
		
	<?php
	}
	 ?>
  		
</html>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users Details'), array('action' => 'index'));?></li>
		</ul>
</div>