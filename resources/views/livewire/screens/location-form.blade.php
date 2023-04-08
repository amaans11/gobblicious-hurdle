<form form wire:submit.prevent="submit" class="flex flex-col justify-between min-h-body">
    <div class="h-full px-4 w-full max-w-md mx-auto">
        <div>
            <h1 class="text-2xl font-medium mb-5 text--primary text-center py-10">Complete your profile</h1>
            <h1 class="text-4xl font-medium mb-5 text--primary">My location is...</h1>

            <div class="mb-6">
                <input
                    type="text"
                    class="rounded-lg border-0 w-full outline-none p-4 text-xl font-bold"
                    placeholder="City"
                    wire:model.defer="city"
                />
                @error('city') <p class="text-red-600 mt-2">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <select
                    class="rounded-lg border-0 w-full outline-none p-4 text-xl font-bold"
                    placeholder="State"
                    wire:model.defer="state"
                >
                    <option value="">Choose state</option>
                    @foreach($stateOptions as $stateCode => $stateName)
                        <option value="{{ $stateCode }}">{{ $stateName }}</option>
                    @endforeach
                </select>
                @error('state') <p class="text-red-600 mt-2">{{ $message }}</p> @enderror
            </div>

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

    <x-analytics-tracker page="locationForm" />
</form>
