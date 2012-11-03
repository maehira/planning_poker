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
        
        if(empty($this->data)) {
            return;
        }
        
        $options = array('conditions' => array('Project.id' => 1));
        $project = $this->Project->find('first', $options);

        $step = $this->data['step'];
        $conf = Configure::read("Pusher");
        $pusher = new Pusher($conf["key"], $conf["secret"], $conf["app_id"]);
        
        switch($step) {
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
            case 1:
                $pusher->trigger('private-channel', 'next_step', array(
                    'step' => "1"));
                return new CakeResponse(array("body" => ""));
                break;
            case 2:
                $pusher->trigger('private-channel', 'next_step', array(
                    'step' => "2"));
                break;
        }
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

    public function ws_chat_event() {
		$type = $this->request->data('type');
		$chat_message = $this->request->data('chat_message');
        $username = AuthComponent::user('username');
        $conf = Configure::read("Pusher");
        $pusher = new Pusher($conf["key"], $conf["secret"], $conf["app_id"]);

		$data = json_encode(array('username' => ' @'.$username, 'text' => $chat_message));
		$pusher->trigger('private-channel', $type, $data);
        return new CakeResponse(array("body" => ""));
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


    /**
     * バックログラインを１行追加(メンバに通知)
     * @param type $number
     * @return \CakeResponse
     */
    public function push_new_line($number){
        $userid = AuthComponent::user('id');
        $conf = Configure::read("Pusher");
        $pusher = new Pusher($conf["key"], $conf["secret"], $conf["app_id"]);
        $pusher->trigger('private-channel', 'newline',array(
                            'linenumber'=>$number,
                            'userid'=>$userid));
        return new CakeResponse(array("body" => ""));

    }

    /**
     * 付箋を追加(メンバに通知)
     */
    public function fix_fusen() {
        $userid = AuthComponent::user('id');
        $conf = Configure::read("Pusher");
        $pusher = new Pusher($conf["key"], $conf["secret"], $conf["app_id"]);
        $pusher->trigger('private-channel', 'fix_fusen',array(
                            'add_area_id'=>$_POST['add_area_id'],
                            'userid'=>$userid));
        return new CakeResponse(array("body" => ""));
    }

    //    private function connect() {
//        $this->set("pusher_key", Configure::read("Pusher.key"));
//    }

    public function send_decided_card() {
        $decided_card = $_POST['decided_card'];
        $this->__send_card($decided_card);
        return new CakeResponse(array("body" => ""));
    }

    private function __send_card($__decided_card) {
        $conf = Configure::read("Pusher");
        $pusher = new Pusher($conf["key"], $conf["secret"], $conf["app_id"]);
        $card = "/img/poker/$__decided_card.png";
	if ($__decided_card != 'none') {
		$pusher->trigger('private-channel', 'send_cardimg_ch', '<img class="thumbnail" src=' . $card . '>');
	} else  {
		$pusher->trigger('private-channel', 'send_cardimg_ch_other', '<img class="thumbnail" src=' . $card . '>');
	}
    }
}
