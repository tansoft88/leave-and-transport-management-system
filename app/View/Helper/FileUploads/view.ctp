<div class="fileUploads view">
<h2><?php  echo __('File Upload');?></h2>
<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo ('Filename');?></th>
			<th><?php echo ('Client Organization');?></th>
			<th><?php echo ('No Of Candidates');?></th>
			<th><?php echo ('Amount Due');?></th>
			<th><?php echo ('Request Status');?></th>
			<th><?php echo ('Upload Timestamp');?></th>
	</tr>
	<tr>
			<td><?php echo h($fileUpload['FileUpload']['filename']);?></td>
			<td><?php  echo h($fileUpload['ClientOrganization']['org_name']); ?></td>
			<td><?php echo h($fileUpload['FileUpload']['no_of_candidates']); ?></td>
			<td><?php echo h($fileUpload['FileUpload']['amount_due']); ?></td>
			<td><?php echo h($fileUpload['Statu']['description']); ?></td>
			<td><?php echo h($fileUpload['FileUpload']['created_timestamp']); ?></td>
	</tr>
	</table>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List File Uploads'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New File Upload'), array('action' => 'upload_xml')); ?> </li>
		<li><?php echo $this->Html->link(__('List Client Organizations'), array('controller' => 'client_organizations', 'action' => 'index')); ?> </li>
	</ul>
</div>
