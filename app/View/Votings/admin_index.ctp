<div class="votings index">
	<h2><?php echo __('Votings'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('voting_start'); ?></th>
			<th><?php echo $this->Paginator->sort('voting_end'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($votings as $voting): ?>
	<tr>
		<td><?php echo h($voting['Voting']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($voting['User']['username'], array('controller' => 'users', 'action' => 'view', $voting['User']['id'])); ?>
		</td>
		<td><?php echo h($voting['Voting']['voting_start']); ?>&nbsp;</td>
		<td><?php echo h($voting['Voting']['voting_end']); ?>&nbsp;</td>
		<td><?php echo h($voting['Voting']['created']); ?>&nbsp;</td>
		<td><?php echo h($voting['Voting']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $voting['Voting']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $voting['Voting']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $voting['Voting']['id']), null, __('Are you sure you want to delete # %s?', $voting['Voting']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Voting'), array('action' => 'add')); ?></li>
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
