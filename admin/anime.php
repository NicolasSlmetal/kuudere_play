<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animes</title>
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
            <a class="nav-link active" href="#">Anime</a>
            <a class="nav-link" href="manga.php">Mangá</a>
        </nav>
    </div>
    <br>

    <div class="container text-white" style="background-color: black; border-radius: 12px;">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-insert" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Cadastrar Anime</button>
              <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-select" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Consultar Animes</button>
              <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-update" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Atualizar Anime</button>
              <button class="nav-link" id="nav-disabled-tab" data-bs-toggle="tab" data-bs-target="#nav-delete" type="button" role="tab" aria-controls="nav-disabled" aria-selected="false">Deletar Anime</button>
              <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-eps-insert">Adicionar Episódio</button>
              <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-eps-select">Consultar episódios</button>
              <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-eps-update">Atualizar Episódio</button>
              <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-eps-delete">Deletar Episódio</button>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-insert" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                <div class="container" id="content">
                    <form action="db/insert.php" method="post">
                        <div class="row">
                            <label >Nome</label>
                            <input type="text" name="name" id="form">
                        </div>
                        <div class="row">
                            <label >Episódios</label>
                            <input type="number" min="1" name="eps" id="form">
                        </div>
                        <div class="row">
                            <label >Produtor</label>
                            <input type="text"  name="producer" id="form">
                        </div>
                        <div class="row">
                            <label >Categorias</label>
                            <ul id="categories">
                                <li>
                                    <input class="form-check-input" type="checkbox" name="shonen">
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
                        <input type="hidden" name="type" value="anime">
                        <br>
                        <input type="submit" value="Cadastrar" id="btn" class="btn btn-info">
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-select" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0" style="overflow: scroll">
                <table class="table bg-dark text-white" id="select">
                    <thead>
                        <th>Nome</th>
                        <th>Episódios</th>
                        <th>Produtor</th>
                        <th>Categorias</th>
                        <th>URL da capa</th>
                        <th>URL da descrição</th>
                        <th>Data</th>
                    </thead>
                    <?php
                        require("../php/db/services.php");
                        $anime_service = new AnimeService();
                        $animes = $anime_service->getRepository()->operation("findall");
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
                        foreach ($animes as $anime){
                            $category_found = "";
                            foreach($categories_k as $category){
                                    if (in_array($category, $anime->getCategories())){
                                        $category_found = $category_found . $categories[$category] . "...";
                                }
                            }
                            $date = "Indefinida";
                            if ($anime->getDate() != null) $date = $anime->getDate()->format("d/m/Y"); 
                            echo "<tr>"
                            . "<td>" . $anime->getName() . "</td>"
                            . "<td>" . $anime->getEps() . "</td>"
                            . "<td>" . $anime->getProducer()->getName() . "</td>"
                            . "<td>". $category_found . "</td>"
                            . "<td>" . $anime->getURL()[0] . "</td>"
                            . "<td>" . $anime->getURL()[1] . "</td>"
                            . "<td>" . $date . "</td>";
                        echo "</tr>";
                        }
                    ?>
                </table>
            </div>
            <div class="tab-pane fade" id="nav-update" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
                <div class="container" id="content">
                    <form action="db/update.php" method="POST">
                        <input type="hidden" name="type" value="anime">
                        <div class="row">
                        <label>ID Anime</label>
                            <input type="number" name="id" id="form">
                        </div>
                        <div class="row">
                            <label>Campo</label>
                            <select name="field" id="field" onchange="verify()">
                                    <option value="name">Nome</option>
                                    <option value="eps">Episódios</option>
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
                        <br>
                        <input type="submit" id="btn" value="Atualizar" class="btn btn-info">
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-delete" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">
                <div class="container" id="content">
                    <form action="db/deleteMenu.php" method="post">

                        <input type="hidden" name="type" value="anime">
                        <div class="row">
                            <label>ID do anime</label>
                            <input type="number" name="id" id="form">
                            <br>
                            <input class="btn btn-info" type="submit" value="Deletar" id="btn">
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-eps-insert" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">
                <form action="db/epschp/insert.php" method="POST">
                    <input type="hidden" name="type" value="anime">
                    <div class="container" id="content">      
                        <div class="row">
                            <label>Nome do anime</label>
                            <select name="id">
                                <?php
                                    $episode_service = new EpisodeService();
                                    foreach ($animes as $anime){
                                        $eps = $episode_service->findbyAnime($anime);
                                        if (sizeof($eps) > 0){
                                            $last_ep = $eps[sizeof($eps) -1];
                                            echo "<option value='" . $anime->getID()."'>". $anime->getName(). " - ". "Episódio Atual: ".$last_ep->getNumber(). "</option>";
                                        } else {
                                            echo "<option value='" . $anime->getID()."'>". $anime->getName(). "</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="row">
                            <label>Nome do episódio</label>
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
                            <label>Duração do episódio</label>
                            <input type="number" name="min" min="10" id="form" placeholder="Minutos">
                            <input type="number" name="sec" id="form" placeholder="Segundos">
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
                        <input type="submit" value="Adicionar episódio" id="btn" class="btn btn-info">
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="nav-eps-select" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">
                <div class="container" id="content">
                    <form action="db/epschp/select.php" method="post">
                        <input type="hidden" name="type" value="anime">
                        <div class="row">
                            <label>ID do anime</label>
                            <input type="number" name="id" id="form">
                        </div>
                        <div class="row">
                            <input type="submit" value="Consultar" id="btn" class="btn btn-info">
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-eps-update" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">
                <div class="container" id="content">
                    <form action="db/epschp/updateMenu.php" method="post">
                        <input type="hidden" name="type" value="anime">
                        <div class="row">
                            <label>ID do episódio</label>
                            <input type="number" name="id" id="form">
                        </div>
                        <div class="row">
                            <input type="submit" value="Consultar" id="btn" class="btn btn-info">
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-eps-delete" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">
                <div class="container" id="content">
                    <form action="db/epschp/deleteMenu.php" method="post">
                        <input type="hidden" name="type" value="anime">
                        <div class="row">
                            <label>ID do episódio</label>
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