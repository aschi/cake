<div class="players">
<?php echo $this->Form->create('Player'); ?>
	<fieldset>
		<legend><?php echo __('Edit Player Profile'); ?></legend>
	<?php
		echo $this->Form->input('id', array('div'=>false));
		echo '<table border="0"><tr><td colspan="2">';
		echo $this->Form->input('playername');
		echo '</td></tr><tr><td>';
		echo $this->Form->input('player_club_id', array('empty' => '(Nicht in Liste)', 'label'=>'Club', 'div' => false));
		echo '</td><td>';
		echo $this->Form->input('new_player_club', array('label'=>'Club nicht in Liste', 'div' => false));
		echo '</td></tr><tr><td>';
		echo $this->Form->input('player_position_id', array('empty' => '(Nicht in Liste)', 'label'=>'Position', 'div' => false));
		echo '</td><td>';
		echo $this->Form->input('new_player_position', array('label'=>'Position nicht in Liste', 'div' => false));
		echo '</td></tr><tr><td colspan="2">';
		echo $this->Form->input('imagepath', array('class' => 'imageSelector'), array('label'=>'Profilbild (100x125px)', 'div'=>false));
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