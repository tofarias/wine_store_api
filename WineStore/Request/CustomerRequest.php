<?php

namespace WineStore\Request;

use Illuminate\Support\Facades\Http;

class CustomerRequest extends Http
{
    public function find($userId = null)
    {
        $response = Http::get('http://www.mocky.io/v2/598b16291100004705515ec5');
        
        if( $userId == null ){
            return $response->json();
        }else{
            $customers = $response->json();
            
            foreach ($customers as $customer) {

                if( $customer['id'] == $userId ){
                    
                    $customer['cpf'] = str_replace('-','.',$customer['cpf']);
                    $customer['cpf'] = str_pad($customer['cpf'],15,'0',STR_PAD_LEFT);
                    return $customer;
                }
            }
        }
    }
}