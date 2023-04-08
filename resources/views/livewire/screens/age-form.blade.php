<form form wire:submit.prevent="submit" class="flex flex-col justify-between min-h-body">
    <div class="h-full px-4 w-full max-w-md mx-auto">
        <div>
            <h1 class="text-2xl font-medium mb-5 text--primary text-center py-10">Complete your profile</h1>
            <h1 class="text-4xl font-medium mb-5 text--primary">I am...</h1>

            <div class="grid grid-cols-2 gap-2">
                @foreach($ageOptions as $ageKey => $ageText)
                    <label>
                        <input
                            name="age"
                            type="radio"
                            class="hidden btn-checkbox"
                            wire:model.defer="age"
                            value="{{ $ageKey }}"
                            checked="{{ $ageKey === $age ? 'true' : 'false' }}"
                        >
                        <div class="btn btn--white text--primary w-full cursor-pointer">
                            {{ $ageText }}
                        </div>
                    </label>
                @endforeach
            </div>
            @error('age') <p class="text-red-600 mt-2">{{ $message }}</p> @enderror

            <p class="text-sm text-gray-600 p-4">We only ask because it will help us curate the best rewards for you.</p>

        </div>
    </div>
    <div class="flex px-4 w-full max-w-md mx-auto pb-8 mt-4">
        <button
            type="submit"
            class="btn btn--primary w-full mt-2"
            wire:loading.attr="disabled"
        >
            Done
        </button>
    </div>

    <x-analytics-tracker page="ageForm" />
</form>
