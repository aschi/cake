<div class="stories index">
	<h2><?php echo __('Stories'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('storytext'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($stories as $story): ?>
	<tr>
		<td><?php echo h($story['Story']['title']); ?>&nbsp;</td>
		<td><?php echo $story['Story']['storytext'] ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($story['User']['username'], array('controller' => 'users', 'action' => 'view', $story['User']['id'])); ?>
		</td>
		<td><?php echo h($story['Story']['modified']); ?>&nbsp;</td>
		<td><?php echo h($story['Story']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $story['Story']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $story['Story']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $story['Story']['id']), null, __('Are you sure you want to delete # %s?', $story['Story']['id'])); ?>
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
	<h3><?php echo __('Aktionen'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Story'), array('action' => 'add')); ?></li>
	</ul>
</div>
