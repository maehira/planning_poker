<div>
    <div style="float: left;">
        <input id="new_line" class="btn" type="button" value="ラインを追加する">
        <input id="add_test" class="btn" type="button" value="テスト用付箋を枠内に追加">
        <button id="start_poker" class="btn">ポーカー開始</button>
        <div id="poker_area" style="left: 377.5px; position: absolute; top: 1267px; z-index: 9999; display: none;">
            <span class="poker_close bClose">
                <span>X</span>
            </span>
            <div class="content"></div>
        </div>
    </div>
    <div style="float: right; margin-right: 50px;">
        <?php echo $this->element('project_timer'); ?>
    </div>
</div>

<br class="clear" />

<div id="sortable">
    <?php echo $this->element('project_backlog'); ?>
</div>

<div style="height: 500px; width: 300px; float: left; margin-left: 15px;">
    <?php echo $this->element('project_chat'); ?>
</div>


<?php echo $this->Html->script('projects_start_x'); ?>
