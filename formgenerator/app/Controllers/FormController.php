<?php

namespace App\Controllers;

use Exception;
use App\Models\FormModel;

class FormController extends BaseController
{
    private $formBuilder;

    public function __construct()
    {
        // Instantiate the CustomFormBuilder library
        $this->formBuilder = service('CustomFormLibrary');
    }

    // Temporary view
    public function index()
    {
        $responseData = $this->formBuilder->getResponseFormData(208);
        d(unserialize($responseData['Response']));
    }

    public function create($formID)
    {

        // Check if form is active
		if (!model(FormModel::class)->is_active($formID)) {
			return view('errors/html/error_404', ['message' => 'The form  is currently inactive.']);
		}

        $form = $this->formBuilder->getForm($formID, false);
        $title = $form['Name'];
        $html = $form['Structure'];
        $user = 'Demo User';

        $data = [
            'title' => $title,
            'view' => $html
        ];

        if (!$this->request->is('post')) {
            return view('templates/header', $data)
                . view('form/create')
                . view('templates/footer');
        }

        try {
            $rules = null;
            if (is_null($form['Rules']) || $form['Rules'] === false) {
                $rules = $this->formBuilder->generateRulesFromHTML($html);
            } else {
                $rules = $form['Rules'];
            }
        } catch (\Exception $e) {
            return view('errors/html/error_404', ['message' => $e->getMessage()]);
        }

        $post = $this->request->getPost();
        $keys = array_keys($post);

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
			$allowedMaxSize = 2048; // 2MB maximum file size
			$allowedMimeTypes = ['image/bmp', 'image/jpg', 'image/jpeg', 'image/gif', 'image/png', 'image/webp'];

			foreach ($uploaded_files['user_file'] as $index => $current_file) {
				// Validate each uploaded file
				if ($current_file->getError() === UPLOAD_ERR_NO_FILE) {
					break;
				}
				// $uploadErrors = $this->validateUploadedFile($current_file, $allowedMaxSize, $allowedMimeTypes);
				$uploadErrors = $this->formBuilder->validateUploadedFile($current_file, $allowedMaxSize, $allowedMimeTypes);

				if (!empty($uploadErrors)) {
					// Return view with the file upload validation errors
					return view('errors/html/error_404', ['message' => "File Upload Error: " . implode(', ', $uploadErrors)]);
				} else {
					// Set folder name (id)
					$folder = sprintf("%d", model(FormResponseModel::class)->get_next_id());
					// Store file on server (id/<filename>)
					$file_path = $current_file->store($folder, $current_file->getRandomName());
					// Set filepath to POST data, if a file is successfully uploaded
					$formData['user_file'][$index] = $file_path;
				}
			}
		} else {
			$formData['user_file'] = '';
		}

        $formData = serialize($formData);

        $this->formBuilder->submitFormData($formID, $user, $formData);

        return view('templates/header', $data)
            . view('form/success')
            . view('templates/footer');
    }
}