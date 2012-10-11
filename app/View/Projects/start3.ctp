<?php
    echo $this->Form->create(false, array('type' => 'post', 'action' => './start'));
    echo $this->Form->hidden('step', array('value' => 'reset'));
    echo $this->Form->end('最初から(データはそのまま残ります)');
?>

<div id="dragitemlist">
  <ul class="draglist">
    <li>
      <span class="dragparts">
        <img src="../img/poker/1.png" alt="1" />
      </span>
    </li>
    <li>
      <span class="dragparts">
        <img src="../img/poker/2.png" alt="2" />
      </span>
    </li>
    <li>
      <span class="dragparts">
        <img src="../img/poker/3.png" alt="3" />
      </span>
    </li>
    <li>
      <span class="dragparts">
        <img src="../img/poker/5.png" alt="5" />
      </span>
    </li>
    <li>
      <span class="dragparts">
        <img src="../img/poker/8.png" alt="8" />
      </span>
    </li>
    <li>
      <span class="dragparts">
        <img src="../img/poker/13.png" alt="13" />
      </span>
    </li>
  </ul>
</div>

<br class="clear" />

<div>
    <table class="table table-striped table-bordered" style="width: 1200px;">
        <thead>
            <tr>
                <th class="priorityNumber">優先順位</th>
                <th class="backLog">プロダクトバックログ</th>
                <th class="estimate">見積り</th>
                <th class="pokerspace" colspan="2">ポーカースペース</th>
            </tr>
        </thead>
        <tbody id="sortable">
            <tr>
                <td class="priorityNumber rank">1</td>
                <th class="backLog">xxxxxができる</th>
                <td class="estimate">
                  <div class="droparea"></div>
                </td>
                <td class="pokerspace-body"></td>
                <td></td>
            </tr>
            <tr>
                <td class="priorityNumber rank">2</td>
                <th class="backLog">yyyyyができる</th>
                <td class="estimate">
                  <img src="../img/poker/2.png" alt="2" />
                </td>
                <td class="pokerspace-body"></td>
                <td></td>
            </tr>
            <tr>
                <td class="priorityNumber rank">3</td>
                <th class="backLog">zzzzzzzができる</th>
                <td class="estimate">
                  <div class="droparea"></div>
                </td>
                <td class="pokerspace-body"></td>
                <td></td>
            </tr>
            <tr>
                <td class="priorityNumber rank">4</td>
                <th class="backLog">
                aaaaaa<br />
                bbbbbb<br />
                cccccc<br />
                </th>
                <td class="estimate">
                  <img src="../img/poker/5.png" alt="5" />
                </td>
                <td class="pokerspace-body">
                  <div class="poker-droparea"></div>
                </td>
                <td></td>
            </tr>
        </tbody>
    </table>
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
            $('.dragparts_after').draggable({
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
                $(this).append(ui.helper.clone().removeClass().addClass('dragparts_after'));
                dragPartsAfter();
            }
        });
 
        // 「#dragitemlist」エリアにドロップされた時の処理
        $('#dragitemlist').droppable({
          accept: '.dragparts_after',
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
        
        // ポーカースペースにドロップされた時の処理
        $('.poker-droparea').droppable({
            accept: '.dragparts',
            tolerance: 'intersect',
            hoverClass: "areahover",
            activate: function(ev, ui){
                var pos = ui.position;
            },
            drop: function(ev, ui){
                $(this).empty();
                $(this).append(ui.helper.clone().removeClass().addClass('dragparts_after'));
                dragPartsAfter();
                
                var data = {request : "13"};
                $.ajax({
                  type: "POST",
                  url: "alert",
                  data: data,
                  success: function(data, dataType) {
                      alert(data);
                  },
                  error: function(XMLHttpRequest, textStatus, errorThrown) {
                }
            });
            }
        });
 
        var connectCont = $('ul.draglist li').index(this);
        var numCont = connectCont+1;

    });
});

</script>
