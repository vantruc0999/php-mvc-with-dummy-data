<?php

class AuthController
{

    private $userModel, $productModel, $categoryModel;

    public function __construct()
    {
        $this->userModel = new UserModel;
        $this->productModel = new ProductModel;
        $this->categoryModel = new CategoryModel;
    }

    private function view($viewPath, array $data = [])
    {
        foreach ($data as $key => $value) {
            $$key = $value;
        }
        return require('Views' . '/' . str_replace('.', '/', $viewPath) . '.php');
    }

    public function login()
    {
        return $this->view('auth.login');
    }

    public function loginProcess()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $users_list = $this->userModel->getAllUsers();

        $error = "Wrong email or password";

        foreach ($users_list as $user) {
            if ($user['email'] == $email) {
                if ($password == $user['password']) {
                    $_SESSION['user'] = [
                        'email' => $user['email'],
                        'user_id' => $user['user_id']
                    ];
                    return $this->view('index', 
                    [
                        'products_list' => $this->productModel->getAllProducts(),
                        'categories_list' =>  $this->categoryModel->getAllCategories()
                    ]
                );
                }
                return $this->view('auth/login',['error' => $error]);
            }
        }
        return $this->view('auth/login',['error' => $error]);
    }

    public function logout(){
        session_destroy();
        return $this->view('auth/login');
    }
}
