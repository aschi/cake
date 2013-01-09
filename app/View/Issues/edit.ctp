<div class="issues form">
<?php echo $this->Form->create('Issue'); ?>
	<fieldset>
		<legend><?php echo __('Edit Issue'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('title');
		echo $this->Form->input('casedescription');
		echo $this->Form->input('claim');
		echo $this->Form->input('imagepath');
		echo $this->Form->input('Voting');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Issue.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Issue.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Issues'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Votings'), array('controller' => 'votings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Voting'), array('controller' => 'votings', 'action' => 'add')); ?> </li>
	</ul>
</div>
