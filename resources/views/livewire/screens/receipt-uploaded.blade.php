<form form wire:submit.prevent="submit" class="flex flex-col justify-between min-h-body">
    <div class="w-full h-full max-w-md px-4 mx-auto">
        <div>
            <h1 class="py-10 mb-5 text-2xl font-medium text-center text--primary">Sorry, your upload was unsuccessful.
            </h1>
            <p class="mb-4 font-normal text-md text--primary">We are currently under maintenance and apologize for the
                inconvenience. We will notify you as soon as possible.</p>
            <p class="mb-5 font-normal text-md text--primary">Please reach out to us with any suggestions or concerns:
                <a class="font-bold text--primary"
                    href="mailto:connections@mealstuff.com?subject=quickscan">Connections@mealstuff.com</a>
            </p>
            <p class="mb-2 font-normal text-md text--primary">Thank you!</p>

        </div>
    </div>
    <div class="flex w-full max-w-md px-4 pb-8 mx-auto mt-4">
        <a href="{{ route('home') }}" class="w-full mt-2 btn btn--primary">
            OK
        </a>
    </div>

    <x-analytics-tracker page="receiptUploaded" />

    <script>
        window.addEventListener("load", function() {
            const prop_event = {
                content_type: 'hurdle',
                content_ids: [project],
                content_category: 'hurdle',
                project,
            };

            fbq('track', 'Lead', prop_event);
            const namespace = '240dbcea-7203-4370-8f00-8b5ec7d4a2be';
            const email = '{{ auth()->user()->email }}';
            const uuid = window.uuidv5(email, namespace);
            prop_event.email = email;
            analytics.identify(uuid, {
                email
            });
            analytics.track('Lead', prop_event);
        });
    </script>
</form>
