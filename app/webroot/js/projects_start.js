/* 
 * sortableのセット
 */
function set_sortable(id) {
    $('#' + id).sortable();
    $('#' + id).disableSelection();
    $('#' + id).bind('sortstop', function (e, ui) {
        // ソートが完了したら実行される。
        var rows = $('#' + id + ' .rank');
        for (var i = 0, rowTotal = rows.length; i < rowTotal; i += 1) {
            $($('.rank')[i]).text(i + 1);
        }
    })
}

set_sortable('sortable');
        
    
    
    $("#submit_backlog").click(function() {
        var backlogs = [];
        var rows = $('#sortable #backLogText');
        for (var i = 0, rowTotal = rows.length; i < rowTotal; i += 1) {
            backlogs.push(rows[i].value);
        }
        $.ajax({
            type: 'POST',
            url: './start',
            data: 'backlogs=' + backlogs + '&data[step]=next',
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
            url: './send_chat_message',
            data: 'chat_message=' + $("#chat_message").val(),
            success: function(data){
                $("#chat-messages").append(data);
            }
        });
    });


