<?php

namespace App\Http\Requests\Backend\Access\Customer\Service;

use App\Http\Requests\Request;

/**
 * Class StoreCustomerServiceRequest.
 */
class StoreCustomerServiceRequest extends Request
{
    public function authorize()
    {
        return access()->allow('view-backend');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'meter_id'          => 'required',
            'meter_init'        => 'required',
            'install_house_id'  => 'required',
            'install_tambon'    => 'required',
            'install_aumphur'   => 'required',
            'status_id'         => 'required',
        ];
    }
}
