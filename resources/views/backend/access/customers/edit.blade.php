@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.customers.management') . ' | ' . trans('labels.backend.access.customers.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.customers.management') }}
        <small>{{ trans('labels.backend.access.customers.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($customer, ['route' => ['admin.access.customer.update', $customer], 'class' => 'form-horizontal', 'customer' => 'form', 'method' => 'PATCH', 'id' => 'edit-customer']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.access.customers.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.access.includes.partials.customer-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('citizen_id', trans('validation.attributes.backend.access.customers.citizen_id'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('citizen_id', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.customers.citizen_id')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                 <div class="form-group">
                    {{ Form::label('user_id', trans('validation.attributes.backend.access.customers.user_id'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('user_id', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.customers.user_id')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('firstname', trans('validation.attributes.backend.access.customers.firstname'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('firstname', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.customers.firstname')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->    
                
                <div class="form-group">
                    {{ Form::label('lastname', trans('validation.attributes.backend.access.customers.lastname'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('lastname', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.customers.lastname')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->    

                <div class="form-group">
                    {{ Form::label('occupation', trans('validation.attributes.backend.access.customers.occupation'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('occupation', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.customers.occupation')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->    

                <div class="form-group">
                    {{ Form::label('workplace', trans('validation.attributes.backend.access.customers.workplace'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('workplace', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.customers.workplace')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control--> 

                <div class="form-group">
                    {{ Form::label('address', trans('validation.attributes.backend.access.customers.address'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::textarea('address', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.customers.address')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control--> 

               
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.access.customer.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@endsection

@section('after-scripts')
    {{ Html::script('js/backend/access/customers/script.js') }}
@endsection