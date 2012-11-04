<div id="side-menu" class="row-fluid">
	<div id="user_list">
		<ul class="thumbnails">
			<li id="user01" class="user-icon span2">
				<?php echo $this->Html->link($this->Html->image('user/user1.png'), '#', array('class' => 'thumbnail offline', 'rel' => 'tooltip', 'data-original-title' => 'mawatari', 'escape' => false)); ?>
				<div id="select_card_zone_mawatari"></div>
			</li>
			<li id="user02" class="user-icon span2">
				<?php echo $this->Html->link($this->Html->image('user/user2.png'), '#', array('class' => 'thumbnail offline', 'rel' => 'tooltip', 'data-original-title' => 'oota', 'escape' => false)); ?>
				<div id="select_card_zone_oota"></div>
			</li>
			<li id="user03" class="user-icon span2">
				<?php echo $this->Html->link($this->Html->image('user/user3.png'), '#', array('class' => 'thumbnail offline', 'rel' => 'tooltip', 'data-original-title' => 'maehira', 'escape' => false)); ?>
				<div id="select_card_zone_maehira"></div>
			</li>
			<li id="user04" class="user-icon span2">
				<?php echo $this->Html->link($this->Html->image('user/user4.png'), '#', array('class' => 'thumbnail offline', 'rel' => 'tooltip', 'data-original-title' => 'seike', 'escape' => false)); ?>
				<div id="select_card_zone_seike"></div>
			</li>
			<li id="user05" class="user-icon span2">
				<?php echo $this->Html->link($this->Html->image('user/user5.png'), '#', array('class' => 'thumbnail offline', 'rel' => 'tooltip', 'data-original-title' => 'iPad欲しい', 'escape' => false)); ?>
				<div id="select_card_zone_iPad"></div>
			</li>
		</ul>
	</div>
	<div id="chat-area">
		<?php echo $this->Html->image('/img/loading.gif', array('id' => 'chat-loading')); ?>
		<div class="input-prepend" id="chat-input">
			<span class="add-on" id="user-name"><i class="icon-user"></i></span>
			<input type="text" id="textbox" class="span9" placeholder="チャットしよう">
		</div>
	</div>
</div>
<ul id="chat-history" class="unstyled row-fluid"></ul>





<!--<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="http://twitter.github.com/bootstrap/assets/js/bootstrap.js"></script>-->
<script>
	$(function(){
		$('a[rel=tooltip]').tooltip({'placement': 'top'});
		$('a[rel=popover]').popover();
	});

	var nav = $('#side-menu'),
        offset = nav.offset(),
	    width = nav.width();
	$(window).scroll(function () {
	if($(window).scrollTop() > offset.top - 60) {
	    nav.addClass('fixed').width(width);
		$('#chat-history').css('margin-top', '120px');
	} else {
	    nav.removeClass('fixed');
		$('#chat-history').css('margin-top', '0px');
	}
});
</script>


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

    channel.bind('send_cardimg_ch_mawatari', function(data) {
      $("#select_card_zone_mawatari").append(data);
    });

    channel.bind('send_cardimg_ch_oota', function(data) {
      $("#select_card_zone_oota").append(data);
    });

    channel.bind('send_cardimg_ch_maehira', function(data) {
      $("#select_card_zone_maehira").append(data);
    });

    channel.bind('send_cardimg_ch_seike', function(data) {
      $("#select_card_zone_seike").append(data);
    });

    channel.bind('send_cardimg_ch_iPad', function(data) {
      $("#select_card_zone_iPad").append(data);
    });

</script>






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




	$('#chat-input').hide();
	var username = $('#username').text();

	// 入室イベントの発生
	channel.bind('pusher:subscription_succeeded', function() {
		$.ajax({
			type: 'POST',
			url: './ws_chat_event',
			data: 'type=join_event'
		});
		$('#user-name').append(username);
	});
	// 入室イベントのキャッチ
	channel.bind('join_event', function(e) {
		var data = $.parseJSON(e);
		$('#chat-loading').hide();
		// ユーザアイコンを有効にする。とりあえず動かす。
		if (data.username == ' @mawatari') {
			$('#user01 > a').removeClass('offline');
		} else if (data.username == ' @oota') {
			$('#user02 > a').removeClass('offline');
		} else if (data.username == ' @maehira') {
			$('#user03 > a').removeClass('offline');
		} else if (data.username == ' @seike') {
			$('#user04 > a').removeClass('offline');
		}
		$('#chat-input').fadeIn(500);
		$('#textbox').focus();

		var item = $('<li/>').append(
			$('<div/>').append(
			$('<i/>').addClass('icon-user'))
		);
		item.addClass('alert alert-info fade in')
		.prepend('<button type="button" class="close" data-dismiss="alert">×</button>')
		.children('div').children('i').after(data.username + 'が入室しました');
		$('#chat-history').prepend(item).hide().fadeIn(500);
	});

	// 退室イベントの発生
	// 退室イベントのキャッチ

	// チャットイベントをキャッチ
	channel.bind('chat_event', function(e) {
		var data = $.parseJSON(e);
		var item = $('<li/>').append(
			$('<div/>').append(
			$('<i/>').addClass('icon-user'))
		);
		item.addClass('well well-small')
		.append($('<div/>').text(data.text))
		.children('div').children('i').after(data.username);
		$('#chat-history').prepend(item).hide().fadeIn(500);
	});


	textbox.onkeydown = function(event) {
		// エンターキーを押したとき
		if (event.keyCode === 13 && textbox.value.length > 0) {
			$.ajax({
				type: 'POST',
				url: './ws_chat_event',
				data: 'type=chat_event&chat_message=' + textbox.value
			});
			textbox.value = '';
		}
	};

    channel.bind('newline', function(data) {
        if(data.userid != <?php echo AuthComponent::user('id');?>){
            console.log(data);
            appendBacklogField(data.linenumber);
        }
    });
    channel.bind('fix_fusen', function(data) {
        if(data.userid != <?php echo AuthComponent::user('id');?>){
            fix_fusen_from_other(data.add_area_id);
        }
    });
    channel.bind('next_step', function(data) {
        switch(data.step) {
            case "1":
                set_estimation();
                break
            case "2":
                set_poker("1");
                break
        }
    });
</script>
