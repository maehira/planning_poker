
  <script src="http://js.pusher.com/1.11/pusher.min.js" type="text/javascript"></script>
  <script type="text/javascript">
    // Enable pusher logging - don't include this in production
    Pusher.log = function(message) {
      if (window.console && window.console.log) window.console.log(message);
    };

    // Flash fallback logging - don't include this in production
    WEB_SOCKET_DEBUG = true;
    
    Pusher.channel_auth_endpoint = 'pusher_auth'; //自サイトの認証URL

    var pusher = new Pusher("<?php echo($pusher_key) ?>"); // ←API取得時に控えたAPI keyを書く。
    var channel = pusher.subscribe('private-channel');
    
    channel.bind('test_event', function(data) {
      alert(data);
    });
  </script>
  
  <p>pusher API test</p>
  