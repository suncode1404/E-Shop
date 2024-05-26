@props([
    'nameInput' => '',
    'defaultValue' => '',
])
<div class="quantity">
    <!-- Input Order -->
    <div class="input-group">
        {{-- <div class="button minus">
            <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus"
                data-field="{{ $nameInput }}">
                <i class="ti-minus"></i>
            </button>
        </div> --}}
        {{-- <x-form.field_input name="{{ $nameInput }}" readonly error="false" data-min="1" data-max="{{ $defaultValue }}" value="1" readonly>

        </x-form.field_input> --}}
        <input type="number" name="{{ $nameInput }}" class="input-number" min="1"
            max="{{ $defaultValue }}" value="1"   >
        {{-- <div class="button plus">
            <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="{{ $nameInput }}"
                fdprocessedid="367eq8">
                <i class="ti-plus"></i>
            </button>
        </div> --}}
    </div>
    <!--/ End Input Order -->
</div>
