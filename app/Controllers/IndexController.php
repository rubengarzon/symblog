<?php
    namespace App\Controllers;
    use App\Models\Blog;
    class IndexController {
        public function indexAction() {
            echo 'indexAction';
            $blogs = Blog::all();
            include '../views/index.php';
        }
    }