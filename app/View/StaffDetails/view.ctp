<div class="staffDetails view">
<h2><?php  echo __('Staff Detail');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($staffDetail['StaffDetail']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Firstname'); ?></dt>
		<dd>
			<?php echo h($staffDetail['StaffDetail']['firstname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lastname'); ?></dt>
		<dd>
			<?php echo h($staffDetail['StaffDetail']['lastname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($staffDetail['StaffDetail']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ecnumber'); ?></dt>
		<dd>
			<?php echo h($staffDetail['StaffDetail']['ecnumber']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Department Code'); ?></dt>
		<dd>
			<?php echo h($staffDetail['StaffDetail']['department_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Physical Address'); ?></dt>
		<dd>
			<?php echo h($staffDetail['StaffDetail']['physical_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact Address'); ?></dt>
		<dd>
			<?php echo h($staffDetail['StaffDetail']['contact_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mobile'); ?></dt>
		<dd>
			<?php echo h($staffDetail['StaffDetail']['mobile']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Work Phone'); ?></dt>
		<dd>
			<?php echo h($staffDetail['StaffDetail']['work_phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Home Phone'); ?></dt>
		<dd>
			<?php echo h($staffDetail['StaffDetail']['home_phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email Address'); ?></dt>
		<dd>
			<?php echo h($staffDetail['StaffDetail']['email_address']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Staff Detail'), array('action' => 'edit', $staffDetail['StaffDetail']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Staff Detail'), array('action' => 'delete', $staffDetail['StaffDetail']['id']), null, __('Are you sure you want to delete # %s?', $staffDetail['StaffDetail']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Staff Details'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Staff Detail'), array('action' => 'add')); ?> </li>
	</ul>
</div>
