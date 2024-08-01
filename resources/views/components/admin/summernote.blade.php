@props(['label', 'name', 'value' => null, 'required' => true, 'disabled' => false])

@php
    $key = $name;
@endphp

<div class="form-group">
    <label for="{{ $key }}">{{ $label }}</label>
    <textarea class="summernote" id="{{ $key }}" name="{{ $key }}" @if ($required) required @endif autofocus @if ($disabled) disabled @endif>{{ $value }}</textarea>
    <x-admin.input-error for="{{ $key }}" />
</div>
