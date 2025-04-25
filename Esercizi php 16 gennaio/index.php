<?php


abstract class Interno{
    public $mq;
   
    public function __construct($metriQuadrati)
    {
     $this->mq = $metriQuadrati;
    }
   
    abstract public function infoInterno();
   }
   
   
   abstract class Esterno{
    public $mq;
   
    public function __construct($metriQuadrati)
    {
     $this->mq = $metriQuadrati;
    }
   
    abstract public function infoEsterno();
   }
   
   // classi figlie zona interna 
   class Soggiorno extends Interno{
    public function infoInterno()
    {
     echo "metri quadrati del soggiorno: $this->mq \n";
    }
   }
   
   class Ufficio extends Interno{
    public function infoInterno()
    { 
     echo "metri quadrati dell'ufficio: $this->mq \n";
    }
   }
   
   // classi che estendono zona esterna
   
   class Piscina extends Esterno{
    public function infoEsterno(){
     echo "metri quadrati zona esterna piscina: $this->mq \n";
    }
   }
   
   
   class Veranda extends Esterno{
    public function infoEsterno(){
     echo "metri quadrati zona esterna veranda: $this->mq \n";
    }
   }
   
   
   // tinyHouse
   
   class TinyHouse{
    public $interior;
    public $outdoor;
   
    public static $mqTinyhouse = 60;
   
    public function __construct(Interno $interno, Esterno $esterno) //type hinting
    {
     $this->interior = $interno;
     $this->outdoor = $esterno;
    }
   
    public function mqInterni(){
     $this->interior->infoInterno();
     //fluent interface
    }
   
    public function mqEsterni(){
     $this->outdoor->infoEsterno();
    }
   
    public function totaleMq(){
     echo "totale mq della tiny house: " . self::$mqTinyhouse + $this->interior->mq + $this->outdoor->mq . "\n";
    }
   }
   
   
   //object composition
   $home1 = new TinyHouse(new Soggiorno(40), new Piscina(30));
   
   // print_r($home1);
   // $home1->mqInterni();
   // $home1->mqEsterni();
   
   $home2 = new TinyHouse(new Ufficio(20), new Veranda(10));
   $home2->mqInterni();
   $home2->mqEsterni();
   $home2->totaleMq();