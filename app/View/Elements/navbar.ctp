	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<?php echo $this->Html->link('Planning Poker', '/', array('class' => 'brand')); ?>
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<div class="nav-collapse">
					<ul class="nav">
						<li><?php echo $this->Html->link("Home", array('controller' => 'projects', 'action' => 'start_x'), array('icon' => 'home')); ?></li>
						<li><?php echo $this->Html->link("付箋を追加する", "#", array('id' => 'new_fusen', 'icon' => 'tag')); ?></li>
						<li><?php echo $this->Html->link("ラインを追加する", "#", array('id' => 'new_line', 'icon' => 'list')); ?></li>
						<li><?php echo $this->Html->link("次のステップへ", "#", array('id' => 'next_step', 'icon' => 'arrow-right')); ?></li>
						<li><?php echo $this->Html->link("はじめから", "#", array('id' => 'restart', 'icon' => 'fast-backward')); ?></li>
					</ul>
				</div>
			    <ul class="nav pull-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<span id="username">
							<?php
								$username = AuthComponent::user('username');
								if(!empty($username)) {
									echo '@' . $username;
								}
							?>
							</span>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#">Settings</a></li>
							<li><a href="#">Logout</a></li>
						</ul>
					</li>
			    </ul>
			</div>
		</div>
	</div>
