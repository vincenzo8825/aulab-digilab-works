<?php



// Creare un Transazione con Dependency Injection (type hinting) e Object Composition 
// Specifiche:
// Crea una classe astratta Pagamento con:
// $importo
// Metodo astratto effettuaPagamento().
// Implementa tre classi figlie:
// PagamentoCartaCredito che simuli un pagamento con carta di credito.
// PagamentoPayPal che simuli un pagamento tramite PayPal.
// PagamentoContanti simuli un pagamento in contanti.
// Crea una classe Transazione che accetti un'istanza di Pagamento tramite dependency injection e fornisca un metodo esegui() che dica il tipo di pagamento utilizzato.


abstract class Pagamento
{
    public $importo;
    public function __construct($importo)
    {
        $this->importo = $importo;
    }
    abstract public function effettuaPagamento();
}
class PagamentoCartaDiCredito extends Pagamento
{
    public function effettuaPagamento()
    {
        return "pagamento di {$this->importo}con carta di credito";
    }
}
class PayPal extends Pagamento
{
    public function effettuaPagamento()

    {
        return "pagamento di {$this->importo}con PayPal";
    }
}
class PagamentoContanti extends Pagamento
{
    public function effettuaPagamento()

    {
        return "pagamento di {$this->importo}con contanti";
    }
}

class Transazione
{
    public Pagamento $metodoPagamento;
    public function __construct(Pagamento $metodoPagamento)
    {
        $this->metodoPagamento = $metodoPagamento;
    }

    public function esegui():void
    {
        echo $this->metodoPagamento->effettuaPagamento() ."\n";
    }
}



$pagamentoCarta = new PagamentoCartaDiCredito(10);
$transazione3 = new Transazione($pagamentoCarta);
$transazione3->esegui();


$pagamentoPayPal = new PayPal(10);
$transazione1 = new Transazione($pagamentoPayPal);
$transazione1->esegui();

$pagamentoContanti = new PagamentoContanti(10);
$transazione2 = new Transazione($pagamentoContanti);
$transazione2->esegui();
