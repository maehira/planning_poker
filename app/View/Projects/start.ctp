<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
  <div class="flipper">
    <div class="front">
      <img src="../img/poker/5.png" alt="5" />
    </div>
    <div class="back">
      <img src="../img/poker/1.png" alt="1" />
    </div>
  </div>
</div>



<div id="wrapper_poker">
  <button id="submit_backlog" class="btn btn-large" style="width: 150px;">
    次へ
  </button>
  
  <div style="margin-left: -20px;">
    <div class="span8" style="margin-top: 10px">
      <div>優先順位 &nbsp&nbsp&nbspプロダクトバックログ</div>
      <ul id="sortable">
        <li class="ui-state-default">
          <span class="priorityNumber rank">1</span>
          <textarea id="backLogText" name="1000" style="resize: vertical; width: 400px"></textarea>
        </li>
        <li class="ui-state-default">
          <span class="priorityNumber rank">2</span>
          <textarea id="backLogText" name="1001" style="resize: vertical; width: 400px"></textarea>
        </li>
        <li class="ui-state-default">
          <span class="priorityNumber rank">3</span>
          <textarea id="backLogText" name="1002" style="resize: vertical; width: 400px"></textarea>
        </li>
        <li class="ui-state-default">
          <span class="priorityNumber rank">4</span>
          <textarea id="backLogText" name="1003" style="resize: vertical; width: 400px"></textarea>
        </li>
        <li class="ui-state-default">
          <span class="priorityNumber rank">5</span>
          <textarea id="backLogText" name="1004" style="resize: vertical; width: 400px"></textarea>
        </li>
      </ul>
    </div>
    <div class="span4 chat-container">
      <div id="chat-messages" class="chat-messages"></div>
        <div class="chat-input">
          <textarea id="chat_message" name="chat_message"></textarea>
        </div>
        <button id="send_chat_message" class="btn btn-large" style="width: 90px;">送信</button>
    </div>
  </div>
</div>


<?php echo $this->Html->script('projects_start'); ?>
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