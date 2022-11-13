<div>

    @if (session()->has('error'))
        @foreach(session('error') as $error)
        <div class="alert alert-danger">
                {{ $error }}
        </div>
        @endforeach
    @else
        <x-alert id='alert' class="alert-success"></x-alert>
    @endif
    <div class="card card-flush mt-6 mt-xl-9">

        <div class="card-header mt-5">
            <div class="card-title flex-column">
                <h3 class="fw-bolder mb-1">{{__("Profiles")}}</h3>
                <div class="fs-6 text-gray-400">{{__("Show All")}}</div>
            </div>
            <div class="card-toolbar my-1">
                <div class="d-flex align-items-center position-relative my-1">
                    <div class="me-6 my-1">
                        <x-profile-industry></x-profile-industry>
                    </div>
                    @role('super admin')
                    <div class="me-6 my-1">
                        <x-card-admin></x-card-admin>
                    </div>
                    @endrole
                    <div class="d-flex align-items-center position-relative my-1">
                        <x-search-input></x-search-input>
                    </div>
                </div>
            </div>
            <div class="card-toolbar my-1">
                <div class="d-flex align-items-center position-relative my-1">
                    <div class="me-6 my-1">
                        <x-card-export-excel wire:click="exportExcel"/>
                    </div>
                    <div class="me-6 my-1">
                        <x-card-delete wire:click="deleteAll"/>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body pt-0">
            <div class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="table-responsive">
                    <table
                        class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder dataTable no-footer"
                        role="grid" >
                        <thead class="fs-7 text-gray-400 text-uppercase">
                            <tr role="row">
                                <th></th>
                                <th wire:click="sortBy('id')" data-sort="{{$sortDirection}}">{{__("#")}}
                                    <x-sort field="id" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}"></x-sort>
                                </th>
                                <th wire:click="sortBy('name')" data-sort="{{$sortDirection}}" class="min-w-50px">
                                    {{__("Name")}}
                                    <x-sort field="name" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}">
                                    </x-sort>
                                </th>
                                  <th wire:click="sortBy('category_id')" data-sort="{{$sortDirection}}" class="min-w-50px">
                                    {{__("Category")}}
                                    <x-sort field="category_id" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}">
                                    </x-sort>
                                </th> 
                                <th wire:click="sortBy('type')" data-sort="{{$sortDirection}}" class="min-w-50px">
                                    {{__("Profile Type")}}
                                    <x-sort field="type" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}">
                                    </x-sort>
                                </th>
                                {{-- @role('super admin')
                                <th wire:click="sortBy('admin_id')" data-sort="{{$sortDirection}}" class="min-w-50px">
                                    {{__("Corporate")}}
                                    <x-sort field="admin_id" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}">
                                    </x-sort>
                                </th>
                                @endrole --}}
                              
                                <th class="min-w-50px text-end" style="width: 87.075px;">{{__("Attach")}}
                                </th>
                                <th class="min-w-50px text-end" style="width: 87.075px;">{{__("Action")}}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="fs-6">
                            @forelse($profiles as $key => $profile)
                            <tr wire:loading.class="opacity-50" id="checkboxes">
                                <td><input type="checkbox" name="{{$profile->id}}" class="profiles"></td>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$profile->first_name}}-{{$profile->last_name}}</td>   
                                {{-- @role('super admin')       
                                <td>{{$profile->admin?$profile->admin->name:''}}</td>
                                @endrole --}}
                                <td>{{$profile->category->name }}</td>          
                                <td>{{$profile->type }}</td>          
                                <td>
                                    <div class="d-flex justify-content-end flex-shrink-0">
                                        @can('edit profiles')
                                        <x-attach-button href="{{route('admin.profiles.attach',$profile)}}"/>
                                        @endcan
                                    </div>
                                </td>                      
                                <td>
                                    <div class="d-flex justify-content-end flex-shrink-0">
                                        @can('edit profiles')
                                        <x-edit-button href="{{route('admin.profiles.edit',$profile)}}"/>
                                        @endcan
                                        @can('delete profiles')
                                        <x-delete-record-button wire:click="confirm({{ $profile->id }})"/>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center text-danger font-size-lg">
                                    {{ __('No records found') }}
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div
                        class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                    </div>
                    <div
                        class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                        {{$profiles->links()}}
                    </div>
                </div>
            </div>
            <!--end::Table-->

            <!--end::Table container-->
        </div>
        <!--end::Card body-->
    </div>
    <x-delete-modal></x-delete-modal>
</div>

@section('scripts')

<script type="text/javascript">
    window.livewire.on('openDeleteModal', () => {
        $('#deleteModal').modal('show');
    }); 
    window.livewire.on('closeDeleteModal', () => {
        $('#deleteModal').modal('hide');
    });

    // Handle click on checkbox to set state of "Select all" control
   $('.profiles').on('change', function(){
        var selected = [];
        $('#checkboxes input:checked').each(function() {
            selected.push($(this).attr('name'));
        });
        console.log(selected);
        @this.selected_profiles = selected;
   });
</script>
@endsection