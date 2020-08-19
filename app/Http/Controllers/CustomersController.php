<?php

namespace App\Http\Controllers;

use WineStore\Request\CustomerRequest;
use WineStore\Response\Customer;

class CustomersController extends Controller
{
    private $customerRequest;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->customerRequest = new CustomerRequest;
    }

    public function index()
    {
        $customers = $this->customerRequest->find();

        echo json_encode( $customers );
    }

    public function findById(int $userId=null)
    {
        $customer = $this->customerRequest->find($userId);

        echo json_encode( $customer ) ;
    }

    public function getByMaxTotalValue()
    {
        $customer = new Customer();
        $data = $customer->listarClientesOrdenadosPeloMaiorValorTotalEmCompras();

        echo json_encode( $data );
    }
}
