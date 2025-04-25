<?php

// Creare un Computer con Dependency Injection (type hinting) e Object Composition utilizzando le classi astratte, composto da 
// RAM
// ROM
// Scheda Video
// Creare dei metodi che stampino sul terminale le informazioni di ogni componente






abstract class Componente{
    public $marca;
    public $modello;
    public function __construct($marca,$modello)
    {
        $this -> marca =$marca;
        $this -> modello = $modello;

    }
    abstract public function ottieniInfo();
}



class Ram extends Componente{
    public $memoria;
    public function __construct($marca,$modello,$memoria)
    {
        parent::__construct($marca, $modello, $memoria);
        $this ->memoria= $memoria;
        
    }
    public function ottieniInfo()
    {
        return "Ram {$this -> marca}{$this ->modello} {$this -> memoria}";
    }


}
    class Rom extends Componente{
        public $memoria;
        public $tipo;
        public function __construct($marca,$modello,$memoria,$tipo)
        {
            parent::__construct($marca, $modello, $memoria);
            $this ->memoria= $memoria;
            $this ->tipo =$tipo;
            
        }
        public function ottieniInfo()
        {
            return "Rom {$this -> marca}{$this ->modello} {$this -> memoria} {$this -> tipo}";
        }
          
    }

    class SchedaVideo extends Componente{


        public $memoria;
        public function __construct($marca,$modello,$memoria)
        {
            parent :: __construct($marca,$modello);
            $this -> memoria = $memoria;
        }
        public function ottieniInfo()
        {
            return "SchedaVideo {$this->marca}{$this->modello}{$this->memoria}";
        }
    }


    class Computer{
         public Ram $ram;
         public Rom $rom;
         public SchedaVideo $schedaVideo;


         public function __construct(Ram $ram,Rom $rom,SchedaVideo $schedaVideo)
         {
            $this ->ram = $ram;
            $this ->rom= $rom;
            $this  ->schedaVideo=$schedaVideo;
         }
         public function ottieniInfo(){
            echo $this ->ram -> ottieniInfo()."\n";
            echo $this ->rom -> ottieniInfo()."\n";
            echo $this ->schedaVideo -> ottieniInfo()."\n";


         }
    }


    $ram=new Ram("hp", "asus",16);
    $rom=new Rom("hp", "asus",16,"ciaociao");
    $schedaVideo=new SchedaVideo("hp", "asus",16);
    $Computer= new Computer($ram,$rom,$schedaVideo);
    $Computer->ottieniInfo();

    