@props(['name', 'label', 'value' => '', 'options'])

<div class="mb-4">
    <label for="{{ $name }}" class="font-semibold">{{ $label }}</label><br>
    <select name="{{ $name }}" id="{{ $name }}">
        @foreach ($options as $key => $title)
            <option value="{{ $key }}" @selected(old($name, $value) == $key)>{{ $title }}</option>
        @endforeach
    </select>
    @error($name)
        <div class="text-red-600">{{ $message }}</div>
    @enderror
</div>