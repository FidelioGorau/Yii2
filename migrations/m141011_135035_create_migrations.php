<?php

use yii\db\Schema;
use yii\db\Migration;

class m141011_135035_create_migrations extends Migration
{
    public function up()
    {
        $this->createTable('clases', [
            'id' => 'pk',
            'school_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'name' => Schema::TYPE_STRING. ' NOT NULL',
        ]);

        $this->createTable('lessons', [
            'id' => 'pk',
            'school_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'name' => Schema::TYPE_STRING. ' NOT NULL',
            'class_id' => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);
        
        $this->createTable('schools', [
            'id' => 'pk',
            'name' => Schema::TYPE_STRING. ' NOT NULL',
        ]);

        $this->createTable('students', [
            'id' => 'pk',
            'school_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'name' => Schema::TYPE_STRING. ' NOT NULL',
            'class_id' => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);

        $this->createTable('student_lesson', [
            'id' => 'pk',
            'student_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'lesson_id' => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);
        
        $this->createTable('teachers', [
            'id' => 'pk',
            'school_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'name' => Schema::TYPE_STRING. ' NOT NULL',
            'lesson_id' => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);
        
        $this->createTable('user', [
            'id' => 'pk',
            'username' => Schema::TYPE_STRING . ' NOT NULL',
            'password' => Schema::TYPE_STRING. ' NOT NULL',
            'authKey' => Schema::TYPE_STRING . ' NOT NULL',
            'accessToken' => Schema::TYPE_STRING . ' NOT NULL',
            'userAvatar' => Schema::TYPE_STRING . ' NOT NULL',
        ]);

    }

    public function down()
    {
        echo "m141011_135035_create_migrations cannot be reverted.\n";
        $this->dropTable('teachers');
        $this->dropTable('student_lesson');
        $this->dropTable('students');
        $this->dropTable('schools');
        $this->dropTable('lessons');
        $this->dropTable('clases');
        return false;
    }
}
