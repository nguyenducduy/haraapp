<?php

use Phinx\Migration\AbstractMigration;

class CreateProductLogTable extends AbstractMigration
{
    public function up()
    {
        $this->execute("
            CREATE TABLE `ph_product_log` (
                `s_id` int(11) DEFAULT NULL,
                `pl_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `pl_message` text,
                `pl_class` varchar(50) DEFAULT NULL,
                `pl_status` tinyint(2) DEFAULT NULL,
                `pl_type` tinyint(2) DEFAULT NULL,
                `pl_datecreated` int(10) DEFAULT NULL,
                `pl_datemodified` int(10) DEFAULT NULL,
                PRIMARY KEY (`pl_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ");
    }
}
