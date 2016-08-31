<?php

class ChinesecalendarController extends BaseController
{
    function onInit()
    {
        $this->authorize();
    }
    
    function index() {
        $this->chinese_zodiacs = $this->model->getAll();
    }

    function admin() {
            $this->authorizeAdministration();
            $this->chineseZodiacs = $this->model->getAll();
            $this->create();
    }

    function create() {
        if($this->isPost) {
            $zodiac = $_POST['zodiacs'];

            $content = $_POST['post_content'];
            if(strlen($content) < 50) {
                $this->addErrorMessage("Грешка: Съдържанието не може да бъде по-малко от 50 символа.");
                return;
            }

            if($this->formValid()) {
                if ($this->model->create($content, $zodiac)) {
                    $this->addInfoMessage("Post created");
                    $this->redirect("admin");
                } else {
                    $this->addErrorMessage("Грешка: постта не може да бъде създаден.");
                }
            }
        }
    }
    
    function delete($id) {
        $this->authorize();
        $this->authorizeAdministration();
        if($this->isPost) {
            if($this->model->delete($id)) {
                $this->addInfoMessage("Зодияка е изтрит.");
            } else {
                $this->addErrorMessage("Грешка: постта не можа да бъде изтрит.");
            }
            $this->redirect('admin');
        } else {
            $post = $this->model->getById($id);
            if(!$post) {
                $this->addErrorMessage("Грешка: посста не съществува");
                $this->redirect("admin");
            }
            $this->chineseZodiac = $post;
        }
    }

    public function edit(int $id)
    {
        $this->authorize();
        $this->authorizeAdministration();
        if($this->isPost) {
            $zodiac = $_POST['zodiacs'];
            if(strlen($zodiac) < 1) {
                $this->setValidationError("post_title", "Зодията не може да е празна");
            }
            $content = $_POST['post_content'];
            if(strlen($content) < 1) {
                $this->setValidationError("post_content", "Съдържанието не може да е празно");
            }
                        if($this->formValid()) {
                if($this->model->edit($id, $content, $zodiac)) {
                    $this->addInfoMessage("Зодиака е редактиран");
                } else {
                    $this->addErrorMessage("Грешка: Зодиака не беше редактиран.");
                }
                $this->redirect("admin");
            }
        }

        $post = $this->model->getById($id);
        if(!$post) {
            $this->addErrorMessage("Грешка: Зодиака не съществува.");
            $this->redirect("admin");
        }
        $this->zodiac = $post;
    }
}