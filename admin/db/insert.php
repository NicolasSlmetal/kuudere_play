<?php
    require_once("../../php/db/services.php");
    require_once("../../php/classes/classes.php");
    $type = $_POST["type"];
    $drive_url = "https://drive.google.com/uc?export=download&id=";
    if (isset($_POST["name"]) && isset($_POST["producer"]) && isset($_POST["img"]) && isset($_POST["desc"])) {
        $name = $_POST["name"];
        if ($name == ""){
            header("Location: ../index.html?error=1");
            exit;
        }
        $producer = $_POST["producer"];
        if ($producer == ""){
            header("Location: ../index.html?error=1");
            exit;
        }
        $producer = new Producer($producer); 
        $file_content = file_get_contents("../../categories.txt");
        //Separando conteúdo de categories.txt por linha
        $string_strip = explode("\n", str_replace("\r","", $file_content));
        $categories = [];
        foreach ($string_strip as $string){
            //Separando por '='
            $line = explode("=", $string);
            $index = trim($line[1]);
            if (isset($_POST[$index])){
                if ($_POST[$index] == "on"){
                    //A categoria atual 'index' foi selecionada
                    $categories[] = $line[1];
                }
            }
        }
        if (sizeof($categories) == 0){
            header("Location: ../index.html?error=2");
            exit;
        }
        $img = $_POST["img"];
        if ($img == ""){
            header("Location: ../index.html?error=1");
            exit;
        } elseif (!str_starts_with($img,"http")){
            header("Location: ../index.html?error=3");
            exit;
        }
        $desc = $_POST["desc"];
        if ($desc == ""){
            header("Location: ../index.html?error=1");
            exit;
        } elseif (!str_starts_with($desc,"http")){
            header("Location: ../index.html?error=3");
            exit;
        }
        if (str_contains($desc,"drive") && str_contains($img,"drive")){
            $img_split = explode("/", $img);
            $desc_split = explode("/", $desc);
            $img = $drive_url . $img_split[5];
            $desc = $drive_url . $desc_split[5];
        }
        $urls = array($img, $desc);
        
    }
    if ($type == "anime"){
            $eps = $_POST["eps"];
            if ($eps == "") {
                header("Location: ../index.html?error=1");
                exit;
            }
            $anime = new Anime($name, $producer, $categories, $urls, $eps);
            $service = new AnimeService();
            if ($service->insert($anime) != null){
                header("Location: ../index.html?insert=true");
                exit;
            } else{
                header("Location: ../index.html?insert=false");
                exit;
            }
            
        } else {
            $chapters = $_POST["chps"];
            if ($chapters == "") {
                header("Location: ../index.html?error=1");
                exit;
            }
            $manga = new Manga($name, $producer, $categories, $urls, $chapters);
            $service = new MangaService();
            if ($service->insert($manga) != null){
                header("Location: ../index.html?insert=true");
                exit;
            } else{
                header("Location: ../index.html?insert=false");
                exit;
            }
        }
?>