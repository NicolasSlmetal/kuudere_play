<?php
    require_once("../../../php/db/services.php");
    $id = $_POST["id"];
    $type = $_POST["type"];
    if ($type == "anime"){
        $episode_service = new EpisodeService();
        $anime_service = new AnimeService();
        $anime = $anime_service->getRepository()->operation("findbyid", $id);
        if ($anime === null){
            header("Location: ../../index.html?error=0");
            exit;
        }
        $episodes = $episode_service->findbyAnime($anime);
    } else {
        $chapter_service = new ChapterService();
        $manga_service = new MangaService();
        $manga = $manga_service->getRepository()->operation("findbyid", $id);
        if ($manga === null){
            header("Location: ../../index.html?error=0");
            exit;
        }
        $chapters = $chapter_service->findbyManga($manga);
        
    }
    
?>


<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar <?php echo $type == "anime"? "episódios":"capítulos"?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../style/style.css"/>
    <link rel="shortcut icon" type="imagex/png" href="../../../imagens/logo.ico">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body class="bg-dark">
    <div class="container-fluid" height="300px" style="background-color: black">
        <img src="../../../imagens/logo.png" height="50px" width="100px" style="border-radius: 40px;  position: absolute;">
        <nav class="nav nav-pills justify-content-center" style="height: 52px;">
            <a class="nav-link" href="../../index.html">Home</a>
            <a class="nav-link" href="../../anime.php">Anime</a>
            <a class="nav-link" href="../../manga.php">Mangá</a>
        </nav>
    </div>
    <br>
    <div class="container text-white" id="content" style="overflow: scroll">
        <h1 class="text-center">
        <?php
            if ($type == "anime"){
                echo $anime->getName();
            } else {
                echo $manga->getName();
            }
        ?>
        <table class="table text-white" id="select">
            <?php
                if ($type == "anime"){
                    echo "<th>Nome</th>";
                    echo "<th>Número</th>";
                    echo "<th>Data</th>";
                    echo "<th>URL</th>";
                    echo "<th>Duração</th>";
                    echo "<th>Filler</th>";
                    foreach ($episodes as $episode){
                        $filler = $episode->isFiller()?"Sim":"Não";
                        echo "<tr>";
                        echo "<td>".$episode->getName() . "</td>";
                        echo "<td>".$episode->getNumber() . "</td>";
                        echo "<td>".$episode->getDate()->format("d/m/Y") . "</td>";
                        echo "<td>".$episode->getURL() . "</td>";
                        echo "<td>".$episode->getDuration() . "</td>";
                        echo "<td>". $filler. "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<th>Nome</th>";
                    echo "<th>Número</th>";
                    echo "<th>Data</th>";
                    echo "<th>URL</th>";
                    echo "<th>Páginas</th>";
                    echo "<th>Filler</th>";
                    foreach ($chapters as $chapter){
                        $filler = $chapter->isFiller()? "Sim": "Não";
                        echo "<tr>";
                        echo "<td>" .$chapter->getName() . "</td>";
                        echo "<td>" .$chapter->getNumber() . "</td>";
                        echo "<td>" .$chapter->getDate()->format("d/m/Y") . "</td>";
                        echo "<td>" .$chapter->getURL() . "</td>";
                        echo "<td>" .$chapter->getPages() . "</td>";
                        echo "<td>" . $filler . "</td>";
                        echo "</tr>";
                    }
                    
                }

            ?>
        </table>
        <?php echo "<a href='../../$type.php' class='btn btn-info' id='btn'>Voltar</a>"?>
    </div>
</body>
</html>