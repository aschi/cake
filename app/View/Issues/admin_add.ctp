<div class="issues form">
<?php echo $this->Form->create('Issue'); ?>
	<fieldset>
		<legend><?php echo __('Fall erfassen'); ?></legend>
	<?php
		echo $this->Form->input('title', array('label'=>'Titel'));
		echo $this->Form->input('casedescription', array('label'=>'Beschreibung'));
		echo $this->Form->input('claim', array('label'=>'Benötigte Mittel'));
		echo $this->Form->input('imagepath', array('label'=>'Bild', 'class' => 'imageSelector'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Fälle auflisten'), array('action' => 'index')); ?></li>
	</ul>
</div>

<?php 
	echo $this->element('imageselector'); 
	echo $this->element('tinymce');
?>