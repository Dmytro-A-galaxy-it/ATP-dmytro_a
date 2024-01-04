{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

@if (backpack_user()->can('atps'))
<x-backpack::menu-item title="Atps" icon="las la-building" :link="backpack_url('atp')" />
@endif

@if (backpack_user()->can('drive-models'))
<x-backpack::menu-item title="Drive models" icon="las la-user-tie" :link="backpack_url('drive-model')" />
@endif

@if (backpack_user()->can('bus-models'))
<x-backpack::menu-item title="Bus models" icon="las la-bus" :link="backpack_url('bus-model')" />
@endif

@if (backpack_user()->can('car-brand'))
<x-backpack::menu-item title="Car brands" icon="la la-automobile" :link="backpack_url('car-brand')" />
@endif

@if (backpack_user()->can('application'))
<x-backpack::menu-item title="Applications" icon="lar la-file-alt" :link="backpack_url('application')" />
@endif

@if (backpack_user()->can('user-mengement'))
<x-backpack::menu-dropdown title="Add-ons" icon="la la-puzzle-piece">
    <x-backpack::menu-dropdown-header title="Authentication" />
    <x-backpack::menu-dropdown-item title="Users" icon="la la-user" :link="backpack_url('user')" />
    <x-backpack::menu-dropdown-item title="Roles" icon="la la-group" :link="backpack_url('role')" />
    <x-backpack::menu-dropdown-item title="Permissions" icon="la la-key" :link="backpack_url('permission')" />
</x-backpack::menu-dropdown>
@endif
