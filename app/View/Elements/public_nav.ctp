		<div id="menu">
			<ul>
				<li><?php echo $this->Html->link(__('News'), array('controller' => 'news', 'action' => 'index')); ?></li>
				<li><?php echo $this->Html->link(__('Participants'), array('controller' => 'players', 'action' => 'index')); ?></li>
				<li><?php echo $this->Html->link(__('Stories'), array('controller' => 'stories', 'action' => 'index')); ?></li>
				<li><?php echo $this->Html->link(__('Vision'), array('controller' => 'pages', 'action' => 'display', '1')); ?></li>
				<li><?php echo $this->Html->link(__('Apply'), array('controller' => 'pages', 'action' => 'display', '2')); ?></li>
			</ul>
		</div>