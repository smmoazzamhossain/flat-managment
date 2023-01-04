@props([
    'label',
    'type' => 'text',
    'placeholder' => '',
    'required' => false,
    'helpText' => false,
    'leadingAddOn' => false,
    'inputClass' => '',
    'disabled' => null,
])

@php 
    $wireModelName = $attributes->whereStartsWith('wire:model')->first(); 
@endphp

<div class="{{ $attributes->get('class') }}">
    <label for="{{ $wireModelName }}" class="form-label">
        {{ $label }}
    </label>

    @if($leadingAddOn)
        <div class="input-group input-group-merge">
            <span class="input-group-text">{{ $leadingAddOn }}</span>
    @endif

    <input 
        {{ $attributes->whereStartsWith('wire:model') }}
        type="{{ $type }}"
        id="{{ $wireModelName }}"
        class="form-control {{ $inputClass }} @error($wireModelName) is-invalid @enderror"
        placeholder="{{ $placeholder }}"
        @if($required) required @endif
        @if($disabled) disabled="disabled" @endif
    />

    @if($leadingAddOn)
        </div>
    @endif

    @error ($wireModelName)
        <div class="my-1 invalid-feedback text-sm">{{ $message }}</div>
    @enderror

    @if ($helpText)
        <div class="form-text">{{ $helpText }}</div>
    @endif
</div>
