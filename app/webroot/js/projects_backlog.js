/* 
 * sortableのセット
 */
function set_sortable(target) {
    $(target).sortable();
//    $(target).disableSelection();
    $(target).bind('sortstop', function (e, ui) {
        // ソートが完了したら実行される。
        var rows = $(target + ' .priority');
        for (var i = 0, rowTotal = rows.length; i < rowTotal; i += 1) {
            $($('.priority')[i]).text(i + 1);
        }
    })
}

set_sortable('#backlog .row-fluid');


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
        appendBacklogField(priority);
        $.get("/projects/push_new_line/"+priority);
    });
})
function appendBacklogField(priority){
    if(priority == undefined){
        var rows = $('#backlog .priority');
        var priority = parseInt($($('.priority')[rows.length - 1]).text(), 10) + 1;
    }
    var htmltemplate = '<div class="line ui-state-default">' +
    '<div class="priority\">' + priority + '</div>' +
    '<div class="backlog_contents">'+
    '<input type="text" class="title" />'+
    '<a href="#" onclick="toggle_backlog_contents(contents_'+priority+', this); return false;">Close</a>'+
    '<div id="contents_' + priority + '" class="scrollarea">'+
    '<div class="items"></div>'+
    '</div>'+
    '</div>'+
    '</div>';
    $('#backlog').append(htmltemplate);    
}



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

/**
 * バックログのドロッパブルの設定
 */
function set_backlog_droppable() {
    $('#backlog .line .scrollarea').droppable({
        accept: '.fusen',
        tolerance: 'intersect',
        activate: function(ev, ui){
        //var pos = ui.position;
        },
        over: function(ev, ui){
            var add_area_id = $(this).attr("id");
            $("#" + add_area_id + " .items").prepend($(
                "<div id='candidate_area' class='candidate_area'><div>"
            ));
        },
        out: function(ev, ui){
            var add_area_id = $(this).attr("id");
            $("#" + add_area_id + " .items #candidate_area").remove();
        },
        drop: function(ev, ui){
            var add_area_id = $(this).attr("id");
            $("#" + add_area_id + " .items #candidate_area").remove();
            ui.draggable.removeClass().addClass('fusen fusen_fix').mousedown(function(e){
                var offset = $(this).offset()
                $(this).removeClass().addClass('fusen fusen_free').css({
                    top: offset.top, left: offset.left
                });
                $(this).appendTo('body');
            }).appendTo($("#" + add_area_id + " .items"));
            $.ajax({
                type: 'POST',
                url: './fix_fusen',
                data: 'add_area_id=' + add_area_id,
                success: function(data){
                    //$("#chat-messages").append(data);
                }
            });
        }
    });
}
set_backlog_droppable();

/**
 * 他ユーザが追加した付箋を反映
 */
function fix_fusen_from_other(add_area_id) {
    make(add_area_id);
}

/**
 * 見積りリストボックスをセット
 */
function set_estimation() {
    
}

/**
 * ポーカー開始ボタンのセット
 */
function set_poker(priority) {
    $("#backlog #contents_"+priority).before($(
    '<button id="start_poker" class="btn" style="float: right;">ポーカー開始</button>'));
}


//            <?php
//            echo $this->Form->input('', array(
//                'label' => false,
//                'div' => false,
//                'type' => 'select',
//                'options' => array(
//                    "1" => "1", "2" => "2", "3" => "3", "5" => "5", "8" => "8", "13" => "13"),
//                'selected' => "",
//                'empty'=>array(0=>'--'),
//                'style' => "width: 50px;"
//            ));
//            ?>