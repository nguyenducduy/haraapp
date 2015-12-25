<?php

use Phinx\Migration\AbstractMigration;

class CreateLanguageTable extends AbstractMigration
{
    public function up()
    {
        $this->execute("
            CREATE TABLE `ph_language` (
              `l_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
              `l_code` varchar(2) DEFAULT NULL,
              `l_country_code` varchar(2) DEFAULT NULL,
              `l_name` varchar(50) DEFAULT NULL,
              `l_default` tinyint(1) DEFAULT NULL,
              `l_order_no` int(11) DEFAULT NULL,
              `l_status` smallint(3) DEFAULT NULL,
              `l_datecreated` int(10) DEFAULT NULL,
              `l_datemodified` int(10) DEFAULT NULL,
              PRIMARY KEY (`l_id`),
              KEY `l_code` (`l_code`),
              KEY `l_status` (`l_status`),
              KEY `l_order_no` (`l_order_no`),
              KEY `l_default` (`l_default`)
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
        ");

        $this->execute("
            INSERT INTO `ph_language` (
                `l_code`,
                `l_country_code`,
                `l_name`,
                `l_default`,
                `l_order_no`,
                `l_status`,
                `l_datecreated`,
                `l_datemodified`
            )
            VALUES (
                'en',
                'us',
                'English',
                1,
                1,
                1,
                ". time() .",
                0
            );
        ");
    }
}
