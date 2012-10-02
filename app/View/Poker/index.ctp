

<div id="wrapper_poker">
    <form id="backlog_send_form" method="post">
        <button id="submit" class="btn btn-large" style="width: 150px;">
            次へ
        </button>
    </form>
        
    <div class="row">
        <div class="span8" style="margin-top: 10px">
            <table class="table table-striped table-bordered" style="width: 560px;">
                <thead>
                    <tr>
                        <th class="priorityNumber">優先順位</th>
                        <th class="backLog">プロダクトバックログ</th>
                    </tr>
                </thead>
                <tbody id="sortable">
                    <tr>
                        <td class="priorityNumber rank">1</td>
                        <th class="backLog">
                            <textarea id="backLogText" name="1000" style="resize: vertical; width: 400px">
                            </textarea>
                        </th>
                    </tr>
                    <tr>
                        <td class="priorityNumber rank">2</td>
                        <th class="backLog">
                            <textarea id="backLogText" name="1001" style="resize: vertical; width: 400px">
                            </textarea>
                        </th>
                    </tr>
                    <tr>
                        <td class="priorityNumber rank">3</td>
                        <th class="backLog">
                            <textarea id="backLogText" name="1002" style="resize: vertical; width: 400px">
                            </textarea>
                        </th>
                    </tr>
                    <tr>
                        <td class="priorityNumber rank">4</td>
                        <th class="backLog">
                            <textarea id="backLogText" name="1003" style="resize: vertical; width: 400px">
                            </textarea>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
            
            
        <div class="span4 chat-container">
            <div id="chat-messages" class="chat-messages"></div>
            <form method="post" id="send_chat_message_form">
                <div class="chat-input">
                    <textarea id="chat_message" name="chat_message"></textarea>
                </div>
                <button id="send_chat_message" class="btn btn-large" style="width: 90px;">送信</button>
            </form>
        </div>
            
    </div>
</div>

<?php echo $this->Html->script('http://js.pusher.com/1.11/pusher.min.js'); ?>
<?php echo $this->Html->script('poker'); ?>
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
      $("#chat-messages").append(data);
    });
</script>