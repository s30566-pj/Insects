<?php

namespace App\Model;

class Ticket
{
    private $id;
    private $title;
    private $description;
    private $status;
    private $assigned_to;

    public function __construct($id, $title, $description, $status, $assigned_to){
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->status = $status;
        $this->assigned_to = $assigned_to;
    }
    public function getId(){
        return $this->id;
    }
    public function getTitle(){
        return $this->title;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getStatus(){
        return $this->status;
    }
    public function getAssignedTo(){
        return $this->assigned_to;
    }
    public function setTitle($title){
        $this->title = $title;
    }
    public function setDescription($description){
        $this->description = $description;
    }
    public function setStatus($status){
        $this->status = $status;
    }
    public function setAssignedTo($assigned_to){
        $this->assigned_to = $assigned_to;
    }
}