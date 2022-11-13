<div>
    <x-alert id='alert' class="alert-success"></x-alert>

    <div class="card mb-5 mb-xl-10">
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true"
            aria-controls="kt_account_profile_details">
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">{{__("Update city")}}</h3>
            </div>
        </div>
        <div id="kt_account_profile_details" class="collapse show">
            <form class="form">
                <div class="card-body border-top p-9">
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <x-label class="required">{{__("city Name")}}</x-label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-12 fv-row">
                                    <x-input type="text" field="city.name" wire:model="city.name"
                                        placeholder="name" />
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <x-label>
                            <span class="required">{{__("Country")}}</span>
                          
                        </x-label>
                        <div class="col-lg-8 fv-row" wire:ignore>
                            <select wire:model="city.country_id" data-control="select2" id="country_id"
                                name="country_id"
                                class="form-select form-select-solid form-select-lg fw-bold">
                                <option>{{__("Select...")}}</option>
                                @foreach ($countries as $country)
                                <option value="{{$country->id}}">{{$country->en_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <x-error field="city.country_id" />
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-0">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-bold fs-6">{{__("Status")}}</label>
                        <!--begin::Label-->
                        <!--begin::Label-->
                        <div class="col-lg-8 d-flex align-items-center">
                            <div class="form-check form-check-solid form-switch fv-row">
                                <input class="form-check-input w-45px h-30px" type="checkbox" field="city.status" wire:model="city.status"
                                    id="allowmarketing" checked="checked" />
                                <label class="form-check-label" for="allowmarketing"></label>
                            </div>
                        </div>
                        <!--begin::Label-->
                    </div>
                    <!--end::Input group-->

                </div>
                <!--end::Card body-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <a href="{{route('admin.cities.index')}}"
                        class="btn btn-light btn-active-light-primary me-2">{{__("Back")}}</a>
                    <button type="button" class="btn btn-primary" wire:click.prevent="submit()"
                        wire:loading.attr="disabled"
                        wire:loading.class="spinner spinner-white spinner-left">{{__("Save")}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')
<script>
    $(document).ready(function() {

$('#country_id').select2({
    placeholder: '',
}).on('change', function () {
    @this.country_id = $(this).val();
});
});
</script>
@endsection