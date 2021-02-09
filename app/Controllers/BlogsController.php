<?php
    namespace App\Controllers;
    use App\Models\Blog;
    use Laminas\Diactoros\Response\HtmlResponse as HtmlResponse;

    class BlogsController extends BaseController{
        public function getAddBlogAction($request){
            if($request->getMethod()=='POST'){
                $postData = $request->getParsedBody();
                $blog = new Blog();
                $blog->title = $postData['title'];
                $blog->blog = $postData['description'];
                $blog->tags = $postData['tag'];
                $blog->author = $postData['author'];
                //carga de archivos
                $files = $request->getUploadedFiles();
                $image = $files['image'];
                if($image->getError() == UPLOAD_ERR_OK){
                    $filename = $image->getClientFilename();
                    $filename = uniqid().$filename;
                    $image->moveTo("./img/$filename");
                    $blog->image = $filename;
                }
                $blog->save();
            }
            return $this->renderHTML('addblog.twig', array("mensaje" => "hola mundo"));
        }
    }