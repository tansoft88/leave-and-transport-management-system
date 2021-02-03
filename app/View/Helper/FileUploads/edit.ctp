<div class="fileUploads form">
<?php echo $this->Form->create('FileUpload');?>
	<fieldset>
		<legend><?php echo __('Edit File Upload'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('filename');
		echo $this->Form->input('client_organization_id');
		echo $this->Form->input('md5_hash');
		echo $this->Form->input('no_of_candidates');
		echo $this->Form->input('no_of_centers');
		echo $this->Form->input('total_subjects');
		echo $this->Form->input('statu_id');
		echo $this->Form->input('uploaded_by');
		echo $this->Form->input('approved_by');
		echo $this->Form->input('verified_by');
		echo $this->Form->input('upload_timestamp');
		echo $this->Form->input('approval_timestamp');
		echo $this->Form->input('verification_timestamp');
		echo $this->Form->input('upload_ip');
		echo $this->Form->input('approval_ip');
		echo $this->Form->input('verification_ip');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('FileUpload.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('FileUpload.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List File Uploads'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Client Organizations'), array('controller' => 'client_organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client Organization'), array('controller' => 'client_organizations', 'action' => 'add')); ?> </li>
	</ul>
</div>
