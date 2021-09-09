<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%authors_books}}`.
 */
class m210907_143128_create_authors_books_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%authors_books}}', [
            'id' => $this->primaryKey(),
            'author_id' => $this->integer(),
            'book_id' => $this->integer(),
        ]);

        $this->addForeignKey('fk_author_id','authors_books','author_id','authors','id','CASCADE','CASCADE');
        $this->addForeignKey('fk_book_id','authors_books','book_id','books','id','CASCADE','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%authors_books}}');
    }
}
