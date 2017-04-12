<table class="table table-striped table-hover">
    <tr>
        <th>{{ trans('labels.backend.access.customers.table.citizen') }}</th>
        <td>{{ $customer->citizen_id }}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.access.customers.table.firstname') }}</th>
        <td>{{ $customer->firstname.'-'.$customer->lastname }}</td>
    </tr>
</table>


<table id="customers.services-table" class="table table-striped table-hover">
     <thead>
            <tr>
                <th>{{ trans('labels.backend.access.customers.services.table.meterid') }}</th>
                <th>{{ trans('labels.backend.access.customers.services.table.meterinit') }}</th>
                <th>{{ trans('labels.backend.access.customers.services.table.address') }}</th>
                <th>{{ trans('labels.backend.access.customers.services.table.status') }}</th>
                <th>{{ trans('labels.general.actions') }}</th>
            </tr>
    </thead>
    @foreach ($customer->services as $service)
    <tr>
        <td> {{ $service->meter_id }}</td>
        <td> {{ $service->meter_init }}</td>
        <td> {{ $service->install_house_id.'-'.$service->install_tambon.'-'.$service->install_aumphur }}</td>
        <td> {{ $service->status->name }}</td>
        <td> {!! $service->action_buttons !!}</td>
    </tr>
    @endforeach
</table>