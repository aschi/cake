		<div id="menu">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Profile'), array('intern'=>true, 'controller' => 'players', 'action' => 'edit')); ?></li>
				<li><?php echo $this->Html->link(__('Edit Account'), array('intern'=>true, 'controller' => 'users', 'action' => 'edit')); ?></li>
				<li><?php echo $this->Html->link(__('Votings'), array('intern'=>true, 'controller' => 'votings', 'action' => 'index')); ?></li>
				<li><?php echo $this->Html->link(__('Logout'), array('intern'=>false, 'controller' => 'users', 'action' => 'logout')); ?></li>
			</ul>
		</div>