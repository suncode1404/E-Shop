@props([
    'name' => '',
    'type' => 'text',
    'error' => 'true',
    'edit' => '',
    'value' => [],
])

@php

    if (old($name, $edit)) {
        $value = old($name, $edit);
    } elseif (empty($value)) {
        $value = '';
    }
@endphp

<div class="form-floating my-3">
    <input type="{{ $type }}" class="form-control @error($name) is-invalid @enderror {{ $attributes['class'] }}" {{ $attributes->except('class') }} name="{{ $name }}"
        id="{{ $name }}" value="{{$value}}">
    <label for="{{ $name }}" class="form-label">{{ $slot }}</label>
    @if ($error === 'true')
        @error($name)
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    @endif
</div>
