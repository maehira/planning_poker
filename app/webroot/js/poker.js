/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


    $('#sortable').sortable();
    $('#sortable').disableSelection();
        
    $('#sortable').bind('sortstop', function (e, ui) {
        // ソートが完了したら実行される。
        var rows = $('#sortable .rank');
        for (var i = 0, rowTotal = rows.length; i < rowTotal; i += 1) {
            $($('.rank')[i]).text(i + 1);
        }
    })
    
    $("#submit").click(function() {
        var backlogs = [];
        var rows = $('#sortable #backLogText');
        for (var i = 0, rowTotal = rows.length; i < rowTotal; i += 1) {
            backlogs.push(rows[i].name);
        }
        $.ajax({
            type: 'POST',
            url: 'index',
            data: 'backlogs=' + backlogs,
            success: function(data){
                $('#wrapper_poker').empty();
                $('#wrapper_poker').append(data);
            }
        });
        $("form").submit();
    });
    
    $("#send_chat_message").click(function(){
        $.ajax({
            type: 'POST',
            url: 'send_chat_message',
            data: 'word=' + $(".chat_message").val(),
            success: function(data){
                $("#chat-messages").append(data);
            }
        });
    });
    
    $('#backlog_send_form').submit(function() {
        return false;
    });
    $('#send_chat_message_form').submit(function() {
        return false;
    });



  
    