@props(['name', 'label', 'placeholder' => '', 'value' => ''])

<div class="mb-4">
    <label for="{{ $name }}" class="font-semibold">{{ $label }}</label><br>
    <textarea name="{{ $name }}" id="{{ $name }}" rows="4" placeholder="{{ $placeholder }}">{{ old($name, $value) }}</textarea>
    @error($name)
        <div class="text-red-600">{{ $message }}</div>
    @enderror
</div>