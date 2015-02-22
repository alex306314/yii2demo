<?php
namespace backend\base;

use Yii;
use common\base\BaseController;

class BaseBackController extends BaseController
{
    public $data = [];

    public function init()
    {
        parent::init();
    }
}