<div class="players">
	<h1><?php echo __('Participants'); ?></h2>
		<?php
	foreach ($player as $play): ?>
	<table class="player">
		<tr>
			<td rowspan="3"><img src="<?php echo $play['Player']['imagepath']; ?>" height="125px" width="100px"></td>
			<th style="height:1em;vertical-align:top"><?php echo h($play['Player']['playername']); ?></th>
		</tr>
		<tr>
			<td style="height:1em;vertical-align:top"><?php echo h($play['PlayerClub']['clubname']); ?></td>
		</tr>
		<tr>
			<td style="height:1em;vertical-align:top"><?php echo h($play['PlayerPosition']['position']); ?></td>
		</tr>
		<tr>
			<td><?php echo h($play['Player']['motivation']); ?></td>
		</tr>
	</table>
   <div class="mehr"><?php echo $this->Html->link(__('more...'), array('controller' => 'players', 'action' => 'view', $play['Player']['id'])); ?></div>
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