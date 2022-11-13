@props(['disabled' => false, 'field', 'placeholder' => "enter"])

<fieldset>
    <input placeholder={{$placeholder}}>
    <x-error field="{{ $field }}" />
</fieldset>
