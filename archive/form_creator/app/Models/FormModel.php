<?php
namespace App\Models;

use CodeIgniter\Model;

class FormModel extends Model
{
    protected $table = 'forms';
    protected $primaryKey = 'formid';
    protected $allowedFields = ['label', 'type', 'name'];

    public function getFormTemplateById($formid)
    {
        return $this->find($formid);
    }

    public function insertData($formData)
    {
        $this->db->table('form_data')->insert($formData);
    }

    public function newForm($formTemplate){
        
        $this->db->table('forms')->insert($formTemplate);
        // Get the inserted formid
        $formid = $this->db->insertID();

        // Return the formid
        return $formid;
    }
}







