<select class="form-select form-select-solid form-select-sm" wire:model="subcategory_id">
    <option value="all">{{__("All Categories")}}</option>
    @foreach (categories() as $category)
        @foreach ($category->subcategories as $subcategory)
            <option value="{{$subcategory->id}}">{{$category->name}}/{{$subcategory->name}}</option>
        @endforeach
    @endforeach
</select>