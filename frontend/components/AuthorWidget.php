<?php

namespace frontend\components;

use common\models\Author;
use yii\base\Widget;
use yii\helpers\Html;

class AuthorWidget extends Widget
{
    public $author;
    public function init()
    {
        parent::init();
        if (is_numeric($this->author)) {
            $this->author = Author::findOne($this->author);
        }
    }

    public function run()
    {
        return $this->render('authorBooks', ['books'=>$this->author->books]);
    }
}
