<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" ; charset=utf-8" />
    <link href='http://fonts.googleapis.com/css?family=Irish+Grover' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=La+Belle+Aurore' rel='stylesheet' type='text/css'>
    <link href="./css/screen.css" type="text/css" rel="stylesheet" />
    <link href="./css/sidebar.css" type="text/css" rel="stylesheet" />
    <link href="./css/blog.css" type="text/css" rel="stylesheet" />
    <link rel="shortcut icon" href="./img/favicon.ico" />
</head>

<body>
    <section id="wrapper">
        <header id="header">
            <div class="top">
                <nav>
                    <ul class="navigation">
                        <li><a href="index.php?route=/">Home</a></li>
                        <li><a href="index.php?route=about">About</a></li>
                        <li><a href="index.php?route=contact">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <hgroup>
            <h2><a href="index.php?route=/">symblog</a></h2>
                <h3><a href="index.php?route=/">creating a blog in Symfony2</a></h3>
            </hgroup>
        </header>
        <section class="main-col">
            <h2>
                <a href="index.php?route=addblog">Añadir Formulario</a>
            </h2>
            <br>
            <?php
                foreach ($blogs as $blog) {
                    echo "<article class='blog'>";
                    echo "<div class='date'>";
                    echo "<time datetime=''>";
                    echo $blog->created;
                    echo " </time>";
                    echo "<header>";
                    echo "<h2><a href='index.php?route=show&id=$blog->id'>";
                    echo $blog->title;
                    echo "</a></h2>";
                    echo "</header>";
                    echo " <img src='";
                    echo "img/" . $blog->image;
                    echo "' />";
                    echo "<div class='snippet'>";
                    echo "<p>" . $blog->blog . " </p>";
                    echo  " <p class='continue'><a href='#'>Continue reading...</a></p>";
                    echo "</div>";
                    echo "<footer class='meta'>";
                    echo " <p>Comments: <a href='#'>";
                    echo "";
                    echo  " </a></p>";
                    echo " <p>Posted by <span class='highlight'>dsyph3r</span> at 07:06PM</p>";
                    echo "<p>Tags: <span class='highlight'>symfony2, php, paradise, symblog</span></p>";
                    echo "</footer>";
                    echo "</article>";
                    }
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
                <?php

                /* $usuario =  $comments[14]->getUser();
                echo <<<EOT
                         <article class='comment'>
                        <header>
                        <p class="small"><span class="highlight">$usuario</span> commented on
                            <a href="#">A day with Symfony2</a>
                        </p>
                        </header>
                        <p>Comentario $usuario</p>
                        </article>
                        </section>
                EOT; */
                ?>
        </aside>
        <div id="footer">
            dwes symblog - created by <a href="#">dwes</a>
        </div>
    </section>
</body>

</html>