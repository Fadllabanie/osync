<select class="form-select form-select-solid form-select-sm" wire:model="admin_id">
    <option value="all">{{__("All Corporates")}}</option>
    <option value="consumers">{{__("Consumers")}}</option>
    @foreach (admins() as $admin)
    <option value="{{$admin->id}}">{{$admin->name}}</option>
    @endforeach
</select>