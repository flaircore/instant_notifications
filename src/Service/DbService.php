<?php


namespace Drupal\instant_notifications\Service;


use Drupal\Core\Database\Database;
use Drupal\Core\Entity\EntityTypeManagerInterface;

class DbService{

    protected $database;

    protected $entityManager;

    public function setDatabase(Database $database){
        $this->database = $database;// for raw queries
    }

    public function setEntity(EntityTypeManagerInterface $entityTypeManager){
        $this->entityManager = $entityTypeManager;
    }

}