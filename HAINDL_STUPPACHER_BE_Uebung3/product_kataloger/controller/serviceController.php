<?php

namespace controller;



class serviceController
{
    private \katalogService $service;
    private \jsonView $view;

    function __construct(){
        $this->service = new \katalogService();
        $this->view = new \jsonView();
    }

    function getData()
    {

        $action = $_GET['action'];
        try{
            $katalog = $this->service->route($action);
            $this->view->output($katalog);

        }catch (\Exception $exception) {
            http_response_code(404);
        }
    }

}