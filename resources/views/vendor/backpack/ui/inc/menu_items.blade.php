{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Car brands" icon="la la-automobile" :link="backpack_url('car-brand')" />
<x-backpack::menu-item title="Drive models" icon="las la-user-tie" :link="backpack_url('drive-model')" />
<x-backpack::menu-item title="Bus models" icon="las la-bus" :link="backpack_url('bus-model')" />