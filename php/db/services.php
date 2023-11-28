<?php
    include("repositories.php");
    include(str_replace("db", "classes", __DIR__)."\\classes.php");
    class AnimeService{
        private AnimeRepository $repository;

        public function __construct(){
            $this->repository = new AnimeRepository();
        }

        public function insert($anime){
            $producer_repository = new ProducerRepository();
            $producer = $anime->getProducer();
            $producer = $producer_repository->operation("findbyname", $producer->getName());
            if ($producer === null){
                if ($producer_repository->operation("insert", $anime->getProducer())) {
                    $name = $anime->getProducer()->getName();
                    $producer = $producer_repository->operation("findbyname", $name);
                    $anime->setProducer($producer);
                } else {
                    return null;
                } 
            } else {
                $anime->setProducer($producer);
            }
            if ($this->repository->operation("insert", $anime)){
                return $anime;
            } else {
                return null;
            }
        }
        
        public function findByProducer($producer_search){
            $animes = $this->repository->operation("findall");
            $animes_by_producer = [];
            foreach ($animes as $index => $anime){
                $producer = $anime->getProducer();
                if ($producer->getID() == $producer_search->getID()){
                    $animes_by_producer[] = $anime;
                }
            }
            return $animes_by_producer;
        }
        public function findByYear($year){
            $animes = $this->repository->operation("findall");
            $animes_by_year = [];
            foreach ($animes as $index => $anime){
                if ($anime->getDate() != null){
                    $date = DateTime::createFromFormat("d/m/Y", $anime->getDate());
                    $anime_year = $date->format("Y");
                    if ($anime_year == $year){
                        $animes_by_year[] = $anime;
                    }
            }
                
            }
            return $animes_by_year;
        }
        public function findByCategory($category){
            $animes = $this->repository->operation("findall");
            $animes_by_category = [];
            foreach ($animes as $index => $anime){
                for($i = 0; $i < sizeof($anime->getCategories()); $i++){
                    if ($anime->getCategories()[$i] == $category){
                        $animes_by_category[] = $anime;
                        break;
                    }
                }
            }
            return $animes_by_category;
        }
        public function update($anime){
            if ($this->repository->operation("update", $anime->getID(), $anime)){
                return $anime;
            } else {
                return null;
            }
        }
        public function delete($anime){
            if ($this->repository->operation("delete", $anime->getID())){
                return $anime;
            } else {
                return null;
            }
        }
        public function getRepository() {
            return $this->repository;
        }
    
        public function setRepository($repository) {
            $this->repository = $repository;
        }
    }

    class MangaService{
        private MangaRepository $repository;
        public function __construct(){
            $this->repository = new MangaRepository();
        }
        public function insert($manga){
            $producer_repository = new ProducerRepository();
            $producer = $producer_repository->operation("findbyname", $manga->getProducer()->getName());
            if ($producer === null){
                if ($producer_repository->operation("insert", $manga->getProducer())) {
                    $name = $manga->getProducer()->getName();
                    $producer = $producer_repository->operation("findbyname", $name);
                    $manga->setProducer($producer);
                } else {
                    return null;
                } 
            } else {
                $manga->setProducer($producer);
            }
            if ($this->repository->operation("insert", $manga)){
                return $manga;
            } else {
                return null;
            }
        }
        public function findByProducer($producer_search){
            $mangas = $this->repository->operation("findall");
            $mangas_by_producer = [];
            foreach ($mangas as $index => $manga){
                $producer = $manga->getProducer();
                if ($producer->getID() == $producer_search->getID()){
                    $mangas_by_producer[] = $manga;
                }
            }
            return $mangas_by_producer;
        }
        public function findByYear($year){
            $mangas = $this->repository->operation("findall");
            $mangas_by_year = [];
            foreach ($mangas as $index => $manga){
                if ($manga->getDate() != null){
                    $date = DateTime::createFromFormat("d/m/Y", $manga->getDate());
                    $year_manga = $date->format("Y");
                    if ($year_manga == $year){
                        $mangas_by_year[] = $manga;
                    }
                }
            }
            return $mangas_by_year;
        }
        public function findByCategory($category){
            $mangas = $this->repository->operation("findall");
            $mangas_by_category = [];
            foreach ($mangas as $index => $manga){
                for($i = 0; $i < sizeof($manga->getCategories()); $i++){
                    if ($manga->getCategories()[$i] == $category){
                        $mangas_by_category[] = $manga;
                        break;
                    }
                }
            }
            return $mangas_by_category;
        }
        public function update($manga){
            if ($this->repository->operation("update", $manga->getID(), $manga)){
                return $manga;
            } else {
                return null;
            }
        }
        public function delete($manga){
            if ($this->repository->operation("delete", $manga->getID(), $manga)){
                return $manga;
            } else {
                return null;
            }
        }
        public function getRepository() {
            return $this->repository;
        }
    
        public function setRepository($repository) {
            $this->repository = $repository;
        }
    }
    class EpisodeService{
        private EpisodeRepository $repository;
        public function __construct(){
            $this->repository = new EpisodeRepository();
        }
        public function insert($episode){
            if ($this->repository->operation("insert", $episode)){
                if ($episode->getNumber() == 0 || $episode->getNumber() == 1){
                    $anime_service = new AnimeService();
                    $anime = $episode->getAnime();
                    $anime->setDate($episode->getDate());
                    $anime_service->update($anime);
                }
                return $episode;
            } else {
                return null;
            }
        }

        public function findbyAnime($anime_searched){
            $episodes = $this->repository->operation("findall");
            usort($episodes, function($ep1, $ep2){
                if ($ep1->getNumber()== $ep2->getNumber())return 0;
                return $ep1->getNumber() > $ep2->getNumber()?1:-1;
            });
            $episodes_by_anime = [];
            foreach ($episodes as $index => $episode){
                $anime = $episode->getAnime();
                if ($anime->getID() == $anime_searched->getID()){
                    $episodes_by_anime[] = $episode;
                }
            }
            return $episodes_by_anime;
        }
        public function findNextEp($episode_actual){
            $episodes = $this->findbyAnime($episode_actual->getAnime());
            $next = null;
            foreach ($episodes as $index => $episode){
                if ($episode->getNumber() == $episode_actual->getNumber() + 1) {
                    $next = $episode;
                    break;
                }
            }
            return $next;
        }
        public function findPreviousEp($episode_actual){
            $episodes = $this->findbyAnime($episode_actual->getAnime());
            $previous = null;
            foreach ($episodes as $index => $episode){
                if ($episode->getNumber() == $episode_actual->getNumber() - 1) {
                    $previous = $episode;
                    break;
                }
            }
            return $previous;
        }
        public function update($episode){
            if ($this->repository->operation("update", $episode->getID(), $episode)){
                return $episode;
            } else {
                return null;
            }
        }
        public function delete($episode){
            if ($this->repository->operation("delete", $episode->getID())){
                return $episode;
            } else {
                return null;
            }
        }
        public function getRepository() {
            return $this->repository;
        }
    
        public function setRepository($repository) {
            $this->repository = $repository;
        }
    }
    class ChapterService{
        private ChapterRepository $repository;
        public function __construct(){
            $this->repository = new ChapterRepository();
        }
        public function insert($chapter){
            if ($this->repository->operation("insert", $chapter)){
                return $chapter;
            } else {
                return null;
            }
        }
        public function findbyManga($manga_searched){
            $chapters = $this->repository->operation("findall");
            $chapters_by_manga = [];
            foreach ($chapters as $index => $chapter){
                $manga = $chapter->getManga();
                if ($manga->getID() == $manga_searched->getID()){
                    $chapters_by_manga[] = $chapter;
                }
            }
            return $chapters_by_manga ;
        }
        public function findNextChap($chapter_actual){
            $chapters = $this->findbyManga($chapter_actual->getManga());
            $next = null;
            foreach ($chapters as $index => $chapter){
                if ($chapter->getNumber() == $chapter_actual->getNumber() + 1) {
                    $next = $chapter;
                    break;
                }
            }
            return $next;
        }
        public function findPreviousChap($chapter_actual){
            $chapters = $this->findbyManga($chapter_actual->getManga());
            $previous = null;
            foreach ($chapters as $index => $chapter){
                if ($chapter->getNumber() == $chapter_actual->getNumber() - 1) {
                    $previous = $chapter;
                    break;
                }
            }
            return $previous;
        }
        public function update($chapter){
            if ($this->repository->operation("update", $chapter->getID(), $chapter)){
                return $chapter;
            } else {
                return null;
            }
        }
        public function delete($chapter){
            if ($this->repository->operation("delete", $chapter->getID())){
                return $chapter;
            } else {
                return null;
            }
        }
        public function getRepository() {
            return $this->repository;
        }
    
        public function setRepository($repository) {
            $this->repository = $repository;
        }
    }
    class ProducerService{
        private ProducerRepository $repository;
        public function __construct(){
            $this->repository = new ProducerRepository();
        }
        public function insert($producer){
            if ($this->repository->operation("insert", $producer)){
                return $producer;
            } else {
                return null;
            }
        }
        public function update($producer){
            if ($this->repository->operation("update", $producer)){
                return $producer;
            } else {
                return null;
            }
        }
        public function delete($producer){
            if ($this->repository->operation("delete", $producer)){
                return $producer;
            } else {
                return null;
            }
        }
        public function getRepository() {
            return $this->repository;
        }
    
        public function setRepository($repository) {
            $this->repository = $repository;
        }
    }
?>