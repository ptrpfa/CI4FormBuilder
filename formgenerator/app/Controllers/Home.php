<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // Check if user used one-time link to login
        if (session('magicLogin')) {
            return redirect()->route('set-password');
        }
        return redirect()->to('/dashboard');
        // return view('welcome_message');

    }

    public function setPassword()
    {   
        // Ensure that user is logged in using one-time link
        if(session('magicLogin')) {
            // Check request type
            if($this->request->is('post')) { // POST request
                // Get the User Provider (UserModel by default)
                $users = auth()->getProvider();
                $user = $users->findById(auth()->id());
                
                // Update user's password
                $user->fill([
                    'password' =>  $this->request->getPost('password'),
                ]);
                $users->save($user);

                // Immediately log user out and remove magic login session data
                auth()->logout();
                session()->removeTempdata('magicLogin');

                // Redirect to base route
                return redirect()->route('/');
            }
            else { // GET request
                // Return view
                return view('home/set_password');
            }
        } 
        else {
            // Return error view if user is not using one-time link
			return view('errors/html/error_404', ['message' => "Unauthorised!"]);
        }
    }

    public function resetPassword()
    {
        // Check request type
        if($this->request->is('post')) { // POST request
            // Get current credentials provided
            $credentials = [
                'email'    => $this->request->getPost('email'),
                'password' => $this->request->getPost('password')
            ];

            // Check if current credentials is correct
            if (! auth()->check($credentials)->isOK()) {
                // Return error view
    			return view('errors/html/error_404', ['message' => "Invalid user credentials!"]);

            }

            // Get the User Provider (UserModel by default)
            $users = auth()->getProvider();
            $user = $users->findById(auth()->id());

            // Update user's credentials
            $user->fill([
                'password' =>  $this->request->getPost('new_password'),
            ]);
            $users->save($user);

            // Return view
            return view('admin/success', ['message' => 'Password change successful!']);

        }
        else { // GET request
            // Return view
            return view('home/reset_password');
        }
    }
}
