
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php
    include("db/services.php");
        $id = $_POST["id"];
        $type = $_POST["type"];
        $object = 0;
        if ($type == "anime"){
            $anime_service = new AnimeService();
            $object = $anime_service->getRepository()->operation("findbyid", $id);
        } else {
            $manga_service = new MangaService();
            $object = $manga_service->getRepository()->operation("findbyid", $id);
        }
        if ($object != null){
            echo $object->getName();
        } else {
            echo "Indisponível";
        }
    ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../style/style.css"/>
    <link rel="shortcut icon" type="imagex/png" href="../images/logo.ico">
</head>
<body class="bg-dark">
    <div class="container-fluid" height="300px" style="background-color: black">
        <img src="../images/logo.png" height="50px" width="100px" style="border-radius: 40px;  position: absolute;">
        <nav class="nav nav-pills justify-content-center" style="height: 52px;">
            <a class="nav-link" href="../index.html">Home</a>
            <a class="nav-link" href="animes.php">Animes</a>
            <a class="nav-link" href="mangas.php">Mangás</a>
            <a class="nav-link" href="../about.html">Sobre</a>
        </nav>
    </div>
    <br>
    <div class="container text-white" style="padding: 10px; border-radius: 12px; background-color: black">
        <div class="row">
            <div class="col-3">
                <?php
                    if ($object != null){
                        $urls = $object->getURL();
                        $img = $urls[0];
                        echo "<img id=select src=$img>";
                    }
                ?>
            </div>
            <div class="col-7 text-center" style="margin-left:100px">
                <?php
                    $title = $object != null?$object->getName():"Indisponível no momento";
                    echo "<h1 styl> $title </h1>";
                ?>
                <br>
                <?php
                    if ($object != null){
                        $description = file_get_contents($urls[1]);
                        echo "<p class='text-center' id='description'>$description</p>";
                        $content_file = file_get_contents("../categories.txt");
                        $categories = [];
                        $str_split = explode("\n", $content_file);
                        for ($i = 0; $i < sizeof ($str_split); $i++){
                            $line = $str_split[$i];
                            $split_line = explode("=", $line);
                            $index = trim($split_line[1]);
                            $categories[$index] = $split_line[0];
                    }
                    echo "<p style='text-align:left;'>Categorias: ";
                    foreach ($object->getCategories() as $index => $category){
                        $name = $categories[trim($category)];
                        echo " $name; ";
                    }
                    echo "</p>";
                    if ($type == "anime"){
                        $content_service = new EpisodeService();
                        $title = "Episódio";
                        $contents = $content_service->findbyAnime($object);
                    } else {
                        $content_service = new ChapterService();
                        $title = "Capítulo";
                        $contents = $content_service->findbyManga($object);
                    }
                    usort($contents, function($c1, $c2){
                        if ($c1->getNumber() == $c2->getNumber()) {
                            return 0;
                        }
                        return ($c1->getNumber() < $c2->getNumber()) ? -1 : 1;
                    });
                    if ($object->getDate() != null){
                        $string = $object->getDate()->format("d/m/Y");
                        echo "<br><p style='text-align:left'>Estreia: $string</p>";
                    }
                }
                ?>
            </div>
            <div class="col-12">
                <?php
                $title = $type == "anime" ? "Episódio": "Capítulo";
                echo "<h1>$title". "s</h1>";
                ?>
                <div id="content">
                    <ul class="list-group list-group-horizontal" style="list-style: none; overflow-x: scroll;">
                        <?php
                            if ($object != null){
                                if (sizeof($contents) > 0){
                                    foreach ($contents as $index => $content){
                                        $name = $content->getName();
                                        $id = $content->getID();
                                        $n = $index + 1;
                                        $name_form = "select" . $n;
                                        echo "<li>";
                                        echo "<form id='$name_form' method='POST' action='view.php'>";
                                        echo"<div class='card bg-dark' style='margin: 4px; margin-left:10px; border-radius:12px; cursor:pointer;' onclick=document.querySelector('form#$name_form').submit() data-bs-toggle='tooltip' title='$name'>";
                                        echo "<input type='hidden' name='id' value='$id'>";
                                        echo "<input type='hidden' name='type' value='$type'>";
                                        echo "<img class='card-img-top ' id='card' src='$img' style='width:240px;height:210px;'>";
                                        echo "<div class='card-body' style='height:110px; width:240px;'>";
                                        echo "<p>$title $n</p>";
                                        echo "<p class='text-white' id='title' style='white-space:nowrap; overflow:hidden; text-overflow: ellipsis;'>$name</p>";
                                        echo"</div>";
                                        echo "</div>";
                                        echo "</form>";
                                        echo "</li>";
                                    }
                                } else {
                                    echo "<h1 class='text-center' style='text-align: center;'> Em breve</h1>";
                                }
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br>
    <footer class="text-white" style="background-color: black;">
        <div id="contact-area">
            <div class="container">
                <div class="row" align="center">
                    <div class="col-md-12">
                        <h1 class="main-title text-center">Contatos</h1>
                    </div>
                    <div class="col-6">
                        <a href="https://instagram.com/limabrito_san?igshid=NGVhN2U2NjQ0Yg==">
                            <img id="contact-1" class="contact-image" src="../images/inst.png"> 
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="https://github.com/NicolasSlmetal">
                            <img id="contact-2" class="contact-image" src="../images/github.png"> 
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="copy" class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center">Todos os direitos reservados. &copy; 2023.</p>
                </div>
            </div>
        </div>
    </footer>
</html>
