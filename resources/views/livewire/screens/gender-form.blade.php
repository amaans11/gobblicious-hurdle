<form form wire:submit.prevent="submit" class="flex flex-col justify-between min-h-body">
    <div class="h-full px-4 w-full max-w-md mx-auto">
        <div>
            <h1 class="text-2xl font-medium mb-5 text--primary text-center py-10">Complete your profile</h1>
            <h1 class="text-4xl font-medium mb-5 text--primary">I identify as...</h1>

            <div class="grid grid-cols-2 gap-2">
                @foreach($genderOptions as $genderKey => $genderText)
                    <label class="{{ $genderKey === 'none' ? 'col-span-2' : '' }}">
                        <input
                            name="gender"
                            type="radio"
                            class="hidden btn-checkbox"
                            wire:model.defer="gender"
                            value="{{ $genderKey }}"
                            checked="{{ $genderKey === $gender ? 'true' : 'false' }}"
                        >
                        <div class="btn btn--white text--primary w-full cursor-pointer">
                            {{ $genderText }}
                        </div>
                    </label>
                @endforeach
            </div>
            @error('gender') <p class="text-red-600 mt-2">{{ $message }}</p> @enderror

            <p class="text-sm text-gray-600 p-4">We want to make sure we are creating an inclusive product and reaching a wide audience</p>

        </div>
    </div>
    <div class="flex justify-end px-4 w-full max-w-md mx-auto pb-8 mt-4">
        <button
            type="submit"
            class="btn btn--primary relative mt-2"
            wire:loading.attr="disabled"
        >
            <p class="mr-6">Next</p>
            <i class="fas fa-arrow-right text-xl absolute right-5"></i>
        </button>
    </div>

    <x-analytics-tracker page="genderForm" />
</form>
