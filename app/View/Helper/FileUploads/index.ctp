<br><fieldset>
 <?php if(!empty($uploaded_files)and ($system_group_id==4)) { ?>
 <br>
<b>Messages</b>
<br><br>
<fieldset>
<h2>You have <?php echo $uploaded_files;?> uploaded file(s) ready for Payment Confirmation.</h2>
</fieldset>
<?php }?>
<br>
<br><fieldset>
	<legend><b><?php echo __('File Uploads');?></b></legend><br>
	<table>
	<tr>
			<th>Filename</th>
			<th>Client Organization</th>
			<th>No of Candidates</th>
			<th>Amount due</th>
			<th>No of sessions</th>
			<th>Request status</th>
			<th class="actions"><?php echo __('Details');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
				<?php if(($system_group_id == 3)){ ?>
			<th class="actions"><?php echo __('Download');?></th>
			<?php } ?>
	</tr>
	<?php
	foreach ($fileUploads as $fileUpload): ?>
	<tr>
		<td><?php echo h($fileUpload['FileUpload']['filename']); ?>&nbsp;</td>
		<td>
			<?php echo h($fileUpload['ClientOrganization']['org_name']); ?>
		</td>
		<td><?php echo h($fileUpload['FileUpload']['no_of_candidates']); ?>&nbsp;</td>
		<td><?php echo h($fileUpload['FileUpload']['amount_due']); ?>&nbsp;</td>
		<td><?php echo h($fileUpload['FileUpload']['number_of_sessions']); ?>&nbsp;</td>
		<td><?php echo h($fileUpload['Statu']['description']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $fileUpload['FileUpload']['id'])); ?> </td>
			<td>
			<?php if(($system_group_id == 2) && ($fileUpload['FileUpload']['statu_id']) ==1){ ?>
			<?php echo $this->Form->postLink(__('Approve'), array('action' => 'approve_upload', $fileUpload['FileUpload']['id']), null, __('Are you sure you want to approve the file: %s?', $fileUpload['FileUpload']['filename'])); ?>
		</td><td>
		<?php } ?>
		<?php if(($system_group_id == 2) && ($fileUpload['FileUpload']['statu_id']) ==4){ ?>
			<?php echo $this->Form->postLink(__('Download File'), array('action' => 'download_file_client', $fileUpload['FileUpload']['filename'], $fileUpload['FileUpload']['client_organization_id']), null, __('Continue file download : %s?', $fileUpload['FileUpload']['filename'])); ?>
		</td><td>
		<?php } ?>
		<?php if(($system_group_id == 4) && ($fileUpload['FileUpload']['statu_id']) ==2){ ?>
			<?php echo $this->Form->postLink(__('Confirm'), array('action' => 'confirm_payment', $fileUpload['FileUpload']['id']), null, __('Are you sure you want to confirm payment for this file: %s?', $fileUpload['FileUpload']['filename'])); ?>
		</td><td>
		<?php } ?>
		<?php if(($system_group_id == 3) &&($fileUpload['FileUpload']['statu_id']) ==3){ ?>
			<?php echo $this->Form->postLink(__('Verification Complete'), array('action' => 'verification_complete', $fileUpload['FileUpload']['id']), null, __('Are you sure verification for this file has been completed : %s?', $fileUpload['FileUpload']['filename'])); ?>
		</td>
		<?php } ?><td>
		<?php if(($system_group_id == 3)){ ?>
			<?php //echo $this->Form->postLink(__('Download File'), array('action' => 'download_file', $fileUpload['FileUpload']['filename'], $fileUpload['FileUpload']['client_organization_id']), null, __('Continue file download : %s?', $fileUpload['FileUpload']['filename'])); ?>
			<?php echo $this->Form->postLink(__('Download File'), array('action' => 'download_file', $fileUpload['FileUpload']['filename'], $fileUpload['FileUpload']['client_organization_id'])); ?>
		</td>
		<?php } ?>
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
</fieldset>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
	<?php if($system_group_id == 1){ ?>
		<li><?php echo $this->Html->link(__('New File Upload'), array('action' => 'upload_xml')); ?></li>
		<?php } ?>
		<li><?php echo $this->Html->link(__('List Client Organizations'), array('controller' => 'client_organizations', 'action' => 'index')); ?> </li>
		<?php if($system_group_id == 3){ ?>
		<li><?php echo $this->Html->link(__('New Client Organization'), array('controller' => 'client_organizations', 'action' => 'add')); ?> </li>
		<?php } ?>
	</ul>
</div>
