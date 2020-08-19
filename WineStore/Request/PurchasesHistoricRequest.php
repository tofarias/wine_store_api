<?php

namespace WineStore\Request;

use Illuminate\Support\Facades\Http;

class PurchasesHistoricRequest extends Http
{
    public function find($userId = null)
    {
        $historicResponse = Http::get('http://www.mocky.io/v2/598b16861100004905515ec7');
        
        if( $userId == null ){
            return $historicResponse;
        }else{
            $customerRequest = $customerRequest = new CustomerRequest();
            $customerResponse = $customerRequest->find($userId);
            
            $historicResponseJson = $historicResponse->json();
            
            $response = [];
            foreach ($historicResponseJson as $key => $historicJson) {
                
                if( $historicJson['cliente'] == $customerResponse['cpf'] ){
                    $response[] = $historicJson;
                }
            }

            return $response;
        }
    }
}