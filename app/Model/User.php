<?php
App::uses('AppModel', 'Model');
 
class User extends AppModel {
    public function beforeSave($options = array()) {
        if (array_key_exists('password', $this->data[$this->alias])) {
            $this->data[$this->alias]['password'] =
                    AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }
}
