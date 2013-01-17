<div class="news">
	<h2><?php echo __('News'); ?></h2>
		<?php
	foreach ($news as $news): ?>
	<div class="news">
    <span class="newsDate"><?php echo date('d.m.Y', strtotime($news['News']['modified'])); ?></span>
    <h1><?php echo h($news['News']['title']); ?></h1>
        <p><?php echo h($news['News']['previewtext']); ?></p>	
    </div>
	<div class="mehr"><?php echo $this->Html->link(__('more...'), array('controller' => 'news', 'action' => 'view', $news['News']['id'])); ?></div>
<?php endforeach; ?>
	
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?></p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>