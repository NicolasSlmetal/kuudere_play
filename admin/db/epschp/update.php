<?php
    require_once("../../../php/db/services.php");
    $id = $_POST["id"];
    $name = $_POST["name"];
    $number = $_POST["number"];
    $url = $_POST["url"];
    $filler = $_POST["filler"] == "true"? true: false;
    $date = DateTime::createFromFormat("Y-m-d", $_POST["date"]);
    if ($date == null){
        header("Location: ../../index.html?error=1");
        exit;
    }
    if ($name == "" || $url == "" || $number == ""){
        header("Location: ../../index.html?error=1");
        exit;
    } else if (!str_starts_with($url, "http")){
        header("Location: ../../index.html?error=3");
        exit;
    }
    $type = $_POST["type"];
    if ($type == "anime"){
        $min = $_POST["min"];
        $sec = $_POST["sec"];
        if ($min == "" || $sec == ""){
            header("Location: ../../index.html?error=1");
            exit;
        }
        $duration = (float) $min + $sec/60;
        $service = new EpisodeService();
        $episode = $service->getRepository()->operation("findbyid", $id);
        $episode->setName($name);
        $episode->setDate($date);
        $episode->setFiller($filler);
        $episode->setNumber($number);
        $episode->setDuration($duration);
        $episode->setURL($url);
        if ($service->update($episode) == null){
            header("Location: ../../index.html?update=false");
            exit;
        } else{
            header("Location: ../../index.html?updated=true");
            exit;
        }
    } else {
        $pages = $_POST["pages"];
        if ($pages == ""){
            header("Location: ../../index.html?error=1");
            exit;
        }
        $service = new ChapterService();
        $chapter = $service->getRepository()->operation("findbyid", $id);
        $chapter->setName($name);
        $chapter->setNumber($number);
        $chapter->setFiller($filler);
        $chapter->setDate($date);
        $chapter->setPages($pages);
        $chapter->setURL($url);
        if ($service->update($chapter) == null){
            header("Location: ../../index.html?update=false");
            exit;
        } else{
            header("Location: ../../index.html?updated=true");
            exit;
        }
    }
    
?>