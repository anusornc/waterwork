<?php

namespace App\Repositories\Backend\Access\Customer;

use App\Models\Access\Customer\Customer;
use App\Models\Access\Customer\Service\CustomerService;

use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Access\Customer\CustomerCreated;
use App\Events\Backend\Access\Customer\CustomerDeleted;
use App\Events\Backend\Access\Customer\CustomerUpdated;

/**
 * Class CustomerRepository.
 */
class CustomerRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Customer::class;

    public function getForDataTable()
    {
        return $this->query()
            ->select([
                'customers.id',
                'customers.citizen_id',
                'customers.firstname',
                'customers.lastname',
            ]);
    }

    public function create(array $input)
    {
        
        DB::transaction(function () use ($input) {
            $customer = self::MODEL;
            $customer = new $customer();

            $customer->citizen_id = $input['citizen_id'];
            $customer->type_id = $input['type_id'];
            $customer->title = $input['title'];
            $customer->firstname = $input['firstname'];
            $customer->lastname = $input['lastname'];
            $customer->house_id = $input['house_id'];
            $customer->tambon = $input['tambon'];
            $customer->aumphur = $input['aumphur'];
            $customer->province = $input['province'];
            $customer->occupation = $input['occupation'];
            $customer->email = $input['email'];
            $customer->workplace = $input['workplace'];
            
            

            if ($customer->save()) {
                event(new CustomerCreated($customer));
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.access.customers.create_error'));
        });
    }

    public function update(Model $customer, array $input)
    {

            $customer->citizen_id = $input['citizen_id'];
            $customer->type_id = $input['type_id'];
            $customer->title = $input['title'];
            $customer->firstname = $input['firstname'];
            $customer->lastname = $input['lastname'];
            $customer->house_id = $input['house_id'];
            $customer->tambon = $input['tambon'];
            $customer->aumphur = $input['aumphur'];
            $customer->province = $input['province'];
            $customer->occupation = $input['occupation'];
            $customer->email = $input['email'];
            $customer->workplace = $input['workplace'];

        DB::transaction(function () use ($customer, $input) {
            if ($customer->save()) {
                event(new CustomerUpdated($customer));
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.access.customers.update_error'));
        });
    }

    public function delete(Model $customer)
    {
        

        //Don't delete the role is there are users associated
       /* if ($customer->users()->count() > 0) {
            throw new GeneralException(trans('exceptions.backend.access.roles.has_users'));
        }*/

        DB::transaction(function () use ($customer) {

            if ($customer->delete()) {
                event(new CustomerDeleted($customer));
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.access.customers.delete_error'));
        });
    }

    public function createService(Customer $customer,array $input)
    {
        
        DB::transaction(function () use ($input) {
            $customer = self::MODEL;
            $customer = new $customer();
           
            $customer->services->customer_id = $customer->id;
            $customer->services->meter_id = $input['meter_id'];
            $customer->services->meter_init = $input['meter_init'];
            $customer->services->service_date = $input['service_date'];
            $customer->services->install_house_id = $input['install_house_id'];
            $customer->services->install_tambon= $input['install_tambon'];
            $customer->services->install_aumphur= $input['install_aumphur'];
            $customer->services->status_id = $input['status_id'];

            if ($customer->save()) {
                //event(new CustomerServiceCreated($customer));
                return true;
            } 
            return true;

            throw new GeneralException(trans('exceptions.backend.access.customers.services.create_error'));
        });
    }
}
