<div class="votings form">
<?php echo $this->Form->create('Voting'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Voting'); ?></legend>
	<?php
		echo $this->Form->input('voting_start', array('dateFormat'=>'DMY'));
		echo $this->Form->input('voting_end', array('dateFormat'=>'DMY'));
		echo $this->Form->input('Issue', array('multiple' => 'checkbox'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Votings'), array('action' => 'index')); ?></li>
	</ul>
</div>
