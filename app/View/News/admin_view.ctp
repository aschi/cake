<div class="news view">
<h2><?php  echo __('News'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($news['News']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($news['User']['username'], array('controller' => 'users', 'action' => 'view', $news['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Previewtext'); ?></dt>
		<dd>
			<?php echo h($news['News']['previewtext']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo $this->Html->link($news['Image']['title'], array('controller' => 'images', 'action' => 'view', $news['Image']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Newstext'); ?></dt>
		<dd>
			<?php echo h($news['News']['newstext']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($news['News']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($news['News']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit News'), array('action' => 'edit', $news['News']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete News'), array('action' => 'delete', $news['News']['id']), null, __('Are you sure you want to delete # %s?', $news['News']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List News'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New News'), array('action' => 'add')); ?> </li>
	</ul>
</div>
