<div class="news form">
<?php echo $this->Form->create('News'); ?>
	<fieldset>
		<legend><?php echo __('Add News'); ?></legend>
	<?php
		echo $this->Form->input('previewtext', array('label'=>'Vorschau Text'));
		echo $this->Form->input('imagepath', array('label'=>'Vorschau Bild', 'class' => 'imageSelector'));
		echo $this->Form->input('newstext', array('label'=>'News Text', 'class' => 'mceEditor'));
    ?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List News'), array('action' => 'index')); ?></li>
	</ul>
</div>

<?php 
	echo $this->element('imageselector'); 
	echo $this->element('tinymce');
?>