<select class="form-select form-select-solid form-select-sm" wire:model="origin_id">
    <option value="all">{{__("All Origins")}}</option>
    @foreach (origins() as $origin)
        <option value="{{$origin->id}}">{{$origin->name}}</option>
    @endforeach
</select>