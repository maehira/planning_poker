<?php

class PokerController extends AppController {
        function login() {
            $this->Session->destroy();
            if(isset($_POST["uid"]) && $_POST["uid"] != "") {
                $this->Session->write("uid", $_POST["uid"]);
                $this->redirect("index");
            };
        }
        function index() {
            //var_dump($_POST);
        }
        function index2() {
            
        }
        function index3() {
        }
        function alert() {
            echo "aaa";
        }
}
