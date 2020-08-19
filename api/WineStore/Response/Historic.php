<?php

namespace WineStore\Response;

use WineStore\Request\PurchasesHistoricRequest;
use WineStore\Request\CustomerRequest;

class Historic
{
    private $historicRequest;

    public function __construct(Array $data = [])
    {
        $this->historicRequest = new PurchasesHistoricRequest();
    }

    public function recomendarVinho($userId)
    {
        $historicResponse = $this->historicRequest->find($userId);
        // dd( $historicResponse );

        $wines = [];
        foreach ($historicResponse as $key => $value) {
            // dd( $value );
            $itens = $value['itens'];
            foreach ($itens as $key => $valueItens) {
                $wines[] = $valueItens;
            }
        }

        return $wines[ random_int(0, count($wines)-1) ];
    }
}