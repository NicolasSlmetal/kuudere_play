<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mangás</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../style/style.css"/>
    <link rel="shortcut icon" type="imagex/png" href="../images/logo.ico">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body class="bg-dark">
    <div class="container-fluid" height="300px" style="background-color: black">
        <img src="../images/logo.png" height="50px" width="100px" style="border-radius: 40px;  position: absolute;">
        <nav class="nav nav-pills justify-content-center" style="height: 52px;">
            <a class="nav-link" href="index.html">Home</a>
            <a class="nav-link" href="anime.php">Anime</a>
            <a class="nav-link active" href="#">Mangá</a>
        </nav>
    </div>
    <br>

    <div class="container text-white" style="background-color: black; border-radius: 12px;">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-insert" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Cadastrar Mangá</button>
              <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-select" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Consultar Mangás</button>
              <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-update" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Atualizar Mangá</button>
              <button class="nav-link" id="nav-disabled-tab" data-bs-toggle="tab" data-bs-target="#nav-delete" type="button" role="tab" aria-controls="nav-disabled" aria-selected="false">Deletar Mangá</button>
              <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-chp-insert">Adicionar Capítulo</button>
              <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-chp-select">Consultar Capítulos</button>
              <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-chp-update">Atualizar Capítulo</button>
              <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-chp-delete">Deletar Capítulo</button>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-insert" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                <div class="container"  id="content">
                    <form action="db/insert.php" method="post">
                        <div class="row">
                            <label >Nome</label>
                            <input type="text" name="name" id="form">
                        </div>
                        <div class="row">
                            <label >Capítulos</label>
                            <input type="number" min="1" name="chps" id="form">
                        </div>
                        <div class="row">
                            <label >Produtor</label>
                            <input type="text"  name="producer" id="form">
                        </div>
                        <div class="row">
                            <label >Categorias</label>
                            <ul id="categories">
                                <li>
                                    <input class="form-check-input" style="color: black;" type="checkbox" name="shonen">
                                    <label>Shonen</label>
                                    <br>
                                </li>
                                <li>
                                    <input class="form-check-input" type="checkbox" name="shoujo" value="on">
                                    <label>Shoujo</label>
                                    <br>
                                </li>
                                <li>
                                    <input class="form-check-input" type="checkbox" name="action" value="on">
                                    <label>Ação</label>
                                    <br>
                                </li>
                                <li>
                                    <input class="form-check-input" type="checkbox" name="scifi" value="on">
                                    <label>Sci-fi</label>
                                    <br>
                                </li>
                                <li>
                                    <input class="form-check-input" type="checkbox" name="romance" value="on">
                                    <label>Romance</label>
                                    <br>
                                </li>
                                <li>
                                    <input  class="form-check-input" type="checkbox" name="seinen"  value="on">
                                    <label>Seinen</label> 
                                </li>
                                <li>
                                    <input  class="form-check-input" type="checkbox" name="adve"  value="on">
                                    <label>Aventura</label>
                                </li>
                                <li>
                                    <input  class="form-check-input" type="checkbox" name="sbrntr"  value="on">
                                    <label>Sobrenatural</label>
                                </li>
                                <li>
                                    <input  class="form-check-input" type="checkbox" name="middle"  value="on">
                                    <label>Medieval</label>
                                </li>
                                <li>
                                    <input  class="form-check-input" type="checkbox" name="isekai"  value="on">
                                    <label>Isekai</label>
                                </li>
                                <li>
                                    <input  class="form-check-input" type="checkbox" name="magic"  value="on">
                                    <label>Magia</label>
                                </li>
                                <li>
                                    <input  class="form-check-input" type="checkbox" name="sprhr" value="on">
                                    <label>Super Herói</label>
                                </li>
                                <li>
                                    <input  class="form-check-input" type="checkbox" name="mecha"  value="on">
                                    <label>Mecha</label>
                                </li>
                                <li>
                                    <input  class="form-check-input" type="checkbox" name="horror" value="on">
                                    <label>Terror</label>
                                </li>
                                <li>
                                    <input  class="form-check-input" type="checkbox" name="comedy" value="on">
                                    <label>Comédia</label>
                                </li>
                                <li>
                                    <input  class="form-check-input" type="checkbox" name="daylif" value="on">
                                    <label>Vida diária</label>
                                </li>
                                <li>
                                    <input  class="form-check-input" type="checkbox" name="drama" value="on">
                                    <label>Drama</label>
                                </li>
                                <li>
                                    <input  class="form-check-input" type="checkbox" name="sus" value="on">
                                    <label>Suspense</label>
                                </li>
                                <li>
                                    <input  class="form-check-input" type="checkbox" name="sigma" value="on">
                                    <label>Sigma</label>
                                </li>
                                <li>
                                    <input  class="form-check-input" type="checkbox" name="myth" value="on">
                                    <label>Mitologia</label>
                                </li>
                                <li>
                                    <input  class="form-check-input" type="checkbox" name="fantasy" value="on">
                                    <label>Fantasia</label>
                                </li>
                                <li>
                                    <input  class="form-check-input" type="checkbox" name="mltar" value="on">
                                    <label>Militar</label>
                                </li>
                            </ul>
                        </div>
                        <div class="row">
                            <label >URL da capa</label>
                            <input type="text" name="img" id="form">
                        </div>
                        <div class="row">
                            <label >URL da descrição</label>
                            <input type="text" name="desc" id="form">
                        </div>
                        <input type="hidden" name="type" value="manga">
                        <br>
                        <input type="submit" value="Cadastrar" id="btn" class="btn btn-info">
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-select" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0" style="overflow: scroll">
                <table class="table bg-dark text-white" id="select">
                    <thead>
                        <th>Nome</th>
                        <th>Capítulos</th>
                        <th>Produtor</th>
                        <th>Categorias</th>
                        <th>URL da capa</th>
                        <th>URL da descrição</th>
                        <th>Data</th>
                    </thead>
                    <?php
                        require("../php/db/services.php");
                        $manga_service = new MangaService();
                        $mangas = $manga_service->getRepository()->operation("findall");
                        $file_content = file_get_contents("../categories.txt");
                        $string_strip = explode("\n", $file_content);
                        $categories = [];
                        $categories_k = [];
                        foreach ($string_strip as $string){
                            $line = explode("=", $string);
                            $index = trim($line[1]);
                            $categories_k[] = $index;
                            $categories[$index] = $line[0];
                        }
                        foreach ($mangas as $manga){
                            $category_found = "";
                            foreach($categories_k as $category){
                                    if (in_array($category, $manga->getCategories())){
                                        $category_found = $category_found . $categories[$category] . "...";
                                }
                            }
                            $date = "Indefinida";
                            if ($manga->getDate() != null) $date = $manga->getDate()->format("d/m/Y");
                            echo "<tr>"
                            . "<td>" . $manga->getName() . "</td>"
                            . "<td>" . $manga->getChapters() . "</td>"
                            . "<td>" . $manga->getProducer()->getName() . "</td>"
                            . "<td>". $category_found . "</td>"
                            . "<td>" . $manga->getURL()[0] . "</td>"
                            . "<td>" . $manga->getURL()[1] . "</td>"
                            . "<td>" . $date . "</td>";
                        echo "</tr>";
                        }
                    ?>
                </table>
            </div>
            <div class="tab-pane fade" id="nav-update" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
                <div class="container" id="content">
                    <form action="db/update.php" method="POST">
                        <input type="hidden" name="type" value="manga">
                        <div class="row">
                        <label>ID do Mangá</label>
                        <input type="number" name="id" id="form">
                        </div>
                        <div class="row">
                            <label>Campo</label>
                            <select name="field" id="field" onchange="verify()">
                                    <option value="name">Nome</option>
                                    <option value="chps">Capítulos</option>
                                    <option value="img">URL imagem</option>
                                    <option value="desc">URL descrição</option>
                                    <option value="cat">Categorias</option>
                            </select>
                        </div>
                        <div class="row">
                            <label>Valor</label>
                            <input id="form" class="value-update"type="text" name="value">
                        </div>
                        <div class="row" id="updatecat">
                            <label >Categorias</label>
                            <ul style="list-style: none; overflow: hidden; text-overflow: ellipsis;">
                                <li>
                                    <input class="form-check-input" style="color: black;" type="checkbox" name="shonen">
                                    <label>Shonen</label>
                                    <br>
                                </li>
                                <li>
                                    <input class="form-check-input" type="checkbox" name="shoujo" value="on">
                                    <label>Shoujo</label>
                                    <br>
                                </li>
                                <li>
                                    <input class="form-check-input" type="checkbox" name="action" value="on">
                                    <label>Ação</label>
                                    <br>
                                </li>
                                <li>
                                    <input class="form-check-input" type="checkbox" name="scifi" value="on">
                                    <label>Sci-fi</label>
                                    <br>
                                </li>
                                <li>
                                    <input class="form-check-input" type="checkbox" name="romance" value="on">
                                    <label>Romance</label>
                                    <br>
                                </li>
                                <li>
                                    <input  class="form-check-input" type="checkbox" name="seinen"  value="on">
                                    <label>Seinen</label> 
                                </li>
                                <li>
                                    <input  class="form-check-input" type="checkbox" name="adve"  value="on">
                                    <label>Aventura</label>
                                </li>
                                <li>
                                    <input  class="form-check-input" type="checkbox" name="sbrntr"  value="on">
                                    <label>Sobrenatural</label>
                                </li>
                                <li>
                                    <input  class="form-check-input" type="checkbox" name="middle"  value="on">
                                    <label>Medieval</label>
                                </li>
                                <li>
                                    <input  class="form-check-input" type="checkbox" name="isekai"  value="on">
                                    <label>Isekai</label>
                                </li>
                                <li>
                                    <input  class="form-check-input" type="checkbox" name="magic"  value="on">
                                    <label>Magia</label>
                                </li>
                                <li>
                                    <input  class="form-check-input" type="checkbox" name="sprhr" value="on">
                                    <label>Super Herói</label>
                                </li>
                                <li>
                                    <input  class="form-check-input" type="checkbox" name="mecha"  value="on">
                                    <label>Mecha</label>
                                </li>
                                <li>
                                    <input  class="form-check-input" type="checkbox" name="horror" value="on">
                                    <label>Terror</label>
                                </li>
                                <li>
                                    <input  class="form-check-input" type="checkbox" name="comedy" value="on">
                                    <label>Comédia</label>
                                </li>
                                <li>
                                    <input  class="form-check-input" type="checkbox" name="daylif" value="on">
                                    <label>Vida diária</label>
                                </li>
                                <li>
                                    <input  class="form-check-input" type="checkbox" name="drama" value="on">
                                    <label>Drama</label>
                                </li>
                                <li>
                                    <input  class="form-check-input" type="checkbox" name="sus" value="on">
                                    <label>Suspense</label>
                                </li>
                                <li>
                                    <input  class="form-check-input" type="checkbox" name="sigma" value="on">
                                    <label>Sigma</label>
                                </li>
                                <li>
                                    <input  class="form-check-input" type="checkbox" name="myth" value="on">
                                    <label>Mitologia</label>
                                </li>
                                <li>
                                    <input  class="form-check-input" type="checkbox" name="fantasy" value="on">
                                    <label>Fantasia</label>
                                </li>
                                <li>
                                    <input  class="form-check-input" type="checkbox" name="mltar" value="on">
                                    <label>Militar</label>
                                </li>
                            </ul>
                        </div>
                        <br>
                        <input type="submit" id="btn" value="Atualizar" class="btn btn-info">
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-delete" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">
                <div class="container" id="content">
                    <form action="db/deleteMenu.php" method="post">

                        <input type="hidden" name="type" value="manga">
                        <div class="row">
                            <label>ID</label>
                            <input type="number" name="id" id="form">
                            <br>
                            <input class="btn btn-info" type="submit" value="Deletar" id="btn">
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-chp-insert" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">
                <form action="db/epschp/insert.php" method="POST">
                    <input type="hidden" name="type" value="manga">
                    <div class="container" id="content">      
                        <div class="row">
                            <label>Nome do mangá</label>
                            <select name="id">
                                <?php
                                    $chapter_service = new ChapterService();
                                    foreach ($mangas as $manga){
                                        $chapters = $chapter_service->findbyManga($manga);
                                        if (sizeof($chapters) > 0){
                                            $last_chp = $chapters[sizeof($chapters) - 1];
                                            echo "<option value='" . $manga->getID()."'>". $manga->getName(). " - ". "Capítulo Atual: ".$last_chp->getNumber(). "</option>";
                                        } else {
                                            echo "<option value='" . $manga->getID()."'>". $manga->getName(). "</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="row">
                            <label>Nome do capítulo</label>
                            <input type="text" name="name" id="form">
                        </div>
                        <div class="row">
                            <label>URL</label>
                            <input type="text" name="url" id="form">
                        </div>
                        <div class="row">
                            <label>Data de transmissão</label>
                            <input type="date" name="date" id="form">
                        </div>
                        <div class="row">
                            <label>Páginas</label>
                            <input type="number" name="pages" min="1" id="form">
                        </div>
                        <div class="row">
                            <label>Filler</label>
                            <div class="col-1">
                                <input type="radio" name="filler" value="true" id=""> <span> Sim
                            </div>
                            <div class="col-1">
                                <input type="radio" name="filler" value="false" aria-selected="true" id="" checked> <span> Não
                            </div>
                        </div>
                        <input type="submit" value="Adicionar capítulo" id="btn" class="btn btn-info">
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="nav-chp-select" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">
                <div class="container" id="content">
                    <form action="db/epschp/select.php" method="post">
                        <input type="hidden" name="type" value="manga">
                        <div class="row">
                            <label>ID do mangá</label>
                            <input type="number" name="id" id="form">
                        </div>
                        <div class="row">
                            <input type="submit" value="Consultar" id="btn" class="btn btn-info">
                        </div>
                    </form>
                </div>                
            </div>
            <div class="tab-pane fade" id="nav-chp-update" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">
                <div class="container" id="content">
                    <form action="db/epschp/updateMenu.php" method="post">
                        <input type="hidden" name="type" value="manga">
                        <div class="row">
                            <label>ID do capítulo</label>
                            <input type="number" name="id" id="form">
                        </div>
                        <div class="row">
                            <input type="submit" value="Consultar" id="btn" class="btn btn-info">
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-chp-delete" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">
                <div class="container" id="content">
                    <form action="db/epschp/deleteMenu.php" method="post">
                        <input type="hidden" name="type" value="manga">
                        <div class="row">
                            <label>ID do capítulo</label>
                            <input type="number" name="id" id="form">
                        </div>
                        <div class="row">
                            <input type="submit" value="Consultar" id="btn" class="btn btn-info">
                        </div>
                    </form>
                </div>
            </div>
        
          </div>
    </div>
    <script src="scripts/updateScript.js"></script>
    
</body>
</html>