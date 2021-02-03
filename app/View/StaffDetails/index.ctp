<div class="staffDetails index">
	<h2><?php echo __('Staff Details');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
	
	        <th width="18%" style="white-space:nowrap;"><?php echo __('Firstname'); ?></th>
	        <th width="18%" style="white-space:nowrap;"><?php echo __('Surname'); ?></th>
	        <th width="18%" style="white-space:nowrap;"><?php echo __('Title'); ?></th>
	        <th width="18%" style="white-space:nowrap;"><?php echo __('Designation'); ?></th>
	        <th width="18%" style="white-space:nowrap;"><?php echo __('Ecnumber'); ?></th>
	        <th width="18%" style="white-space:nowrap;"><?php echo __('Department'); ?></th>
	        <th width="18%" style="white-space:nowrap;"><?php echo __('Mobile'); ?></th>
	        <th width="18%" style="white-space:nowrap;"><?php echo __('Email Address'); ?></th>
	<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($staffDetails as $staffDetail): ?>
	<tr>
		<td><?php echo h($staffDetail['StaffDetail']['firstname']); ?>&nbsp;</td>
		<td><?php echo h($staffDetail['StaffDetail']['lastname']); ?>&nbsp;</td>
		<td><?php echo h($staffDetail['StaffDetail']['title']); ?>&nbsp;</td>
		<td><?php echo h($staffDetail['StaffDetail']['designation']); ?>&nbsp;</td>
		<td><?php echo h($staffDetail['StaffDetail']['ecnumber']); ?>&nbsp;</td>
		<td><?php echo h($staffDetail['StaffDetail']['department_code']); ?>&nbsp;</td>
		<td><?php echo h($staffDetail['StaffDetail']['mobile']); ?>&nbsp;</td>
		<td><?php echo h($staffDetail['StaffDetail']['email_address']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $staffDetail['StaffDetail']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $staffDetail['StaffDetail']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $staffDetail['StaffDetail']['id']), null, __('Are you sure you want to delete # %s?', $staffDetail['StaffDetail']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Staff Detail'), array('action' => 'add')); ?></li>
	</ul>
</div>
