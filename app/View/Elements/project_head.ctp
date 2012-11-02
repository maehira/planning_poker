<div id="user_list">
    <div>
        <?php echo $this->Html->image('user/user1.png'); ?>
    </div>
    <div>
        <?php echo $this->Html->image('user/user2.png'); ?>
    </div>
    <div>
        <?php echo $this->Html->image('user/user3.png'); ?>
    </div>
    <div>
        <?php echo $this->Html->image('user/user4.png'); ?>
    </div>
    <div>
        <?php echo $this->Html->image('user/user5.png'); ?>
    </div>
</div>

<br class="clear" />

<div class="action">
    <input id="new_line" class="btn" type="button" value="ラインを追加する">
    <input id="add_test" class="btn" type="button" value="テスト用付箋を枠内に追加">
    <div id="poker_area">
        <span class="poker_close bClose">
            <span>X</span>
        </span>
        <div class="content"></div>
    </div>
</div>
<div class="timer">
    <?php echo $this->element('project_timer'); ?>
</div>