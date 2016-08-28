<?php

class HomeController extends BaseController
{
    function index() {
        $this->posts = $this->model->getLatestPosts(3);
        $this->postsSideBar = $this->model->getLatestPosts(5);
    }
	
	function view(int $id) {
        $post = $this->model->getPostById($id);
        if(!$post) {
            $this->addErrorMessage("Error: invalid post");
            $this->redirect("");
        }
        $this->post = $post;
    }
}
