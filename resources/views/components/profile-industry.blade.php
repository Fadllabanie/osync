<select class="form-select form-select-solid form-select-sm" wire:model="industrie_id">
    <option value="all">{{__("All Industries")}}</option>
    @foreach (industries() as $industry)
        <option value="{{$industry->id}}">{{$industry->name}}</option>
    @endforeach
</select>