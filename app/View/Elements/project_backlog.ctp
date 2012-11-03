<div class="row-fluid">
    <?php echo $this->element('project_timer'); ?>
</div>


<div id="poker_area">
    <span class="poker_close bClose">
        <span>X</span>
    </span>
    <div class="content"></div>
</div>


<?php for ($i = 1; $i < 5; $i++): ?>
    <div class="line ui-state-default">
        <div class="priority"><?php echo $i ?></div>
        <div class="backlog_contents">
            <input type="text" class="title" />
            <a href="#" onclick="toggle_backlog_contents('contents_<?php echo $i ?>', this); return false;">Close</a>
            <div id="contents_<?php echo $i ?>" class="scrollarea">
                <div class="items"></div>
            </div>
        </div>
    </div>
<?php endfor ?>

<div style="height: 900px"></div>