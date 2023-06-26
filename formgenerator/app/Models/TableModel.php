<?php
namespace App\Models;
use CodeIgniter\Database\BaseBuilder;
use CodeIgniter\Model;

class TableModel extends Model
{
    protected $table; // Specify the table property

    public function getData($table)
    {
        $this->table = $table; // Set the table name
        return $this->findAll();
    }
    public function getResponse()
    {
        $builder = $this->db->table('Response');
        $builder->select('Response.*, Form.Name, Form.Version');
        $builder->join('Form', 'Form.FormID = Response.FormID');
        $query = $builder->get();
        
        return $query->getResult();
    }
}
