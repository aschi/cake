<div class="Bookings">
	<h2><?php echo __('Bookings'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo __('Transactiondate'); ?></th>
			<th><?php echo __('Description'); ?></th>
			<th><?php echo __('Income'); ?></th>
			<th><?php echo __('Expenses'); ?></th>
	</tr>
	<?php
	foreach ($bookings as $booking): ?>
	<tr>
		<td><?php echo date("d.m.Y", strtotime($booking['Booking']['transactiondate'])); ?>&nbsp;</td>
		<td><?php echo h($booking['Booking']['description']); ?>&nbsp;</td>
		<td>
			<?php 
				if($booking['Booking']['value'] >= 0){
					echo h($booking['Booking']['value']);
				}
			?>&nbsp;
		</td>
		<td>
			<?php 
				if($booking['Booking']['value'] < 0){
					echo h($booking['Booking']['value']);
				}
			?>&nbsp;
		</td>
		
	</tr>
<?php endforeach; ?>
	<tr>
		<td class="totalRow"><?php echo  __('Total:'); ?></td>
		<td class="totalRow"></td>
		<td class="totalRow">
			<?php
				if($total[0][0]['total'] >= 0){
					echo h($total[0][0]['total']);
				}
			?>
		</td>
		<td class="totalRow">
			<?php
				if($total[0][0]['total'] < 0){
					echo h($total[0][0]['total']);
				}
			?>
		</td>
	</tr>

	</table>
</div>
