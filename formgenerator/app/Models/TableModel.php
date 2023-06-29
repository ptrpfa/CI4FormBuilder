<?php
namespace App\Models;
use CodeIgniter\Model;

class TableModel extends Model
{
    protected $table = 'Response';
    protected $primaryKey = 'ResponseID';
    protected $allowedFields = ['Datetime','User','Response','FormID'];

    public function getData($table) //Get all data from a table
    {
        $this->table = $table; // Set the table name
        return $this->findAll();
    }

    public function getResponse() //Get the responses form of each user
    {
        $builder = $this->db->table('Response');
        $builder->select('Response.*, Form.Name, Form.Version');
        $builder->join('Form', 'Form.FormID = Response.FormID');
        $query = $builder->get();
        
        return $query->getResult();
    }
}
