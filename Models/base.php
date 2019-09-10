<?php 
  class Base {
    public $db;

    function __construct() {
      $this -> db = new PDO("mysql:host=localhost;dbname=bdproject;charset=utf8mb4", "root", "");
    }

    // public function get(){
    //     $query = $this->db->prepare("
    //     SELECT id
    //     FROM teste");
    //     $query->execute();
    //     $teste = $query->fetchAll(PDO:: FETCH_ASSOC);
    //     echo "<pre>";
    //     var_dump($teste);
    //     print_r($teste);
    //     return $teste;
    // }

  }

//   $oi = new Base();
//   $oi ->get();
?>