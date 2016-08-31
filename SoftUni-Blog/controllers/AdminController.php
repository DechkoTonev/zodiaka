<?php

class AdminController extends BaseController
{
    function onInit()
    {
        $this->authorize();
        $this->authorizeAdministration();
    }

    function index() {
        
    }
}