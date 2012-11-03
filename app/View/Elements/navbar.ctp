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
					</ul>
				</div>
			    <ul class="nav pull-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<?php
								$username = AuthComponent::user('username');
								if(!empty($username)) {
									echo '@' . $username;
								}
							?>
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
