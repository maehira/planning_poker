<?php
    echo $this->Form->create('User');
    echo $this->Form->input('User.username');
    echo $this->Form->input('User.password');
    echo $this->Form->end('Login');
?>

<!--<form action="login" method="post">
<input type="text" name="uid" class="span3" placeholder="ユーザID">
<button id="submit" class="btn">ログイン</button>
</form>-->
