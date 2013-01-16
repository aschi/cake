<div class="votings form">
<?php echo $this->Form->create('Voting'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Voting'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('voting_start');
		echo $this->Form->input('voting_end');
		echo $this->Form->input('Issue');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Voting.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Voting.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Votings'), array('action' => 'index')); ?></li>
	</ul>
</div>
