<div class="voting">
<h2><?php  echo __('Voting'); ?></h2>
	<dl>
		<dt><?php echo __('Author'); ?></dt>
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
	</dl>
</div>
<div class="related">
	<h3><?php echo __('Related Issues'); ?></h3>
	<?php if (!empty($voting['Issue'])): ?>
		<table>
			<tr>
				<?php
				$i = 0;
				foreach ($voting['Issue'] as $issue): 
				
				$thisCount = 0;
				$totalCount = 0;	
				
				foreach ($voting['Vote'] as $vote){
					if($vote['issue_id'] == $issue['id']){
						$thisCount++;
					}
					$totalCount++;
				}
				?>
				<td>
					<table cellpadding = "0" cellspacing = "0" class="caseDescription">
					<tr>
						<th class="caseDescriptionTitle"><?php echo $issue['title']; ?></th>
					<tr>
					<tr>
						<td style="text-align:center;"><img src="<?php echo $issue['imagepath']; ?>"></td>
					</tr>
					<tr>
						<th><?php echo __('Description'); ?></th>
					</tr>
					<tr>
						<td><?php echo $issue['casedescription']; ?></td>
					</tr>
					<tr>
						<th><?php echo __('Needed Money'); ?></th>
					</tr>
					<tr>
						<td><?php echo $issue['claim']; ?> CHF</td>
					</tr>
					<?php if (!empty($voting['Issue'])): ?>
					<tr>
						<th><?php echo __('Voting Result'); ?></th>
					</tr>
					<tr>
						<td><?php echo $thisCount.'/'.$totalCount.' ('.round((100/$totalCount*$thisCount), 2).'%)';?></td>
					</tr>
					<?php endif; ?>
					<?php if ($votesavailable): ?>
					<tr>
						<td class="actions">
							<?php echo $this->Html->link(__('Vote'), array('controller' => 'votings', 'action' => 'vote', $voting['Voting']['id'], $issue['id'])); ?>
						</td>
					</tr>
					<?php endif; ?>
					</table>
				</td>
			<?php endforeach; ?>
				<td style="width:100%;"></td>
			</tr>
		</table>	
<?php endif; ?>
</div>
