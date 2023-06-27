<?php
namespace App\Models;
use CodeIgniter\Database\BaseBuilder;
use CodeIgniter\Model;

class TableModel extends Model
{
    protected $table; // Specify the table property

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
