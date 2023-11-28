<?php
    class Title{

        private $id;
        private $name;
        private $producer;
        private $categories;
        private $url;
        private $date;
        

        public function __construct($name, $producer, $categories, $url, $id = null, $date = null) {
            $this->name = $name;
            $this->producer = $producer;
            $this->categories = $categories;
            $this->url = $url;
            $this->id = $id;
            $this->date = $date;
        }

        public function getName(){
            return $this->name;
        }
        public function getProducer(){
            return $this->producer;
        }
        public function getCategories(){
            return $this->categories;
        }
        public function getURL(){
            return $this->url;
        }
        public function getID(){
            return $this->id;
        }
        public function getDate(){
            return $this->date;   
        }

        public function setName($name){
            $this->name = $name;
        }
        public function setProducer($producer){
            $this->producer = $producer;
        }
        public function setCategories($categories){
            $this->categories = $categories;
        }
        public function setURL($url){
            $this->url = $url;
        }
        public function setID($id){
            $this->id = $id;
        }
        public function setDate($date){
            $this->date = $date;
        }
    }

    class Anime extends Title{
        private $eps;

        public function __construct($name, $producer, $categories, $url, $eps, $id = null, $date = null) {
            parent::__construct($name, $producer, $categories, $url, $id, $date);
            $this->eps = $eps;
        }

        public function getEps(){
            return $this->eps;
        }
        public function setEps($eps){
            $this->eps = $eps;
        }
    }
    class Manga extends Title{
        private $chapters;

        public function __construct($name, $producer, $categories, $url, $chapters, $id = null, $date = null) {
            parent::__construct($name, $producer, $categories, $url, $id, $date);
            $this->chapters = $chapters;
        }

        public function getChapters(){
            return $this->chapters;
        }
        public function setChapters($chapters){
            $this->chapters = $chapters;
        }
    }

    class Content{
        private $id;
        private $name;
        private $number;
        private $url;

        private $filler;

        private DateTime $date;

        public function __construct($name, $number, $url, $date, $id = null, $filler = false){
            $this->id = $id;
            $this->name = $name;
            $this->number = $number;
            $this->url = $url;
            $this->date = $date;
            $this->filler = $filler;
        }

        public function getName(){
            return $this->name;
        }
        public function getNumber(){
            return $this->number;
        }
        public function getURL(){
            return $this->url;
        }
        public function getDate(){
            return $this->date;
        }
        public function getID(){
            return $this->id;
        }
        public function setName($name){
            $this->name = $name;
        }
        public function setNumber($number){
            $this->number = $number;
        }
        public function setURL($url){
            $this->url = $url;
        }
        public function setDate($date){
            $this->date = $date;
        }
        public function setID($id){
            $this->id = $id;
        }
        public function isFiller(){
            return $this->filler;
        }
        public function setFiller($filler){
            $this->filler = $filler;
        }
    }

    class Episode extends Content{
        private Anime $anime;

        private float $duration;

        public function __construct($name, $number, $url, $date, $anime, $duration, $id = null, $filler = false){
            parent::__construct($name, $number, $url, $date, $id, $filler);
            $this->anime = $anime;
            $this->duration = $duration;
        }
        public function getAnime(){
            return $this->anime;
        }
        public function getDuration(){
            return $this->duration;
        }
        public function setAnime($anime){
            $this->anime = $anime;
        }
        public function setDuration($duration){
            $this->duration = $duration;
        }
    }
    class Chapter extends Content{
        private Manga $manga;
        private $pages;

        public function __construct($name, $number, $url, $date, $manga, $pages, $id = null, $filler = false){
            parent::__construct($name, $number, $url, $date, $id, $filler);
            $this->manga = $manga;
            $this->pages = $pages;
        }
        public function getManga(){
            return $this->manga;
        }
        public function getPages(){
            return $this->pages;
        }
        public function setManga($manga){
            $this->manga = $manga;
        }
        public function setPages($pages){
            $this->pages = $pages;
        }
    }

    class Producer{

        private $name;
        private $id;

        public function __construct($name, $id = null){
            $this->name = $name;
            $this->id = $id;
        }
        public function getName(){
            return $this->name;
        }
        public function getID(){
            return $this->id;
        }
        public function setName($name){
            $this->name = $name;
        }
        public function setID($id){
            $this->id = $id;
        }
    }
        
?>