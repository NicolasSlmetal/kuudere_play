<?php
    class AnimeBuilder{
        private int $id;
        private $name;
        private $producer;
        private $categories;
        private $url;
        private $eps;

        private $date;
        public function setName($name){
            $this->name = $name;
            return $this;
        }
        public function setProducer($producer){
            $this->producer = $producer;
            return $this;
        }
        public function setCategories($categories){
            $this->categories = $categories;
            return $this;
        }
        public function setURL($url){
            $this->url = $url;
            return $this;
        }
        public function setID($id){
            $this->id = $id;
        }
        public function setEps($eps){
            $this->eps = $eps;
            return $this;
        }
        public function setDate($date){
            $this->date = $date;
            return $this;
        }
        public function build(){
            return new Anime($this->name, $this->producer, $this->categories, $this->url, $this->eps, $this->id, $this->date);
        }
    }
    class MangaBuilder{
        private int $id;
        private $name;
        private $producer;
        private $categories;
        private $url;
        private $chapters;
        private $date;

        public function setName($name){
            $this->name = $name;
            return $this;
        }
        public function setProducer($producer){
            $this->producer = $producer;
            return $this;
        }
        public function setCategories($categories){
            $this->categories = $categories;
            return $this;
        }
        public function setURL($url){
            $this->url = $url;
            return $this;
        }
        public function setChapters($chapters){
            $this->chapters = $chapters;
            return $this;
        }
        public function setID($id){
            $this->id = $id;
        }
        public function setDate($date){ 
            $this->date = $date;
            return $this;
        }
        public function build(){
            return new Manga($this->name, $this->producer, $this->categories, $this->url, $this->chapters, $this->id, $this->date); 
        }
    }
    class EpisodeBuilder{
        private $name;
        private $id;
        private $number;
        private $url;
        private $date;
        private $anime;
        private $duration;
        private $filler;

        public function setName($name) {
            $this->name = $name;
        }
    
        public function setNumber($number) {
            $this->number = $number;
        }
    
        public function setUrl($url) {
            $this->url = $url;
        }
    
        public function setDate($date) {
            $this->date = $date;
        }
    
        public function setAnime($anime) {
            $this->anime = $anime;
        }
    
        public function setDuration($duration) {
            $this->duration = $duration;
        }
    
        public function setFiller($filler) {
            $this->filler = $filler;
        }
        public function setID($id){
            $this->id = $id;
        }

        public function build(){
            return new Episode($this->name, $this->number, $this->url, $this->date, $this->anime, $this->duration, $this->id, $this->filler);
        }

    }
    class ChapterBuilder{
        private $name;
        private $id;
        private $number;
        private $url;
        private $date;
        private $manga;
        private $pages;
        private $filler;

        public function setName($name) {
            $this->name = $name;
        }
    
        public function setNumber($number) {
            $this->number = $number;
        }
    
        public function setUrl($url) {
            $this->url = $url;
        }
    
        public function setDate($date) {
            $this->date = $date;
        }
    
        public function setManga($manga) {
            $this->manga = $manga;
        }
    
        public function setPages($pages) {
            $this->pages = $pages;
        }
    
        public function setFiller($filler) {
            $this->filler = (bool) $filler;
        }
        public function setID($id){
            $this->id = $id;
        }

        public function build(){
            return new Chapter($this->name, $this->number, $this->url, $this->date, $this->manga, $this->pages, $this->id, $this->filler);
        }
    }
    class ProducerBuilder{
        private $name;
        private int $id;
        public function setName($name){
            $this->name = $name;
            return $this;
        }
        public function setID($id){
            $this->id = $id;
            return $this;
        }
        public function build(){
            return new Producer($this->name, $this->id);
        }
    }
?>