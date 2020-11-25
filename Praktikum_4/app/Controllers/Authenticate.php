<?php namespace App\Controllers;

use App\Models\User;
use Config\Services;

class Authenticate extends BaseController
{
	public function auth()
	{
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        if(($data = $this->user->where('username', $username)->first()) && ($data->password == $password)){
            $session = Services::session();
            $session->set('logged_in', true);
            $session->set('id', $data->id);
            $session->set('username', $data->username);
            $session->set('admin', $data->role == 'admin');
            return redirect()->route('dashboard');
        }
        return redirect()->back()->with('error', 'Password salah!');
    }
    public function register_form()
    {
        return view('register_form');
    }
    public function login(){
        return view('login');
    }
    public function register()
    {
        $validation = Services::validation();
        $success = $validation->withRequest($this->request)->setRules([
            'username' => 'required|min_length[6]|max_length[15]|is_unique[user.username]',
            'password' => 'required|min_length[8]|max_length[25]',
            'confirm_password' => 'matches[password]'
        ])->run();
        if(!$success){
            return redirect()->back()->with('validation', $this->validator);
        }
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $role = 'user';
        $this->user->insert([
            'username' => $username,
            'password' => $password,
            'role' => 'user'
        ]);
        return redirect()->route('login')->with('info', 'Register berhasil');
    }
    public function logout()
    {
        $session = Services::session();
        $session->stop();
        return redirect()->route('login');
    }

}