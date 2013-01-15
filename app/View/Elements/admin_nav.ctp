		<div id="menu">
			<ul>
				<li><?=$this->Html->link(__('News'), array('controller' => 'news', 'action' => 'admin_index'));?></li>
				<li><?=$this->Html->link(__('Users'), array('controller' => 'users', 'action' => 'admin_index'));?></li>
				<li><?=$this->Html->link(__('Stories'), array('controller' => 'stories', 'action' => 'admin_index'));?></li>
				<li><?=$this->Html->link(__('Über uns'), array('controller' => 'stories', 'action' => 'admin_index'));?></li>
				<li><?=$this->Html->link(__('Kandidaten'), array('controller' => 'issues', 'action' => 'admin_index'));?></li>
				<li><?=$this->Html->link(__('Budget'), array('controller' => 'bookings', 'action' => 'admin_index'));?>/li>
				<li><?=$this->Html->link(__('Abstimmungen'), array('controller' => 'votings', 'action' => 'admin_index'));?></li>
			</ul>
		</div>