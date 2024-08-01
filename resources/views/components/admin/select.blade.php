@props(['label', 'name', 'value' => null, 'disabled' => false])

@php
    $key = $name;
@endphp

<div class="form-group">
    <label for="{{ $key }}">{{ $label }}</label>
    <select class="form-control custom-select select2" id="{{ $key }}" name="{{ $key }}" value="{{ $value }}" autofocus required @if ($disabled) disabled @endif>
        {{ $slot }}
    </select>
    <x-admin.input-error for="{{ $key }}" />
</div>
