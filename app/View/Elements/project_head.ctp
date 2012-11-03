<div id="user_list" class="row-fluid">
	<ul class="thumbnails">
		<li class="span2">
			<?php echo $this->Html->link($this->Html->image('user/user1.png'), '#', array('class' => 'thumbnail', 'escape' => false)); ?>
			<div id="select_card_zone1"></div>
		</li>
		<li class="span2">
			<?php echo $this->Html->link($this->Html->image('user/user2.png'), '#', array('class' => 'thumbnail', 'escape' => false)); ?>
			<div id="select_card_zone2"></div>
		</li>
		<li class="span2">
			<?php echo $this->Html->link($this->Html->image('user/user3.png'), '#', array('class' => 'thumbnail', 'escape' => false)); ?>
			<div id="select_card_zone3"></div>
		</li>
		<li class="span2">
			<?php echo $this->Html->link($this->Html->image('user/user4.png'), '#', array('class' => 'thumbnail', 'escape' => false)); ?>
			<div id="select_card_zone4"></div>
		</li>
		<li class="span2">
			<?php echo $this->Html->link($this->Html->image('user/user5.png'), '#', array('class' => 'thumbnail', 'escape' => false)); ?>
			<div id="select_card_zone5"></div>
		</li>
	</ul>
</div>


<script type="text/javascript">
    // Enable pusher logging - don't include this in production
    Pusher.log = function(message) {
        if (window.console && window.console.log) window.console.log(message);
    };

    // Flash fallback logging - don't include this in production
    WEB_SOCKET_DEBUG = true;

    Pusher.channel_auth_endpoint = './pusher_auth'; //自サイトの認証URL

    var pusher = new Pusher("<?php echo($pusher_key) ?>"); // ←API取得時に控えたAPI keyを書く。
    var channel = pusher.subscribe('private-channel');

    channel.bind('send_cardimg_ch', function(data) {
      $("#select_card_zone1").append(data);
    });
    channel.bind('send_cardimg_ch_other', function(data) {
      $("#select_card_zone2").append(data);
      $("#select_card_zone3").append(data);
      $("#select_card_zone4").append(data);
      $("#select_card_zone5").append(data);
    });
</script>
