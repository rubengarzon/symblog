<?php
    namespace App\Controllers;
    use App\Models\Blog;
    use Respect\Validation\Validator as v;
    use Laminas\Diactoros\Response\HtmlResponse as HtmlResponse;

    class BlogsController extends BaseController{
        public function getAddBlogAction($request){
            #mensaje para indicar resultado de la operación
            $responseMessage = null;
            if($request->getMethod()=='POST'){
                $postData = $request->getParsedBody();
                //Añadimos validación utilizando la librería.
                $blogValidator = v::key('title', v::stringType()->notEmpty())
                                ->key('description', v::stringType()->notEmpty());
                try{
                    $blogValidator->assert($postData);
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
                    $responseMessage = "saved";
                }catch(\Exception $e){
                    $responseMessage = $e->getMessage();
                }

            }
            return $this->renderHTML('addblog.twig',[
                'responseMessage' => $responseMessage
                ]);
        }
    }