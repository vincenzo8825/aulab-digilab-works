<?php

// ES1
// Riprodurre una concessionaria di automobili in OOP seguendo questa gerarchia di classi, con caratteristiche a scelta (Marchio, Modello, Numero porte, Prezzo….e altri a vostra scelta)
// Automobile
// -SUV
// -Utilitaria
// -Sportiva
// Tenere il conto degli oggetti (istanze) creati per ogni classe e creare un metodo, per ogni classe, che permetta di visualizzare le informazioni di ogni automobile




class Automobile {

private $marchio;
private $modello;
private $numeroPorte;
private $prezzo;
private static $counter=0;

public function __construct($marchio,$modello,$numeroPorte,$prezzo){

$this ->marchio= $marchio;
$this ->modello=$modello;
$this ->numeroPorte=$numeroPorte;
$this ->prezzo=$prezzo;
self::$counter++;



}
public static function getTotalAutomobili(){
    return self::$counter;
    
    
}

public function getDettagli(){
    return "Marchio: {$this->marchio},modello: {$this->modello},porte:{$this->numeroPorte},prezzo:{$this->prezzo}";

}



}

class SUV extends Automobile{
    private static $counter=0;
    public function __construct($marchio,$modello,$numeroPorte,$prezzo) {
       parent::__construct($marchio,$modello,$numeroPorte,$prezzo);
       self:: $counter++;
        

    }
    public static function getTotaleSuv(){
        return self ::$counter;
    }
}
$suv1=new SUV("Fiat","Fiat",5,10000);
$suv2=new SUV("BMW","2",5,10000);
$suv3=new SUV("BMW","2",5,10000);
// echo"totale Automobili:".Automobile::getTotalAutomobili();
echo $suv2->getDettagli();





















// ES2
// Riprodurre una libreria in OOP seguendo questa gerarchia di classi, con queste caratteristiche:

//     classe padre "Book" : titolo, autore, anno di pubblicazione
//     classe figlio "EBook": formato del libro (ad es: PDF, ePUb, HTML ...)
//     classe figlio "PrintBook": pagine libro (300, 400, 500)

// per ogni classe crea un metodo che permetta di stampare sul terminale le informazioni di ciascun oggetto (quindi di ogni libro); per le classi figlie, per EBook crea un metodo che permetta di verificare il formato del libro, (il formato corretto dovrà essere "pdf"), per PrintBook, crea un metodo che permetta di verificare il numero delle pagine dei libri (non deve superare le 400 pagine). crea degli attributi statici per ogni classe che conti tutti i libri 
