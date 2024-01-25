<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use App\Models\NewsModel; 

class Admin extends Controller
{
    public function login()
{
    helper(['form']);

    $data = []; // Initialize $data array

    if ($this->request->getMethod() === 'post') {
        $userModel = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        // print_r($password); die();

        $user = $userModel->getUserByUsernameAndPassword($username, $password);

        if ($user) {
            // Successful login
            // Redirect to admin dashboard or perform other actions
            return redirect()->to('/admin/dashboard');
        } else {
            // Failed login
            $data['error'] = 'Invalid login credentials';
        }
    }

    return view('admin/login', $data);
    
}
public function dashboard()
{
    return view('admin/dashboard');

}
public function logout()
{
    // Perform any logout actions if needed
    // For example, clearing session data, logging out the user, etc.

    // Redirect to the login page or any other page after logout
    return redirect()->to('/admin/login');
}
public function news()
{
    $model = new NewsModel();
    $data['news'] = $model->findAll(); 

    return view('news/list_news', $data);
}

public function add()
{
    return view('news/add');
}

public function save_news()
    {
        $model = new NewsModel(); 

    $validationRules = [
        'title' => 'required|min_length[3]',
        'date' => 'required|valid_date',
        'content' => 'required',
        'image' => 'uploaded[image]|max_size[image,1024]|is_image[image]',
    ];

    if (!$this->validate($validationRules)) {
        return redirect()->to('/admin/news')->withInput()->with('validation', $this->validator);
    }

    // Handle image upload
    $image = $this->request->getFile('image');
    $newName = $image->getRandomName();
    $image->move('path/to/upload/directory', $newName);

    // Save news data to the database
    $data = [
        'title' => $this->request->getPost('title'),
        'date' => $this->request->getPost('date'),
        'content' => $this->request->getPost('content'),
        'image' => $newName,
    ];

    $model->insert($data);

    return redirect()->to('/admin/news');
}
// public function add()
// {
//     return view('news/list_news');
// }
public function listNews()
{
    $model = new NewsModel();
    $data['news'] = $model->findAll(); 

    return view('news/list_news', $data);
}

public function viewnews($id)
    {
        $model = new NewsModel();
        $data['news'] = $model->find($id);

        return view('news/view_news', $data);
    }
public function deleteNews($id)
{
    $model = new NewsModel();

    $model->delete($id);

    return redirect()->to('/admin/listNews')->with('success', 'News deleted successfully');
}
public function editNews($id)
    {
        $model = new NewsModel();
        $data['news'] = $model->find($id);

        if (!$data['news']) {
            // News not found, you can handle this case, for example, redirect to the news list
            return redirect()->to('/news/listNews');
        }

        return view('news/edit_news', $data);
    }
    public function updateNews($id)
    {
        $model = new NewsModel();
        $news = $model->find($id);

        if (!$news) {
            // News not found, you can handle this case, for example, redirect to the news list
            return redirect()->to('/admin/listNews');
        }

        // Add validation rules if needed

        // Handle image upload
        $image = $this->request->getFile('image');
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move('path/to/upload/directory', $newName);
            // Update the image field in the database if needed
            $news['image'] = $newName;
        }

        // Update other fields
        $news['title'] = $this->request->getPost('title');
        $news['date'] = $this->request->getPost('date');
        $news['content'] = $this->request->getPost('content');

        // Save the updated news to the database
        $model->update($id, $news);

        return redirect()->to('/admin/listNews');
    }
}
