<div class="stories form">
<?php echo $this->Form->create('Story'); ?>
	<fieldset>
		<legend><?php echo __('Add Story'); ?></legend>
	<?php
		echo $this->Form->input('title', array('label'=>'Titel'));
		echo $this->Form->input('storytext', array('class' => 'mceEditor'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Stories'), array('action' => 'index')); ?></li>
	</ul>
</div>

<?php
	echo $this->element('tinymce');
?>