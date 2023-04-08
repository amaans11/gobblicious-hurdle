<div class="flex flex-col min-h-screen">

    <div class="h-full px-4 mt-8 pt-8 w-full max-w-md mx-auto">
        <form wire:submit.prevent="submit">
            <h1 class="text-2xl font-medium mb-6 text--primary uppercase">{{ __('common.signup') }}</h1>

            <div class="mb-6 pt-4">
            <input
                    type="text"
                    id="name"
                    class="rounded-lg  border-1 w-full outline-none p-4 text-xl text--primary focus:bg-input"
                    placeholder="Name"
                    wire:model.defer="name"
            />
                @error('name') <p class="text-red-600 mt-2">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <input
                    type="email"
                    class="rounded-lg  border-1 w-full outline-none p-4 text-xl text--primary focus:bg-input"
                    placeholder="{{ __('common.email') }}"
                    wire:model.defer="email"
                />
                @error('email') <p class="text-red-600 mt-2">{{ $message }}</p> @enderror
            </div>
            <div class="mt-4 mb-6 relative">

                <input
                    type="{{$is_password_visible ? 'text' : 'password'}}"
                    id="password"
                    class="rounded-lg  border-1 w-full outline-none p-4 text-xl text--primary focus:bg-input relative"
                    placeholder="{{ __('common.password') }}"
                    wire:model.defer="password"
                />
                <img src="{{asset('images/eye-icon.png')}}" wire:click="togglePassword" class="w-5 h-4 eye-icon" />

                @error('password') <p class="text-red-600 mt-2">{{ $message }}</p> @enderror
            </div>

            <button
                type="submit"
                class="btn btn--primary text-white w-full relative mt-4 h-16"
                wire:loading.attr="disabled"
            >
                {{ __('common.signup') }}
                <i class="fas fa-arrow-right text-xl absolute right-5"></i>
            </button>
        </form>
    </div>

    <x-analytics-tracker page="registration" />
</div>
