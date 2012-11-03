<div id="stickies1_1" class="fusen"
     style="position: absolute; top: 80px; left: 850px; width: 200px; height: 75px; color: rgb(102, 102, 102);">
    <div class="stittl" style="background-color: rgb(221, 238, 221);">
        maehira
        <div class="sticlose">×</div>
    </div>
    <textarea id="" class="stimain" name="1000"></textarea>
</div>





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


<script>
$('#stickies1_1').draggable({});

$('#backlog .line').droppable({
            accept: '.fusen',
            tolerance: 'intersect',
            hoverClass: "backloghover",
            activate: function(ev, ui){
                //var pos = ui.position;
            },
            drop: function(ev, ui){
                alert(200)
//                $(this).empty();
//                $(this).append(ui.helper.clone().removeClass().addClass('dragparts_drop').css({top:'0',left:'0'}));
//                dragPartsAfter();
            }
        });
</script>