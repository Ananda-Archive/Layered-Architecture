<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\system\RESTHandler.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '\model\User.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '\service\UserService.php';

class UserLogin extends RESTHandler {

    public function __construct() {
        session_start();
    }

    public function get($id) {
        $userService = new UserService();
        $data = $userService->findById($id);
        $this->response($data,parent::HTTP_OK,parent::REQUEST_SUCCESS_MESSAGE);
    }
    
    public function login($username,$password) {
        $user = new User($username,$password);
        $userService = new UserService();
        if($userService->login($user)) {
            $_SESSION['username'] = $user->getUsername();
            $this->response(null,parent::HTTP_OK,parent::REQUEST_SUCCESS_MESSAGE);
        } else {
            $this->response(null,parent::HTTP_BAD_REQUEST,parent::REQUEST_FAILED_MESSAGE);
        }
    }

}