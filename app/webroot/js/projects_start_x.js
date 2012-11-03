/**
 * 次のステップへ
 */
$(function() {
    $('#next_step').click(function() {
        $.ajax({
            type: 'POST',
            url: './start_x',
            data: 'data[step]=next',
            success: function(data){
            }
        });
    });
    return false;
})

/**
 * 最初から
 */
$(function() {
    $('#restart').click(function() {
        $.ajax({
            type: 'POST',
            url: './start_x',
            data: 'data[step]=reset',
            success: function(data){
            }
        });
    });
    return false;
})