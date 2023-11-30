<?php
    require_once("../../php/db/services.php");
    $type = $_POST["type"];
    $id = $_POST["id"];
    if ($id == ""){
        header("Location: ../index.html?error=0");
        exit;
    }
    if ($type == "anime") {
        $field = $_POST["field"];
        $service = new AnimeService();
        $anime = $service->getRepository()->operation("findbyid", $id);
        if ($anime === null){
            header("Location: ../index.html?error=0");
            exit;
        }
        if (isset($_POST["value"])){
            $value = $_POST["value"];
        } else{
            //Categoria foi selecionada como atualização
            $value = "";
        }
        
        if ($value == "" && $field != "cat") {
            header("Location: ../index.html?error=1");
            exit;
        }
        switch ($field) {
            case "cat":
                $file_content = file_get_contents("../../categories.txt");
                //Separando conteúdo de categories.txt por linha
                $string_strip = explode("\n", str_replace("\r","", $file_content));
                $categories = [];
                foreach ($string_strip as $string){
                    $line = explode("=", $string);
                    $index = trim($line[1]);
                    if (isset($_POST[$index])){
                        if ($_POST[$index] == "on"){
                            $categories[] = $line[1];
                        }
                    }
                
                }
                
                if (count($categories) == 0) {
                    header("Location: ../index.html?error=2");
                    exit;
                }
                $anime->setCategories($categories);
                break;
            case "name":
                $anime->setName($value);
                break;
            case "eps":
                if ($value == 0){
                    header("Location: ../index.html?error=4");
                    exit;
                }
                $anime->setEps($value);
                break;
            case "img":
                if (!str_starts_with($value, "http")){
                    header("Location: ../index.html?error=3");
                    exit;
                }
                if (str_contains($value,"drive")){
                    $drive_url = "https://drive.google.com/uc?export=download&id=";
                    $img_split = explode("/", $value);
                    $img = $drive_url . $img_split[5];
                }
                $anime->getURL()[0] = $img;
                break;
            case "desc":
                if (!str_starts_with($value, "http")){
                    header("Location: ../index.html?error=3");
                    exit;
                }
                if (str_contains($value,"drive")){
                    $drive_url = "https://drive.google.com/uc?export=download&id=";
                    $desc_split = explode("/", $value);
                    $desc = $drive_url . $desc_split[5];
                }
                $anime->getURL()[1] = $desc;
                break;
        }
        $anime = $service->update($anime);
        if ($anime === null){
            header("Location: ../index.html?updated=false");
            exit;
        } else {
            header("Location: ../index.html?updated=true");
            exit;
        }
    } else {
        $field = $_POST["field"];
        $service = new MangaService();
        $manga = $service->getRepository()->operation("findbyid", $id);
        if ($manga === null){
            header("Location: ../index.html?error=0");
            exit;
        }
        $value = $_POST["value"];
        if ($value == "" && $field != "cat") {
            header("Location: ../index.html?error=1");
            exit;
        }
        switch ($field) {
            case "cat":
                $file_content = file_get_contents("../../categories.txt");
                $string_strip = explode("\n", str_replace("\r","", $file_content));
                $categories = [];
                foreach ($string_strip as $string){
                    $line = explode("=", $string);
                    $index = trim($line[1]);
                    if (isset($_POST[$index])){
                        if ($_POST[$index] == "on"){
                            $categories[] = $line[1];
                        }
                    }
                
                }
                
                if (count($categories) == 0) {
                    header("Location: ../index.html?error=2");
                    exit;
                }
                $manga->setCategories($categories);
                break;
            case "name":
                $anime->setName($value);
                break;
            case "chps":
                if ($value == 0){
                    header("Location: ../index.html?error=4");
                    exit;
                }
                $manga->setChapters($value);
                break;
            case "img":
                if (!str_starts_with($value, "http")){
                    header("Location: ../index.html?error=3");
                    exit;
                }
                if (str_contains($value,"drive")){
                    $drive_url = "https://drive.google.com/uc?export=download&id=";
                    $img_split = explode("/", $value);
                    $img = $drive_url . $img_split[5];
                }
                $manga->getURL()[0] = $img;
                break;
            case "desc":
                if (!str_starts_with($value, "http")){
                    header("Location: ../index.html?error=3");
                    exit;
                }
                if (str_contains($value,"drive")){
                    $drive_url = "https://drive.google.com/uc?export=download&id=";
                    $desc_split = explode("/", $value);
                    $desc = $drive_url . $desc_split[5];
                }
                $manga->getURL()[1] = $desc;
                break;
        }
        $manga = $service->update($manga);
        if ($manga === null){
            header("Location: ../index.html?updated=false");
            exit;
        } else {
            header("Location: ../index.html?updated=true");
            exit;
        }
    }
    
?>