<?php

namespace WineStore\Request;

use Illuminate\Support\Facades\Http;

class CustomerRequest extends Http
{
    private function sanitizeCpf($cpf)
    {
        $cpf = str_replace('-','.',$cpf);
        $cpf = str_pad($cpf,15,'0',STR_PAD_LEFT);

        return $cpf;
    }
    public function find($userId = null)
    {
        $response = Http::get('http://www.mocky.io/v2/598b16291100004705515ec5');
        
        if( $userId == null ){

            $customers = $response->json();
            
            foreach ($customers as $key => $value) {
                
                $customers[$key]['cpf'] = $this->sanitizeCpf( $value['cpf']);
            }

            return $customers;
        }else{
            $customers = $response->json();
            
            foreach ($customers as $customer) {

                if( $customer['id'] == $userId ){
                    
                    $customer['cpf'] = $this->sanitizeCpf( $customer['cpf']);
                    
                    return $customer;
                }
            }
        }
    }
}