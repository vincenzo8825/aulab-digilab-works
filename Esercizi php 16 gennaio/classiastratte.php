<?php


 class Utenti{
private $credentials;
public function __construct(credentials$credentials){
    $this ->credentials=$credentials;
}
public function getCredenziali(){
    return $this ->credentials;
}

}


abstract class credentials {

private $email;
private $password;
private $nome;
private $cognome;
public function  __construct($email,$password,$nome,$cognome)
{
    $this-> email= $email;
    $this ->password=$password;
    $this ->nome=$nome;
    $this ->cognome=$cognome;
}
public function getMail(){
    return $this ->email;
}
public function getPassword(){
    return $this ->password;
}
public function getNome(){
    return $this -> nome;
}
public function getCognome(){
    return $this ->cognome;
}  
}


// $credentials=new credentials("dsdsdsa@.com","dsaddsds","Mario","Rossi");
// $utente =new Utente($credentials);
// echo "Email: " . $utente->getCredentials()->getMail() . "\n";
// echo "Password: " . $utente->getCredentials()->getPassword() . "\n";
// echo "nome". $utente->getCredentials()->getNome(). "\n";
// echo "Cognome".$utente->getCredentials()->getCognome(). "\n";

// $credentials2=new credentials("sdsadsddsds@.com","dsaddsds","Gianni","Gianni");
// $utente2 =new Utente($credentials2);
// echo "Email: " . $utente2->getCredentials()->getMail() . "\n";
// echo "Password: " . $utente2->getCredentials()->getPassword() . "\n";
// echo "nome". $utente2->getCredentials()->getNome() . "\n";
// echo "Cognome".$utente2->getCredentials()->getCognome(). "\n";







