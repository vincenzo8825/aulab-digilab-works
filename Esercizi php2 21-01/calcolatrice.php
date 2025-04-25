<?php


// Crea una classe Calcolatrice che esegua un'operazione matematica. Crea classi
// per ogni singola operazione (addizione, sottrazione, moltiplicazione e divisione).

// (Suggerimento: potresti implementare anche un’interfaccia per eseguire il calcolo)



interface Operazione {
    public function calcola(...$numeri);
}

// Classe per addizione
class Addizione implements Operazione {
    public function calcola(...$numeri) {
        return array_sum($numeri);
    }
}

// Classe per sottrazione
class Sottrazione implements Operazione {
    public function calcola(...$numeri) {
        $risultato = array_shift($numeri); 
        foreach ($numeri as $numero) {
            $risultato -= $numero;
        }
        return $risultato;
    }
}

// Classe per moltiplicazione
class Moltiplicazione implements Operazione {
    public function calcola(...$numeri) {
        return array_product($numeri);
    }
}

// Classe per divisione
class Divisione implements Operazione {
    public function calcola(...$numeri) {
        $risultato = array_shift($numeri); 
        foreach ($numeri as $numero) {
            if ($numero == 0) {
                throw new Exception("Errore: divisione per zero.");
            }
            $risultato /= $numero;
        }
        return $risultato;
    }
}

// Classe principale Calcolatrice
class Calcolatrice {
    public function eseguiOperazione(Operazione $operazione, ...$numeri) {
        return $operazione->calcola(...$numeri);
    }
}

// Esempio di utilizzo
$calcolatrice = new Calcolatrice();

echo "Addizione: " . $calcolatrice->eseguiOperazione(new Addizione(), 10, 5, 3,2) . "\n";
echo "Sottrazione: " . $calcolatrice->eseguiOperazione(new Sottrazione(), 10, 5, 3) . "\n";
echo "Moltiplicazione: " . $calcolatrice->eseguiOperazione(new Moltiplicazione(), 10, 5, 3) . "\n";
echo "Divisione: " . $calcolatrice->eseguiOperazione(new Divisione(), 100, 5, 2) . "\n";

?>
