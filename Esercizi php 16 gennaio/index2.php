
<?php

// Creare un Computer con Dependency Injection (type hinting) e Object Composition utilizzando le classi astratte, composto da: 
// RAM
// ROM
// Scheda Video
// Creare dei metodi che stampino sul terminale le informazioni di ogni componente
 


// Interfaccia Computer
interface Computer {
    public function uso(): string;
}

// Classe astratta Componente
abstract class Componente {
    public $nome;

    public function __construct(string $nome) {
        $this->nome = $nome;
    }

    // Metodo per stampare le informazioni di ogni componente
    public function mostraInfo(): string {
        return "Componente: " . $this->nome;
    }
}

// Classe RAM
class RAM extends Componente {
    public $capacita;

    public function __construct(string $nome, string $capacita) {
        parent::__construct($nome);
        $this->capacita = $capacita;
    }

    // Sovrascrittura del metodo mostraInfo
    public function mostraInfo(): string {
        return parent::mostraInfo() . ", Capacità: " . $this->capacita;
    }
}

// Classe ROM
class ROM extends Componente {
    public $capacita;

    public function __construct(string $nome, string $capacita) {
        parent::__construct($nome);
        $this->capacita = $capacita;
    }

    // Sovrascrittura del metodo mostraInfo
    public function mostraInfo(): string {
        return parent::mostraInfo() . ", Capacità: " . $this->capacita;
    }
}

// Classe Scheda Video
class SchedaVideo extends Componente {
    public $marca;

    public function __construct(string $nome, string $marca) {
        parent::__construct($nome);
        $this->marca = $marca;
    }

    // Sovrascrittura del metodo mostraInfo
    public function mostraInfo(): string {
        return parent::mostraInfo() . ", Marca: " . $this->marca;
    }
}

// Classe Computer che utilizza Dependency Injection
class ComputerDesktop implements Computer {
    public $ram;
    public $rom;
    public $schedaVideo;

    // Dipendenze iniettate tramite il costruttore
    public function __construct(RAM $ram, ROM $rom, SchedaVideo $schedaVideo) {
        $this->ram = $ram;
        $this->rom = $rom;
        $this->schedaVideo = $schedaVideo;
    }

    // Metodo uso che restituisce informazioni sui componenti
    public function uso(): string {
        return $this->ram->mostraInfo() . PHP_EOL . 
               $this->rom->mostraInfo() . PHP_EOL . 
               $this->schedaVideo->mostraInfo();
    }
}

// Creazione dei componenti tramite Dependency Injection
$ram = new RAM("Corsair Vengeance", "16GB");
$rom = new ROM("Samsung EVO", "1TB");
$schedaVideo = new SchedaVideo("NVIDIA RTX 3080", "NVIDIA");

// Creazione del computer con i componenti iniettati
$computer = new ComputerDesktop($ram, $rom, $schedaVideo);

// Stampa delle informazioni del computer
echo $computer->uso();

?>
