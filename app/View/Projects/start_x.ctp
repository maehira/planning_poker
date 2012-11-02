<script>
/***** ドラッグ開始時の処理 *****/
function f_dragstart(event){
  event.dataTransfer.setData("drag_obj_id", event.target.id);
  
//        var mx = event.pageX;
//        var my = event.pageY;
//        $(document).on('mousemove', function() {
//            alert(wx)
//            wx += event.pageX - mx;
//            wy += event.pageY - my;
//            alert(wx)
//            $("#"+event.currentTarget.id).css({
//                top: wy, 
//                left: wx
//            });
//            mx = event.pageX;
//            my = event.pageY;
//            return false;
//        }).one('mouseup', function(){
//            $(document).off('mousemove');
//        });
//        return false;
}

/* ドラッグが継続している間 */
function f_drag(event, obj) {
//    var offset = $("#"+obj.id).offset();
//    var mx = offset.left;
//    var my = offset.top;
//    var wx = event.pageX - offset.left;
//    var wy = event.pageY - offset.top;
//    $("#"+obj.id).css({
//      top: wy, 
//      left: wx
//    });
    
//    mx = e.pageX;
//    my = e.pageY;
}

/***** ドラッグ要素がドロップ要素に重なっている間の処理 *****/
function f_dragover(event){
  //dragoverイベントをキャンセルして、ドロップ先の要素がドロップを受け付けるようにする
  event.preventDefault();
}

/***** ドロップ時の処理 *****/
function f_drop(event, drop_area_id){
  var drag_obj = $("#"+event.dataTransfer.getData("drag_obj_id"));
  $("#" + drop_area_id + " div").append(drag_obj);
  //エラー回避のため、ドロップ処理の最後にdropイベントをキャンセルしておく
  event.preventDefault();
}
</script>

<!--<img src="../img/user/user1.png" id="apple" draggable="true" ondragstart="f_dragstart(event)" ondrag="f_drag(event, this)">
<img src="../img/user/user2.png" id="orange" draggable="true" ondragstart="f_dragstart(event)">-->


<div id="head">
    <?php echo $this->element('project_head'); ?>
</div>

<div id="backlog">
    <?php echo $this->element('project_backlog'); ?>
</div>

<div id="chat">
    <?php echo $this->element('project_chat'); ?>
</div>


<?php echo $this->Html->script('projects_poker'); ?>
<?php echo $this->Html->script('projects_backlog'); ?>
<?php echo $this->Html->script('projects_chat'); ?>