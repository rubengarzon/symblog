<?php
    namespace App\Controllers;
    use App\Models\User;
    use Respect\Validation\Validator as v;
    use Laminas\Diactoros\Response\HtmlResponse as HtmlResponse;

    class AuthController extends BaseController{
        public function getLogin(){
            return $this->renderHTML('login.twing');
        }
    }