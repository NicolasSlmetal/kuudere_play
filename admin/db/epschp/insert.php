<?php
    require_once("../../../php/db/services.php");
    require_once("../../../php/classes/classes.php");
    $type = $_POST["type"];
    $id = $_POST["id"];
    $name = $_POST["name"];
    $date = $_POST["date"];
    
   
    if ($date == null){
        header("Location: ../../index.html?error=6");
        exit;
    }
    $date = DateTime::createFromFormat("Y-m-d", $date);
    if ($name == ""){
        header("Location: ../../index.html?error=1");
        exit;
    } 
    $number = 0;
    $filler = $_POST["filler"] == "true"? true: false;
    if ($type == "anime") {
        $anime_service = new AnimeService();
        $service = new EpisodeService();
        $anime = $anime_service->getRepository()->operation("findbyid", $id);
        $eps = $service->findbyAnime($anime);
        if (sizeof($eps) == 0) {
            $number = 1;
        } else{
            $number = $eps[sizeof($eps) - 1]->getNumber() + 1;
        }
        $url = $_POST["url"];
        if (!str_starts_with($url, "http")){
            header("Location: ../../index.html?error=3");
            exit;
        }
        $min = $_POST["min"];
        $sec = $_POST["sec"];
        $duration = (float) ($min + ($sec / 60));
        $episode = new Episode($name, $number, $url, $date, $anime, $duration, null, $filler);
        if ($service->insert($episode) === null){
            header("Location: ../../index.html?insert=false");
            exit;
        } else {
            header("Location: ../../index.html?insert=true");
            exit;
        }
    } else {
        $manga_service = new MangaService();
        $service = new ChapterService();
        $pages = $_POST["pages"];
        $manga = $manga_service->getRepository()->operation("findbyid", $id);
        $chps = $service->findbyManga($manga);
        if (sizeof($chps) == 0) {
            $number = 1;
        }else {
            $number = $chps[sizeof($chps) - 1]->getNumber() + 1;
        }
        if ($pages == ""){
            header("Location: ../../index.html?error=1");
            exit;
        }
        $url = $_POST["url"];
        if (!str_starts_with($url, "http")){
            header("Location: ../../index.html?error=3");
            exit;
        }
        $chapter = new Chapter($name, $number, $url, $date, $manga, $pages);
        if ($service->insert($chapter) === null){
            header("Location: ../../index.html?insert=false");
            exit;
        } else {
            header("Location: ../../index.html?insert=true");
            exit;
        }
    }
?>