<div class="pages">
<?php echo $this->Form->create('Page'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Page'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('content', array('class' => 'mceEditor'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php
	echo $this->element('tinymce');
?>