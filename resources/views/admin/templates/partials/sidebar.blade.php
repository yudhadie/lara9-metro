<x-admin.sidebar>
    <x-admin.sidebar-menu menu="Dashboard" icon="bi-grid" href="{{route('dashboard')}}" id="menu-dashboard" />
    <x-admin.sidebar-menu-title menu="MENU" />
    <x-admin.sidebar-menu menu="Report" icon="bi-newspaper" href="#" id="menu-report" />
    <x-admin.sidebar-menu-parent menu="Settings" icon="bi-gear" id="menu-setting">
        <x-admin.sidebar-menu-child menu="Role" id="menu-setting-role" href="{{route('role.index')}}" />
        <x-admin.sidebar-menu-child menu="Users" id="menu-setting-user" href="{{route('user.index')}}" />
    </x-admin.sidebar-menu-parent>
    <x-admin.sidebar-menu-parent menu="Information" icon="bi-activity" id="menu-info">
        <x-admin.sidebar-menu-child menu="Activity" id="menu-info-activity" href="{{route('activity.index')}}" />
    </x-admin.sidebar-menu-parent>
</x-admin.sidebar>
