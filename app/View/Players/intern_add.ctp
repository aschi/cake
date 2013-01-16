<div class="players">
<?php echo $this->Form->create('Player'); ?>
	<fieldset>
		<legend><?php echo __('Add Player Profile'); ?></legend>
	<?php
		echo '<table border="0"><tr><td colspan="2">';
		echo $this->Form->input('playername');
		echo '</td></tr><tr><td>';
		echo $this->Form->input('player_club_id', array('empty' => '(Nicht in Liste)', 'label'=>'Club'));
		echo '</td><td>';
		echo $this->Form->input('new_player_club', array('label'=>'Club nicht in Liste'));
		echo '</td></tr><tr><td>';
		echo $this->Form->input('player_position_id', array('empty' => '(Nicht in Liste)', 'label'=>'Position'));
		echo '</td><td>';
		echo $this->Form->input('new_player_position', array('label'=>'Position nicht in Liste'));
		echo '</td></tr><tr><td colspan="2">';
		echo $this->Form->input('imagepath', array('class' => 'imageSelector'));
		echo '</td></tr><tr><td colspan="2">';
		echo $this->Form->input('description');
		echo '</td></tr><tr><td colspan="2">';
		echo $this->Form->input('motivation');
		echo '</td></tr>';
		echo '</table>';
	?>
	</fieldset>
<?php echo $this->Form->end(__('Save')); ?>
</div>
<?php 
	echo $this->element('imageselector'); 
?>