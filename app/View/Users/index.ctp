<br><fieldset>
	<legend><b><?php echo __('Users Details');?></b></legend>
	
	<?php	echo $this->Form->create('User',array('action' => 'user_search'));?>
	<fieldset>
	<legend><b><?php echo __('Search User'); ?></b></legend>
	<table>
  <tr><th>
	<?php echo $this->Form->label('Search By:');?>
	</th><td><?php
	$options = array('username'=>'Username');
	echo $this->Form->select('search_by',$options, array('empty'=>'Please Select','selected'=>false));?></td><td><?php
	echo $this->Form->input('search',array('label'=>false,'AutoComplete'=>'off'));?></td><td><?php
	echo $this->Form->end(__('Search')); ?></td></tr></table>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th>Ecnumber</th>
			<th>Username</th>
			<th>Account Status</th>
			<th>System group</th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php for($j=0;$j<sizeof($users);$j++){?>
	<?php 
	if($users[$j]['User']['account_status'] == 1){
	$status = "ACTIVE";
	}
	if($users[$j]['User']['account_status'] == 0){
	$status = "INACTIVE";
	}?>
	<tr>
		<td><?php echo $users[$j]['User']['ecnumber'] ?></td>
		<td><?php echo $users[$j]['User']['username'] ?></td>
		<td><?php echo h($status); ?></td>
		<td><?php echo h($users[$j]['SystemGroup']['account_type_name']); ?></td>
		<td class="actions">
		<?php //echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
		<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $users[$j]['User']['id'])); ?>
		</td>
	</tr>
<?php } ?>
	</table>		
</fieldset>
<div class="actions">
	<h3><?php echo __('Quick Links'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Create Users From Staff Details'), array('action' => 'create_users')); ?></li>
		<li><?php echo $this->Html->link(__('List System Groups'), array('controller' => 'system_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New System Group'), array('controller' => 'system_groups', 'action' => 'add')); ?> </li>
		
	</ul>
</div>
