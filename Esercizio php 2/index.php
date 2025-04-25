<?php
// Traccia 2


// Partendo da questo array

$garage = [
    ["brand" => "Toyota", "model" => "Corolla"],
    ["brand" => "Ford", "model" => "Mustang"],
    ["brand" => "Toyota", "model" => "Yaris"],
    ["brand" => "BMW", "model" => "X5"],
    ["brand" => "Ford", "model" => "Focus"]
];

// Scrivi una funzione che permetta di filtrare attraverso il brand delle auto i modelli che appartengono ad esso e che ritorni un nuovo array contenente solo i modelli che appartengono a quel brand.
// Usa un metodo di PHP come array_filter() o il metodo array_push().

function filtroPerBrand($garage, $brand) {
    
    $filtroAuto = array_filter($garage, function($car) use ($brand) {
        return $car["brand"] === $brand;
    });

    $modelliBrand = [];
    foreach ($filtroAuto as $car) {
        array_push($modelliBrand, $car["model"]);
    }

    return $modelliBrand;
}

$brand = "BMW";
$modelli = filtroPerBrand($garage, $brand);

print_r($modelli)


















?>  
