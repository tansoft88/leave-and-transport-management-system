	
<li><?php echo $this->Html->link(__('<< BACK'), array('controller'=>'FileUploads','action' => 'index')); ?></li><?php
echo $this->Form->create('FileUpload', array('type' => 'file'));
?>
	<fieldset>
		<legend>
	<h2><?php echo __('Upload Excel Files(.xlxs)');?></h2></legend>
	
		<?php
		echo $this->Form->input('Browse_File', array('type' => 'file'));
		?>
		
<div class='submit'>
<?php echo $this->Form->end(__('Upload Excel File'));?>
</fieldset>