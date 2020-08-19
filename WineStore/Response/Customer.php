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

    public function getClienteComMaiorCompraUnicaNoUltimoAno2016()
    {
        $historic = new PurchasesHistoricRequest();
        $dataHistoric = $historic->find();

        $newCliente = [];
        $i = 0;
        foreach ($dataHistoric as $key => $valueHistoric) {
            // dd($valueHistoric['data']);

            if( strpos($valueHistoric['data'],'2016') > 0 ){
                $newCliente[$i]['cpf']        = $valueHistoric['cliente'];
                $newCliente[$i]['valorTotal'] = $valueHistoric['valorTotal'];
            }

            $i+=1;
        }

        uasort($newCliente, function($a, $b){
            return $a['valorTotal'] < $b['valorTotal'];
        });

        foreach ($newCliente as $key1 => $newClienteValue) {
            
            $cpf = $newClienteValue['cpf'];

            $count = 0;
            foreach ($newCliente as $keyC => $valueC) {
                
                if( $cpf == $valueC['cpf'] ){
                    $count+=1;
                }
            }

            if( $count > 1 ){
                unset($newCliente[$key1]);
            }
        }

        // dd( current($newCliente) );
        $biggestCustomer = current($newCliente);

        $customers = $this->customerRequest->find();
        $newCustomer = null;
        foreach ($customers as $key => $customer) {
            if( $biggestCustomer['cpf'] == $customer['cpf'] ){
                $newCustomer = $customer;
            }
        }
        // dd( $newCustomer );
        return $newCustomer;
    }

    public function getClientesOrdenadosPeloMaiorValorTotalEmCompras()
    {
        $historic = new PurchasesHistoricRequest();
        $dataHistoric = $historic->find();

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