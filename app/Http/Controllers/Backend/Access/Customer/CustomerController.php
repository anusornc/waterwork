<?php

namespace App\Http\Controllers\Backend\Access\Customer;

use App\Models\Access\Customer\Customer;
use App\Models\Access\Customer\Service\CustomerService;
use App\Models\Access\Customer\Service\ServiceStatus;
use App\Http\Controllers\Controller;

use App\Repositories\Backend\Access\Customer\CustomerRepository;
use App\Repositories\Backend\Access\Customer\Service\CustomerServiceRepository;
use App\Repositories\Backend\Access\Customer\Service\ServiceStatusRepository;
use App\Repositories\Backend\Access\Customer\CustomerTypeRepository;

use App\Http\Requests\Backend\Access\Customer\ManageCustomerRequest;
use App\Http\Requests\Backend\Access\Customer\Service\ManageCustomerServiceRequest;
use App\Http\Requests\Backend\Access\Customer\Service\StoreCustomerServiceRequest;
use App\Http\Requests\Backend\Access\Customer\Service\UpdateCustomerServiceRequest;
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
    protected $services;
    protected $status;


    public function __construct(CustomerRepository $customers,CustomerTypeRepository $types,CustomerServiceRepository $services,ServiceStatusRepository $status)
    {
        $this->customers = $customers;
        $this->types = $types;
        $this->services = $services;
        $this->status = $status;
    }

    public function index(ManageCustomerRequest $request)
    {
        return view('backend.access.customers.index');
    }

    public function create(CustomerService $service,ManageCustomerRequest $request)
    {
        return view('backend.access.customers.create')
            ->withServiceCount($this->services->getCount())
            ->withTypes($this->types->getAll()->pluck('name','id'));
    }

    public function store(StoreCustomerRequest $request)
    {
        $this->customers->create($request->all());
        return redirect()->route('admin.access.customer.index')->withFlashSuccess(trans('alerts.backend.customers.created'));
    }


    public function edit(Customer $customer, ManageCustomerRequest $request)
    {
        return view('backend.access.customers.edit')
            ->withCustomer($customer)
            ->withTypes($this->types->getAll()->pluck('name','id'));
    }

    public function update(Customer $customer, UpdateCustomerRequest $request)
    {
        $this->customers->update($customer, $request->all());
        return redirect()->route('admin.access.customer.index')->withFlashSuccess(trans('alerts.backend.customers.updated'));
    }

    public function destroy(Customer $customer, ManageCustomerRequest $request)
    {
        $this->customers->delete($customer);
        return redirect()->route('admin.access.customer.index')->withFlashSuccess(trans('alerts.backend.customers.deleted'));
    }


    public function serviceCreate(Customer $customer,ManageCustomerServiceRequest $request)
    {
        return view('backend.access.customers.services.create')
            ->withCustomer($customer)
            ->withServiceCount($this->services->getCount())
            ->withServiceStatus($this->status->getAll()->pluck('name','id'));
    }

    public function serviceList(Customer $customer, CustomerService $service,ManageCustomerServiceRequest $request) {
        return view('backend.access.customers.services.show')
                ->withCustomer($customer)
                ->withService($service);
    }

    public function serviceEdit(Customer $customer, CustomerService $service, ManageCustomerServiceRequest $request) {
        return view('backend.access.customers.services.edit')
                ->withCustomer($customer)
                ->withService($service)
                ->withServiceStatus($this->status->getAll()->pluck('name','id'));

    }

    public function serviceDestroy(Customer $customer, CustomerService $service, ManageCustomerServiceRequest $request) {
        $this->services->delete($service);
        return redirect()->route('admin.access.customer.service.list',$customer->id)->withFlashSuccess(trans('alerts.backend.customers.services.deleted'));
    }

    public function serviceUpdate(Customer $customer, CustomerService $service, UpdateCustomerServiceRequest $request) {
         $this->services->update($service,['data'=>$request->all(),'customer'=>$customer->id]);

        return redirect()->route('admin.access.customer.service.list',$customer->id)->withFlashSuccess(trans('alerts.backend.customers.services.updated'));
    }

    public function serviceStore(Customer $customer,StoreCustomerServiceRequest $request)
    {
        //dd($request->all());
        $this->services->create(['data'=>$request->all(),'customer'=>$customer->id]);
        return redirect()->route('admin.access.customer.service.list',$customer->id)->withFlashSuccess(trans('alerts.backend.customers.services.created'));
    }
}
