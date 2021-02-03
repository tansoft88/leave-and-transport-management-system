<div class="systemGroups index">
	<h2><?php echo __('System Groups');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th>#</th>
			<th>Account Type</th>
			<th>Internal_account?</th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($systemGroups as $systemGroup): ?>
	<tr>
		<td><?php echo h($systemGroup['SystemGroup']['id']); ?>&nbsp;</td>
		<td><?php echo h($systemGroup['SystemGroup']['account_type_name']); ?>&nbsp;</td>
		<td><?php echo h($systemGroup['SystemGroup']['internal_account']); ?>&nbsp;</td>
		<td class="actions">
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $systemGroup['SystemGroup']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $systemGroup['SystemGroup']['id'])); ?>
			<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $systemGroup['SystemGroup']['id']), null, __('Are you sure you want to delete # %s?', $systemGroup['SystemGroup']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New System Group'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
