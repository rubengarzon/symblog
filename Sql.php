<?php

#Importar modelo de abstracción de base de datos

/* require_once 'vendor/autoload.php';

/* require_once('DBAbstractModel.php');
include_once('app/Models/Blog.php'); */
//include_once('app/Models/Comment.php');

//class Sql extends
//{
    /*CONSTRUCCIÓN DEL MODELO SINGLETON*/
    /* private static $instancia;
    public static function getInstancia()
    {
        if (!isset(self::$instancia)) {
            $miClase = __CLASS__;
            self::$instancia = new $miClase;
        }
        return self::$instancia;
    } */

    /* private $id;
    private $nombre;
    private $velocidad;
    private $created_at;
    private $updated_at;

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setVelocidad($velocidad)
    {
        $this->velociadad = $velocidad;
    }

    public function getMensaje()
    {
        return $this->mensaje;
    } */

/*     public function set($user_data = array(), $user_data2 = array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;

            $this->query  = "INSERT INTO blog(title, author, blog, image, tags, created, updated) VALUES(:title, :author, :blog, :image, :tags, :created, :updated)";
            $this->parametros['title'] = $$campo->getTitle();
            $this->parametros['author'] = $$campo->getAuthor();
            $this->parametros['blog'] = $$campo->getBlog();
            $this->parametros['image'] = $$campo->getImage();
            $this->parametros['tags'] = $$campo->getTags();
            $this->parametros['created'] = $$campo->getCreated();
            $this->parametros['updated'] = $$campo->getUpdated();
            $this->get_results_from_query();
            $this->mensaje = 'SH agregado correctamente';
        }

        foreach ($user_data2 as $campo => $valor) {
            $$campo = $valor;

            $this->query  = "INSERT INTO comment(blog_id, user, comment, approved, created, updated) VALUES(:blog_id, :user, :comment, :approved, :created, :updated)";
            $this->parametros['blog_id'] = $this->lastInsert();
            $this->parametros['user'] = $$campo->getUser();
            $this->parametros['comment'] = $$campo->getComment();
            $this->parametros['approved'] = 0;
            $this->parametros['created'] = $$campo->getCreated();
            $this->parametros['updated'] = $$campo->getUpdated();
            $this->get_results_from_query();
            $this->mensaje = 'SH agregado correctamente';
        }
    }
} */
