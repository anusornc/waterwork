@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.customers.services.management'))

@section('after-styles')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@endsection

@section('page-header')
    <h1>{{ trans('labels.backend.access.customers.services.management') }}</h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.customers.services.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.access.includes.partials.customer-header-buttons')
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <table class="table table-striped table-hover">
                <tr>
                    <th>{{ trans('labels.backend.access.users.tabs.content.overview.name') }}</th>
                    <td>{{ $customer->citizen_id }}</td>
                </tr>
            </table>

            <div class="table-responsive">
                <table id="customers.services-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.access.customers.services.table.meter_id') }}</th>
                            <th>{{ trans('labels.backend.access.customers.services.table.meter_init') }}</th>
                            <th>{{ trans('labels.backend.access.customers.services.table.address') }}</th>
                            <th>{{ trans('labels.backend.access.customers.services.table.status') }}</th>
                            <th>{{ trans('labels.general.actions') }}</th>
                        </tr>
                    </thead>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('history.backend.recent_history') }}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            {!! history()->renderType('Customer') !!}
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection

@section('after-scripts')
    {{ Html::script("js/backend/plugin/datatables/jquery.dataTables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables.bootstrap.min.js") }}

    <script>
        $(function() {
            $('#customers.services-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.access.customer.service.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'meter_id', name: 'meter_id',sortable: false},
                    {data: 'meter_init', name: 'meter_init', sortable: false},
                    {data: 'address', name: 'address', searchable: false, sortable: false},
                    {data: 'status', name: 'status',searchable:false},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@endsection