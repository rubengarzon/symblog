<?php
    namespace App\Controllers;
    use App\Models\Blog;

    class BlogsController {
        public function getAddBlogAction($request){
            if($request->getMethod()=='POST'){
                $postData = $request->getParsedBody();
                $blog = new Blog();
                $blog->title = $postData['title'];
                $blog->description = $postData['description'];
                $blog->tag = $postData['tag'];
                $blog->author = $postData['author'];
                $blog->save();
            }
            include '../views/addblog.php';
        }
    }