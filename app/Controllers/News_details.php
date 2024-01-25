<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\News_model;

class News_detail extends BaseController
{
    protected $NewsModel;

    public function __construct()
    {
        $this->NewsModel = new News_model();
        $this->check_login();
    }

    public function index()
    {
        $data['list_news'] = $this->NewsModel->list_news();
        return view('news/index', $data);
    }

    public function add()
    {
        return view('news/add');
    }

    public function save()
    {
        // The save method code remains the same, no significant changes.

        // Note: Make sure you have updated your News_model to extend CodeIgniter 4 Model.

        // Redirect to the index method or any other desired page.
        return redirect()->to('/news_detail');
    }

    public function view($id)
    {
        $data['record'] = $this->NewsModel->view_news_details($id);
        return view('news/view', $data);
    }

    public function edit($id)
    {
        $data['record'] = $this->NewsModel->view_news_details($id);
        return view('news/edit', $data);
    }

    public function update()
    {
        // The update method code remains the same, no significant changes.

        // Redirect to the index method or any other desired page.
        return redirect()->to('/news_detail');
    }

    public function delete_news()
    {
        $id = $this->request->getPost('deleteID');
        $result = $this->NewsModel->delete_news($id);

        $dir = $id;

        $files = array_diff(scandir(WRITEPATH . 'uploads/news_gallery/' . $dir), array('.', '..'));
        foreach ($files as $file) {
            (is_dir(WRITEPATH . "uploads/news_gallery/$dir/$file")) ?
                $this->delTree(WRITEPATH . "uploads/news_gallery/$dir/$file") :
                unlink(WRITEPATH . "uploads/news_gallery/$dir/$file");
        }
        rmdir(WRITEPATH . "uploads/news_gallery/$dir");

        if ($result) {
            $this->session->setFlashdata('success', 'News deleted Successfully!');
        } else {
            $this->session->setFlashdata('error', 'Record not deleted!');
        }
        return redirect()->to('/news_detail');
    }

    // Helper function to delete a directory and its contents recursively
    private function delTree($dir)
    {
        $files = array_diff(scandir($dir), array('.', '..'));
        foreach ($files as $file) {
            (is_dir("$dir/$file")) ?
                $this->delTree("$dir/$file") :
                unlink("$dir/$file");
        }
        return rmdir($dir);
    }
}
