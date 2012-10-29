/**
 * ポーカー開始ボタンのクリック時のモーダルウィンドウ
 */
$('#start_poker').bind('click', function(e) {
    e.preventDefault();
    $('#poker_area').bPopup({
        contentContainer: '.content',
        loadUrl: 'poker',
        modalClose: false,
        onClose: function() { alert('Close'); }
    });
});






var husen_number = 1;

$(function() {
    $('#new_husen').click(function() {
        make();
        husen_number = husen_number + 1; 
    });
})

$(function() {
    $('#new_line').click(function() {
        var rows = $('#sortable .priority');
        var priority = parseInt($($('.priority')[rows.length - 1]).text(), 10) + 1;
        $('#sortable').append('<li class="line ui-state-default">' +
                              '<span class="priority">' + priority +
                              '</span>' +
                              '</li>'
                             );
    });
})

$(function() {
    $('#add_test').click(function() {
        var sticky = $('<div id="stickies1_100" style="float: left"><div class="stittl">' +
                   'maehira<div class="sticlose">×</div></div>' +
                   '<textarea class="stimain" id="" name="1000"></textarea></div>'
                     );
        $($('#sortable .items')[0]).append(sticky);
        var width = $($('#sortable .items')[0]).width() + 180
        $($('#sortable .items')[0]).width(width);
        set_husen_in_line('stickies1_100' ,200, 75, '#666', '#fff', '1px solid #ccc', 12, '#eeeeee');
    });
})
  

function make() {
    var sticky = $('<div id="stickies1_' + husen_number + '"><div class="stittl">' +
                   'maehira<div class="sticlose">×</div></div>' +
                   '<textarea class="stimain" id="" name="1000"></textarea></div>'
                 );
    sticky.appendTo('body');
    var id = '#stickies1_' + husen_number;
    set_husen(id ,850 , 80, 200, 75, '#666', '#fff', '1px solid #ccc', 12, '#eeeeee');
  }


/**
 * 付箋設定
 */
function set_husen(stID, wx, wy, ww, wh, co, bc, lc, zi, tc){
    $(stID).css({
        position: 'absolute', 
        top: wy, 
        left: wx, 
        width: ww, 
        height: wh, 
        color: co,
        //'background-color': bc,
        //'border': lc,
        'z-index': zi
    }).fadeIn('slow');
    $(stID + ' .stittl').css({
        'background-color': tc
    }).fadeIn('slow');
    $(stID + ' .stittl .sticlose').click(function(){
        $(stID).fadeOut('slow');
    });
    $(stID + ' .stittl').mousedown(function(e){
        var mx = e.pageX;
        var my = e.pageY;
        $(document).on('mousemove', function(e) {
            wx += e.pageX - mx;
            wy += e.pageY - my;
            $(stID).css({
                top: wy, 
                left: wx
            });
            mx = e.pageX;
            my = e.pageY;
            return false;
        }).one('mouseup', function(e){
            $(document).off('mousemove');
        });
        return false;
    });
}

/**
* ライン(プロダクトバックログ)へ追加した付箋の設定
*/
function set_husen_in_line(stID, ww, wh, co, bc, lc, zi, tc){
    $(stID).css({
        width: ww, 
        height: wh, 
        color: co,
        'z-index': zi
    });
    $(stID + ' .stittl').css({
        'background-color': tc
    });
    $(stID + ' .stittl .sticlose').click(function(){
        $(stID).fadeOut('slow');
    });
}



/* ------------------------------------------------------------------ */

/* 
 * sortableのセット
 */
function set_sortable(id) {
    $('#' + id).sortable();
//    $('#' + id).disableSelection();
    $('#' + id).bind('sortstop', function (e, ui) {
        // ソートが完了したら実行される。
        var rows = $('#' + id + ' .priority');
        for (var i = 0, rowTotal = rows.length; i < rowTotal; i += 1) {
            $($('.priority')[i]).text(i + 1);
        }
    })
}

set_sortable('sortable');


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


