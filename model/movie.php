<?php

class Movie{
    private $id;
    private $name;
    private $description;
    private $thumbnail;
    private $genre;
    private $director;
    private $actors;
    private $release_year;
    private $movie_link;

    function __construct($id,$name,$description,$thumbnail,$genre,$director,$actors,$release_year,$movie_link){
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->thumbnail = $thumbnail;
        $this->genre = $genre;
        $this->director = $director;
        $this->actors = $actors;
        $this->release_year = $release_year;
        $this->movie_link = $movie_link;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }
    public function getId(){
        return $this->id;
    }

    public function setName($name){
        $this->name = $name;
        return $this;
    }
    public function getName(){
        return $this->name;
    }

    public function setDescription($description){
        $this->description = $description;
        return $this;
    }
    public function getDescription(){
        return $this->description;
    }

    public function setThumbnail($thumbnail){
        $this->thumbnail = $thumbnail;
        return $this;
    }
    public function getThumbnail(){
        return $this->thumbnail;
    }

    public function setGenre($genre){
        $this->genre = $genre;
        return $this;
    }
    public function getGenre(){
        return $this->genre;
    }

    public function setDirector($director){
        $this->director = $director;
        return $this;
    }
    public function getDirector(){
        return $this->director;
    }

    public function setActors($actors){
        $this->actors = $actors;
        return $this;
    }
    public function getActors(){
        return $this->actors;
    }

    public function setRelease_year($release_year){
        $this->release_year = $release_year;
        return $this;
    }
    public function getRelease_year(){
        return $this->release_year;
    }

    public function setMovie_link($movie_link){
        $this->movie_link = $movie_link;
        return $this;
    }
    public function getMovie_link(){
        return $this->movie_link;
    }

}