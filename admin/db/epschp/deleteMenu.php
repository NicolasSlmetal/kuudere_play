<?php
    require_once("../../../php/db/services.php");
    $id = $_POST["id"];
    $type = $_POST["type"];
    if ($type == "anime"){
        $episode_service = new EpisodeService();
        $object = $episode_service->getRepository()->operation("findbyid", $id);
        if ($object === null){
            header("Location: ../../index.html?error=0");
            exit;
        }
        
    } else {
        $chapter_service = new ChapterService(); 
        $object = $chapter_service->getRepository()->operation("findbyid", $id);
        if ($object === null){
            header("Location: ../../index.html?error=0");
            exit;
        }
       
        
    }
    
?>


<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar <?php echo $type == "anime"? "episódio":"capítulo"?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../../style/style.css"/>
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
    <div class="container text-white" id="content">
        <form action="delete.php" method="POST">
            <input type="hidden" name="type" value=<?php echo $type?>>
            <input type="hidden" name="id" value=<?php echo $id?>>
        <?php
            echo "<h1 class='text-center'>";
            if ($type == "anime"){
                echo "Deletar episódio  \"" . $object->getName(). "\" de " . $object->getAnime()->getName();
            } else {
                echo "Deletar capítulo \"" . $object->getName(). "\" de " . $object->getManga()->getName();
            }
            echo "</h1>";
        ?>
        <div class="container" id="content">
            <div class="row">
                <label>Nome</label>
                <?php
                    $name = $object->getName();
                    echo "<input type='text' name='name' value='$name' id='form' readonly>"; 
                ?>
            </div>
            <div class="row">
                <label>URL</label>
                <?php
                    $url = $object->getURL();
                    echo "<input type='text' name='url' value='$url' id='form' readonly>"; 
                ?>
            </div>
            <div class="row">
            <label>Número</label>
                <?php
                    $number = $object->getNumber();
                    echo "<input type='number' name='number' value='$number' id='form' readonly>"; 
                ?>
            </div>
            <div class="row">
                <label>Data</label>
                    <?php
                        $date = $object->getDate()->format("Y-m-d");
                        echo "<input type='date' name='date' value='$date' id='form' readonly>"; 
                    ?>
            </div>
            <div class="row">
                <?php
                    if ($type == "anime"){
                        echo "<label>Duração</label>";
                        $min = floor($object->getDuration());
                        $sec = ($object->getDuration() - $min) * 60;
                        echo "<input type='number' name='min' value='$min' id='form' placeholder='Minutos' readonly> "; 
                        echo "<input type='number' name='sec' value='$sec' id='form' placeholder='Segundos' readonly>"; 
                    } else {
                        echo "<label>Páginas</label>";
                        $pages = $object->getPages();
                        echo "<input type='number' name='pages' value='$pages' id='form' readonly> "; 

                    }
                ?>
            </div>
            <div class="row">
                <label>Filler</label>
                
            </div>
            <?php
                    $filler = $object->isFiller();
                    if ($filler){
                        echo "<input type='radio' name='filler' value='true' checked readonly> <span> Sim<br>";
                        echo "<input type='radio' name='filler' value='false' readonly> Não";
                    } else {
                        echo "<input type='radio' name='filler' value='true' readonly> <span> Sim <br>";
                        echo "<input type='radio' name='filler' value='false' checked readonly> Não";
                    }
            ?>
            </div>
            <input type="submit" value="Deletar" class="btn btn-info" id="btn" onclick="return confirm('Tem certeza?')">
        </form>
    </div>
</body>
</html>