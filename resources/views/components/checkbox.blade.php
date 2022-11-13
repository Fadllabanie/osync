@props(['disabled' => false, 'field'])

<div class="col-12">
    <input type="checkbox"
    {!! ($errors->has($field))
        ? $attributes->merge(['class' => "form-control-l form-control-solid  is-invalid"]) 
        : $attributes->merge(['class' => "form-control-l form-control-solid "]) !!} >
    <x-error field="{{ $field }}" />
</div>

