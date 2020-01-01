<?php

class Admin extends Controller{

    public function index()
    {
        $this->view('admin/header');
        $this->view('admin/dasboard');
        $this->view('admin/footer');
    }
}