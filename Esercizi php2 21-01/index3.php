<?php





// Crea un array associativo in cui sono riportati i voti di 5 studenti in una materia.


// esempio

// Scrivi una funzione che calcoli la media dei voti e stampa un messaggio che dica
// chi ha ottenuto il voto più alto.

// suggerimento (utilizza la documentazione di php e il metodo array_search() e
// max())


$voti = [ 

 "Alessandro" => 8,

 "Beatrice" => 7,

 "Carlo" => 9,

 "Diana" => 6,

 "Elisa" => 10

 ];

$sommavoti=array_sum($voti);
$persone= count($voti);
$votoPiuAlto= max($voti);

$media= $sommavoti/$persone;
$nome= array_search($votoPiuAlto,$voti)
;
echo " $nome ha il voto piu alto : $votoPiuAlto"."\n";
echo "la media dei voti è ".($media);