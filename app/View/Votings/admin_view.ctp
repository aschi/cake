<div class="votings view">
<h2><?php  echo __('Voting'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($voting['Voting']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($voting['User']['username'], array('controller' => 'users', 'action' => 'view', $voting['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Voting Start'); ?></dt>
		<dd>
			<?php echo h($voting['Voting']['voting_start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Voting End'); ?></dt>
		<dd>
			<?php echo h($voting['Voting']['voting_end']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($voting['Voting']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($voting['Voting']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Voting'), array('action' => 'edit', $voting['Voting']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Voting'), array('action' => 'delete', $voting['Voting']['id']), null, __('Are you sure you want to delete # %s?', $voting['Voting']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Votings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Voting'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Votes'); ?></h3>
	<?php if (!empty($voting['Vote'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Voting Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($voting['Vote'] as $vote): ?>
		<tr>
			<td><?php echo $vote['id']; ?></td>
			<td><?php echo $vote['user_id']; ?></td>
			<td><?php echo $vote['voting_id']; ?></td>
			<td><?php echo $vote['created']; ?></td>
			<td><?php echo $vote['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'votes', 'action' => 'view', $vote['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'votes', 'action' => 'edit', $vote['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'votes', 'action' => 'delete', $vote['id']), null, __('Are you sure you want to delete # %s?', $vote['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Vote'), array('controller' => 'votes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Votes Availables'); ?></h3>
	<?php if (!empty($voting['VotesAvailable'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Voting Id'); ?></th>
		<th><?php echo __('Novotes'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($voting['VotesAvailable'] as $votesAvailable): ?>
		<tr>
			<td><?php echo $votesAvailable['id']; ?></td>
			<td><?php echo $votesAvailable['user_id']; ?></td>
			<td><?php echo $votesAvailable['voting_id']; ?></td>
			<td><?php echo $votesAvailable['novotes']; ?></td>
			<td><?php echo $votesAvailable['created']; ?></td>
			<td><?php echo $votesAvailable['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'votes_availables', 'action' => 'view', $votesAvailable['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'votes_availables', 'action' => 'edit', $votesAvailable['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'votes_availables', 'action' => 'delete', $votesAvailable['id']), null, __('Are you sure you want to delete # %s?', $votesAvailable['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Votes Available'), array('controller' => 'votes_availables', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Issues'); ?></h3>
	<?php if (!empty($voting['Issue'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Casedescription'); ?></th>
		<th><?php echo __('Claim'); ?></th>
		<th><?php echo __('Imagepath'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($voting['Issue'] as $issue): ?>
		<tr>
			<td><?php echo $issue['id']; ?></td>
			<td><?php echo $issue['user_id']; ?></td>
			<td><?php echo $issue['title']; ?></td>
			<td><?php echo $issue['casedescription']; ?></td>
			<td><?php echo $issue['claim']; ?></td>
			<td><?php echo $issue['imagepath']; ?></td>
			<td><?php echo $issue['created']; ?></td>
			<td><?php echo $issue['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'issues', 'action' => 'view', $issue['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'issues', 'action' => 'edit', $issue['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'issues', 'action' => 'delete', $issue['id']), null, __('Are you sure you want to delete # %s?', $issue['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Issue'), array('controller' => 'issues', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
