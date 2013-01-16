		<div id="menu">
			<ul>
				<li><?=$this->Html->link(__('News'), array('admin'=>true, 'controller' => 'news', 'action' => 'index'));?></li>
				<li><?=$this->Html->link(__('Users'), array('admin'=>true, 'controller' => 'users', 'action' => 'index'));?></li>
				<li><?=$this->Html->link(__('Stories'), array('admin'=>true, 'controller' => 'stories', 'action' => 'index'));?></li>
				<li><?=$this->Html->link(__('Über uns'), array('admin'=>true, 'controller' => 'stories', 'action' => 'index'));?></li>
				<li><?=$this->Html->link(__('Kandidaten'), array('admin'=>true, 'controller' => 'issues', 'action' => 'index'));?></li>
				<li><?=$this->Html->link(__('Abstimmungen'), array('admin'=>true, 'controller' => 'votings', 'action' => 'index'));?></li>
				<li><?=$this->Html->link(__('Budget'), array('admin'=>true, 'controller' => 'bookings', 'action' => 'index'));?></li>
				<li><?=$this->Html->link(__('Logout'), array('admin'=>false, 'controller' => 'users', 'action' => 'logout')); ?></li>
			</ul>
		</div>