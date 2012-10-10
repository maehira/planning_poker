<?php

require('../Lib/Pusher.php');

class PokerController extends AppController {

    function index() {
        //var_dump($_POST);
        
        $this->set("pusher_key", Configure::read("Pusher.key"));
        
        if(isset($_POST["backlogs"])){
            $this->layout = '';
            $this->render('index2');
        } else {
            $this->render('index');
        }
        
    }

    function index2() {
        
    }

    function index3() {
        
    }
    
    function send_chat_message() {
        $chat_message = $_POST['chat_message'];
        $this->notice_member($chat_message);
        return new CakeResponse(array("body" => "true"));
        //return new CakeResponse(array("body" => "<p>$chat_message</p>"));
    }

    function alert() {
        echo "aaa";
    }

    function connect() {
        $this->set("pusher_key", Configure::read("Pusher.key"));
    }

    function notice_member($chat_message) {
        $username = AuthComponent::user('username');
        $conf = Configure::read("Pusher");
        $pusher = new Pusher($conf["key"], $conf["secret"], $conf["app_id"]);
        $pusher->trigger('private-channel', 'test_event', "<p>$username : $chat_message</p>");
        //printf("trigger called.");
    }

    function pusher_auth() {
        $this->autoRender = false;
        if ($this->Auth->loggedIn()) {
            $conf = Configure::read("Pusher");
            $pusher = new Pusher($conf["key"], $conf["secret"], $conf["app_id"]);
            echo $pusher->socket_auth($_POST['channel_name'], $_POST['socket_id']);
        } else {
            header('', true, 403);
            echo "Forbidden";
        }
    }

}
