<?php

namespace App\Http\Controllers;

use WineStore\Request\PurchasesHistoricRequest;

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
        $customers = $this->purchasesHistoricRequest->find();

        echo json_encode( $customers ) ;
    }

    public function findById($userId=null)
    {
        $customer = $this->purchasesHistoricRequest->find($userId);

        echo json_encode( $customer ) ;
    }
}
