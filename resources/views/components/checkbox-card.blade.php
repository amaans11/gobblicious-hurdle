<label class="{{ $attributes->get('label-class') }}">
    <input
        name="{{ $attributes->get('name') }}"
        type="{{ $attributes->get('type') }}"
        class="hidden btn-checkbox"
        wire:model.lazy="{{ $attributes->get('name') }}"
        value="{{ $attributes->get('value') }}"
        checked="{{ $attributes->get('checked') }}"
    >
    <div class="w-full cursor-pointer {{ $attributes->get('class') }}">
        {{ $slot }}
    </div>
</label>
