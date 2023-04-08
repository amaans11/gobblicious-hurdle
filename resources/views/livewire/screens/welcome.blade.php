<div class="flex flex-col justify-between min-h-screen">
    <div class="flex justify-center my-10">
    </div>

    <div class="w-full h-full max-w-md px-4 mx-auto">
        <div class="text-center">
            <h1 class="mb-3 text-3xl font-medium text--primary">{!! __('screens.welcome.title', ['class' => 'font-black']) !!}</h1>

            <a class="w-full h-16 mb-6 font-bold btn btn--primary text-white" href="{{ route('register') }}">
                <i class="fas fa-envelope text-xl mr-3"></i>
                {{ __('screens.welcome.create_an_account') }}
            </a>
            <a class="w-full h-16 mb-6 font-bold btn btn--white bg-white border--primary text--primary"
                href="{{ route('login') }}">
                {{ __('screens.welcome.login') }}
            </a>
        </div>
    </div>

    <div>
        <p class="text-xs text-center text-gray-600">{!! __('screens.welcome.company_copyright') !!}</p>
        <p class="pb-8 text-xs text-center text-gray-600">
            {!! __('screens.welcome.terms', [
                    'termsHref' => 'https://www.myfoodandfamily.com/useragreement',
                    'privacyHref' => 'https://www.myfoodandfamily.com/privacynotice'
                ])
            !!}
        </p>
    </div>

    <x-analytics-tracker page="welcome" />
</div>
