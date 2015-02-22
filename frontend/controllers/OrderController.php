<?php
namespace frontend\controllers;

use frontend\base\BaseFrontController;

class OrderController extends BaseFrontController
{
    public function actionConfirm()
    {
        return $this->render("confirm");
    }
}