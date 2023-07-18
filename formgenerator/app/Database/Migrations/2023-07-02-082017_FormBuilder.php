<?php

namespace App\Database\Migrations;

// Imports
use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class FormBuilder extends Migration
{   
    // Setup database
    public function up()
    {   

        // Read database configuration from .env file
        $DB_SCHEMA = getenv('database.default.database');
        $DB_HOST = getenv('database.default.hostname');
        $DB_USERNAME = getenv('database.default.username');
        $DB_PASSWORD = getenv('database.default.password');
        $DB_DRIVER = getenv('database.default.DBDriver');
        $DB_PORT = getenv('database.default.port');

        // Temporarily disable foreign key checks before migration starts
        $this->db->disableForeignKeyChecks();

        // Drop Form table, if it exists
        $this->forge->dropTable('Form', true);
        // Define Form table fields
        $form_fields = [
            'FormID' => [
                'type'              => 'INT',
                'null'              => false,
                'auto_increment'    => true
            ],
            'Name' => [
                'type'              => 'VARCHAR',
                'constraint'        => '500',
                'null'              => false,
                'default'           => ''
            ],
            'Version' => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
                'null'              => false,
                'default'           => '1'
            ],
            'Datetime' => [
                'type'              => 'DATETIME',
                'null'              => false,
                'default'           => new RawSql('CURRENT_TIMESTAMP')
            ],
            'Description' => [
                'type'              => 'VARCHAR',
                'constraint'        => '1000',
                'null'              => false,
                'default'           => ''
            ],
            'Structure' => [
                'type'              => 'BLOB',
                'null'              => false
            ],
            'Status' => [
                'type'              => 'INT',
                'null'              => false,
                'default'           => 1
            ]
        ];
        // Add Form table fields
        $this->forge->addField($form_fields);
        // Add Form table constraints
        $this->forge->addPrimaryKey('FormID', 'PK_Form');
        $this->forge->addUniqueKey(['Name', 'Version'], 'UN_Form');
        // Create Form table
        $this->forge->createTable('Form');
        echo 'Form table created!' . PHP_EOL;

        // Drop Response table, if it exists
        $this->forge->dropTable('Response', true);
        // Define Response table fields
        $response_fields = [
            'ResponseID' => [
                'type'              => 'INT',
                'null'              => false,
                'auto_increment'    => true
            ],
            'FormID' => [
                'type'              => 'INT',
                'null'              => false
            ],
            'Datetime' => [
                'type'              => 'DATETIME',
                'null'              => false,
                'default'           => new RawSql('CURRENT_TIMESTAMP')
            ],
            'User' => [
                'type'              => 'VARCHAR',
                'constraint'        => '300',
                'null'              => false,
            ],
            'Response' => [
                'type'              => 'BLOB',
                'null'              => false
            ],
            // 'File' => [
            //     'type'       => 'VARCHAR',
            //     'constraint' => 255,
            //     'null' => true,
            // ]
        ];
        // Add Response table fields
        $this->forge->addField($response_fields);
        // Add Response table constraints
        $this->forge->addPrimaryKey('ResponseID', 'PK_Response');
        $this->forge->addForeignKey('FormID', 'Form', 'FormID', 'CASCADE', 'CASCADE', 'FK_Response');
        // Create Response table
        $this->forge->createTable('Response');
        echo 'Response table created!' . PHP_EOL;

        // Re-enable foreign key checks after migration rules are completed
        $this->db->enableForeignKeyChecks();
        
    }

    // Database teardown
    public function down()
    {
        // Drop Form and Response table, if they exist
        $this->forge->dropTable('Form', true);
        $this->forge->dropTable('Response', true);
    }
    
}
