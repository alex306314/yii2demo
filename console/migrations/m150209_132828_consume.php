<?php

use yii\db\Schema;
use yii\db\Migration;

class m150209_132828_consume extends Migration
{
  const TABLE_NAME = '{{%consume}}';

  public function up()
  {
    $tableOptions = null;
    if($this->db->driverName == 'mysql'){
      $tableOptions = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
    }
    $this->createTable(self::TABLE_NAME, [
      'id' => Schema::TYPE_PK,
      'username' => Schema::TYPE_STRING . "(60) NOT NULL COMMENT '用户名'",
      'money' => Schema::TYPE_STRING . "(32) NOT NULL COMMENT '消费金额'",
      'created_at' => Schema::TYPE_INTEGER . " NOT NULL",
      'updated_at' => Schema::TYPE_INTEGER . " NOT NULL",
    ], $tableOptions);
  }

  public function down()
  {
    $this->dropTable(self::TABLE_NAME);
  }
}
