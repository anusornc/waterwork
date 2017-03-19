<?php

namespace App\Http\Controllers\Backend\Access\Customer;

use App\Models\Access\Customer\Customer;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Access\Customer\CustomerRepository;
use App\Http\Requests\Backend\Access\Customer\ManageCustomerRequest;

/**
 * Class CustomerController.
 */
class CustomerController extends Controller
{
    /**
     * @var CustomerRepository
     */
    protected $customers;


    /**
     * @param CustomerRepository       $Customers
     */
    public function __construct(CustomerRepository $customers)
    {
        $this->customers = $customers;

    }

    public function index()
    {
        return view('backend.access.customers.index');
    }

    /**
     * @param ManageCustomerRequest $request
     *
     * @return mixed
     */
    public function create()
    {
        return view('backend.access.customers.create')
            ->withCustomerCount($this->customers->getCount());
    }

    /**
     * @param StoreCustomerRequest $request
     *
     * @return mixed
     */
    public function store()
    {

    }

    /**
     * @param Customer              $Customer
     * @param ManageCustomerRequest $request
     *
     * @return mixed
     */
    public function edit()
    {
        
    }

    /**
     * @param Customer              $Customer
     * @param UpdateCustomerRequest $request
     *
     * @return mixed
     */
    public function update()
    {
        
    }

    /**
     * @param Customer              $Customer
     * @param ManageCustomerRequest $request
     *
     * @return mixed
     */
    public function destroy()
    {

    }
}
