<div>
    <x-alert id='alert' class="alert-success"></x-alert>
    <div class="card card-flush mt-6 mt-xl-9">

        <div class="card-header mt-5">
            <div class="card-title flex-column">
                <h3 class="fw-bolder mb-1">{{__("Contact Us Messages")}}</h3>
                <div class="fs-6 text-gray-400">{{__("Show All")}}</div>
            </div>
        </div>

        <div class="card-body pt-0">
            <div class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="table-responsive">
                    <table
                        class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder dataTable no-footer"
                        role="grid">
                        <thead class="fs-7 text-gray-400 text-uppercase">
                            <tr role="row">
                                <th wire:click="sortBy('id')" data-sort="{{$sortDirection}}">{{__("#")}}
                                    <x-sort field="id" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}"></x-sort>
                                </th>
                                <th wire:click="sortBy('name')" data-sort="{{$sortDirection}}" class="min-w-50px">
                                    {{__("Name")}}
                                    <x-sort field="name" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}">
                                    </x-sort>
                                </th>
                                <th wire:click="sortBy('email')" data-sort="{{$sortDirection}}" class="min-w-50px">
                                    {{__("Email")}}
                                    <x-sort field="email" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}">
                                    </x-sort>
                                </th>
                                <th wire:click="sortBy('phone')" data-sort="{{$sortDirection}}" class="min-w-50px">
                                    {{__("Phone")}}
                                    <x-sort field="phone" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}">
                                    </x-sort>
                                </th>
                                <th wire:click="sortBy('title')" data-sort="{{$sortDirection}}" class="min-w-50px">
                                    {{__("Title")}}
                                    <x-sort field="title" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}">
                                    </x-sort>
                                </th>
                                <th wire:click="sortBy('message')" data-sort="{{$sortDirection}}" class="min-w-50px">
                                    {{__("Message")}}
                                    <x-sort field="message" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}">
                                    </x-sort>
                                </th>
                                
                                <th class="min-w-50px text-end" style="width: 87.075px;">{{__("Action")}}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="fs-6">
                            @forelse($messages as $key => $message)
                            <tr wire:loading.class="opacity-50">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$message->name}}</td>  
                                <td>{{$message->email}}</td> 
                                <td>{{$message->phone}}</td>  
                                <td>{{$message->title}}</td>                                 
                                <td>{{$message->message}}</td>  
                                <td>
                                    <div class="d-flex justify-content-end flex-shrink-0">
                                        <x-delete-record-button wire:click="confirm({{ $message->id }})"/>
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
                        {{$messages->links()}}
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
</script>
@endsection