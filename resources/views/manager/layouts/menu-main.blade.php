<div class="aside-menu flex-column-fluid">
    <!--begin::Aside Menu-->
    <div class="hover-scroll-overlay-y my-2 py-2" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">

        @foreach ($menu as $itemMenu)

            @if (count($itemMenu->children) > 0)

            @else
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link menu-link-action" href="#" data-action-url="{{ route($itemMenu->route) }}">
                        <span class="menu-icon">
                            <i class="bi {{ $itemMenu->iconMenu }}"></i>
                        </span>
                        <span class="menu-title">{{ __($itemMenu->name) }}</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            @endif

        @endforeach

    </div>
</div>
