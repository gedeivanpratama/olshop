<?php

class Cart extends Controller{

    public function index()
    {

    }

    public function edit()
    {
        $this->view('web/header');
        $this->view('web/cart');
        $this->view('web/footer');
    }
}