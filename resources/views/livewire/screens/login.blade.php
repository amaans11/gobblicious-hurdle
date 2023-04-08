<div class="flex flex-col min-h-screen">

    <div class="h-full px-4 mt-8 pt-8 w-full max-w-md mx-auto">
        <form wire:submit.prevent="submit">
            <h1 class="text-2xl font-medium mb-6 text--primary uppercase">Login</h1>

            <div class="mb-6 pt-4">
                <input
                    type="email"
                    class="rounded-lg  border-1 w-full outline-none p-4 text-xl text--primary focus:bg-input"
                    placeholder="{{ __('common.email') }}"
                    wire:model="email"
                />
                @error('email') <p class="text-red-600 mt-2">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6 relative">
                <input
                type="{{$is_password_visible ? 'text' : 'password'}}"
                    id="password"
                    class="rounded-lg  border-1 w-full outline-none p-4 text-xl text--primary focus:bg-input"
                    placeholder="{{ __('common.password') }}"
                    wire:model="password"
                />
                <img src="{{asset('images/eye-icon.png')}}" wire:click="togglePassword" class="w-5 h-4 eye-icon" />
                @error('password') <p class="text-red-600 mt-2">{{ $message }}</p> @enderror
            </div>
            @if($email || $password)
                <button
                    type="submit"
                    class="btn text-white btn--primary w-full relative mt-4 h-16"
                    wire:loading.attr="disabled"
                >
                    Login
                    <i class="fas fa-arrow-right text-xl absolute right-5"></i>
                </button>
            @else
            <a href="{{ route('register') }}" class="flex flex-row justify-center mt-4">I don’t have an account yet,</a>
            <a href="{{ route('register') }}" class="flex flex-row justify-center">go back to  <span class="font-bold ml-1"> Sign Up</span></a>
            @endif

        </form>
    </div>

    <x-analytics-tracker page="login" />
</div>
