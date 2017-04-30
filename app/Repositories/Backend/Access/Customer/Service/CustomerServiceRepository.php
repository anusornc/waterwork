<?php

namespace App\Repositories\Backend\Access\Customer\Service;

use App\Models\Access\Customer\Service\CustomerService;

use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

use App\Events\Backend\Access\Customer\Service\CustomerServiceCreated;
use App\Events\Backend\Access\Customer\Service\CustomerServiceDeleted;
use App\Events\Backend\Access\Customer\Service\CustomerServiceUpdated;

/**
 * Class CustomerServiceRepository.
 */
class CustomerServiceRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = CustomerService::class;

    public function getForDataTable()
    {
        return $this->query()
            ->with('customers','status')            //method name from relationship
            ->select([
                'customer_services.id',
                'customer_services.meter_id',
                'customer_services.meter_init',
                'customer_services.service_date',
            ]);
    }

    public function create(array $input)
    {
        $c = $input['customer'];
        $input = $input['data'];


        DB::transaction(function () use ($input,$c) {
            $customerService = self::MODEL;
            $customerService = new $customerService();

            $customerService->customer_id = $c;
            $customerService->meter_id = $input['meter_id'];
            $customerService->meter_init = $input['meter_init'];
            $customerService->service_date = Carbon::createFromTimeStamp(strtotime($input['service_date']));
            $customerService->install_house_id = $input['install_house_id'];
            $customerService->install_tambon = $input['install_tambon'];
            $customerService->install_aumphur = $input['install_aumphur'];
            $customerService->status_id = $input['status_id'];

            try {
                if ($customerService->save()) {
                    event(new CustomerServiceCreated($customerService));
                    return true;
                } else {
                    throw new GeneralException(trans('exceptions.backend.access.customers.create_error'));
                }
            } catch(\Illuminate\Database\QueryException $ex){ 
                //dd($ex->getMessage()); 
                throw new GeneralException($ex->getMessage());
            }
        });
    }

    public function update(Model $customerService, array $input)
    {
            $c = $input['customer'];
            $input = $input['data'];
 
           // $customerService->customer_id = $input['customer_id'];
            $customerService->meter_id = $input['meter_id'];
            $customerService->meter_init = $input['meter_init'];
            $customerService->service_date = $input['service_date'];
            $customerService->install_house_id = $input['install_house_id'];
            $customerService->install_tambon = $input['install_tambon'];
            $customerService->install_aumphur = $input['install_aumphur'];
            $customerService->status_id = $input['status_id'];

            DB::transaction(function () use ($customerService, $input) {
                if ($customerService->save()) {
                    event(new CustomerServiceUpdated($customerService));
                    return true;
                }

                throw new GeneralException(trans('exceptions.backend.access.customers.update_error'));
            });
    }

    /*
        check service and debt in the system before delete
    */
    public function delete(Model $customerService)
    {
        DB::transaction(function () use ($customerService) {

            if ($customerService->delete()) {
                event(new CustomerServiceDeleted($customerService));
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.access.customers.delete_error'));
        });
    }

}
