<form form wire:submit.prevent="submit" class="flex flex-col flex-grow justify-between min-h-body overflow-hidden py-4">
    <div class="h-full w-full max-w-md mx-auto">
    <x-progress-bar value="60" currentvalue="3" totalvalue="5" class="mb-10 mt-3"/>

        <h1 class="text-4xl font-bold mb-4 text--primary pt-8">What diets are you interested in ?</h1>
        <p class="text--primary">Please select all options that apply:</p>

        <div class="mt-2">
            <div class="grid grid-cols-2 gap-3 mt-2 w-full max-w-md mx-auto">
            @foreach($options as $value => $option)
                <x-checkbox-card
                    name="input"
                    type="checkbox"
                    value="{{ $value }}"
                    checked="{{ in_array($value, $input) ? 'true' : 'false' }}"
                    class="rounded-lg flex justify-center items-center py-4 px-2 font-bold">
                        {{$option}}
                </x-checkbox-card>
            @endforeach
            @error('input') <p class="text-red-600 mt-2">{{ $message }}</p> @enderror
        </div>
    </div>
</div>

    <div class="flex w-full max-w-md mx-auto">
        <x-button
            type="button"
            class="border--primary w-full ml-2 text--primary"
            wire:loading.attr="disabled"
            style="width:50%"
            wire:click="back"
        >
            <i class="mr-3 fas fa-arrow-left"></i>
            Back
        </x-button>
        @if(count($input))
            <x-button
                type="submit"
                class="btn--primary w-full ml-2"
                wire:loading.attr="disabled"
                style="width:50%"
            >
                Next
                <i class="fas fa-arrow-right ml-3"></i>
            </x-button>
        @endif
    </div>
        <x-analytics-tracker page="profile-diet" />
</form>
