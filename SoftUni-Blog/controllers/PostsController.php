<?php

class PostsController extends BaseController
{
    function onInit()
    {
        $this->authorize();
    }

    function index() {
        $this->authorize();
        $this->authorizeAdministration();
        $this->posts = $this->model->getAll();
    }

    function userCreate() {
        $this->authorize();
        if($this->isPost) {
           $title = $_POST['post_title'];
            if(strlen($title) < 15) {
                $this->setValidationError("post_title", "Заглавието не мобе да е по-малко от 15 символа!");
            }

            $content = $_POST['post_content'];
            if(strlen($content) < 50) {
                $this->setValidationError("post_content", "Съдържанието не може да е по-малко от 50 символа!");
            }

            if($this->formValid()) {
                $userId = $_SESSION['userId'];
                if($this->model->userCreate($title, $content, $userId)) {
                    $this->addInfoMessage("Постта е изпратен за одобрение.");
                    $this->redirect("home");
                } else {
                    $this->addErrorMessage("Грешка: Постта не може да бъде създаден.");
                }
            }
        }
    }

    function approve()
    {
        $this->authorize();
        $this->authorizeAdministration();
        $this->postsToApprove = $this->model->getApprove();
    }

    public function approvePost(int $id)
    {
        $this->authorize();
        $this->authorizeAdministration();
        if($this->isPost) {
            $title = $_POST['post_title'];
            if(strlen($title) < 1) {
                $this->setValidationError("post_title", "Заглавието не може да е празно");
            }
            $content = $_POST['post_content'];
            if(strlen($content) < 1) {
                $this->setValidationError("post_content", "Съдържанието не може да е празно");
            }
            $date = $_POST['post_date'];
            $dateRegex = '/^\d{2,4}-\d{1,2}-\d{1,2}( \d{1,2}:\d{1,2}(:\d{1,2})?)?$/';
            if(!preg_match($dateRegex, $date)) {
                $this->setValidationError("post_date", "Невалидна дата");
            }
            $user_id = $_POST['user_id'];
            if($user_id <= 0 || $user_id > 1000000) {
                $this->setValidationError("user_id", "Невалиден ID номер на потребител");
            }

            if($this->formValid()) {
                if($this->model->approvePost($id, $title, $content, $date, $user_id)) {
                    $this->addInfoMessage("Постта беше одобрен");
                } else {
                    $this->addErrorMessage("Грешка: постта не може да бъде одобрен");
                }
                $this->redirect("posts");
            }
        }

        $post = $this->model->getApprovePostById($id);
        if(!$post) {
            $this->addErrorMessage("Грешка: Статията не съществува.");
            $this->redirect("posts");
        }
        $this->post = $post;
    }

    public function deleteApprovedPost($id) {
        $this->authorize();
        $this->authorizeAdministration();
        if($this->isPost) {
            if($this->model->deleteApprovedPost($id)) {
                $this->addInfoMessage("Заявката не беше одобрена");
            } else {
                $this->addErrorMessage("Грешка.");
            }
            $this->redirect('posts');
        } else {
            $post = $this->model->getByIdApprovedPost($id);
            if(!$post) {
                $this->addErrorMessage("Грешка: заявката не съществува");
                $this->redirect("posts");
            }
            $this->post = $post;
        }
    }

    function delete($id) {
        $this->authorize();
        $this->authorizeAdministration();
        if($this->isPost) {
            if($this->model->delete($id)) {
                $this->addInfoMessage("Поста е изтрит");
            } else {
                $this->addErrorMessage("Грешка: постта не може да бъде изтрит");
            }
            $this->redirect('posts');
        } else {
            $post = $this->model->getById($id);
            if(!$post) {
                $this->addErrorMessage("Грешка: посстта не съществува");
                $this->redirect("posts");
            }
            $this->post = $post;
        }
    }

    public function edit(int $id)
    {
        $this->authorize();
        $this->authorizeAdministration();
        if($this->isPost) {
            $title = $_POST['post_title'];
            if(strlen($title) < 1) {
                $this->setValidationError("post_title", "Title cannot be empty");
            }
            $content = $_POST['post_content'];
            if(strlen($content) < 1) {
                $this->setValidationError("post_content", "Content cannot be empty");
            }
            $date = $_POST['post_date'];
            $dateRegex = '/^\d{2,4}-\d{1,2}-\d{1,2}( \d{1,2}:\d{1,2}(:\d{1,2})?)?$/';
            if(!preg_match($dateRegex, $date)) {
                $this->setValidationError("post_date", "Invalid date");
            }
            $user_id = $_POST['user_id'];
            if($user_id <= 0 || $user_id > 1000000) {
                $this->setValidationError("user_id", "Invalid author user ID!");
            }

            if($this->formValid()) {
                if($this->model->edit($id, $title, $content, $date, $user_id)) {
                    $this->addInfoMessage("Post edited");
                } else {
                    $this->addErrorMessage("Error: cannot edit post.");
                }
                $this->redirect("posts");
            }
        }

        $post = $this->model->getById($id);
        if(!$post) {
            $this->addErrorMessage("Error: post does not exist.");
            $this->redirect("posts");
        }
        $this->post = $post;
    }
}

