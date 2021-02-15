<?php
    namespace App\Controllers;
    use App\Models\User;
    use Respect\Validation\Validator as v;
    use Laminas\Diactoros\Response\HtmlResponse as HtmlResponse;

    class UsersController extends BaseController{
        public function getAddUserAction($request){
            #mensaje para indicar resultado de la operación
            $responseMessage = null;
            if($request->getMethod()=='POST'){
                $postData = $request->getParsedBody();
                //Añadimos validación utilizando la librería.
                $userValidator = v::key('email', v::stringType()->notEmpty())
                                ->key('password', v::stringType()->notEmpty());

                    $userValidator->assert($postData);
                    $user = new User();
                    $user->email = $postData['email'];
                    $user->password = password_hash($postData['password'], PASSWORD_BCRYPT);
                    $user->save();
                    $responseMessage = "saved";
            }
            return $this->renderHTML('adduser.twig',[
                'responseMessage' => $responseMessage
                ]);
        }
    }