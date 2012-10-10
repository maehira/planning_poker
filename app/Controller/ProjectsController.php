<?php

class ProjectsController extends AppController {
    
    public function index() {
    }
    
    public function add() {
        if(!empty($this->data)) {
            $this->Project->create();
            $this->Project->save($this->data['Project']);
            $this->redirect('index');
        }
    }
}
