<div class="stories">
		<?php
	foreach ($stories as $story): ?>
	<div class="news">
	<span class="newsDate"><?php echo date('d.m.Y', strtotime($story['Story']['modified'])); ?></span>
    <h1><?php echo h($story['Story']['title']); ?></h1>
        <p><?php echo ($story['Story']['storytext']); ?></p>	
    </div>
    <hr>
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