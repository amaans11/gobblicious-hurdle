<x-guest-layout>
    <div class="bg-gray-100">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            <div>
                <x-jet-authentication-card-logo />
            </div>

            <!--
            <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose">
                Hurdle test
            </div>
        -->
            <div class=" mt-6 bg-indigo-700 flex-1 mx-auto">
                <div class="max-w-2xl  text-center py-16 px-4 sm:py-20 sm:px-6 lg:px-8">
                    <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                        <span class="block">Welcome to the Hurdle</span>
                    </h2>
                    <p class="mt-4 text-lg leading-6 text-indigo-200">Start your yourney today.</p>
                    <a href="/login"
                        class="mt-8 w-full inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50 sm:w-auto">
                        Get started
                    </a>
                </div>
            </div>
            <footer class='w-full text-center border-t border-grey p-4 pin-b'>
                Add Hurdle to Home Screen
            </footer>
        </div>
    </div>

</x-guest-layout>
