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
			<?php echo $story['Story']['storytext'] ?>
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
<div class="actions">
	<h3><?php echo __('Aktionen'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Bearbeiten'), array('action' => 'edit', $story['Story']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Löschen'), array('action' => 'delete', $story['Story']['id']), null, __('Are you sure you want to delete # %s?', $story['Story']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Übersicht'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Geschichte hinzufügen'), array('action' => 'add')); ?> </li>
	</ul>
</div>
