<input id="new_fusen" class="btn" type="button" value="付箋を追加する">
<div class="chat-container">
    <div id="chat-messages" class="chat-messages"></div>
    <div class="chat-input">
        <textarea id="chat_message" name="chat_message"></textarea>
    </div>
    <button id="send_chat_message" class="btn btn-large" style="width: 90px;">送信</button>
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
    
    channel.bind('test_event', function(data) {
      $("#chat-messages").append(data);
    });
</script>