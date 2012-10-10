<?php
    echo $this->Form->create('Project', array('type'=>'post', 'action'=>'./add'));
    echo $this->Form->input('name');
    echo $this->Form->input('description');
    echo $this->Form->end('プロジェクト作成');
?>