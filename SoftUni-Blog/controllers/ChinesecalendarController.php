<?php

class ChinesecalendarController extends BaseController
{
    function onInit()
    {
        $this->authorize();
    }
    
    //    TODO: Контролера не е готов.
    function index() {
        $this->chinese_zodiacs = $this->model->getAll();
    }
}