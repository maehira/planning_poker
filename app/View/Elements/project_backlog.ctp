<input id="new_fusen" class="btn" type="button" value="付箋を追加する">

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

