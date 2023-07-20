<?php

namespace App\Controllers;
use Exception;

class FormController extends BaseController
{
    private $formBuilder;

    public function __construct()
    {
        // Instantiate the CustomFormBuilder library
        $this->formBuilder = service('CustomFormLibrary');

    }

    public function index()
    {
        $responseData = $this->formBuilder->getResponseFormData(144);
        d(unserialize($responseData['Response']));
    }

    public function create()
    {
        $formID = 68;
		$form = $this->formBuilder->getForm($formID, false);
        $title = $form['Name'];
        $html = $form['Structure'];
        $user = 'Adrian';

        $data = [
            'title' => $title,
            'view' => $html
        ];

        if (!$this->request->is('post')) {
            return view('templates/header', $data)
            . view('form/create')
            . view('templates/footer');
        }

        $post = $this->request->getPost();
        $keys = array_keys($post);

        try{
            $rules = null;
            if(is_null($form['Rules']) || $form['Rules'] === false){
                $rules = $this->formBuilder->generateRulesFromHTML($html);
            }else{
                $rules = $form['Rules'];
            }

        } catch (\Exception $e){
            return view('errors/html/error_404', ['message' => $e->getMessage()]);
        }

        $encrpyt = false;
        $validatedData = $this->formBuilder->validateData($post, $rules, $encrpyt);

        if (!$validatedData['success']) {
            $errorFields = implode(", ", $validatedData['errors']);
            $errorMessage = "Validation Error for the following fields: " . $errorFields;
            return view('errors/html/error_404', ['message' => $errorMessage]);
        }

		$validatedData = $validatedData['data'];
		foreach ($keys as $key) {
			$formData[$key] = $validatedData[$key];
		}

		$uploaded_files = $this->request->getFiles();
		if ($uploaded_files) {
			$file_label = "user_file";
			$file_rules = [
				'user_file' => [
					'label' => 'Uploaded File',
					'rules' => [
						sprintf('max_size[%s,2048]', $file_label),                                                          // Max file size (in KB)
						sprintf('mime_in[%s,image/bmp,image/jpg,image/jpeg,image/gif,image/png,image/webp]', $file_label)   // Restricted file MIME types
					],
				],
			];

			if (!$this->validate($file_rules)) {
				return view('errors/html/error_404', ['message' => 'error']);
			} else {
				foreach ($uploaded_files['user_file'] as $current_file) {
					if ($current_file->isValid() && !$current_file->hasMoved()) {
						$folder = sprintf("%d", model(FormResponseModel::class)->get_next_id());
						$file_path = $current_file->store($folder, $current_file->getRandomName());
						$formData['files'] = 'uploads/' . $folder;
					}
				}
			}

		}
		else {
			$formData['files'] = '';
		}

		$formData = serialize($formData);

		$this->formBuilder->submitFormData($formID, $user, $formData);

        return view('templates/header', $data)
        . view('form/success')
        . view('templates/footer');

    }
}