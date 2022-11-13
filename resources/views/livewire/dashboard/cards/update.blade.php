<div>
    <x-alert id='alert' class="alert-success"></x-alert>

    <div class="card mb-5 mb-xl-10">
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true"
            aria-controls="kt_account_profile_details">
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">{{__("Update subcategory")}}</h3>
            </div>
        </div>
        <div id="kt_account_profile_details" class="collapse show">
            <form class="form">
                <div class="card-body border-top p-9">
                    @role('super admin')
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <x-label>
                            <span >{{__("Corporate Admin")}}</span>
                            
                        </x-label>
                        <div class="col-lg-8 fv-row">
                            <div wire:ignore>
                                <select wire:model="admin_id" id="admin_id" name="admin_id" data-control="select2"
                                    class="form-select form-select-solid form-select-lg fw-bold">
                                <option disable>{{__("Select...")}}</option>
                                 @foreach ($admins as $admin)
                                 <option value="{{$admin->id}}">{{$admin->name}}</option>
                                 @endforeach
                                </select>
                            </div>
                            <x-error-select field="admin_id" />
                        </div>
                    </div>
                    <!--end::Input group-->
                    @endrole
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <x-label>
                            <span class="required">{{__("Category")}}</span>
                            
                        </x-label>
                        <div class="col-lg-8 fv-row">
                            <div wire:ignore>
                                <select wire:model="subcategory_id" id="subcategory_id" name="subcategory_id" data-control="select2"
                                    class="form-select form-select-solid form-select-lg fw-bold">
                                    <option disable>{{__("Select...")}}</option>
                                @foreach ($categories as $category)
                                 @foreach ($category->subcategories as $subcategory)
                                 <option value="{{$subcategory->id}}">{{$category->name}}/{{$subcategory->name}}</option>
                                 @endforeach
                                 @endforeach
                                </select>
                            </div>
                            <x-error-select field="subcategory_id" />
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <x-label>
                            <span class="required">{{__("Origin")}}</span>
                            
                        </x-label>
                        <div class="col-lg-8 fv-row">
                            <div wire:ignore>
                                <select wire:model="origin_id" id="origin_id" name="origin_id" data-control="select2"
                                    class="form-select form-select-solid form-select-lg fw-bold">
                                    <option disable>{{__("Select...")}}</option>
                                 @foreach ($origins as $origin)
                                 <option value="{{$origin->id}}">{{$origin->name}}</option>
                                 @endforeach
                                </select>
                            </div>
                            <x-error-select field="origin_id" />
                        </div>
                    </div>
                    <!--end::Input group-->
                </div>
                <!--end::Card body-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <a href="{{route('admin.cards.index')}}"
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
        $('#category_id').select2({
            placeholder: '',
        }).on('change', function () {
            @this.category_id = $(this).val();
        });
        $('#subcategory_id').select2({
            placeholder: '',
        }).on('change', function () {
            @this.subcategory_id = $(this).val();
        });
        $('#admin_id').select2({
            placeholder: '',
        }).on('change', function () {
            @this.admin_id = $(this).val();
        });
        $('#origin_id').select2({
            placeholder: '',
        }).on('change', function () {
            @this.origin_id = $(this).val();
        });
});
</script>
@endsection