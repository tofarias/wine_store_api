<?php

namespace App\Http\Controllers;

use WineStore\Request\CustomerRequest;

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

        echo json_encode( $customers->json() ) ;
    }

    public function findById($userId=null)
    {
        $customer = $this->customerRequest->find($userId);

        echo json_encode( $customer->json() ) ;
    }
}
