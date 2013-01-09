<div class="Bookings form">
<?php echo $this->Form->create('Booking'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Booking'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('value');
		echo $this->Form->input('description');
		echo $this->Form->input('transactiondate', array('dateFormat'=>'DMY'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Booking.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Booking.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Bookings'), array('action' => 'index')); ?></li>
	</ul>
</div>
