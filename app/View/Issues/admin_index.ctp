<div class="issues index">
	<h2><?php echo __('Issues'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('casedescription'); ?></th>
			<th><?php echo $this->Paginator->sort('claim'); ?></th>
			<th><?php echo $this->Paginator->sort('imagepath'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($issues as $issue): ?>
	<tr>
		<td><?php echo h($issue['Issue']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($issue['User']['username'], array('controller' => 'users', 'action' => 'view', $issue['User']['id'])); ?>
		</td>
		<td><?php echo h($issue['Issue']['title']); ?>&nbsp;</td>
		<td><?php echo h($issue['Issue']['casedescription']); ?>&nbsp;</td>
		<td><?php echo h($issue['Issue']['claim']); ?>&nbsp;</td>
		<td><?php echo h($issue['Issue']['imagepath']); ?>&nbsp;</td>
		<td><?php echo h($issue['Issue']['created']); ?>&nbsp;</td>
		<td><?php echo h($issue['Issue']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $issue['Issue']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $issue['Issue']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $issue['Issue']['id']), null, __('Are you sure you want to delete # %s?', $issue['Issue']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Issue'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Votings'), array('controller' => 'votings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Voting'), array('controller' => 'votings', 'action' => 'add')); ?> </li>
	</ul>
</div>
