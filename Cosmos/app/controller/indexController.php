<?php

namespace app\controller;

class indexController extends \core\cosmos
{

    public function __construct()
    {
        p("indexController is loaded.");
    }

    public function index()
    {
        p('this is index action of indexController.');
    }

    public function test()
    {
        p('this is test action of indexController.');

        $title = "This is title";
        $data = "This is data";
        $this->setParameter('title', $title);
        $this->setParameter('data', $data);
        $this->render('index.html');
    }

    public function model()
    {
        p('this is model action of indexController.');

        $model = new \core\lib\model();

        $sql = "select * from model_user";
        $ret = $model->query($sql);
        p($ret->fetchAll());
    }

}
