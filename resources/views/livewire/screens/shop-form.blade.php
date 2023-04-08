<form form wire:submit.prevent="submit" class="flex flex-col flex-grow justify-between min-h-body overflow-hidden py-4">
    <div class="h-full w-full max-w-md mx-auto">
    <x-progress-bar value="0" class="mb-10 mt-3" currentvalue="0" totalvalue="5"/>

        <h1 class="text-4xl font-bold mb-4 text--primary pt-8">Who do you shop for?</h1>
        <p class="text--primary">Please select all options that apply:</p>

        <div class="mt-2">
            <div class="grid grid-cols-2 gap-3 mt-2 w-full max-w-md mx-auto">
            @foreach($options as $value => $option)
                <x-checkbox-card
                        name="input"
                        type="checkbox"
                        value="{{ $value }}"
                        checked="{{ in_array($value, $input) ? 'true' : 'false' }}"
                        label-class="{{ $value === 'all-the-above' ? 'col-span-2' : '' }}"
                        class="rounded-lg flex justify-center items-center py-4 px-2 font-bold h-16"
                >
                    <div>
                        <div class="flex justify-center">
                            {{$option}}
                        </div>
                    </div>
                </x-checkbox-card>
            @endforeach
            <div
            class="rounded-lg flex justify-center items-center py-4 px-2 font-bold h-16 text--primary cursor-pointer selected-all col-span-2"
            wire:click="selectAll"
            >
                All the above
            </div>           

            @error('input') <p class="text-red-600 mt-2">{{ $message }}</p> @enderror
        </div>
        </div>
</div>
    @if(count($input))
    <div class="flex justify-end w-full max-w-md mx-auto">
        <x-button
            type="submit"
            class="btn--primary w-full ml-2"
            wire:loading.attr="disabled"
            style="width:50%"
        >
            Next
            <i class="fas fa-arrow-right ml-3"></i>
        </x-button>
    </div>
    @endif
    <x-analytics-tracker page="shop-form" />
</form>
