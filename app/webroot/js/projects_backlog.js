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

set_sortable('backlog');


/**
 * バックログコンテンツの最小化、最大化
 */
function toggle_backlog_contents(id, obj) {
    $("#"+id).toggle();
    if (obj.innerHTML == "Open") {
        obj.innerHTML = "Close";
    } else {
        obj.innerHTML = "Open"
    }
}

/**
 * バックログを１つ追加
 */
$(function() {
    $('#new_line').click(function() {
        var rows = $('#backlog .priority');
        var priority = parseInt($($('.priority')[rows.length - 1]).text(), 10) + 1;
        $('#backlog').append('<li class="line ui-state-default">' +
                              '<span class="priority">' + priority +
                              '</span>' +
                              '</li>'
                             );
    });
})

/**
 * バックログ内に付箋を追加（テスト段階）
 */
$(function() {
    $('#add_test').click(function() {
        var sticky = $('<div id="stickies1_100" style="float: left"><div class="stittl">' +
                   'maehira<div class="sticlose">×</div></div>' +
                   '<textarea class="stimain" id="" name="1000"></textarea></div>'
                     );
        $($('#backlog .items')[0]).append(sticky);
        var width = $($('#backlog .items')[0]).width() + 180
        $($('#backlog .items')[0]).width(width);
        set_fusen_in_line('stickies1_100' ,200, 75, '#666', '#fff', '1px solid #ccc', 12, '#eeeeee');
    });
})

/**
 * ライン(プロダクトバックログ)へ追加した付箋の設定
 */
function set_fusen_in_line(stID, ww, wh, co, bc, lc, zi, tc){
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