<?php
    include('connect.php');
    include(str_replace("db", "classes", __DIR__)."\\builders.php");
     abstract class Repository{
        private Driver $driver;
        private $connection;

        public function __construct(){
            $this->driver = new Driver("monorail.proxy.rlwy.net:57822/railway", "railway", "root", "3de5e6b6b2Cc5bfCbHgF-2DG354A4GBa");
            $this->connection = $this->getDriver()->connect();
        }

        public function operation($option, ...$arguments){
            $this->connection = $this->getDriver()->connect();
            if ($this->getConnection()){
                $result = null;
                switch ($option){
                    case "insert":
                        $result = $this->insert($arguments[0]);
                        break;
                    case "findall":
                        $result = $this->findAll();
                        break;
                    case "findbyid":
                        $result = $this->findByID($arguments[0]);
                        break;
                    case "findbyname":
                        $result = $this->findByName($arguments[0]);
                        break;
                    case "update":
                        $result = $this->update($arguments[0], $arguments[1]);
                        break;
                    case "delete":
                        $result = $this->delete($arguments[0]);
                }
                $this->close();
                return $result;
            } else {
                return false;
            }
        }

        protected abstract function insert($object);
        protected abstract function findAll();
        protected abstract function findByID($id);

        protected abstract function findByName($name);
        protected abstract function update($id, $object);
        protected abstract function delete($id);

        public function close(){
            return mysqli_close($this->getConnection());
        }
        public function getDriver(){
            return $this->driver;
        }
        public function getConnection(){
            return $this->connection;
        }


    }

    class AnimeRepository extends Repository{
        
        protected function insert($anime){
            $name = $anime->getName();
            $eps = $anime->getEps();
            $date = $anime->getDate();
            if ($date == null){
                $date = "null";
            }
            $producer = $anime->getProducer()->getID();
            //Serialização de arrays
            $categories = serialize($anime->getCategories());
            $url = serialize($anime->getURL());
            $query = "INSERT INTO anime_table (name, eps, producer, categories, url, date) 
            VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($this->getConnection(), $query);
            $result = false;
            if ($stmt){
                //Substituição de parâmetros
                mysqli_stmt_bind_param($stmt, "siisss", $name, $eps, $producer, $categories, $url, $date);
                if (mysqli_stmt_execute($stmt)){
                    echo "Inserido - Anime <br>";
                    $result = true;
                } else {
                    echo "Não inserido - Anime <br>" . mysqli_error($this->getConnection());
                }

            } else {
                echo "Não inserido - " . mysqli_error($this->getConnection());
            }
            mysqli_stmt_close($stmt);
            return $result;
        }
        protected function findAll(){
            $sql = "SELECT * FROM `anime_table`";
            $query = mysqli_query($this->getConnection(), $sql);
            $list = [];
            $producer_repository = new ProducerRepository();
            //Buscando todos os resultados
            while ($iteration = mysqli_fetch_array($query)){
                $builder = new AnimeBuilder();
                $builder->setID($iteration['id']);
                $builder->setName($iteration['name']);
                $builder->setEps($iteration['eps']);
                $producerId = $iteration['producer'];
                $producer = $producer_repository->findByID($producerId);
                $builder->setProducer($producer);
                $unserialize_cat = unserialize($iteration['categories']);
                $unserialize_url = unserialize($iteration['url']);
                $builder->setCategories($unserialize_cat);
                $builder->setURL($unserialize_url);
                $date = $iteration["date"];
                if ($date != null) $date = DateTime::createFromFormat("d/m/Y", $date);
                $builder->setDate($date);
                //Armazenando resultados na lista
                $list[] = $builder->build();
            }
            return $list;
        }
        protected function findByID($id){
            $sql = "SELECT * FROM `anime_table` WHERE (`id`=$id)";
            $query = mysqli_query($this->getConnection(), $sql);
            //Se algo foi encontrado
            if (mysqli_num_rows($query) > 0){
                //Criando objeto Builder para criar o objeto Anime ao final
                $builder = new AnimeBuilder();
                $producer_repository = new ProducerRepository();
                while ($iteration = mysqli_fetch_array($query)){
                    $builder->setID($iteration['id']);
                    $builder->setName($iteration['name']);
                    $builder->setEps($iteration['eps']);
                    $producerId = $iteration['producer'];
                    $producer = $producer_repository->findByID($producerId);
                    $builder->setProducer($producer);
                    $unserialize_cat = unserialize($iteration['categories']);
                    $unserialize_url = unserialize($iteration['url']);
                    $builder->setCategories($unserialize_cat);
                    $builder->setURL($unserialize_url);
                    $date = $iteration["date"];
                    if ($date != null) $date = DateTime::createFromFormat("d/m/Y", $date);
                    $builder->setDate($date);
                }
                return $builder->build();
            } else {
                return null;
            }
        }

        protected function findByName($name){
            $sql = "SELECT * FROM `anime_table` WHERE (`name` LIKE '%$name%')";
            $query = mysqli_query($this->getConnection(), $sql);
            //Se algo foi encontrado
            $list = [];
            if (mysqli_num_rows($query) > 0){
                $producer_repository = new ProducerRepository();
                while ($iteration = mysqli_fetch_array($query)){
                    $builder = new AnimeBuilder();
                    $builder->setID($iteration['id']);
                    $builder->setName($iteration['name']);
                    $builder->setEps($iteration['eps']);
                    $producerId = $iteration['producer'];
                    $producer = $producer_repository->findByID($producerId);
                    $builder->setProducer($producer);
                    $unserialize_cat = unserialize($iteration['categories']);
                    $unserialize_url = unserialize($iteration['url']);
                    $builder->setCategories($unserialize_cat);
                    $builder->setURL($unserialize_url);
                    $date = $iteration["date"];
                    if ($date != null) $date = DateTime::createFromFormat("d/m/Y", $date);
                    $builder->setDate($date);
                    //Armazenando resultados na lista
                    $list[] = $builder->build();
                }
            } else {
                echo "Sem resultados<br>";
            }
            return $list;
        }
        protected function update($id, $anime){
            $name = $anime->getName();
            $eps = $anime->getEps();
            $producer = $anime->getProducer()->getID();
            $categories = serialize($anime->getCategories());
            $url = serialize($anime->getURL());
            $date = $anime->getDate();
            $date = $date->format("d/m/Y");
            $query = "UPDATE `anime_table` SET `name`=?, 
            `eps`=?, `producer`=?, `categories`=? ,
            `url`=?, `date`=? WHERE `id`=?";
            $stmt = mysqli_prepare($this->getConnection(), $query);
            $result = false;
            if ($stmt){
                //Substituindo parâmetros
                mysqli_stmt_bind_param($stmt, "siisssi", $name, $eps, $producer, $categories, $url, $date, $id);
                if (mysqli_stmt_execute($stmt)){
                    echo "Atualizado - - Anime <br>";
                    $result = true;
                } else {
                    echo "Não atualizado - Anime - " . mysqli_error($this->getConnection());
                }
            } else{
                echo "Não atualizado - Anime - " . mysqli_error($this->getConnection());
            }
            mysqli_stmt_close($stmt);
            return $result;
        }
        protected function delete($id){
            $sql = "DELETE FROM `anime_table` WHERE (`id`=$id)";
            $query = mysqli_query($this->getConnection(), $sql);
            if ($query){
                echo "Deletado - Anime <br>";
                return true;
            } else {
                echo "Não deletado - " . mysqli_error($this->getConnection());
                return false;
            }
        }

    }

    class MangaRepository extends Repository{

        protected function insert($manga){
            $name = $manga->getName();
            $chapters = $manga->getChapters();
            $producer = $manga->getProducer()->getID();
            $categories = serialize($manga->getCategories());
            $url = serialize($manga->getURL());
            $query = "INSERT INTO manga_table (name, chapters, producer, categories, url) 
            VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($this->getConnection(), $query);
            $result = false;
            if ($stmt){
                //Substituindo parâmetros
                mysqli_stmt_bind_param($stmt, "siiss", $name, $chapters, $producer, $categories, $url);
                if (mysqli_stmt_execute($stmt)){
                    echo "Inserido - Manga <br>";
                    $result = true;
                } else {
                    echo "Não inserido - Manga -" . mysqli_error($this->getConnection());
                }
            } else {
                echo "Não inserido - Manga - " . mysqli_error($this->getConnection());
            }
            mysqli_stmt_close($stmt);
            return $result;

        }
        protected function findAll(){
            $sql = "SELECT * FROM `manga_table`";
            $query = mysqli_query($this->getConnection(), $sql);
            $list = [];
            $producer_repository = new ProducerRepository();
            //Encontrando todos os resultados da tabela
            while ($iteration = mysqli_fetch_array($query)){
                $builder = new MangaBuilder();
                $builder->setID($iteration['id']);
                $builder->setName($iteration['name']);
                $builder->setChapters($iteration['chapters']);
                $producerId = $iteration['producer'];
                $producer = $producer_repository->findByID($producerId);
                $builder->setProducer($producer);
                $unserialize_cat = unserialize($iteration['categories']);
                $unserialize_url = unserialize($iteration['url']);
                $builder->setCategories($unserialize_cat);
                $builder->setURL($unserialize_url);
                $date = $iteration["date"];
                if ($date != null) $date = DateTime::createFromFormat("d/m/Y", $date);
                $builder->setDate($date);
                //Armazenando cada resultado na lista
                $list[] = $builder->build();
            }
            return $list;
        }
        protected function findByID($id){
            $sql = "SELECT * FROM `manga_table` WHERE (`id`=$id)";
            $query = mysqli_query($this->getConnection(), $sql);
            //Se algo foi encontrado
            if (mysqli_num_rows($query) > 0){
                //Criando objeto Builder para criar o objeto Manga ao final
                $builder = new MangaBuilder();
                $producer_repository = new ProducerRepository();
                while ($iteration = mysqli_fetch_array($query)){
                    $builder->setID($iteration['id']);
                    $builder->setName($iteration['name']);
                    $builder->setChapters($iteration['chapters']);
                    $producerId = $iteration['producer'];
                    $producer = $producer_repository->findByID($producerId);
                    $builder->setProducer($producer);
                    $unserialize_cat = unserialize($iteration['categories']);
                    $unserialize_url = unserialize($iteration['url']);
                    $builder->setCategories($unserialize_cat);
                    $builder->setURL($unserialize_url);
                    $date = $iteration["date"];
                    if ($date != null) $date = DateTime::createFromFormat("d/m/Y", $date);
                    $builder->setDate($date);
                }
                return $builder->build();
            } else {
                return null;
            }
        }

        protected function findByName($name){
            $sql = "SELECT * FROM `manga_table` WHERE (`name` LIKE '%$name%')";
            $query = mysqli_query($this->getConnection(), $sql);
            $list = [];
            //Se algo foi encontrado
            if (mysqli_num_rows($query) > 0){
                $producer_repository = new ProducerRepository();
                while ($iteration = mysqli_fetch_array($query)){
                    $builder = new MangaBuilder();
                    $builder->setID($iteration['id']);
                    $builder->setName($iteration['name']);
                    $builder->setChapters($iteration['chapters']);
                    $producerId = $iteration['producer'];
                    $producer = $producer_repository->findByID($producerId);
                    $builder->setProducer($producer);
                    $unserialize_cat = unserialize($iteration['categories']);
                    $unserialize_url = unserialize($iteration['url']);
                    $builder->setCategories($unserialize_cat);
                    $builder->setURL($unserialize_url);
                    $date = $iteration["date"];
                    if ($date != null) $date = DateTime::createFromFormat("d/m/Y", $date);
                    $builder->setDate($date);
                    //Armazenando cada resultado na lista
                    $list[] = $builder->build();
                }
                
            } else {
                echo "Sem resultados - Manga";
            }
            return $list;
        }
        protected function update($id, $manga){
            $name = $manga->getName();
            $chapters = $manga->getChapters();
            $producer = $manga->getProducer()->getID();
            $categories = serialize($manga->getCategories());
            $url = serialize($manga->getURL());
            $date = $manga->getDate();
            $query = "UPDATE `manga_table` SET `name`=?, 
            `eps`=?, `producer`=?, `categories`=? ,
            `url`=?, `date`=? WHERE `id`=?";
             $stmt = mysqli_prepare($this->getConnection(), $query);
             $result = false;
            if ($stmt){
                //Substituindo parâmetros
                mysqli_stmt_bind_param($stmt, "siisssi", $name, $chapters, $producer, $categories, $url, $date, $id);
                if (mysqli_stmt_execute($stmt)){
                    echo "Atualizado - Manga";
                    $result = true;
                } else {
                    echo "Não atualizado - Manga - " . mysqli_error($this->getConnection());
                }
            } else{
                echo "Não atualizado - Manga -" . mysqli_error($this->getConnection());
            }
            mysqli_stmt_close($stmt);
            return $result;
        }
        protected function delete($id){
            $sql = "DELETE FROM `manga_table` WHERE (`id`=$id)";
            $query = mysqli_query($this->getConnection(), $sql);
            if ($query){
                echo "Deletado - Manga";
                return true;
            } else {
                echo "Não deletado - Manga - " . mysqli_error($this->getConnection());
                return false;
            }
        }
    }

    class EpisodeRepository extends Repository{
        protected function insert($episode){
            $sql = "INSERT INTO `episode_table` (`name`, `number`, `url`, `date`, `anime`, `duration`, `filler`)
             VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($this->getConnection(), $sql);
            $result = false;
            if ($stmt){
                $name = $episode->getName();
                $number = $episode->getNumber();
                $url = $episode->getURL();
                $date = $episode->getDate();
                $date = $date->format("d/m/Y");
                $anime = $episode->getAnime()->getID();
                $duration = $episode->getDuration();
                $filler = $episode->isFiller();
                mysqli_stmt_bind_param($stmt, "sissidi", $name, $number, $url, $date, $anime, $duration, $filler);
                if (mysqli_stmt_execute($stmt)){
                    echo "Inserido - Episode <br>";
                    $result = true;
                } else {
                    echo "Não inserido - Episode - " . mysqli_error($this->getConnection());
                }
            } else{
                echo "Não inserido - Episode - " . mysqli_error($this->getConnection());
            }
            mysqli_stmt_close($stmt);
            return $result;
        }
        protected function findAll(){
            $sql = "SELECT * FROM `episode_table`";
            $query = mysqli_query($this->getConnection(), $sql);
            $list = [];
            if (mysqli_num_rows($query) > 0){
                $anime_repository = new AnimeRepository();
                while ($iteration = mysqli_fetch_array($query)){
                    $builder = new EpisodeBuilder();
                    $builder->setName($iteration['name']);
                    $builder->setNumber($iteration['number']);
                    $builder->setURL($iteration['url']);
                    $date = DateTime::createFromFormat("d/m/Y", $iteration['date']);
                    $builder->setDate($date);
                    $anime = $anime_repository->operation("findbyid", $iteration["anime"]);
                    $builder->setAnime($anime);
                    $builder->setDuration($iteration['duration']);
                    $builder->setFiller($iteration['filler']);
                    $builder->setID($iteration['id']);
                    $list[] = $builder->build();
                }
            }
            return $list;
        }        
        protected function findByID($id){
            $sql = "SELECT * FROM `episode_table` WHERE (`id`=$id)";
            $query = mysqli_query($this->getConnection(), $sql);
            if (mysqli_num_rows($query) > 0){
                $anime_repository = new AnimeRepository();
                $builder = new EpisodeBuilder();
                while ($iteration = mysqli_fetch_array($query)){
                    $builder->setName($iteration['name']);
                    $builder->setNumber($iteration['number']);
                    $builder->setURL($iteration['url']);
                    $date = DateTime::createFromFormat("d/m/Y", $iteration['date']);
                    $builder->setDate($date);
                    $anime = $anime_repository->operation("findbyid", $iteration["anime"]);
                    $builder->setAnime($anime);
                    $builder->setDuration($iteration['duration']);
                    $builder->setFiller($iteration['filler']);
                    $builder->setID($iteration['id']);
                }
                return $builder->build();
            } else {
                return null;
            }
        }
        protected function findByName($name){
            $sql = "SELECT * FROM `episode_table` WHERE (`name` LIKE '%$name%')";
            $query = mysqli_query($this->getConnection(), $sql);
            $list = [];
            if (mysqli_num_rows($query) > 0){
                $anime_repository = new AnimeRepository();
                while ($iteration = mysqli_fetch_array($query)){
                    $builder = new EpisodeBuilder();
                    $builder->setName($iteration['name']);
                    $builder->setNumber($iteration['number']);
                    $builder->setURL($iteration['url']);
                    $date = DateTime::createFromFormat("d/m/Y", $iteration['date']);
                    $builder->setDate($date);
                    $anime = $anime_repository->operation("findbyid", $iteration["anime"]);
                    $builder->setAnime($anime);
                    $builder->setDuration($iteration['duration']);
                    $builder->setFiller($iteration['filler']);
                    $builder->setID($iteration['id']);
                    $list[] = $builder->build();
                }
            } else {
                echo "Sem resultados - Episode";
                return null;
            }
            return $list;
        }
        protected function update($id, $episode){
            $sql = "UPDATE `episode_table` SET `name`=?
            , `number`=?, `url`=?, `date`=?, 
            `anime`=?, `duration`=?, `filler`=? 
            WHERE (`id`=?)";
            $stmt = mysqli_prepare($this->getConnection(), $sql);
            $result= false;
            if ($stmt){
                $name = $episode->getName();
                $number = $episode->getNumber();
                $url = $episode->getURL();
                $date = $episode->getDate();
                $date = $date->format("d/m/Y");
                $anime = $episode->getAnime()->getID();
                $duration = $episode->getDuration();
                $filler = $episode->isFiller();
                mysqli_stmt_bind_param($stmt, "sissidii", $name, $number, $url, $date, $anime, $duration, $filler, $id);
                if (mysqli_stmt_execute($stmt)){
                    echo "Atualizado - Episode <br>";
                    $result = true;
                } else {
                    echo "Não atualizado - Episode - " . mysqli_error($this->getConnection());
                }
            } else {
                echo "Não atualizado  - Episode - ". mysqli_error($this->getConnection());
            }
            return $result;
        }
        protected function delete($id){
            $sql = "DELETE FROM `episode_table` WHERE `id`=$id";
            $query = mysqli_query($this->getConnection(), $sql);
            if ($query){
                echo "Deletado - Episode <br>";
                return true;
            } else {
                echo "Não deletado - Episode - " . mysqli_error($this->getConnection());
                return false;
            }
        }

    }
    class ChapterRepository extends Repository{
        protected function insert($chapter){
            $sql = "INSERT INTO `chapter_table` (`name`, `number`, `url`, `date`, `manga`, `pages`, `filler`)
             VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($this->getConnection(), $sql);
            $result = false;
            if ($stmt){
                $name = $chapter->getName();
                $number = $chapter->getNumber();
                $url = $chapter->getURL();
                $date = $chapter->getDate();
                $date = $date->format("d/m/Y");
                echo $date;
                $manga = $chapter->getManga()->getID();
                $pages = $chapter->getPages();
                $filler = $chapter->isFiller();
                mysqli_stmt_bind_param($stmt, "sissiii", $name, $number, $url, $date, $manga, $pages, $filler);
                if (mysqli_stmt_execute($stmt)){
                    echo "Inserido - Chapter <br>";
                    $result = true;
                } else {
                    echo "Não inserido - Chapter - " . mysqli_error($this->getConnection());
                }
            } else{
                echo "Não inserido - Chapter - " . mysqli_error($this->getConnection());
            }
            mysqli_stmt_close($stmt);
            return $result;
        }
        protected function findAll(){
            $sql = "SELECT * FROM `chapter_table`";
            $query = mysqli_query($this->getConnection(), $sql);
            $list = [];
            if (mysqli_num_rows($query) > 0){
                $manga_repository = new MangaRepository();
                while ($iteration = mysqli_fetch_array($query)){
                    $builder = new ChapterBuilder();
                    $builder->setName($iteration['name']);
                    $builder->setNumber($iteration['number']);
                    $builder->setURL($iteration['url']);
                    $date = DateTime::createFromFormat("d/m/Y", $iteration['date']);
                    $builder->setDate($date);
                    $manga = $manga_repository->operation("findbyid", $iteration["manga"]);
                    $builder->setManga($manga);
                    $builder->setPages($iteration['pages']);
                    $builder->setFiller($iteration['filler']);
                    $builder->setID($iteration['id']);
                    $list[] = $builder->build();
                }
            }
            return $list;
        }        
        protected function findByID($id){
            $sql = "SELECT * FROM `chapter_table` WHERE (`id`=$id)";
            $query = mysqli_query($this->getConnection(), $sql);
            if (mysqli_num_rows($query) > 0){
                $manga_repository = new MangaRepository();
                $builder = new ChapterBuilder();
                while ($iteration = mysqli_fetch_array($query)){
                    $builder->setName($iteration['name']);
                    $builder->setNumber($iteration['number']);
                    $builder->setURL($iteration['url']);
                    $date = DateTime::createFromFormat("d/m/Y", $iteration['date']);
                    $string = $date->format("d/m/Y");
                    $builder->setDate($date);
                    $manga = $manga_repository->operation("findbyid", $iteration["manga"]);
                    $builder->setManga($manga);
                    $builder->setPages($iteration['pages']);
                    $builder->setFiller($iteration['filler']);
                    $builder->setID($iteration['id']);
                }
                return $builder->build();
            } else {
                return null;
            }
        }
        protected function findByName($name){
            $sql = "SELECT * FROM `episode_table` WHERE (`name` LIKE '%$name%')";
            $query = mysqli_query($this->getConnection(), $sql);
            $list = [];
            if (mysqli_num_rows($query) > 0){
                $manga_repository = new MangaRepository();
                while ($iteration = mysqli_fetch_array($query)){
                    $builder = new ChapterBuilder();
                    $builder->setName($iteration['name']);
                    $builder->setNumber($iteration['number']);
                    $builder->setURL($iteration['url']);
                    $date = DateTime::createFromFormat("d/m/Y", $iteration['date']);
                    $builder->setDate($date);
                    $manga = $manga_repository->operation("findbyid", $iteration["manga"]);
                    $builder->setManga($manga);
                    $builder->setPages($iteration['pages']);
                    $builder->setFiller($iteration['filler']);
                    $builder->setID($iteration['id']);
                    $list[] = $builder->build();
                }
            }
            return $list;
        }
        protected function update($id, $chapter){
            $sql = "UPDATE `chapter_table` SET `name`=?
            , `number`=?, `url`=?, `date`=?, 
            `manga`=?, `pages`=?, `filler`=? 
            WHERE (`id`=?)";
            $stmt = mysqli_prepare($this->getConnection(), $sql);
            $result= false;
            if ($stmt){
                $name = $chapter->getName();
                $number = $chapter->getNumber();
                $url = $chapter->getURL();
                $date = $chapter->getDate();
                $date = $date->format("d/m/Y");
                $manga = $chapter->getManga()->getID();
                $pages = $chapter->getPages();
                $filler = $chapter->isFiller();
                mysqli_stmt_bind_param($stmt, "sissidii", $name, $number, $url, $date, $manga, $pages, $filler, $id);
                if (mysqli_stmt_execute($stmt)){
                    echo "Atualizado";
                    $result = true;
                } else {
                    echo "Não atualizado - Chapter - " . mysqli_error($this->getConnection());
                }
            } else {
                echo "Não atualizado - Chapter - ". mysqli_error($this->getConnection());
            }
            return $result;
        }
        protected function delete($id){
            $sql = "DELETE FROM `chapter_table` WHERE `id`=$id";
            $query = mysqli_query($this->getConnection(), $sql);
            if ($query){
                echo "Deletado - Chapter <br>";
                return true;
            } else {
                echo "Não deletado - Chapter - " . mysqli_error($this->getConnection());
                return false;
            }
        }
    }
    class ProducerRepository extends Repository{
        protected function insert($producer){
            $name = $producer->getName();
            $query = "INSERT INTO `producer` (name) 
            VALUES ('$name')";
            //Com menos parâmetros, não é preciso usar o stmt
            if (mysqli_query($this->getConnection(), $query)){
                echo "Inserido - Producer <br>";
                return true;
            } else {
                echo "Não inserido - Producer - " . mysqli_error($this->getConnection());
                return false;
            }
        }
        protected function findAll(){
            $sql = "SELECT * FROM `anime_table`";
            $query = mysqli_query($this->getConnection(), $sql);
            $list = [];
            //Encontrando todos os resultados
            while ($iteration = mysqli_fetch_array($query)){
                $builder = new ProducerBuilder();
                $builder->setID($iteration['idproducer']);
                $builder->setName($iteration['name']);
                //Armazenando cada resultado na lista
                $list[] = $builder->build();
            }
            return $list;
        }
        protected function findByID($id){
            $sql = "SELECT * FROM `producer` WHERE (`id`=$id)";
            $query = mysqli_query($this->getConnection(), $sql);
            //Se o elemento existe
            if (mysqli_num_rows($query) > 0){
                //Criando objeto Builder para retornar objeto Producer ao final
                $builder = new ProducerBuilder();
                while ($iteration = mysqli_fetch_array($query)){
                    $builder->setID($iteration['id']);
                    $builder->setName($iteration['name']);
                }
                return $builder->build();
            } else {
                return null;
            }

        }

        protected function findByName($name){
            $sql = "SELECT * FROM `producer` WHERE (`name`='$name')";
            $query = mysqli_query($this->getConnection(), $sql);
            if (mysqli_num_rows($query) > 0){
                //Criando objeto Builder para retornar objeto Producer ao final
                $builder = new ProducerBuilder();
                while ($iteration = mysqli_fetch_array($query)){
                    $builder->setID($iteration['id']);
                    $builder->setName($iteration['name']);
                }
                return $builder->build();
            } else {
                return null;
            }
        }
        protected function update($id, $producer){
            $name = $producer->getName();
            $query = "UPDATE `producer` SET `name`='$name' WHERE `id`=$id";
            if (mysqli_query($this->getConnection(), $query)){
                echo "Atualizado - Producer <br>";
                return true;
            } else {
                echo "Não atualizado - Producer - " . mysqli_error($this->getConnection());
                return false;
            }
        }
        protected function delete($id){
            $sql = "DELETE FROM `producer` WHERE (`id`=$id)";
            $query = mysqli_query($this->getConnection(), $sql);
            if ($query){
                echo "Deletado - Producer <br>";
                return true;
            } else {
                echo "Não deletado - Producer - " . mysqli_error($this->getConnection());
                return false;
            }
        }
    }
?>