@extends($layout)

@section('content-toolbar-title')
    <!--begin::Title-->
    <h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">{{ __('Profiles') }}</h1>
    <!--end::Title-->
    <!--begin::Separator-->
    <span class="h-20px border-gray-200 border-start mx-4"></span>
    <!--end::Separator-->

    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
        <!--begin::Item-->
        <li class="breadcrumb-item text-muted">
            <a href="#" class="text-muted text-hover-primary action-link-home" data-action-url = "{{ route('manager.home') }}">{{ __('Home') }}</a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-200 w-5px h-2px"></span>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-dark">{{ __('Profiles') }}</li>
        <!--end::Item-->
    </ul>
    <!--end::Breadcrumb-->
@endsection

@section('content-toolbar-actions')
    <!--begin::Button-->
    <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app" id="kt_toolbar_primary_button">{{ __('Create') }}</a>
    <!--end::Button-->
@endsection

@section('content-container-main')
<!--begin::Tables Widget 13-->
<div class="card mb-5 mb-xl-8">
<!--begin::Body-->
<div class="card-body py-3">
    <!--begin::Table container-->
    <div class="table-responsive">
        <!--begin::Table-->
        <table id="kt_datatable_column_rendering" class="table table-striped table-row-bordered gy-5 gs-7">
            <thead>
                <tr class="fw-semibold fs-6 text-gray-800">
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>$320,800</td>
                </tr>
                <tr>
                    <td>Garrett Winters</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>63</td>
                    <td>2011/07/25</td>
                    <td>$170,750</td>
                </tr>
            </tbody>
        </table>
        <!--end::Table-->
    </div>
    <!--end::Table container-->
</div>
<!--begin::Body-->
</div>
<!--end::Tables Widget 13-->
@endsection
