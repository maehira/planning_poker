<?php

require('../Lib/Pusher.php');

class PokerController extends AppController {

    function login() {
        $this->Session->destroy();
        if (isset($_POST["uid"]) && $_POST["uid"] != "") {
            $this->Session->write("uid", $_POST["uid"]);
            $this->redirect("index");
        };
    }

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
        $this->autoRender = false;
        $this->notice_member($chat_message);
        //printf("<p>$chat_message</p>");
    }

    function alert() {
        echo "aaa";
    }

    function connect() {
        $this->set("pusher_key", Configure::read("Pusher.key"));
    }

    function notice_member($chat_message) {
        $conf = Configure::read("Pusher");
        $pusher = new Pusher($conf["key"], $conf["secret"], $conf["app_id"]);
        $uid = $this->Session->read("uid");
        $pusher->trigger('private-channel', 'test_event', "<p>$uid : $chat_message</p>");
        //printf("trigger called.");
    }

    function pusher_auth() {
        $this->autoRender = false;
        if ($this->Session->read("uid")) {
            $conf = Configure::read("Pusher");
            $pusher = new Pusher($conf["key"], $conf["secret"], $conf["app_id"]);
            echo $pusher->socket_auth($_POST['channel_name'], $_POST['socket_id']);
        } else {
            header('', true, 403);
            echo "Forbidden";
        }
    }

}
