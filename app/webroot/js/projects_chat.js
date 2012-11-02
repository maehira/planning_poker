/**
 * チャットメッセージの送信
 */
$("#send_chat_message").click(function(){
    $.ajax({
        type: 'POST',
        url: './send_chat_message',
        data: 'chat_message=' + $("#chat_message").val(),
        success: function(data){
            $("#chat-messages").append(data);
        }
    });
});

