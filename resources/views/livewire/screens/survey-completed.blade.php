<form wire:submit.prevent="submit" class="flex flex-col flex-grow  justify-between min-h-body overflow-hidden py-4">
    <div class="h-full w-full max-w-md mx-auto " >
        <div>
        <x-progress-bar value="100" currentvalue="5" totalvalue="5" class="mb-10 mt-3"/>
            <h1 class="text-4xl font-bold mb-4 text--primary pt-8" s>We apologize.</h1>

            <div class="mt-8" >
                <div class="w-full max-w-md mx-auto">
                <p class="text--primary">We are currently under maintenance and apologize for the inconvenience. We will notify you as soon as we are back up.</p>
                <p class="text--primary mt-8">Please reach out to us with any suggestions or concerns:</p>
                <p class="text--primary  font-bold">Connections@mealstuff.com </p>
                <p class="text--primary mt-8">Thank You!</p>
            </div>
        </div>
    </div>
    </div>

    <div class="w-full max-w-md mx-auto">
        <x-button
            as="a"
            href="/"
            type="submit"
            class="btn--primary w-full mb-2 font-bold"
        >
            Ok
        </x-button>
        <x-button
            type="button"
            class="border--primary w-full  text--primary font-bold"
            wire:click.prevent="logout"
        >
            Logout
        </x-button>
    </div>
    <x-analytics-tracker page="survey-completed" />
</form>