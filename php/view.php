<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php
    include("db/services.php");
        $id = (int) $_POST["id"];
        $type = $_POST["type"];
        $object = 0;
        if ($type == "anime"){
            $episode_service = new EpisodeService();
            $object = $episode_service->getRepository()->operation("findbyid", $id);
        } else {
            $chapter_service = new ChapterService();
            $object = $chapter_service->getRepository()->operation("findbyid", $id);
        }
        if ($object != null){
            echo $object->getName();
        } else {
            echo "Indisponível";
        }
    ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../style/style.css"/>
    <link rel="shortcut icon" type="imagex/png" href="../imagens/logo.ico">
</head>
<body class="bg-dark">
    <div class="container-fluid" height="300px" style="background-color: black">
        <img src="../imagens/logo.png" height="50px" width="100px" style="border-radius: 40px;  position: absolute;">
        <nav class="nav nav-pills justify-content-center" style="height: 52px;">
            <a class="nav-link" href="../index.html">Home</a>
            <a class="nav-link" href="animes.php">Animes</a>
            <a class="nav-link" href="mangas.php">Mangás</a>
            <a class="nav-link" href="../about.html">Sobre</a>
        </nav>
    </div>
    <br>
    <?php
    $class="container text-white";
    if ($type == "manga") $class = $class . " w-50";
    echo "<div class='$class' style='padding: 10px; border-radius: 12px; background-color: black'>";
    ?>
        <div class="row">
            <div class="col-12">
                <?php
                    if ($object != null){
                        $url = $object->getURL();
                        $name = $object->getName();
                        if ($type == "anime"){
                            echo "<iframe src='$url' width='1050px' height='540px' title='$name' allow='autoplay' allowfullscreen='true' style='margin: 40px; overflow: hidden'></iframe>";
                            echo "<hr>";
                            echo "<h1 id='content-title' class='text-left' style='margin-left: 40px;'>$name</h1>";
                        }else{
                            echo "<iframe src='$url'  width='630px' height='800px' allow='autoplay' allowfullscreen='true' style='margin-right:10px overflow: hidden'></iframe>";
                            echo "<hr>";
                            echo "<h1 id='content-title' class='text-left'>$name</h1>";
                        }
                    }
                ?>
            </div>
            <div class="col-6">
                <?php
                    if ($object != null){
                        if ($type == "anime"){
                            $prev_ep = $episode_service->findPreviousEp($object);
                            if ($prev_ep != null){
                                $id_prev = $prev_ep->getID();
                                echo "<form method='POST' action='view.php'> 
                                    <input type='hidden' name='id' value='$id_prev'>
                                    <input type='hidden' name='type' value='anime'>
                                    <button class='btn btn-dark' type='submit' align='left' style='margin-left:40px; margin-top:50px; width:300px; padding:50px'>Anterior</button>
                                </form> ";
                            }
                            
                        }else{
                            $prev_chap = $chapter_service->findPreviousChap($object);
                            if ($prev_chap != null){
                                $id_prev = $prev_chap->getID();
                                echo "<form method='POST' action='view.php'> 
                                    <input type='hidden' name='id' value='$id_prev'>
                                    <input type='hidden' name='type' value='manga'>
                                    <button class='btn btn-dark' type='submit' align='left' style='margin-top:50px; width:250px; padding:10px'>Anterior</button>
                                </form> ";
                            }
                        }
                    } else{
                        echo "<h1>Indisponível no momento</h1>";
                    }
                ?>
            </div>
            <div class="col-6">
                <?php
                    if ($object != null){
                        if ($type == "anime"){
                            $next_ep = $episode_service->findNextEp($object);
                            if ($next_ep != null){
                                $id_next = $next_ep->getID();
                                echo "<form method='POST' action='view.php'> 
                                    <input type='hidden' name='id' value='$id_next'>
                                    <input type='hidden' name='type' value='anime'>
                                    <button class='btn btn-dark' type='submit' align='right' style='margin-left:220px; margin-top:50px; width:300px; padding:50px'>Próximo</button>
                                </form> ";
                            }
                        } else {
                            $next_chap = $chapter_service->findNextChap($object);
                            if ($next_chap != null){
                                $id_next = $next_chap->getID();
                                echo "<form method='POST' action='view.php'> 
                                    <input type='hidden' name='id' value='$id_next'>
                                    <input type='hidden' name='type' value='manga'>
                                    <button class='btn btn-dark' type='submit' align='right' style='margin-left:55px;margin-top:50px; width:250px; padding:10px'>Próximo</button>";
                            }
                        }
                    }
                    ?>
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
                            <img id="contact-1" class="contact-image" src="../imagens/inst.png"> 
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="https://github.com/NicolasSlmetal">
                            <img id="contact-2" class="contact-image" src="../imagens/github.png"> 
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