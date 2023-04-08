<form wire:submit.prevent="submit" class="flex flex-col flex-grow  justify-between min-h-body overflow-hidden py-4">
    <div class="h-full w-full max-w-md mx-auto p-4" >

        <div>
            <h1 class="text-4xl font-bold mb-4 text--primary pt-8" >Welcome back, {{ Str::ucfirst(Auth::user()->name) }}!</h1>
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

    <x-analytics-tracker page="survey-completed" />
</form>
