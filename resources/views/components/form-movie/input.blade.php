@props(['name'])

<div class="form-outline mb-4">
    <label class="form-label" for="{{ $name }}">{{ ucwords($name) }}</label>

    <input class="form-control form-control-lg" type="text" name="{{ $name }}" id="{{ $name }}" {{ $attributes(['value' => old($name)]) }} />

    <x-form-movie.error name='{{ $name }}' />

</div>