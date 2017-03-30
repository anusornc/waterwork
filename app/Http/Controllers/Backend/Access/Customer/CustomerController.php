<?php

namespace App\Http\Controllers\Backend\Access\Customer;

use App\Models\Access\Customer\Customer;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Access\Customer\CustomerRepository;
use App\Repositories\Backend\Access\Customer\CustomerTypeRepository;
use App\Http\Requests\Backend\Access\Customer\ManageCustomerRequest;
use App\Http\Requests\Backend\Access\Customer\StoreCustomerRequest;
use App\Http\Requests\Backend\Access\Customer\UpdateCustomerRequest;

/**
 * Class CustomerController.
 */
class CustomerController extends Controller
{
    /**
     * @var CustomerRepository
     */
    protected $customers;
    protected $types;

    /**
     * @param CustomerRepository       $Customers
     */
    public function __construct(CustomerRepository $customers,CustomerTypeRepository $types)
    {
        $this->customers = $customers;
        $this->types = $types;
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
            ->withCustomerCount($this->customers->getCount())
            ->withTypes($this->types->getAll()->pluck('name','id'));
    }

    /**
     * @param StoreCustomerRequest $request
     *
     * @return mixed
     */
    public function store(StoreCustomerRequest $request)
    {
        $this->customers->create($request->all());

        return redirect()->route('admin.access.customer.index')->withFlashSuccess(trans('alerts.backend.customers.created'));
    }

    /**
     * @param Customer              $Customer
     * @param ManageCustomerRequest $request
     *
     * @return mixed
     */
    public function edit(Customer $customer, ManageCustomerRequest $request)
    {
        return view('backend.access.customers.edit')
            ->withCustomer($customer)
            ->withTypes($this->types->getAll()->pluck('name','id'));
    }

    /**
     * @param Customer              $Customer
     * @param UpdateCustomerRequest $request
     *
     * @return mixed
     */
    public function update(Customer $customer, UpdateCustomerRequest $request)
    {
        $this->customers->update($customer, $request->all());

        return redirect()->route('admin.access.customer.index')->withFlashSuccess(trans('alerts.backend.customers.updated'));
    }

    /**
     * @param Customer              $Customer
     * @param ManageCustomerRequest $request
     *
     * @return mixed
     */
    public function destroy(Customer $customer, ManageCustomerRequest $request)
    {
        $this->customers->delete($customer);

        return redirect()->route('admin.access.customer.index')->withFlashSuccess(trans('alerts.backend.customers.deleted'));
    }
}
