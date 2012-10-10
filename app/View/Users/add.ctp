<?php
    echo $this->Form->create('User', array('type'=>'post', 'action'=>'./add'));
    echo $this->Form->input('username');
    echo $this->Form->input('password');
    echo $this->Form->end('ユーザー追加');
?>