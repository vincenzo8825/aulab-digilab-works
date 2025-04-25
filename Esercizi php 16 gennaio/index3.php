<?php


// abstract class Olimpo{
//     public $caratteristiche;
//     public$name;


//     public function __construct($caratteristiche,$nome){

//         $this -> caratteristiche= $caratteristiche;
//         $this -> name= $nome;
//     }
//     abstract public function infoCaratteristiche();
// }

//  class  Dio extends Olimpo{
//     public function infoCaratteristiche()
//     {
//         // echo
//     }
//  }


// class Olimpo
// {
//     public $caratteristiche;
//     public $name;

//     public function __construct( $caratteristiche, $nome)
//     {


//         $this->caratteristiche = $caratteristiche;
//         $this->name = $nome;
//     }

// public function dio(){
//     $this -> caratteristiche-> infoCaratteristiche();
//     $this ->name -> infoCaratteristiche();
// }

// }

// print_r($dio);
// // $dio=new Olimpo();



abstract class ufficio{
    public $mq;
    public  function __($metriQuadrati){

        $this -> mq= $metriQuadrati;
    }

}
abstract class cucina{
    public $mq;
    public function __($metriQuadrati){
        $this -> mq =$metriQuadrati;

    }
}
class  casa{
    public $ufficio;
    public $cucina;

    public function __construct($cucina,$ufficio){
        $this ->cucina =$cucina;
        $this -> ufficio =-$ufficio;
}

}