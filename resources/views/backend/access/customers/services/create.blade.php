@extends ('backend.layouts.app')

@section ('meter_id', trans('labels.backend.access.customers.services.management') . ' | ' . trans('labels.backend.access.customers.services.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.customers.services.management') }}
        <small>{{ trans('labels.backend.access.customers.services.create') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-primary">
        <div class="box-body">
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
        </div>
    </div>
    {{ Form::open(['route' => ['admin.access.customer.service.store',$customer], 'class' => 'form-horizontal', 'customer_services' => 'form', 'method' => 'post', 'id' => 'create-customer_services']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-meter_id">{{ trans('labels.backend.access.customers.services.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.access.includes.partials.customer-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                 <div class="form-group">
                    {{ Form::label('meter_id', trans('validation.attributes.backend.access.customers.services.meterid'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('meter_id', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.customers.services.meterid')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('meter_init', trans('validation.attributes.backend.access.customers.services.meterinit'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('meter_init', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.customers.services.meterinit')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('service_date', trans('validation.attributes.backend.access.customers.services.date'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::date('service_date', \Carbon\Carbon::now(), ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.customers.services.date')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('install_house_id', trans('validation.attributes.backend.access.customers.services.houseid'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('install_house_id', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.customers.services.houseid')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('install_tambon', trans('validation.attributes.backend.access.customers.services.tambon'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('install_tambon', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.customers.services.tambon')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('install_aumphur', trans('validation.attributes.backend.access.customers.services.aumphur'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('install_aumphur', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.customers.services.aumphur')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                
                <div class="form-group">
                    {{ Form::label('status_id', trans('validation.attributes.backend.access.customers.services.status'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::select('status_id', $service_status, null, ['class' => 'form-control']) }}
                    </div><!--col-lg-10-->
                </div><!--form-group-->


            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.access.customer.service.list', trans('buttons.general.cancel'), [$customer], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@endsection
