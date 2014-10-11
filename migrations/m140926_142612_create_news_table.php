<?php

use yii\db\Schema;
use yii\db\Migration;

class m140926_142612_create_news_table extends Migration
{
    public function up()
    {
    $this->createTable('tbl_news', array(
            'id' => 'pk',
            'title' => 'string NOT NULL',
            'content' => 'text',
        ));
    }

    public function down()
    { 
        $this->dropTable('tbl_news');
        echo "m140926_142612_create_news_table cannot be reverted.\n";

        return false;
    }
}
