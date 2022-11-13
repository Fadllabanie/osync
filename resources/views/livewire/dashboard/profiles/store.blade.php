<div>
    <x-alert id='alert' class="alert-success"></x-alert>

    <div class="card mb-5 mb-xl-10">
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true"
            aria-controls="kt_account_profile_details">
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">{{__("Create Profile")}}</h3>
            </div>
        </div>
        <div id="kt_account_profile_details" class="collapse show">
            <form class="form">
                <div class="card-body border-top p-9">
                    @role('super admin')
                    @if($admin_id)
                    <?php $admin = App\Models\Admin::findOrFail($admin_id); ?>
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <x-label >{{__("Corporate Admin")}}</x-label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-12 fv-row">
                                    <x-input type="text" field="admin"
                                        value="{{$admin->name}}" disabled/>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    @else
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <x-label>
                            <span >{{__("Admin")}}</span>
                        </x-label>
                        <div class="col-lg-8 fv-row">
                            <div wire:ignore>
                                <select wire:model="admin_id" id="admin_id" name="admin_id" data-control="select2"
                                    class="form-select form-select-solid form-select-lg fw-bold">
                                    <option disable>{{__("Select...")}}</option>
                                    {{-- <option value="admin">{{__("Admin")}}</option> --}}
                                 @foreach ($admins as $admin)
                                 <option value="{{$admin->id}}">{{$admin->name}}</option>
                                 @endforeach
                                </select>
                            </div>
                            <x-error-select field="admin_id" />
                        </div>
                    </div>
                    <!--end::Input group-->
                    @endif
                    @endrole
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <x-label>
                            <span class="required">{{__("Industry")}}</span>
                        </x-label>
                        <div class="col-lg-8 fv-row">
                            <div wire:ignore>
                                <select wire:model="industrie_id" id="industrie_id" name="industrie_id" data-control="select2"
                                    class="form-select form-select-solid form-select-lg fw-bold">
                                    <option disable>{{__("Select...")}}</option>
                                 @foreach ($industries as $industry)
                                 <option value="{{$industry->id}}">{{$industry->name}}</option>
                                 @endforeach
                                </select>
                            </div>
                            <x-error-select field="industrie_id" />
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <x-label >{{__("Prefix")}}</x-label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-12 fv-row">
                                    <x-input type="text" field="prefix" wire:model="prefix"
                                        placeholder="prefix" />
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <x-label class="required">{{__("First Name")}}</x-label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-12 fv-row">
                                    <x-input type="text" field="first_name" wire:model="first_name"
                                        placeholder="first_name" />
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <x-label >{{__("Middle Name")}}</x-label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-12 fv-row">
                                    <x-input type="text" field="middle_name" wire:model="middle_name"
                                        placeholder="middle_name" />
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <x-label class="required">{{__("Last Name")}}</x-label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-12 fv-row">
                                    <x-input type="text" field="last_name" wire:model="last_name"
                                        placeholder="last_name" />
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <x-label >{{__("Nick Name")}}</x-label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-12 fv-row">
                                    <x-input type="text" field="nike_name" wire:model="nike_name"
                                        placeholder="nick name" />
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <x-label >{{__("Home Phone")}}</x-label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-12 fv-row">
                                    <x-input type="text" field="home_phone" wire:model="home_phone"
                                        placeholder="home_phone" />
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <x-label class="required">{{__("Mobile")}}</x-label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-12 fv-row">
                                    <x-input type="text" field="mobile" wire:model="mobile"
                                        placeholder="mobile" />
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <x-label class="required">{{__("Email")}}</x-label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-12 fv-row">
                                    <x-input type="email" field="email" wire:model="email"
                                        placeholder="email" />
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <x-label class="required">{{__("Birthdate")}}</x-label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-12 fv-row">
                                    <x-input type="date" field="birthday" wire:model="birthday"
                                        placeholder="birthday" />
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <x-label>
                            <span class="required">{{__("Gender")}}</span>
                        </x-label>
                        <div class="col-lg-8 fv-row">
                            <div wire:ignore>
                                <select wire:model="gender" id="gender" name="gender" data-control="select2"
                                    class="form-select form-select-solid form-select-lg fw-bold">
                                    <option disable>{{__("Select...")}}</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                    <option value="3">Other</option>
                                </select>
                            </div>
                            <x-error-select field="gender" />
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <x-label >{{__("Organization")}}</x-label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-12 fv-row">
                                    <x-input type="text" field="organization" wire:model="organization"
                                        placeholder="organization" />
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <x-label >{{__("Organization URL")}}</x-label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-12 fv-row">
                                    <x-textarea type="text" field="organization_url" wire:model="organization_url"
                                        placeholder="organization url" />
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <x-label >{{__("Organization Address")}}</x-label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-12 fv-row">
                                    <x-textarea type="text" field="organization_address" wire:model="organization_address"
                                        placeholder="organization address" />
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <x-label >{{__("Role")}}</x-label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-12 fv-row">
                                    <x-input type="text" field="role" wire:model="role"
                                        placeholder="role" />
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <x-label >{{__("Fax")}}</x-label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-12 fv-row">
                                    <x-input type="text" field="fax" wire:model="fax"
                                        placeholder="fax" />
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <x-label >{{__("Work Mobile")}}</x-label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-12 fv-row">
                                    <x-input type="text" field="work_mobile" wire:model="work_mobile"
                                        placeholder="work_mobile" />
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <x-label >{{__("Work E-mail")}}</x-label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-12 fv-row">
                                    <x-input type="email" field="work_email" wire:model="work_email"
                                        placeholder="work_email" />
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <x-label >{{__("Work Phone")}}</x-label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-12 fv-row">
                                    <x-input type="text" field="work_phone" wire:model="work_phone"
                                        placeholder="work_phone" />
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    
                    
                </div>
                <!--end::Card body-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <a href="{{route('admin.profiles.index')}}"
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
    $('#admin_id').select2({
        placeholder: 'select..',
    }).on('change', function () {
        @this.admin_id = $(this).val();
    });  
    $('#industrie_id').select2({
        placeholder: 'select..',
    }).on('change', function () {
        @this.industrie_id = $(this).val();
    }); 
    $('#gender').select2({
        placeholder: 'select..',
    }).on('change', function () {
        @this.gender = $(this).val();
    }); 
});

</script>
@endsection