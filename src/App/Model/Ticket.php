<?php

namespace App\Model;

class Ticket
{
    private $id;
    private $organizationId;
    private $title;
    private $description;
    private $status;
    private $reportedBy;
    private $resolvedAt;
    private $assigned_to;

    public function __construct($id, $organizationId, $title, $description, $status, $reportedBy, $resolvedAt, $assigned_to){
        $this->id = $id;
        $this->organizationId = $organizationId;
        $this->title = $title;
        $this->description = $description;
        $this->status = $status;
        $this->reportedBy = $reportedBy;
        $this->resolvedAt = $resolvedAt;
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
    public function getResolvedAt(){
        return $this->resolvedAt;
    }
    public function getReportedBy(){
        return $this->reportedBy;
    }
    public function getOrganizationId(){}
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
    public function setResolvedAt($resolvedAt){
        $this->resolvedAt = $resolvedAt;
    }
    public function setReportedBy($reportedBy){
        $this->reportedBy = $reportedBy;
    }
}