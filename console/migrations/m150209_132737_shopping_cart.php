<?php

use yii\db\Schema;
use yii\db\Migration;

class m150209_132737_shopping_cart extends Migration
{
  const TABLE_NAME = '{{%shopping_cart}}';

  public function up()
  {
    $tableOptions = null;
    if($this->db->driverName == 'mysql'){
      $tableOptions = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
    }
    $this->createTable(self::TABLE_NAME, [
      'id' => Schema::TYPE_PK,
      'username' => Schema::TYPE_STRING . "(60) NOT NULL COMMENT '用户名'",
      'goodsid' => Schema::TYPE_INTEGER . " NOT NULL COMMENT '商品ID'",
      'quantity' => Schema::TYPE_SMALLINT . " NOT NULL DEFAULT 1 COMMENT '商品数量'",
      'created_at' => Schema::TYPE_INTEGER . " NOT NULL",
      'updated_at' => Schema::TYPE_INTEGER . " NOT NULL",
    ], $tableOptions);
  }

  public function down()
  {
    $this->dropTable(self::TABLE_NAME);
  }
}
