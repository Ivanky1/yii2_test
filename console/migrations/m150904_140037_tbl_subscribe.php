<?php

use yii\db\Schema;
use yii\db\Migration;

class m150904_140037_tbl_subscribe extends Migration
{
    public function up()
    {
        $this->execute("CREATE TABLE IF NOT EXISTS `subsribe` (
                          `id_subscribe` int(11) NOT NULL,
                          `email` varchar(200) DEFAULT NULL,
                          `date_subscribe` date DEFAULT NULL
                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
    }

    public function down()
    {
        $this->dropTable('subsribe');

        return false;
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
