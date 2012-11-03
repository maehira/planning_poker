<?php

require('../Lib/Pusher.php');

class ProjectsController extends AppController {
    
    // プロジェクト一覧
    public function index() {
    }
    
    // プロジェクト作成
    public function add() {
        if(!empty($this->data)) {
            $this->Project->create();
            $this->Project->save($this->data['Project']);
            $this->redirect('index');
        }
    }
    
    // メンバ編集
    public function member() {
        
    }
    
    public function start_x() {
        $this->set("pusher_key", Configure::read("Pusher.key"));
    }
    
    public function poker() {
        $this->autoRender = false;
        $this->render("poker");
//        return new CakeResponse(array("body" => ""));
    }
    
    // バックログ作成、ベース見積り、プランニングポーカー
    public function start() {
        $this->set("pusher_key", Configure::read("Pusher.key"));
        
        $options = array('conditions' => array('Project.id' => 1));
        $project = $this->Project->find('first', $options);
        
        $step = null;
        if(!empty($this->data)) {
            $step = $this->data['step'];
        }
        
        switch($step) {
            case null:
                $step = $project['Project']['step'];
                break;
            case 'next':
                $step = $project['Project']['step'] + 1;
                $this->Project->id = 1;
                $this->Project->saveField('step', $step);
                break;
            case 'reset':
                $step = 0;
                $this->Project->id = 1;
                $this->Project->saveField('step', $step);
                break;
        }
        
        
        switch ($step) {
            case 0:
                $this->render('start');
                break;
            case 1:
                $this->layout = '';
                $this->render('start2');
                break;
            case 2:
                $this->layout = '';
                $this->render('start3');
                break;
        }
        
    }
    
    public function send_chat_message() {
        $chat_message = $_POST['chat_message'];
        $this->notice_member($chat_message);
        return new CakeResponse(array("body" => ""));
        //return new CakeResponse(array("body" => "<p>$chat_message</p>"));
    }
    
    public function pusher_auth() {
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
    
//    private function connect() {
//        $this->set("pusher_key", Configure::read("Pusher.key"));
//    }

    private function notice_member($chat_message) {
        $username = AuthComponent::user('username');
        $conf = Configure::read("Pusher");
        $pusher = new Pusher($conf["key"], $conf["secret"], $conf["app_id"]);
        $pusher->trigger('private-channel', 'test_event', "<p>$username : $chat_message</p>");
        //printf("trigger called.");
    }
    

    public function push_new_line($number){
        $username = AuthComponent::user('username');
        $conf = Configure::read("Pusher");
        $pusher = new Pusher($conf["key"], $conf["secret"], $conf["app_id"]);
        $pusher->trigger('private-channel', 'newline',$number);
        return new CakeResponse(array("body" => ""));
        
    }


}
