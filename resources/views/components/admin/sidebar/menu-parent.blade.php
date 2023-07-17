<div data-kt-menu-trigger="click" class="menu-item menu-accordion" {{$attributes}}>
    <span class="menu-link">
        <span class="menu-icon">
            <i class="bi {{$icon}} fs-3"></i>
        </span>
        <span class="menu-title">{{$menu}}</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">
        {{$slot}}
    </div>
</div>
