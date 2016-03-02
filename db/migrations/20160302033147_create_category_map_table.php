<?php

use Phinx\Migration\AbstractMigration;

class CreateCategoryMapTable extends AbstractMigration
{
    public function up()
    {
        $this->execute("
            CREATE TABLE `ph_category_map` (
                `s_id` int(11) DEFAULT NULL,
                `h_id` int(11) DEFAULT NULL,
                `f_id` int(11) DEFAULT NULL,
                `f_name` varchar(255) DEFAULT NULL,
                `cm_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `cm_data` text,
                `cm_status` tinyint(2) DEFAULT NULL,
                `cm_total_item` int(11) DEFAULT NULL,
                `cm_total_item_sync` int(11) DEFAULT NULL,
                `cm_total_item_queue` int(11) DEFAULT NULL,
                `cm_datecreated` int(10) DEFAULT NULL,
                `cm_datemodified` int(10) DEFAULT NULL,
                PRIMARY KEY (`cm_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ");
    }
}
