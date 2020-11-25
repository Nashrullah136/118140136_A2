<?php namespace App\Controllers;

use App\Models\Article as ModelsArticle;
use Config\Services;

class Article extends BaseController
{
    protected  $rule = [
        'title' => 'required|max_length[100]',
        'body' => 'required'
    ];
    protected $session;
    function __construct(){
        $this->session = Services::session();
    }
	public function index()
    {
        $data = $this->article->findAll();
        return view('home', ['article' => $data]);
    }
    public function read($id)
    {
        if($data = $this->article->find($id)){
            return view('read', ['article' => $data]);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function dashboard()
    {
        $id = $this->session->get('id');
        $admin = $this->session->get('admin');
        if($admin){
            $data = $this->article->findAll();    
        }
        else{
            $data = $this->article->where('uid', $id)->findAll();
        }
        return view('dashboard', ['article' => $data]);
    }
    public function update_form($id)
    {
        $data = $this->article->find($id);
        if($data){
            return view('update_form', ['article' => $data]);
        }
        else{
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function create_form()
    {   
        return view('create_form');
    }
    public function delete($id)
    {
        $uid = $this->session->get('id');
        $admin = $this->session->get('admin');
        if(!$admin && !$this->article->where('id', $id)->where('uid', $uid)->find()){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        if($this->article->find($id)){
            $this->article->delete($id);
        }
        return redirect()->route('dashboard');
    }
    public function update($id)
    {
        $uid = $this->session->get('id');
        $admin = $this->session->get('admin');
        if(!$this->validate($this->rule)){
            return redirect()->back()->with('validation', $this->validator);
        }
        if(!$admin && !$this->article->where('id', $id)->where('uid', $uid)->find()){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $title = $this->request->getVar('title');
        $body = $this->request->getVar('body'); 
        $this->article->update($id, [
            'title' => $title,
            'body' => $body
        ]);
        return redirect()->route('dashboard');
    }
    public function create()
    {
        $uid = $this->session->get('id');
        if(!$this->validate($this->rule)){
            return redirect()->back()->with('validation', $this->validator);
        }
        $title = $this->request->getVar('title');
        $body = $this->request->getVar('body'); 
        $this->article->insert([
            'title' => $title,
            'body' => $body,
            'uid' => $uid
        ]);
        return redirect()->route('dashboard');
    }
}
