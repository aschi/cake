<div class="issues view">
<h2><?php  echo __('Issue'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($issue['Issue']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($issue['User']['username'], array('controller' => 'users', 'action' => 'view', $issue['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($issue['Issue']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Casedescription'); ?></dt>
		<dd>
			<?php echo h($issue['Issue']['casedescription']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Claim'); ?></dt>
		<dd>
			<?php echo h($issue['Issue']['claim']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Imagepath'); ?></dt>
		<dd>
			<?php echo h($issue['Issue']['imagepath']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($issue['Issue']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($issue['Issue']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Issue'), array('action' => 'edit', $issue['Issue']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Issue'), array('action' => 'delete', $issue['Issue']['id']), null, __('Are you sure you want to delete # %s?', $issue['Issue']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Issues'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Issue'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Votings'), array('controller' => 'votings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Voting'), array('controller' => 'votings', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Votings'); ?></h3>
	<?php if (!empty($issue['Voting'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Voting Start'); ?></th>
		<th><?php echo __('Voting End'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($issue['Voting'] as $voting): ?>
		<tr>
			<td><?php echo $voting['id']; ?></td>
			<td><?php echo $voting['user_id']; ?></td>
			<td><?php echo $voting['voting_start']; ?></td>
			<td><?php echo $voting['voting_end']; ?></td>
			<td><?php echo $voting['created']; ?></td>
			<td><?php echo $voting['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'votings', 'action' => 'view', $voting['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'votings', 'action' => 'edit', $voting['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'votings', 'action' => 'delete', $voting['id']), null, __('Are you sure you want to delete # %s?', $voting['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Voting'), array('controller' => 'votings', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
