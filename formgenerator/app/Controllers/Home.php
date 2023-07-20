<?php

namespace App\Controllers;
use CodeIgniter\Shield\Authentication\Passwords;

class Home extends BaseController
{
    public function index()
    {
        $user = auth()->user();
        // Check if user used one-time link to login
        if ($user->requiresPasswordReset()) {
            return redirect()->route('resetPassword');
        }
        return redirect()->to('/dashboard');
        // return view('welcome_message');

    }

    public function changePassword()
    {   
        if($this->request->is('post')) {
            $credentials = [
                'email'    => $this->request->getPost('email'),
                'password' => $this->request->getPost('password')
            ];

            // Check if current credentials is correct
            if (! auth()->check($credentials)->isOK()) {
                // Return error view
                return redirect()->back()->with('errors', "Invalid user credentials!");
            }

            $new_password = $this->request->getPost('new_password');

            //Validate new Password
            if (! $this->validateData(['new_password' => $new_password], [
                'new_password' => [
                    'rules'  => 'required|' . Passwords::getMaxLenghtRule() . '|strong_password',
                    'errors' => [
                        'max_byte' => lang('Auth.errorPasswordTooLongBytes'),
                    ],
                ],
            ])) {
                // The validation fails, so returns
                return redirect()->back()->with('errors', $this->validator->getErrors());
            }

            // Get the User Provider (UserModel by default)
            $users = auth()->getProvider();
            $user = $users->findById(auth()->id());

            // Update user's credentials
            $user->fill([
                'password' =>  $new_password
            ]);
            $users->save($user);
            
            // Return view
            return redirect()->to('/dashboard')->with('success', 'Password updated successful');

        }else{
            return view('home/change_password', ['title' => "Change Password"]);
        }

    }

    public function resetPassword()
    {
        // Check request type
        if($this->request->is('post')) { // POST request

            //Get Submitted Password
            $credentials = $this->request->getPost(([
                'password',
                'password_confirm'
            ]));

            //Validate Password
            if (! $this->validateData($credentials, [
                'password' => [
                    'label'  => lang('Auth.password'),
                    'rules'  => 'required|' . Passwords::getMaxLenghtRule() . '|strong_password',
                    'errors' => [
                        'max_byte' => lang('Auth.errorPasswordTooLongBytes'),
                    ],
                ],
                'password_confirm' => [
                    'label' => lang('Auth.passwordConfirm'),
                    'rules' => 'required|matches[password]',
                ],
            ])) {
                // The validation fails, so returns
                return redirect()->back()->with('errors', $this->validator->getErrors());
            }

            //Save the new password
            $users = auth()->getProvider();

            $user = $users->findById(user_id());
            $user->fill([
                'password' => $credentials['password']
            ]);
    
            $users->save($user);
    
            auth()->user()->undoForcePasswordReset();     

            return redirect()->to('/dashboard')->with('success', 'Password reset successful');

        }
        else { // GET request
            // Return view
            return view('home/reset_password', ['title' => "Reset Password"]);
        }
    }
}
