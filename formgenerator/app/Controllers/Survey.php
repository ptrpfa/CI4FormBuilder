<?php

namespace App\Controllers;

use App\Models\SurveyModel;
use App\Libraries\CustomFormBuilder;
use App\Libraries\FormBuilder2;
use Exception;

class Survey extends BaseController
{
    private $formBuilder;

    public function __construct()
    {
        $this->formBuilder = new CustomFormBuilder();
        $this->form_help_me = new FormBuilder2();
    }
    
    public function retrieve()
    {
        $model = model(SurveyModel::class);
        
        $data = $model->getSurvey('9');

        $encrypter = \Config\Services::encrypter();

        $ciphertext = $data['name'];

        // $decryptedtext = $encrypter->decrypt($ciphertext);

        // var_dump($decryptedtext);

        // $encryptionKey = config('Encryption')->key;

        // var_dump(bin2hex($encryptionKey));

        return view('survey/page');

    }

    public function create()
    {

        $fields = [
            'name' => [
                //new_div($label, $input, $row, $span, $column, $attributes)
                'group' => $this->form_help_me->new_div(
                    array(
                        //new_label($name='', $value='', $attributes='')
                        $this->form_help_me->new_label('name', 'Name'), 
                        //new_input($name='', $value='', $attributes='' OR $attributes=[])
                        $this->form_help_me->new_input('name', '', 'class="form-control" id="name-control" placeholder="Enter your name" required'), 
                    ),
                    1,'md', 9, 'mt-5'
                )        
            ],
            'message' => [
                'group' => $this->form_help_me->new_div(
                    array(
                        //new_label($name='', $value='', $attributes='')
                        $this->form_help_me->new_label('message', 'Message', 'class="message-label-control"'),
                        //new_textarea($name='', $value='', $attributes='' OR $attributes=[])
                        $this->form_help_me->new_textarea('message', '',array('class'=> 'form-control message-control', 'placeholder'=>'Enter your message', 'required'=> true)),
                    ),
                    2,'md', 9
                )
            ],
        ];

        $data = [
            'title' => 'Survey',
            'fields' => $fields
        ];

        helper('form');

        if (! $this->request->is('post')) {
            return view('templates/header', $data)
                . view('survey/create')
                . view('templates/footer');
        }

        $post = $this->request->getPost(['name', 'message']);

        // Rules to define regular expression and required fields, in this 'name' only allows alphabetic characters
        $rules = [
            'name' => 'required|max_length[255]|min_length[3]|regex_match[/^[a-zA-Z]+$/]',
            'message'  => 'required|max_length[5000]|min_length[10]',
        ];

        if (! $this->validate($rules)) {
            return view('templates/header', $data)
                . view('survey/create')
                . view('templates/footer');
        }

        // Sanitization technique to remove trailing white spaces
        $post['name'] = trim($post['name']);
        $post['message'] = trim($post['message']);

        // Encrypt data before storing into database
        $encrypter = \Config\Services::encrypter();

        $post['name'] = $encrypter->encrypt($post['name']);
        $post['message'] = $encrypter->encrypt($post['message']);

        $model = model(SurveyModel::class);

        $model->save([
            'name' => $post['name'],
            'message'  => $post['message'],
        ]);

        return view('templates/header', ['title'=>'Success'])
            . view('survey/success')
            . view('templates/footer');
    }
    
}
