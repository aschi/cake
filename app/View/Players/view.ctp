<div class="players">
<h2><?php echo h($player['Player']['playername']); ?></h2>
<table width="100%">
	<tr>
		<td valign="top" class="bold" width="100px"><?php echo __('Player Club'); ?></td>
		<td valign="top"><?php echo $player['PlayerClub']['clubname']; ?></td>
		<td rowspan="5" width="100px"><img src="<?=$player['Player']['imagepath'];?>" width="100px" height="125px"></td>
	</tr>
	<tr>
		<td valign="top" class="bold" width="100px"><?php echo __('Player Position'); ?></td>
		<td valign="top"><?php echo $player['PlayerPosition']['position']; ?></td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td valign="top" class="bold" width="100px"><?php echo __('Description'); ?></td>
		<td valign="top"><?php echo h($player['Player']['description']); ?></td>
	</tr>
	<tr>
		<td valign="top" class="bold" width="100px"><?php echo __('Motivation'); ?></td>
		<td valign="top"><?php echo h($player['Player']['motivation']); ?></td>
	</tr>	
</table>
<div class="mehr"><?php echo $this->Html->link(__('back'), array('controller' => 'players', 'action' => 'index')); ?></div>
</div>