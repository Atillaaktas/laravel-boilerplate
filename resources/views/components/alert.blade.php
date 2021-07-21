<!--begin::Alert-->
<div class="alert alert-{{$type}}">
    <!--begin::Icon-->
    <span class="svg-icon svg-icon-2hx svg-icon-primary me-3">...</span>
    <!--end::Icon-->

    <!--begin::Wrapper-->
    <div class="d-flex flex-column">
        <!--begin::Title-->
        <h5 class="mb-1">{{$title}}</h5>
        <!--end::Title-->
        <!--begin::Content-->
        <span>{{$message}}</span>
        <!--end::Content-->
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Alert-->