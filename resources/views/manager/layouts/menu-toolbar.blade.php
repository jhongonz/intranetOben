<div class="d-flex align-items-stretch" id="kt_header_user_menu_toggle">
    <!--begin::Menu wrapper-->
    <div class="topbar-item cursor-pointer symbol px-3 px-lg-5 me-n3 me-lg-n5 symbol-30px symbol-md-35px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
        <img src="{{ asset('storage/assets/media/avatars/300-1.jpg') }}" alt="metronic" />
    </div>
    <!--begin::User account menu-->
    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
        <!--begin::Menu item-->
        <div class="menu-item px-3">
            <div class="menu-content d-flex align-items-center px-3">
                <!--begin::Avatar-->
                <div class="symbol symbol-50px me-5">
                    <img alt="Logo" src="{{ asset('storage/assets/media/avatars/300-1.jpg') }}" />
                </div>
                <!--end::Avatar-->
                <!--begin::Username-->
                <div class="d-flex flex-column">
                    <div class="fw-bold d-flex align-items-center fs-5">{{$name}}
                    <!-- <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pro</span> -->
                </div>
                    <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{$email}}</a>
                </div>
                <!--end::Username-->
            </div>
        </div>
        <!--end::Menu item-->
        <!--begin::Menu separator-->
        <div class="separator my-2"></div>
        <!--end::Menu separator-->
        <!--begin::Menu item-->
        <div class="menu-item px-5">
            <a href="../../demo13/dist/account/overview.html" class="menu-link px-5">{{ __('My Account') }}</a>
        </div>
        <!--end::Menu item-->
        <!--begin::Menu separator-->
        <div class="separator my-2"></div>
        <!--end::Menu separator-->
        <!--begin::Menu item-->
        <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start">
            <a href="#" class="menu-link px-5">
                <span class="menu-title position-relative">{{ __('Lenguage') }}
                <span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">{{ ucfirst( __($lenguage->len_name) ) }}
                <img class="w-15px h-15px rounded-1 ms-2" src="{{ asset('storage/assets/media/flags') }}/{{$lenguage->len_flag}}" alt="" /></span></span>
            </a>
            <!--begin::Menu sub-->
            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="../../demo13/dist/account/settings.html" class="menu-link d-flex px-5 active">
                    <span class="symbol symbol-20px me-4">
                        <img class="rounded-1" src="{{ asset('storage/assets/media/flags') }}/{{$lenguage->len_flag}}" alt="" />
                    </span>{{ ucfirst( __($lenguage->len_name) ) }}</a>
                </div>
                <!--end::Menu item-->
                @foreach ($lenguages as $item)

                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" data-lenguage="{{$item->len_id}}" class="menu-link menu-link-lenguage d-flex px-5">
                        <span class="symbol symbol-20px me-4">
                            <img class="rounded-1" src="{{ asset('storage/assets/media/flags') }}/{{$item->len_flag}}" alt="" />
                        </span>{{ ucfirst( __($item->len_name) ) }}</a>
                    </div>
                    <!--end::Menu item-->

                @endforeach
            </div>
            <!--end::Menu sub-->
        </div>
        <!--end::Menu item-->
        <!--begin::Menu item-->
        <div class="menu-item px-5">
            <a href="{{ route('manager.logout') }}" class="menu-link px-5">{{ __('Sign off') }}</a>
        </div>
        <!--end::Menu item-->
    </div>
    <!--end::User account menu-->
    <!--end::Menu wrapper-->
</div>
