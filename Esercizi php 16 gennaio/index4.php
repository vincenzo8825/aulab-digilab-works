<?php




// interface Person{

//     public function  occhi();
//     public function capelli();
//     public function scarpe();



// }

//  abstract class Mario implements Person{

// public function occhi ()
// {
//      echo "mario ha gli occhi \n";
// }
// public function capelli ()
// {
//      echo "mario ha i capelli \n";
// }
// public function scarpe()
// {
//     echo "mario ha le scarpe \n";
// }
// }



interface Person{
    public function descrivi();
}
class Dettagli{
    private $occhi;
    private $capelli;
    private $scarpe;

    public function __construct($occhi,$capelli,$scarpe){
        $this-> occhi=$occhi;
        $this->capelli=$capelli;
        $this ->scarpe=$scarpe;

    }
    public function getOcchi(){

        return $this ->occhi;

    }
    public function getCapelli(){
        return $this ->capelli;
    }
    public function getScarpe(){
        return $this ->scarpe;
    }
}



class Gianni implements Person{
    private $dettagli;

public function __construct(dettagli $dettagli){
    $this ->dettagli=$dettagli;
}

public function descrivi()
{
    echo "Gianni ha gli occhi ".$this->dettagli->getOcchi();
    echo "Gianni ha i capelli ".$this->dettagli->getCapelli();
    echo "Gianni ha le scarpe ".$this->dettagli->getScarpe();
}

}
  class Mario implements Person {
    private $dettagli;

    public function __construct(Dettagli $dettagli) {
        $this->dettagli = $dettagli;
    }

    public function descrivi() {
        echo "Mario ha gli occhi " . $this->dettagli->getOcchi() . ", ";
        echo "i capelli " . $this->dettagli->getCapelli() . ", ";
        echo "e porta le scarpe di misura " . $this->dettagli->getScarpe() ;
    }
}

$dettagli = new dettagli("verdi","neri","38");
$gianni =new Gianni ($dettagli);
$gianni->descrivi();
$mario=new Mario($dettagli);
$mario->descrivi();