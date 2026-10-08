@props(['name', 'label', 'type' => 'text', 'placeholder' => '', 'value' => ''])

<div class="mb-4">
    <label for="{{ $name }}" class="font-semibold">{{ $label }}</label><br>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" placeholder="{{ $placeholder }}" value="{{ old($name, $value) }}">
    @error($name)
        <div class="text-red-600">{{ $message }}</div>
    @enderror
</div>