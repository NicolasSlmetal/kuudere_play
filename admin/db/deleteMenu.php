<?php
    require_once("../../php/db/services.php");
    $id = $_POST["id"];
    $type = $_POST["type"];
    if ($type == "anime"){
        $anime_service = new AnimeService();
        $object = $anime_service->getRepository()->operation("findbyid", $id);
        if ($object === null){
            header("Location: ../index.html?error=0");
            exit;
        }
        
    } else {
        $manga_service = new MangaService(); 
        $object = $manga_service->getRepository()->operation("findbyid", $id);
        if ($object === null){
            header("Location: ../index.html?error=0");
            exit;
        }
       
        
    }
    
?>


<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar <?php echo $type == "anime"? " anime":" mangá"?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../style/style.css"/>
    <link rel="shortcut icon" type="imagex/png" href="../../../imagens/logo.ico">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body class="bg-dark">
    <div class="container-fluid" height="300px" style="background-color: black">
        <img src="../../imagens/logo.png" height="50px" width="100px" style="border-radius: 40px;  position: absolute;">
        <nav class="nav nav-pills justify-content-center" style="height: 52px;">
            <a class="nav-link" href="../index.html">Home</a>
            <a class="nav-link" href="../anime.php">Anime</a>
            <a class="nav-link" href="../manga.php">Mangá</a>
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
                echo "Deletar anime  \"" . $object->getName(). "\"";
            } else {
                echo "Deletar mangá \"" . $object->getName(). "\"";
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
                <label>URL da imagem</label>
                <?php
                    $url = $object->getURL();
                    echo "<input type='text' name='url' value='" . $url[0] . "' id='form' readonly>"; 
                ?>
            </div>
            <div class="row">
                <label>URL da descrição</label>
                <?php
                    $url = $object->getURL();
                    echo "<input type='text' name='url' value='" . $url[1] . "'id='form' readonly>"; 
                ?>
            </div>
            <div class="row">
            <label><?php echo $type == "anime"? "Episódios": "Capítulos" ?></label>
                <?php
                    if ($type == "anime"){
                        $eps = $object->getEps();
                        echo "<input type='number' name='eps' value='$eps' id='form' readonly>"; 
                    } else {
                        $chapters = $object->getChapters();
                        echo "<input type='number' name='chapters' value='$chapters' id='form' readonly>"; 
                    }
                    
                ?>
            </div>
            <div class="row">
                <label>Data</label>
                    <?php
                        $date = $object->getDate();
                        if ($date != null){
                            $date = $date->format("Y-m-d");
                            echo "<input type='date' name='date' value='$date' id='form' readonly>"; 
                        }
                    ?>
            </div>
            <div class="row">
                <label>Categorias</label>
                <?php
                    $file_content = file_get_contents("../../categories.txt");
                    $categories = [];
                    $str_split = explode("\n", $file_content);
                    for ($i = 0; $i < sizeof ($str_split); $i++){
                        $line = $str_split[$i];
                        $split_line = explode("=", $line);
                        $index = trim($split_line[1]);
                        $categories[$index] = $split_line[0];
                }
                ?>
                <input type="text" name="categories" id="form"  value="<?php 
                    foreach ($object->getCategories() as $index => $category){
                        echo $categories[trim($category)];
                        if ($index < sizeof($object->getCategories()) - 1) echo ", ";
                    }
                
                ?>" readonly>
            </div>
            <div class="row">
                <label>Produtor</label>
                <input type="text" id="form" name="producer" value="<?php echo $object->getProducer()->getName()?>" readonly>
            </div>
            <input type="submit" value="Deletar" class="btn btn-info" id="btn" onclick="return confirm('Tem certeza?')">
        </form>
    </div>
</body>
</html>