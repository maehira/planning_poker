<div id="chat-area">
	<div class="input-prepend">
		<span class="add-on" id="user-name"><i class="icon-user"></i></span>
		<input type="text" id="textbox" placeholder="今なにしてる？">
	</div>
</div>
<ul id="chat-history" class="unstyled row-fluid"></ul>






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




	var username = $('#username').text();

	// チャット要素のベース作成

	// 入室イベントをキャッチ
	pusher.connection.bind('connected', function() {
	var item = $('<li/>').append(
		$('<div/>').append(
		$('<i/>').addClass('icon-user'))
	);
		item.addClass('alert alert-info fade in')
		.prepend('<button type="button" class="close" data-dismiss="alert">×</button>')
		.children('div').children('i').after(username + 'が入室しました');
	$('#chat-history').prepend(item).hide().fadeIn(500);
	});

	// 退室イベントをキャッチ
	pusher.connection.bind('disconnected', function() {
	var item = $('<li/>').append(
		$('<div/>').append(
		$('<i/>').addClass('icon-user'))
	);
		item.addClass('alert fade in')
		.prepend('<button type="button" class="close" data-dismiss="alert">×</button>')
		.children('div').children('i').after(username + 'が退室しました');
	$('#chat-history').prepend(item).hide().fadeIn(500);
	});

	// チャットイベントをキャッチ
	channel.bind('test_event', function(e) {
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
				url: './send_chat_message',
				data: 'chat_message=' + textbox.value
			});
			textbox.value = '';
		}
	};

    channel.bind('test_event', function(data) {
      $("#chat-messages").append(data);
    });
    channel.bind('newline', function(data) {
        if(data.userid != <?php echo AuthComponent::user('id');?>){
            console.log(data);
            appendBacklogField(data.linenumber);
        }
    });
    channel.bind('fix_fusen', function(data) {
//        if(data.userid != <?php echo AuthComponent::user('id');?>){
            fix_fusen_from_other(data.add_area_id);
//        }
    });
</script>
