<?php

use Phinx\Migration\AbstractMigration;

class CreateProductQueueTable extends AbstractMigration
{
    public function change()
    {
        $this->execute("
            CREATE TABLE `ph_product_queue` (
                `p_id` int(11) DEFAULT NULL,
                `p_data` text,
                `s_id` int(11) DEFAULT NULL,
                `f_id` int(11) DEFAULT NULL,
                `fc_id` int(11) DEFAULT NULL,
                `pq_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `pq_retry_count` int(11) DEFAULT NULL,
                `pq_status` tinyint(2) DEFAULT NULL,
                `pq_priority` int(11) DEFAULT NULL,
                `pq_datecreated` int(10) DEFAULT NULL,
                PRIMARY KEY (`pq_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ");
    }
}
