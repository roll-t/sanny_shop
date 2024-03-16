<?php

class Profile extends Controller{
    private $__data = [];
    private $__model;
    private $__root_page = 'client/profile/';
    private $__root_view = 'layouts/client_layout';

    function __construct()
    {
    }   


    function render_view($page = '')
    {
        $this->__data['content'] = $this->__root_page . $page;
        $this->view($this->__root_view, $this->__data);
    }

    function index(){
        $this->__data['sub_content']['page_display']='profile_info';
        $this->render_view('profile');
    }
    function profile_info(){
        $this->__data['sub_content']['page_display']='profile_info';
        $this->render_view('profile');
    }
}