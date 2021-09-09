<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "authors".
 *
 * @property int $id
 * @property string|null $name
 *
 * @property AuthorsBooks[] $authorsBooks
 * @property AuthorsBooks[] $authorsBooks0
 */
class Author extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'authors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[AuthorsBooks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthorsBooks()
    {
        return $this->hasMany(AuthorBook::class, ['author_id' => 'id']);
    }

    public function getBooks()
    {
        return $this->hasMany(Book::class, ['id' => 'book_id'])
            ->via('authorsBooks');
    }

    /**
     * Gets query for [[AuthorsBooks0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthorsBooks0()
    {
        return $this->hasMany(AuthorsBooks::class(), ['book_id' => 'id']);
    }
}
