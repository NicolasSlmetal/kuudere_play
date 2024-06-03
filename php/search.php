<?php   
    $type = $_POST["type"];
    $categories = [];
    $categories_names = [];
    $str_categories = file_get_contents("../categories.txt");
    $str_split = explode("\n", $str_categories);
    foreach ($str_split as $index => $line){
        $line_split = explode("=", $line);
        $key = trim($line_split[1]);
        $value = trim($line_split[0]);
        if (isset($_POST[$key])) {$categories[] = $key; $categories_names[] = $value;}
    }
    
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../style/style.css"/>
    <link rel="shortcut icon" type="imagex/png" href="../imagens/logo.ico">
</head>
<body class="bg-dark">
    <div class="container-fluid" height="300px" style="background-color: black;">
        <img src="../imagens/logo.png" height="50px" width="100px" style="border-radius: 40px;  position: absolute;">
        <nav class="nav nav-pills justify-content-center" style="height: 52px;">
            <a class="nav-link" href="../index.html">Home</a>
            <a class="nav-link" href="animes.php">Animes</a>
            <a class="nav-link" href="mangas.php">Mangás</a>
            <a class="nav-link" href="../about.html">Sobre</a>
        </nav>
    </div>
    <br>
    <div class="container text-white" style="padding: 1px; border-radius: 12px;">
        <div class="row">
            <div id="search" class="col-4 w-25" style="height: fit-content; background-color: black">
                <h2 style="margin: 4px;  overflow: hidden;">Filtro</h2>
                <form method="POST" action="search.php" id="search">
                    <?php
                        echo "<input type='hidden' name='type' value='$type'>";
                    ?>
                    <input class="w-100 bg-dark" name="name" id="search" type="text" placeholder="Digite o nome" name="name">
                    <div class="form-check form-check-inline w-100 bg-dark" id="categories">
                        <h2 id="categories">Categorias</h2>
                        <ul id="categories">
                            <li>
                                <input class="form-check-input" type="checkbox" name="shonen" value="on">
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
                        <br>

                    </div>
                    <br>
                    <div class="form-check form-check-inline w-100 bg-dark" id="year">
                        <h2 id="search-year-title">Ano</h2>
                        <ul id="year-form">
                            <li>
                                <input  id="exact" class="form-check-input" type="radio" value="exact" name="time" onclick="setRangeVisible(this)">
                                <label>No ano exato</label>
                            </li>
                            <br>
                            <li>
                                <input  id="from" class="form-check-input" type="radio" value="from" name="time" onclick="setRangeVisible(this)">
                                <label>A partir de</label>
                            </li>
                            <br>
                            <li>
                                <input id="year" type="range" name="year" min="1960" oninput="document.querySelector('p#year').innerText = value" onchange="document.querySelector('p#year').innerText = value" onload="document.querySelector('p#year').value = value" disabled>
                                <p id="year">Ano</p>
                            </li>
                        </ul>
                    </div>
                    <br>
                    <input type="button" class="btn btn-dark" value="Resetar pesquisa" onclick="resetSearch()" id="btn-search"><br>
                    <input type="submit" class="btn btn-dark text-white" value="Pesquisar" style="margin: 10px;">
                </form>
            </div>
            <div class="col-8">
                <div id="content" style="background-color: black">
                    <h1 style="overflow: hidden; text-align: center;">Resultados</h1>
                    <br>
                    <?php
                        include("db/services.php");
                        $name = $_POST["name"];
                        $objects = "";
                        $service = "";
                        $results = [];
                        $label = "Pesquisa de";
                        if ($type == "anime"){
                            $service = new AnimeService();
                            $label = $label . " animes";
                        } else{
                            $service = new MangaService();
                            $label = $label . " mangás";
                        }
                        
                        if (isset($_POST["time"])){
                            $year = $_POST["year"];
                            $time = $_POST["time"];
                            if ($time == "exact"){
                                $label = $label . ", no ano de $year";
                                $results = $service->findByYear($year);
                            }elseif ($time == "from"){
                                $label = $label . ", a partir de $year";
                                $year_actual = date("Y");
                                while ($year <= $year_actual){
                                    $objects_by_year = $service->findByYear($year);
                                    foreach ($objects_by_year as $index => $object_by_year){
                                        $results[] = $object_by_year;
                                    }
                                    $year++;
                                }
                            }
                        } else {
                            $results = $service->getRepository()->operation("findall");
                        }
                        if (sizeof($categories) > 0){
                            $label = $label . ", nas categorias: ";
                            foreach ($categories_names as $cat) $label = $label . "$cat...";

                            $len_cat = sizeof($categories);
                            $filtered_results = [];
                            foreach ($results as $index => $object){
                                $object_categories = $object->getCategories();
                                $category_found = 0;
                                foreach ($object_categories as $index => $category){
                                    if (in_array($category, $categories)){
                                        $category_found++;
                                        if ($category_found >= $len_cat) {
                                            $filtered_results[] = $object;
                                            break;
                                        }       
                                    }
                                }
                            }
                            $results = $filtered_results;
                        }
                        if (strlen($name) > 0){
                            $copy_results = [];
                            $label = $label . ", com o nome '$name'";
                            for ($i = 0; $i < sizeof($results); $i++) $copy_results[] = $results[$i];
                            foreach ($copy_results as $index => $object){
                                $contains_name = strpos(strtoupper($object->getName()), strtoupper($name));
                                if ($contains_name === false){
                                    $index_object = array_search($object, $results);
                                    unset($results[$index_object]);
                                }
                            }
                        }
                        usort($results, function($object1, $object2){
                            return strcmp($object1->getName(), $object2->getName());
                        });
                        echo "<p align='center'>$label</p>";
                        $total = sizeof($results);
                        if ($total > 0){
                            $i = 0;
                            while($i < $total){
                                echo "<div class='row'>";
                                echo "<div class='col-12'>";
                                echo "<ul class='list-group list-group-horizontal' style='list-style: none; overflow: hidden;'>";
                                for ($j = $i; $j < $i + 4 && $j < $total; $j++){
                                        $name = $results[$j]->getName();
                                        $id = $results[$j]->getID();
                                        $img = $results[$j]->getURL()[0];
                                        $n = $j + 1;
                                        $name_form = "select" . $n;
                                        echo "<li>
                                                <form id='$name_form' method='POST' action='select.php'>
                                                <div class='card bg-dark text-center' style='margin: 4px; margin-left:10px; border-radius:12px; cursor:pointer;' onclick=document.querySelector('form#$name_form').submit()
                                                data-bs-toggle='tooltip' title='$name'>
                                                    <input type='hidden' name='id' value='$id'>
                                                    <input type='hidden' name='type' value='$type'>
                                                    <img class='card-img-top ' id='card' src='$img' style='width:170px;height:240px;'>
                                                    <div class='card-body' style='height:40px; width:170px;'>
                                                        <p class='text-white' id='title' style='white-space:nowrap; overflow:hidden; text-overflow: ellipsis;'>$name</p>
                                                    </div>
                                                </div>
                                                </form>
                                            </li>";
                                }
                                $i+= 4;
                                echo "</ul>";
                                echo "</div>";
                                echo "</div>";
                            }
                        } else {
                            echo "<h1 class='text-center'>Nada encontrado :(</h1>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <br>
    <footer class="text-white" style="background-color: black;">
        <div id="contact-area">
            <div class="container">
                <div class="row" align="center">
                    <div class="col-md-12">
                        <h1 class="main-title text-center">Contatos</h1>
                    </div>
                    <div class="col-6">
                        <a href="https://instagram.com/limabrito_san?igshid=NGVhN2U2NjQ0Yg==">
                            <img id="contact-1" class="contact-image" src="../imagens/inst.png"> 
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="https://github.com/NicolasSlmetal">
                            <img id="contact-2" class="contact-image" src="../imagens/github.png"> 
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="copy" class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center">Todos os direitos reservados. &copy; 2023.</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/js/bootstrap.min.js"></script>
    <script src="../scripts/search.js"></script>
</body>
</html>