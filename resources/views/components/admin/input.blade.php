@props(['label', 'type', 'name', 'value' => null, 'step' => '', 'min' => '', 'max' => '', 'required' => true, 'disabled' => false])

@php
    $key = $name;
@endphp

<div class="form-group">
    <label for="{{ $key }}">{{ $label }}</label>
    <input type="{{ $type }}" class="form-control" id="{{ $key }}" name="{{ $key }}" value="{{ $value }}" step="{{ $step }}" min="{{ $min }}" max="{{ $max }}" @if ($required) required @endif autofocus @if ($disabled) disabled @endif>
    <x-admin.input-error for="{{ $key }}" />
</div>
