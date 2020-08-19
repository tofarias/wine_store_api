<?php

namespace WineStore\Response;

use WineStore\Request\PurchasesHistoricRequest;
use WineStore\Request\CustomerRequest;

class Customer
{
    private $customerRequest;

    public function __construct(Array $data = [])
    {
        $this->customerRequest = new CustomerRequest();
    }

    public function listarClientesOrdenadosPeloMaiorValorTotalEmCompras()
    {
        $historic = new PurchasesHistoricRequest();
        $historicResponse = $historic->find();
        $dataHistoric = $historicResponse->json();

        uasort($dataHistoric, function($a, $b){
            return $a['valorTotal'] < $b['valorTotal'];
        });
        
        //

        $customers = $this->customerRequest->find();
        $newCustomers = [];
        foreach ($dataHistoric as $key => $valueHistoric) {
            
            foreach ($customers as $key => $customer) {
                if( $valueHistoric['cliente'] == $customer['cpf'] ){
                    $newCustomers[] = $customer;
                }
            }
        }

        return $newCustomers;
    }
}