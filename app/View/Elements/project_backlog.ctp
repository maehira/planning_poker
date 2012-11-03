<input id="new_fusen" class="btn" type="button" value="付箋を追加する">

<?php for ($i = 1; $i < 5; $i++): ?>
    <div class="line ui-state-default">
        <div class="priority"><?php echo $i ?></div>
        <div class="backlog_contents">
            <input type="text" class="title" />
            <?php if ($i == 1) : ?>
<!--                <button id="start_poker" class="btn">ポーカー開始</button>-->
            <?php endif ?>
            <?php
            echo $this->Form->input('', array(
                'label' => false,
                'div' => false,
                'type' => 'select',
                'options' => array(
                    "1" => "1", "2" => "2", "3" => "3", "5" => "5", "8" => "8", "13" => "13"),
                'selected' => "",
                'empty'=>array(0=>'--'),
                'style' => "width: 50px;"
            ));
            ?>
            <a href="#" onclick="toggle_backlog_contents('contents_<?php echo $i ?>', this); return false;">Close</a>
            <div id="contents_<?php echo $i ?>" class="scrollarea">
                <div class="items"></div>
            </div>
        </div>
    </div>
<?php endfor ?>

