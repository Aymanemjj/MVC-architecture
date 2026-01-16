<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;

class siteController extends Controller
{

    public function home()
    {

        $params = [];

        return $this->render('contact', $params);
    }


    public function contactView()
    {
        return $this->render('/contact');
    }


    public function hanleContact()
    {
        return 'handling submited data';
    }
}
