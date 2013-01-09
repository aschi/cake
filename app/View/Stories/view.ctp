<div class="stories view">
<h2><?php  echo __('Story'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($story['Story']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($story['Story']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Storytext'); ?></dt>
		<dd>
			<?php echo h($story['Story']['storytext']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($story['User']['username'], array('controller' => 'users', 'action' => 'view', $story['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($story['Story']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($story['Story']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>