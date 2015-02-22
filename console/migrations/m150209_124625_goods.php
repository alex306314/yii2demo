<?php

use yii\db\Schema;
use yii\db\Migration;

class m150209_124625_goods extends Migration
{
  const TABLE_NAME = '{{%goods}}';

    public function up()
    {
      $tableOptions = null;
      if($this->db->driverName == 'mysql'){
        $tableOptions = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
      }
      $this->createTable(self::TABLE_NAME, [
        'id' => Schema::TYPE_PK,
        'username' => Schema::TYPE_STRING . "(60) NOT NULL COMMENT '用户名'",
        'name' => Schema::TYPE_STRING . " NOT NULL COMMENT '商品名称'",
        'price' => Schema::TYPE_STRING . "(32) NOT NULL COMMENT '商品价格'",
        'cid' => Schema::TYPE_INTEGER . " NOT NULL COMMENT '分类ID'",
        'status' => Schema::TYPE_SMALLINT . "(3) NOT NULL DEFAULT 0 COMMENT '商品状态'",
        'created_at' => Schema::TYPE_INTEGER . " NOT NULL",
        'updated_at' => Schema::TYPE_INTEGER . " NOT NULL",
      ], $tableOptions);
    }

    public function down()
    {
      $this->dropTable(self::TABLE_NAME);
    }
}
