<?php
namespace App\Models;
use CodeIgniter\Model;

class TableModel extends Model
{
    protected $table = 'Response';
    protected $primaryKey = 'ResponseID';
    protected $allowedFields = ['Datetime','User','Response','FormID'];

    public function getData($table, $formID= false) //Get all data from a table
    {
        $this->table = $table; // Set the table name
        
        if ($formID === false) {
            return $this->findAll();
        }

        return $this->where(['FormID' => $formID])->first();
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
