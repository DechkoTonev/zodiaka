<?php

class AdminController extends BaseController
{
    //    TODO: Контролера не е готов.
    function onInit()
    {
        $this->authorize();
        $this->authorizeAdministration();
    }

    function index() {
        
    }
}