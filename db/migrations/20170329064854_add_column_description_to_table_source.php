<?php

use Phinx\Migration\AbstractMigration;

class AddColumnDescriptionToTableSource extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('source');
        $table->addColumn('description', 'text', array('after' => 'code'));
        $table->update();
    }
}
