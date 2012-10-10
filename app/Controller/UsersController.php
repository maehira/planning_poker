<?php

class UsersController extends AppController {
    public function beforeFilter() {
        $this->Auth->allow('login');
        $this->Auth->allow('logout');
        $this->Auth->allow('add');
    }
    
    public function index() {
        
    }
    
    public function add() {
        if(!empty($this->data)) {
            $this->User->create();
            $this->User->save($this->data['User']);
            $this->redirect('/');
        }
    }
    
    public function login() {
        if ($this->request->is('POST')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash('Username or password is incorrect');
            }
        }
    }
    
    public function logout() {
        $this->Auth->logout();
        return $this->redirect('/');
    }
}