<?php

namespace WineStore\Request;

use Illuminate\Support\Facades\Http;

class CustomerRequest extends Http
{
    public function find($id = null)
    {
        $response = Http::get('http://www.mocky.io/v2/598b16291100004705515ec5');

        if( $id == null ){
            return $response;
        }else{
            $customers = $response->json();
            
            foreach ($customers as $customer) {

                if( $customer['id'] == $id ){
                    return $customer;
                }
            }
        }
    }
}