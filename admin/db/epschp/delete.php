<?php
    require_once("../../../php/db/services.php");
    $id = $_POST["id"];
    $type = $_POST["type"];
    if ($type == "anime"){
        $service = new EpisodeService();
        $episode = $service->getRepository()->operation("findbyid", $id);
        if ($service->delete($episode) == null){
            header("Location: ../../index.html?deleted=false");
            exit;
        } else {
            header("Location: ../../index.html?deleted=true");
            exit;
        }
    } else {
        $service = new ChapterService();
        $chapter = $service->getRepository()->operation("findbyid", $id);
        if ($service->delete($chapter) == null){
            header("Location: ../../index.html?deleted=false");
            exit;
        } else {
            header("Location: ../../index.html?deleted=true");
            exit;
        }
    }
?>