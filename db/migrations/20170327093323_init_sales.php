<?php

use Phinx\Db\Table;
use Phinx\Migration\AbstractMigration;

class InitSales extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('activity', array('id' => false, 'primary_key' => array('id')));
        $table->addColumn('id', 'biginteger', array('identity' => true));
        $table->addColumn('lead_user_id', 'biginteger', array('null' => true));
        $table->addColumn('user_company_id', 'biginteger', array('null' => true));
        $table->addColumn('stage_id', 'biginteger', array('null' => true));
        $table->addColumn('timemillis_created_date', 'biginteger', array('null' => true));
        $table->addColumn('note', 'text', array('null' => true));
        $table->addColumn('mom', 'text', array('null' => true));
        $table->addColumn('amount', 'decimal', array('precision' => 19, 'scale' => 2, 'null' => true));
        $table->addColumn('is_notify_manager', 'boolean', array('default' => false));
        $table->addColumn('is_delete', 'boolean', array('default' => false));
        $table->addColumn('deleted_date', 'timestamp', array('null' => true));
        $table->addColumn('is_shown_in_history', 'boolean', array('default' => true));
        $table->addColumn('created_date', 'timestamp', array('null' => true));
        $table->addColumn('updated_date', 'timestamp', array('null' => true));
        $table->create();

        $table = $this->table('collaboration', array('id' => false, 'primary_key' => array('id')));
        $table->addColumn('id', 'biginteger', array('identity' => true));
        $table->addColumn('user_company_id', 'biginteger', array('null' => true));
        $table->addColumn('activity_id', 'biginteger', array('null' => true));
        $table->addColumn('lead_id', 'biginteger', array('null' => true));
        $table->addColumn('note', 'text', array('null' => true));
        $table->addColumn('timemillis_created_date', 'biginteger', array('null' => true));
        $table->addColumn('timemillis_updated_date', 'biginteger', array('null' => true));
        $table->addColumn('timezone', 'string', array('limit' => 45, 'null' => true));
        $table->addColumn('created_date', 'timestamp', array('null' => true));
        $table->addColumn('updated_date', 'timestamp', array('null' => true));
        $table->create();

        $table = $this->table('collaboration_comment', array('id' => false, 'primary_key' => array('id')));
        $table->addColumn('id', 'biginteger', array('identity' => true));
        $table->addColumn('collaboration_id', 'biginteger', array('null' => true));
        $table->addColumn('collaboration_user_id', 'biginteger', array('null' => true));
        $table->addColumn('comment', 'text', array('null' => true));
        $table->addColumn('timemillis_created_date', 'biginteger', array('null' => true));
        $table->addColumn('timezone', 'string', array('limit' => 45, 'null' => true));
        $table->addColumn('created_date', 'timestamp', array('null' => true));
        $table->addColumn('updated_date', 'timestamp', array('null' => true));
        $table->create();

        $table = $this->table('collaboration_comment_user', array('id' => false, 'primary_key' => array('id')));
        $table->addColumn('id', 'biginteger', array('identity' => true));
        $table->addColumn('comment_id', 'biginteger', array('null' => true));
        $table->addColumn('user_company_id', 'biginteger', array('null' => true));
        $table->addColumn('created_date', 'timestamp', array('null' => true));
        $table->addColumn('updated_date', 'timestamp', array('null' => true));
        $table->create();

        $table = $this->table('collaboration_user', array('id' => false, 'primary_key' => array('id')));
        $table->addColumn('id', 'biginteger', array('identity' => true));
        $table->addColumn('collaboration_id', 'biginteger', array('null' => true));
        $table->addColumn('user_company_id', 'biginteger', array('null' => true));
        $table->addColumn('is_initiator', 'boolean', array('default' => false));
        $table->addColumn('is_in_collaboration', 'boolean', array('default' => false));
        $table->addColumn('is_already_read', 'boolean', array('default' => false));
        $table->addColumn('created_date', 'timestamp', array('null' => true));
        $table->addColumn('updated_date', 'timestamp', array('null' => true));
        $table->create();

        $table = $this->table('company', array('id' => false, 'primary_key' => array('id')));
        $table->addColumn('id', 'biginteger', array('identity' => true));
        $table->addColumn('name', 'string', array('limit' => 255, 'null' => true));
        $table->addColumn('address', 'text', array('null' => true));
        $table->addColumn('phone', 'string', array('limit' => 255, 'null' => true));
        $table->addColumn('email', 'string', array('limit' => 255, 'null' => true));
        $table->addColumn('country', 'string', array('limit' => 255, 'null' => true));
        $table->addColumn('timezone', 'string', array('limit' => 45, 'null' => true));
        $table->addColumn('currency_code', 'string', array('limit' => 45, 'null' => true));
        $table->addColumn('currency_symbol', 'string', array('limit' => 45, 'null' => true));
        $table->addColumn('created_date', 'timestamp', array('null' => true));
        $table->addColumn('updated_date', 'timestamp', array('null' => true));
        $table->create();

        $table = $this->table('company_group', array('id' => false, 'primary_key' => array('id')));
        $table->addColumn('id', 'biginteger', array('identity' => true));
        $table->addColumn('company_id', 'biginteger', array('default' => false, 'null' => true));
        $table->addColumn('name', 'string', array('limit' => 255, 'null' => true));
        $table->addColumn('description', 'text', array('null' => true));
        $table->addColumn('created_date', 'timestamp', array('null' => true));
        $table->addColumn('updated_date', 'timestamp', array('null' => true));
        $table->create();

        $table = $this->table('credential', array('id' => false, 'primary_key' => array('id')));
        $table->addColumn('id', 'biginteger', array('identity' => true));
        $table->addColumn('username', 'string', array('limit' => 255, 'null' => true));
        $table->addColumn('password', 'text', array('null' => true));
        $table->addColumn('created_date', 'timestamp', array('null' => true));
        $table->addColumn('updated_date', 'timestamp', array('null' => true));
        $table->create();

        $table = $this->table('forgot_password', array('id' => false, 'primary_key' => array('id')));
        $table->addColumn('id', 'biginteger', array('identity' => true));
        $table->addColumn('user_id', 'biginteger', array('null' => true));
        $table->addColumn('url', 'text', array('null' => true));
        $table->addColumn('is_used', 'boolean', array('default' => false));
        $table->addColumn('created_date', 'timestamp', array('null' => true));
        $table->addColumn('updated_date', 'timestamp', array('null' => true));
        $table->create();

        $table = $this->table('lead', array('id' => false, 'primary_key' => array('id')));
        $table->addColumn('id', 'biginteger', array('identity' => true));
        $table->addColumn('user_company_id', 'biginteger', array('null' => true));
        $table->addColumn('company_id', 'biginteger', array('null' => true));
        $table->addColumn('source_id', 'biginteger', array('null' => true));
        $table->addColumn('name', 'string', array('limit' => 255, 'null' => true));
        $table->addColumn('legal_name', 'string', array('limit' => 255, 'null' => true));
        $table->addColumn('address', 'text', array('null' => true));
        $table->addColumn('is_delete', 'boolean', array('default' => false));
        $table->addColumn('temp_ref_id', 'string', array('limit' => 255, 'null' => true));
        $table->addColumn('deleted_date', 'timestamp', array('null' => true));
        $table->addColumn('created_date', 'timestamp', array('null' => true));
        $table->addColumn('updated_date', 'timestamp', array('null' => true));
        $table->create();

        $table = $this->table('lead_contact', array('id' => false, 'primary_key' => array('id')));
        $table->addColumn('id', 'biginteger', array('identity' => true));
        $table->addColumn('lead_id', 'biginteger', array('null' => true));
        $table->addColumn('name', 'string', array('limit' => 255, 'null' => true));
        $table->addColumn('position', 'string', array('limit' => 255, 'null' => true));
        $table->addColumn('email', 'string', array('limit' => 255, 'null' => true));
        $table->addColumn('phone', 'string', array('limit' => 255, 'null' => true));
        $table->addColumn('created_date', 'timestamp', array('null' => true));
        $table->addColumn('updated_date', 'timestamp', array('null' => true));
        $table->create();

        $table = $this->table('lead_status', array('id' => false, 'primary_key' => array('id')));
        $table->addColumn('id', 'biginteger', array('identity' => true));
        $table->addColumn('company_id', 'biginteger', array('null' => true));
        $table->addColumn('name', 'string', array('limit' => 255, 'null' => true));
        $table->addColumn('colour', 'string', array('limit' => 45, 'null' => true));
        $table->addColumn('order', 'integer', array('null' => true));
        $table->addColumn('created_date', 'timestamp', array('null' => true));
        $table->addColumn('updated_date', 'timestamp', array('null' => true));
        $table->create();

        $table = $this->table('lead_user', array('id' => false, 'primary_key' => array('id')));
        $table->addColumn('id', 'biginteger', array('identity' => true));
        $table->addColumn('lead_id', 'biginteger', array('null' => true));
        $table->addColumn('user_company_id', 'biginteger', array('null' => true));
        $table->addColumn('lead_status_id', 'biginteger', array('null' => true));
        $table->addColumn('start_date', 'timestamp', array('null' => true));
        $table->addColumn('limit_date', 'timestamp', array('null' => true));
        $table->addColumn('timezone', 'string', array('limit' => 45, 'null' => true));
        $table->addColumn('is_delete', 'boolean', array('default' => false));
        $table->addColumn('deleted_date', 'timestamp', array('null' => true));
        $table->addColumn('created_date', 'timestamp', array('null' => true));
        $table->addColumn('updated_date', 'timestamp', array('null' => true));
        $table->create();

        $table = $this->table('lead_user_log', array('id' => false, 'primary_key' => array('id')));
        $table->addColumn('id', 'biginteger', array('identity' => true));
        $table->addColumn('lead_user_id', 'biginteger', array('null' => true));
        $table->addColumn('lead_status_id', 'biginteger', array('null' => true));
        $table->addColumn('start_date', 'timestamp', array('null' => true));
        $table->addColumn('limit_date', 'timestamp', array('null' => true));
        $table->addColumn('created_date', 'timestamp', array('null' => true));
        $table->addColumn('updated_date', 'timestamp', array('null' => true));
        $table->create();

        $table = $this->table('leaderboard', array('id' => false, 'primary_key' => array('id')));
        $table->addColumn('id', 'biginteger', array('identity' => true));
        $table->addColumn('type', 'integer', array('null' => true));
        $table->addColumn('name', 'string', array('limit' => 255, 'null' => true));
        $table->addColumn('description', 'string', array('limit' => 45, 'null' => true));
        $table->addColumn('company_id', 'biginteger', array('null' => true));
        $table->addColumn('user_company_id', 'biginteger', array('null' => true));
        $table->addColumn('created_date', 'timestamp', array('null' => true));
        $table->addColumn('updated_date', 'timestamp', array('null' => true));
        $table->create();

        $table = $this->table('leaderboard_column', array('id' => false, 'primary_key' => array('id')));
        $table->addColumn('id', 'biginteger', array('identity' => true));
        $table->addColumn('leaderboard_id', 'integer', array('null' => true));
        $table->addColumn('name', 'string', array('limit' => 255, 'null' => true));
        $table->addColumn('code', 'string', array('limit' => 45, 'null' => true));
        $table->addColumn('created_date', 'timestamp', array('null' => true));
        $table->addColumn('updated_date', 'timestamp', array('null' => true));
        $table->create();

        $table = $this->table('leaderboard_content', array('id' => false, 'primary_key' => array('id')));
        $table->addColumn('id', 'biginteger', array('identity' => true));
        $table->addColumn('leaderboard_column_id', 'biginteger', array('null' => true));
        $table->addColumn('stage_id', 'biginteger', array('null' => true));
        $table->addColumn('created_date', 'timestamp', array('null' => true));
        $table->addColumn('updated_date', 'timestamp', array('null' => true));
        $table->create();

        $table = $this->table('source', array('id' => false, 'primary_key' => array('id')));
        $table->addColumn('id', 'biginteger', array('identity' => true));
        $table->addColumn('company_id', 'biginteger', array('null' => true));
        $table->addColumn('name', 'string', array('limit' => 255, 'null' => true));
        $table->addColumn('code', 'string', array('limit' => 255, 'null' => true));
        $table->addColumn('is_delete', 'boolean', array('default' => false));
        $table->addColumn('deleted_date', 'timestamp', array('null' => true));
        $table->addColumn('created_date', 'timestamp', array('null' => true));
        $table->addColumn('updated_date', 'timestamp', array('null' => true));
        $table->create();

        $table = $this->table('stage', array('id' => false, 'primary_key' => array('id')));
        $table->addColumn('id', 'biginteger', array('identity' => true));
        $table->addColumn('company_id', 'biginteger', array('null' => true));
        $table->addColumn('name', 'string', array('limit' => 255, 'null' => true));
        $table->addColumn('code', 'string', array('limit' => 255, 'null' => true));
        $table->addColumn('description', 'text', array('null' => true));
        $table->addColumn('day', 'integer', array('null' => true));
        $table->addColumn('order', 'integer', array('null' => true));
        $table->addColumn('is_delete', 'boolean', array('default' => false));
        $table->addColumn('deleted_date', 'timestamp', array('null' => true));
        $table->addColumn('is_lock', 'boolean', array('default' => false));
        $table->addColumn('is_closed', 'boolean', array('default' => false));
        $table->addColumn('is_count', 'boolean', array('default' => false));
        $table->addColumn('is_input_value', 'boolean', array('default' => false));
        $table->addColumn('is_record_to_calendar', 'boolean', array('default' => false));
        $table->addColumn('is_require_legal_name', 'boolean', array('default' => false));
        $table->addColumn('created_date', 'timestamp', array('null' => true));
        $table->addColumn('updated_date', 'timestamp', array('null' => true));
        $table->create();

        $table = $this->table('tag_user', array('id' => false, 'primary_key' => array('id')));
        $table->addColumn('id', 'biginteger', array('identity' => true));
        $table->addColumn('reference_activity_id', 'biginteger', array('null' => true));
        $table->addColumn('activity_id', 'biginteger', array('null' => true));
        $table->addColumn('user_company_id', 'biginteger', array('null' => true));
        $table->addColumn('created_date', 'timestamp', array('null' => true));
        $table->addColumn('updated_date', 'timestamp', array('null' => true));
        $table->create();

        $table = $this->table('user', array('id' => false, 'primary_key' => array('id')));
        $table->addColumn('id', 'biginteger', array('identity' => true));
        $table->addColumn('name', 'string', array('null' => true));
        $table->addColumn('email', 'string', array('null' => true));
        $table->addColumn('token', 'text', array('null' => true));
        $table->addColumn('created_date', 'timestamp', array('null' => true));
        $table->addColumn('updated_date', 'timestamp', array('null' => true));
        $table->create();

        $table = $this->table('user_company', array('id' => false, 'primary_key' => array('id')));
        $table->addColumn('id', 'biginteger', array('identity' => true));
        $table->addColumn('user_id', 'biginteger', array('null' => true));
        $table->addColumn('company_id', 'biginteger', array('null' => true));
        $table->addColumn('user_privilege_id', 'biginteger', array('null' => true));
        $table->addColumn('is_delete', 'boolean', array('default' => false));
        $table->addColumn('deleted_date', 'timestamp', array('null' => true));
        $table->addColumn('created_date', 'timestamp', array('null' => true));
        $table->addColumn('updated_date', 'timestamp', array('null' => true));
        $table->create();

        $table = $this->table('user_credential', array('id' => false, 'primary_key' => array('id')));
        $table->addColumn('id', 'biginteger', array('identity' => true));
        $table->addColumn('user_id', 'biginteger', array('null' => true));
        $table->addColumn('credential_id', 'biginteger', array('null' => true));
        $table->addColumn('is_active', 'boolean', array('default' => false));
        $table->addColumn('created_date', 'timestamp', array('null' => true));
        $table->addColumn('updated_date', 'timestamp', array('null' => true));
        $table->create();


        $table = $this->table('user_group', array('id' => false, 'primary_key' => array('id')));
        $table->addColumn('id', 'biginteger', array('identity' => true));
        $table->addColumn('user_company_id', 'biginteger', array('null' => true));
        $table->addColumn('group_id', 'biginteger', array('null' => true));
        $table->addColumn('is_manager', 'boolean', array('default' => false));
        $table->addColumn('order', 'integer', array('null' => true));
        $table->addColumn('created_date', 'timestamp', array('null' => true));
        $table->addColumn('updated_date', 'timestamp', array('null' => true));
        $table->create();


        $table = $this->table('user_privilege', array('id' => false, 'primary_key' => array('id')));
        $table->addColumn('id', 'biginteger', array('identity' => true));
        $table->addColumn('company_id', 'biginteger', array('null' => true));
        $table->addColumn('name', 'string', array('limit' => 255, 'null' => true));
        $table->addColumn('code', 'string', array('limit' => 45, 'null' => true));
        $table->addColumn('description', 'text', array('null' => true));
        $table->addColumn('created_date', 'timestamp', array('null' => true));
        $table->addColumn('updated_date', 'timestamp', array('null' => true));
        $table->create();

    }
}
