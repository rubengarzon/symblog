<?php
require_once 'vendor/autoload.php';
include("datos/datos.php");
/* $blog = Sql::getInstancia();
$blog->set($blogs, $comments); */
?>



<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html" ; charset=utf-8" />
    <link href='http://fonts.googleapis.com/css?family=Irish+Grover' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=La+Belle+Aurore' rel='stylesheet' type='text/css'>
    <link href="css/screen.css" type="text/css" rel="stylesheet" />
    <link href="css/sidebar.css" type="text/css" rel="stylesheet" />
    <link href="css/blog.css" type="text/css" rel="stylesheet" />
    <link rel="shortcut icon" href="img/favicon.ico" />
</head>

<body>
    <section id="wrapper">
        <header id="header">
            <div class="top">
                <nav>
                    <ul class="navigation">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <hgroup>
                <h2><a href="index.php/">symblog</a></h2>
                <h3><a href="index_sb.php/">creating a blog in Symfony2</a></h3>
            </hgroup>
        </header>
        <section class="main-col">



            <?php



            $id = $_GET['id'];
            //  var_dump($comments);
            foreach ($comments as $key => $value) {
                //var_dump($comments);
                if ($value->getId_blog() == $id) {
                    echo "<article class='comments'>";
                    echo "<div class='comments'>";
                    echo "<p><span class='highlight'>";
                    echo $value->getUser();
                    echo  "</span>";
                    echo "commented";
                    echo $value->getCreated() . "</p>";
                    echo "<p>" . $value->getComment() . "</p>";
                    echo "</div>";
                    echo "</article>";
                }
            }
            /*  foreach ($blog->comments as $key => $value) {
                echo "<article class='comments'>";
                echo "<div class='comments'>";
                echo "<p><span class='highlight'>";
                echo $value->getUser();
                echo  "</span>";
                echo "commented";
                echo $value->getCreated() . "</p>";
                echo "<p>" . $value->getComment() . "</p>";
                echo "</div>";
                echo "</article>";
            } */
            ?>
        </section>
        <aside class="sidebar">
            <section class="section">
                <header>
                    <h3>Tag Cloud</h3>
                </header>
                <p class="tags">
                    <span class="weight-1">magic</span>
                    <span class="weight-5">symblog</span>
                    <span class="weight-4">movie</span>
                </p>
            </section>
            <section class="section">
                <header>
                    <h3>Latest Comments</h3>
                </header>
                <article class="comment">
                    <header>
                        <p class="small"><span class="highlight">Carlos Aguilera</span> commented on
                            <a href="#">A day with Symfony2</a>
                        </p>
                    </header>
                    <p>Comentario Usuario</p>
                </article>
            </section>
        </aside>
        <div id="footer">
            dwes symblog - created by <a href="#">dwes</a>
        </div>
    </section>
</body>

</html>