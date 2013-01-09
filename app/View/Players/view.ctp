<div class="players view">
<h2><?php  echo __('Player'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($player['Player']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Playername'); ?></dt>
		<dd>
			<?php echo h($player['Player']['playername']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($player['User']['username'], array('controller' => 'users', 'action' => 'view', $player['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Player Club'); ?></dt>
		<dd>
			<?php echo $this->Html->link($player['PlayerClub']['clubname'], array('controller' => 'player_clubs', 'action' => 'view', $player['PlayerClub']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Player Position'); ?></dt>
		<dd>
			<?php echo $this->Html->link($player['PlayerPosition']['position'], array('controller' => 'player_positions', 'action' => 'view', $player['PlayerPosition']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Imagepath'); ?></dt>
		<dd>
			<?php echo h($player['Player']['imagepath']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($player['Player']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Motivation'); ?></dt>
		<dd>
			<?php echo h($player['Player']['motivation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($player['Player']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($player['Player']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Player'), array('action' => 'edit', $player['Player']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Player'), array('action' => 'delete', $player['Player']['id']), null, __('Are you sure you want to delete # %s?', $player['Player']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Players'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Player Clubs'), array('controller' => 'player_clubs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player Club'), array('controller' => 'player_clubs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Player Positions'), array('controller' => 'player_positions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player Position'), array('controller' => 'player_positions', 'action' => 'add')); ?> </li>
	</ul>
</div>
