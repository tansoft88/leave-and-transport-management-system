<div class="checkinOutLogs view">
<h2><?php  echo __('Checkin Out Log');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($checkinOutLog['CheckinOutLog']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Entry Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($checkinOutLog['EntryPoint']['name'], array('controller' => 'entry_points', 'action' => 'view', $checkinOutLog['EntryPoint']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ecnumber'); ?></dt>
		<dd>
			<?php echo h($checkinOutLog['CheckinOutLog']['ecnumber']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time In'); ?></dt>
		<dd>
			<?php echo h($checkinOutLog['CheckinOutLog']['time_in']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Checkin User'); ?></dt>
		<dd>
			<?php echo h($checkinOutLog['CheckinOutLog']['checkin_user']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time Out'); ?></dt>
		<dd>
			<?php echo h($checkinOutLog['CheckinOutLog']['time_out']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Checkout User'); ?></dt>
		<dd>
			<?php echo h($checkinOutLog['CheckinOutLog']['checkout_user']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($checkinOutLog['CheckinOutLog']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ip Address'); ?></dt>
		<dd>
			<?php echo h($checkinOutLog['CheckinOutLog']['ip_address']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Checkin Out Log'), array('action' => 'edit', $checkinOutLog['CheckinOutLog']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Checkin Out Log'), array('action' => 'delete', $checkinOutLog['CheckinOutLog']['id']), null, __('Are you sure you want to delete # %s?', $checkinOutLog['CheckinOutLog']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Checkin Out Logs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Checkin Out Log'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entry Points'), array('controller' => 'entry_points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entry Point'), array('controller' => 'entry_points', 'action' => 'add')); ?> </li>
	</ul>
</div>
