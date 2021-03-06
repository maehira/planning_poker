<div class="row">
    
<div class="span8">

<div id="dragitemlist">
  <ul class="draglist">
    <li>
      <span class="dragparts" style="background-image: url(../img/poker/1.png);">
      </span>
    </li>
    <li>
      <span class="dragparts" style="background-image: url(../img/poker/2.png);">
      </span>
    </li>
    <li>
      <span class="dragparts" style="background-image: url(../img/poker/3.png);">
      </span>
    </li>
    <li>
      <span class="dragparts" style="background-image: url(../img/poker/5.png);">
      </span>
    </li>
    <li>
      <span class="dragparts" style="background-image: url(../img/poker/8.png);">
      </span>
    </li>
    <li>
      <span class="dragparts" style="background-image: url(../img/poker/13.png);">
      </span>
    </li>
  </ul>
</div>

<br class="clear" />

<?php
    echo $this->Form->create(false, array('type' => 'post', 'action' => './start'));
    echo $this->Form->hidden('step', array('value' => 'reset'));
    echo $this->Form->end('最初から(データはそのまま残ります)');
?>

<form action="./start" method="post">
<button id="submit" class="btn btn-large" style="width: 150px;">ポーカーの開始</button>
<input type="hidden" name="data[step]" value="next">

<div style="margin-top: 10px;">
    <table class="table table-striped table-bordered" style="width: 660px;">
        <thead>
            <tr>
                <th class="priorityNumber">優先順位</th>
                <th class="backLog">プロダクトバックログ</th>
                <th class="estimate">見積り</th>
            </tr>
        </thead>
        <tbody id="sortable">
            <tr>
                <td class="priorityNumber rank">1</td>
                <th class="backLog">xxxxxができる</th>
                <td class="estimate">
                  <div class="droparea"></div>
                </td>
            </tr>
            <tr>
                <td class="priorityNumber rank">2</td>
                <th class="backLog">yyyyyができる</th>
                <td class="estimate">
                  <div class="droparea"></div>
                </td>
            </tr>
            <tr>
                <td class="priorityNumber rank">3</td>
                <th class="backLog">zzzzzzzができる</th>
                <td class="estimate">
                  <div class="droparea"></div>
                </td>
            </tr>
            <tr>
                <td class="priorityNumber rank">4</td>
                <th class="backLog">
                aaaaaa<br />
                bbbbbb<br />
                cccccc<br />
                </th>
                <td class="estimate">
                  <div class="droparea"></div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</form>

</div>

<div class="span4 chat-container">
    <div class="chat-messages">チャット</div>
    <div class="chat-input"></div>
</div>

</div>


<script type="text/javascript">
    $('#sortable').sortable();
    $('#sortable').disableSelection();
        
    $('#sortable').bind('sortstop', function (e, ui) {
        // ソートが完了したら実行される。
        var rows = $('#sortable .rank');
        for (var i = 0, rowTotal = rows.length; i < rowTotal; i += 1) {
            $($('.rank')[i]).text(i + 1);
        }
    })
</script>

<script type="text/javascript">
$(function(){
    $('ul.draglist li').each(function(i){
 
        // 制御用ナンバリング追加
        $(this).attr('id','list' + (i + 1).toString());
        $(this).children('span').attr('id','item' + (i + 1).toString());
 
        $(this).attr('rel',(i + 1).toString());
        $(this).children('span').attr('rel',(i + 1).toString());
 
        $(this).addClass('disposition');
 
        // 暗転画像クローン生成
        //var imgClone = $(this).children('.dragparts').children('a').html();
        //$(this).prepend('<span class="imgblank">' + (imgClone) + '</span>');
        //$('.imgblank').css({top:'0',left:'0',position:'absolute',opacity:'0.5'});
 
        // .dragpartsをドラッグ
        function dragParts(){
            $('.dragparts').draggable({
                helper: 'clone',
                revert: 'invalid',
                zIndex: '1000'
            });
        }
        dragParts();

        //一度配置した後、.dragparts_afterになった時のドラッグ処理
        function dragPartsAfter(){
            $('.dragparts_drop').draggable({
                helper: 'clone',
                revert: 'invalid',
                zIndex: '1000'
            });
        }
 
        // 「.droparea」エリアにドロップされた時の処理
        $('.droparea').droppable({
            accept: '.dragparts',
            tolerance: 'intersect',
            hoverClass: "areahover",
            activate: function(ev, ui){
                var pos = ui.position;
            },
            drop: function(ev, ui){
                $(this).empty();
                $(this).append(ui.helper.clone().removeClass().addClass('dragparts_drop').css({top:'0',left:'0'}));
                dragPartsAfter();
            }
        });
 
        // 「#dragitemlist」エリアにドロップされた時の処理
        $('#dragitemlist').droppable({
          accept: '.dragparts_drop',
          tolerance: 'intersect',
          drop: function(ev, ui){
            ui.draggable.remove();
          }
        });
        //$('#dragitemlist').droppable({
        //    accept: '.dragparts_drop',
        //    tolerance: 'intersect',
        //    drop: function(ev, ui){
        //        var thisRel = ui.draggable.attr('rel');
        //        var adjustRel = thisRel-1;
        //        $('.disposition').eq(adjustRel).each(function(){
        //            ui.draggable.appendTo(this).removeClass().addClass('dragparts');
        //        });
        //    }
        //});
 
        var connectCont = $('ul.draglist li').index(this);
        var numCont = connectCont+1;

    });
});

</script>
