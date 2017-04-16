<div class="pull-right mb-10 hidden-sm hidden-xs">
    {{ link_to_route('admin.access.customer.service.list', trans('menus.backend.access.customers.services.all'), [$customer], ['class' => 'btn btn-primary btn-xs']) }}
    {{ link_to_route('admin.access.customer.service.create', trans('menus.backend.access.customers.services.create'), [$customer], ['class' => 'btn btn-success btn-xs']) }}
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.backend.access.customers.services.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('admin.access.customer.service.list', trans('menus.backend.access.customers.services.all') , [$customer]) }}</li>
            <li>{{ link_to_route('admin.access.customer.service.create', trans('menus.backend.access.customers.services.create') , [$customer]) }}</li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>