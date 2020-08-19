<?php

namespace App\Http\Controllers;

use WineStore\Request\PurchasesHistoricRequest;
use WineStore\Response\Historic;

class PurchasesHistoricController extends Controller
{
    private $purchasesHistoricRequest;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->purchasesHistoricRequest = new PurchasesHistoricRequest;
    }

    public function index()
    {
        $historic = $this->purchasesHistoricRequest->find();
        
        echo json_encode( $historic ) ;
    }

    public function findById(int $userId=null)
    {
        $historic = $this->purchasesHistoricRequest->find($userId);

        echo json_encode( $historic ) ;
    }

    public function recommend(int $userId=null)
    {
        $historic = new Historic();
        $data = $historic->recomendarVinho($userId);

        echo json_encode( $data );
    }
}
