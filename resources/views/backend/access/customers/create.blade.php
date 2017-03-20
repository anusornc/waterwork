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
                    {{ Form::label('associated-permissions', trans('validation.attributes.backend.access.customers.associated_permissions'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::select('associated-permissions', array('all' => trans('labels.general.all'), 'custom' => trans('labels.general.custom')), 'all', ['class' => 'form-control']) }}

                        <div id="available-permissions" class="hidden mt-20">
                            <div class="row">
                                <div class="col-xs-12">
                                    @if ($permissions->count())
                                        @foreach ($permissions as $perm)
                                            <input type="checkbox" citizen_id="permissions[{{ $perm->id }}]" value="{{ $perm->id }}" id="perm_{{ $perm->id }}" {{ is_array(old('permissions')) && in_array($perm->id, old('permissions')) ? 'checked' : '' }} /> <label for="perm_{{ $perm->id }}">{{ $perm->display_citizen_id }}</label><br/>
                                        @endforeach
                                    @else
                                        <p>There are no available permissions.</p>
                                    @endif
                                </div><!--col-lg-6-->
                            </div><!--row-->
                        </div><!--available permissions-->
                    </div><!--col-lg-3-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('sort', trans('validation.attributes.backend.access.customers.sort'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('sort', ($customer_count+1), ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.customers.sort')]) }}
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
