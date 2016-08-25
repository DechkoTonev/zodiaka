<?php

class ZodiacController extends BaseController
{
    //    TODO: Контролера не е готов.
    function index() {
        $this->zodiacs = $this->model->getAll();
    }

    function daily() {
        $this->dailyZodiacs = $this->model->getDaily();
    }

    function month() {
        $this->monthZodiacs = $this->model->getMonth();
    }

    function year() {
        $this->yearZodiacs = $this->model->getYear();
    }

    function sign() {
        $this->signsZodiacs = $this->model->getAllTypeOfSign();
    }
    
    function admin()
    {
        $this->authorize();
        $this->authorizeAdministration();
        $this->zodiacs = $this->model->getAll();
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
            $this->zodiac = $post;
        }
    }

    public function edit(int $id)
    {
        $this->authorize();
        $this->authorizeAdministration();
        if($this->isPost) {
            var_dump($_POST);
            $zodiac = $_POST['zodiac'];
            if(strlen($zodiac) < 1) {
                $this->setValidationError("post_title", "Зодията не може да е празна");
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
            $zodiac_type = $_POST['zodiac_type'];

            if($this->formValid()) {
                if($this->model->edit($id, $zodiac, $content, $date, $zodiac_type)) {
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

    }
}