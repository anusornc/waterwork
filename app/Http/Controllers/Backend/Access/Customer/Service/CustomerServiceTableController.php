<?php

namespace App\Http\Controllers\Backend\Access\Customer\Service;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Access\Customer\CustomerRepository;
//use App\Repositories\Backend\Access\Customer\Service\CustomerServiceRepository;
//use App\Http\Requests\Backend\Access\Customer\Service\ManageCustomerServiceRequest;

/**
 * Class CustomerServiceTableController.
 */
class CustomerServiceTableController extends Controller
{
    /**
     * @var CustomerServiceRepository
     */
    protected $customers;

    /**
     * @param CustomerServiceRepository $services
     */
    public function __construct(CustomerRepository $customers)
    {
        $this->customers = $customers;
    }

    /**
     * @param ManageCustomerServiceRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageCustomerServiceRequest $request)
    {
        return Datatables::of($this->customers->getForDataTable())
            ->escapeColumns(['meter_id','meter_init','install_house_id'])
            ->addColumn('address',function($customers) {
                return $customers->services->install_houseid.' '.$customers->services->install_tambon.' '.$customers->services->install_aumphur;
            })
            ->addColumn('actions', function ($customers) {
                return $customers->services->action_buttons;
            })
            ->make(true);
    }
}
