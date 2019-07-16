<?php

use yii\db\Schema;
use yii\db\Migration;

class m150904_140010_tbl_advert extends Migration
{
    public function up()
    {
        $this->execute("CREATE TABLE IF NOT EXISTS `advert` (
                      `id_advert` int(11) NOT NULL,
                      `price` mediumint(9) DEFAULT NULL,
                      `address` varchar(255) DEFAULT NULL,
                      `fk_agent` int(11) DEFAULT NULL,
                      `general_image` varchar(255) DEFAULT NULL,
                      `description` text,
                      `locaton` varchar(200) DEFAULT NULL,
                      `hot` tinyint(4) DEFAULT NULL,
                      `sold` tinyint(4) DEFAULT NULL,
                      `type` varchar(100) DEFAULT NULL,
                      `recommend` tinyint(4) DEFAULT NULL,
                      `created` int(11) NOT NULL,
                      `updated` int(11) NOT NULL
                    ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;");
    }

    public function down()
    {
        $this->dropTable('advert');

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
