<div class="votings form">
<?php echo $this->Form->create('Voting'); ?>
	<fieldset>
		<legend><?php echo __('Edit Voting'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
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
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Votes'), array('controller' => 'votes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vote'), array('controller' => 'votes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Votes Availables'), array('controller' => 'votes_availables', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Votes Available'), array('controller' => 'votes_availables', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Issues'), array('controller' => 'issues', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Issue'), array('controller' => 'issues', 'action' => 'add')); ?> </li>
	</ul>
</div>
