<?php

class UsersController extends BaseController
{
    public function index() {
        $this->redirect("");
    }
    
    public function login()
    {
        if($this->isPost) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userId = $this->model->login($username, $password);
            if($userId) {
                $_SESSION['username'] = $username;
                $_SESSION['userId'] = $userId;
                $_SESSION['user_status'] = $this->model->getStatus($username);
                $this->addInfoMessage("Login successful");
                $this->redirect("");
            } else {
                $this->addErrorMessage("Грешка: Грешно име или парола");
            }
        }
    }

    public function register()
    {
		if($this->isPost) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
            $full_name = $_POST['full_name'];

            if(strlen($username) < 5) {
                $this->setValidationError("username", "Потребителското име трябва да е не по-малко от 5 символа");
            }

            if(strlen($password) < 6) {
                $this->setValidationError("password", "Паролата трябва да е не по-малко от 6 символа");
            }

            if(strlen($full_name) < 10) {
                $this->setValidationError("password", "Моля въведете пълните си имена");
            }

            if($password != $password_confirm) {
                $this->setValidationError("password_confirm","Паролите не съвпадат!");
            }

            if($this->formValid()) {
            $userId = $this->model->register($username, $password, $full_name);
            if($userId) {
                $_SESSION['username'] = $username;
                $_SESSION['userId'] = $userId;
                $this->addInfoMessage("Вие се регистрирахте успешно");
                $this->redirect("");
            } else {
                $this->addErrorMessage("Грешка: Не успяхте да се регистрирате");
            }
            }
        }
    }

    public function logout()
    {
		session_destroy();
        $this->redirect("");
    }
}
