@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.customers.management') . ' | ' . trans('labels.backend.access.customers.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.customers.management') }}
        <small>{{ trans('labels.backend.access.customers.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.access.customer.store', 'class' => 'form-horizontal', 'customer' => 'form', 'method' => 'post', 'id' => 'create-customer']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.access.customers.create') }}</h3>

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
                    {{ Form::label('title', trans('validation.attributes.backend.access.customers.title'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.customers.title')]) }}
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
                    {{ Form::label('house_id', trans('validation.attributes.backend.access.customers.house_id'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('house_id', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.customers.house_id')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->    

                <div class="form-group">
                    {{ Form::label('tambon', trans('validation.attributes.backend.access.customers.tambon'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('tambon', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.customers.tambon')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('aumphur', trans('validation.attributes.backend.access.customers.aumphur'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('aumphur', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.customers.aumphur')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('province', trans('validation.attributes.backend.access.customers.province'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('province', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.customers.province')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('occupation', trans('validation.attributes.backend.access.customers.occupation'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('occupation', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.customers.occupation')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->    

                <div class="form-group">
                    {{ Form::label('email', trans('validation.attributes.backend.access.customers.email'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.customers.email')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control--> 

                <div class="form-group">
                    {{ Form::label('workplace', trans('validation.attributes.backend.access.customers.workplace'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('workplace', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.customers.workplace')]) }}
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
                    {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@endsection
