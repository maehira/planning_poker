<div id="user_list" class="row-fluid">
	<ul class="thumbnails">
		<li class="span2">
			<?php echo $this->Html->link($this->Html->image('user/user1.png'), '#', array('class' => 'thumbnail', 'escape' => false)); ?>
		</li>
		<li class="span2">
			<?php echo $this->Html->link($this->Html->image('user/user2.png'), '#', array('class' => 'thumbnail', 'escape' => false)); ?>
		</li>
		<li class="span2">
			<?php echo $this->Html->link($this->Html->image('user/user3.png'), '#', array('class' => 'thumbnail', 'escape' => false)); ?>
		</li>
		<li class="span2">
			<?php echo $this->Html->link($this->Html->image('user/user4.png'), '#', array('class' => 'thumbnail', 'escape' => false)); ?>
		</li>
		<li class="span2">
			<?php echo $this->Html->link($this->Html->image('user/user5.png'), '#', array('class' => 'thumbnail', 'escape' => false)); ?>
		</li>
	</ul>
</div>


<div id="user_list" class="row-fluid">
	<div class="action span6">
		<?php echo $this->Html->link("ラインを追加する", "#", array('id' => 'new_line', 'class' => 'btn')); ?>
		<?php echo $this->Html->link("テスト用付箋を枠内に追加", "#", array('id' => 'add_test', 'class' => 'btn')); ?>
	    <div id="poker_area">
	        <span class="poker_close bClose">
	            <span>X</span>
	        </span>
	        <div class="content"></div>
	    </div>
	</div>
	<div class="timer span6">
	    <?php echo $this->element('project_timer'); ?>
	</div>
</div>

