<?php
    require("../../php/db/services.php");
    $type = $_POST["type"];
    $id = $_POST["id"];
    if ($id == ""){
        header("Location: ../index.html?error=0");
        exit;
    }
    if ($type == "anime") {
        $service = new AnimeService();
        $anime = $service->getRepository()->operation("findbyid",$id);
        if ($anime === null){
            header("Location: ../index.html?error=0");
            exit;
        }
        $episode_service = new EpisodeService();
        $episodes = $episode_service->findbyAnime($anime);
        foreach ($episodes as $episode){
            $episode_service->delete($episode);
        }
        $anime = $service->delete($anime);
        if ($anime === null){
            header("Location: ../index.html?deleted=false");
            exit;
        }
        
    } else {
        $service = new MangaService();
        $manga = $service->getRepository()->operation("findbyid", $id);
        if ($manga === null){
            header("Location: ../index.html?error=0");
            exit;
        } 
        $chapter_service = new ChapterService();
        $chapters = $chapter_service->findbyManga($manga);
        foreach ($chapters as $chapter){
            $chapter_service->delete($chapter);
        }
        $manga = $service->delete($manga);
        if ($manga === null){
            header("Location: ../index.html?deleted=false");
            exit;
        }
       
    }
    header("Location: ../index.html?deleted=true");
?>