<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use common\models\Author;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property string|null $title
 */
class Book extends \yii\db\ActiveRecord
{
    public $authorIds = [];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books';
    }

    public function getAuthorsBooks()
    {
        return $this->hasMany(AuthorBook::class, ['book_id' => 'id']);
    }

    public function getAuthors()
    {
        return $this->hasMany(Author::class, ['id' => 'author_id'])
            ->via('authorsBooks');
    }

    public function getdropAuthor()
    {
        $data = Author::find()->asArray()->all();
        return ArrayHelper::map($data, 'id', 'name');
    }

    public function getAuthorIds()
    {
        $this->authorIds = \yii\helpers\ArrayHelper::getColumn(
            $this->getAuthorsBooks()->asArray()->all(),
            'author_id'
        );
        return $this->authorIds;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'],'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }
}
