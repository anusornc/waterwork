<?php

namespace App\Http\Controllers\Backend\Access\Customer\Service;

use App\Models\Access\Customer\Customer\Service;

use App\Repositories\Backend\Access\Customer\Service\CustomerServiceRepository;
use App\Repositories\Backend\Access\Customer\Service\StatusRepository;
use App\Repositories\Backend\Access\Customer\CustomerRepository;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Access\Customer\Service\ManageCustomerServiceRequest;
use App\Http\Requests\Backend\Access\Customer\Service\StoreCustomerServiceRequest;
use App\Http\Requests\Backend\Access\Customer\Service\UpdateCustomerServiceRequest;

/**
 * Class CustomerServiceController.
 */
class CustomerServiceController extends Controller
{
    /**
     * @var CustomerRepository
     */
    protected $services;
    protected $customers;
    protected $status;

    public function __construct(CustomerServiceRepository $services,CustomerRepository $customers,StatusRepository $status)
    {
        $this->services = $services;
        $this->customers = $customers;
        $this->status = $status;
    }

    public function index()
    {
        return view('backend.access.customers.services.index')
                ->withCustomers($this->customers->getAll());
    }

    /**
     * @param ManageCustomerRequest $request
     *
     * @return mixed
     */
    public function create()
    {
        return view('backend.access.customers.service.create')
            ->withCustomers($this->customers->getAll())
            ->withStatus($this->status->getAll()->pluck('name','id'));
    }

    /**
     * @param StoreCustomerServiceRequest $request
     *
     * @return mixed
     */
    public function store(StoreCustomerServiceRequest $request)
    {
        $this->services->create($request->all());

        return redirect()->route('admin.access.customer.service.index')->withFlashSuccess(trans('alerts.backend.customers.service.created'));
    }

    /**
     * @param Customer              $Customer
     * @param ManageCustomerRequest $request
     *
     * @return mixed
     */
    public function edit(CustomerService $customerService, ManageCustomerServiceRequest $request)
    {
        return view('backend.access.customers.service.edit')
            ->withCustomerService($customerService)
            ->withStatus($this->status->getAll()->pluck('name','id'));
    }

    public function update(CustomerService $customerService, UpdateCustomerServiceRequest $request)
    {
        $this->services->update($customerService, $request->all());

        return redirect()->route('admin.access.customer.index')->withFlashSuccess(trans('alerts.backend.customers.service.updated'));
    }

    public function destroy(CustomerService $customerService, ManageCustomerServiceRequest $request)
    {
        $this->services->delete($customerService);

        return redirect()->route('admin.access.customer.index')->withFlashSuccess(trans('alerts.backend.customers.service.deleted'));
    }
}
