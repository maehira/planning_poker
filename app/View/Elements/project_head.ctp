<div class="action">
    <input id="new_line" class="btn" type="button" value="ラインを追加する">
    <input id="add_test" class="btn" type="button" value="テスト用付箋を枠内に追加">
    <button id="start_poker" class="btn">ポーカー開始</button>
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