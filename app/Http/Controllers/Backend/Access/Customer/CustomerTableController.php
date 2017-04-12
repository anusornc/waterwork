<?php

namespace App\Http\Controllers\Backend\Access\Customer;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Access\Customer\CustomerRepository;
use App\Http\Requests\Backend\Access\Customer\ManageCustomerRequest;

/**
 * Class CustomerTableController.
 */
class CustomerTableController extends Controller
{
    /**
     * @var CustomerRepository
     */
    protected $customers;

    /**
     * @param CustomerRepository $customers
     */
    public function __construct(CustomerRepository $customers)
    {
        $this->customers = $customers;
    }

    /**
     * @param ManageCustomerRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageCustomerRequest $request)
    {
        return Datatables::of($this->customers->getForDataTable())
            ->escapeColumns(['citizen_id','firstname','lastname'])
            ->addColumn('service', function ($customer) {
                return $customer->services->count();
            })
            ->addColumn('actions', function ($customer) {
                return $customer->action_buttons;
            })
            ->make(true);
    }
}
