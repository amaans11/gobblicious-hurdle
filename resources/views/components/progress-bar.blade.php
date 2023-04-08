<div>
    <div class="w-full bg-gray-200 h-2 rounded-full mb-12 {{ $attributes->get('class') }}">
        <div class="bg--secondary h-full rounded-full" style="width: {{ $attributes->get('value') }}%"></div>
        <div class="flex flex-row justify-between mt-2">
            @if($attributes->get('currentvalue') !== $attributes->get('totalvalue'))
            <div class="text--primary font-bold">Complete your profile...</div>
            @else
            <div class="text--primary font-bold">Profile complete!</div>
            @endif
            <div class="text--primary font-bold">{{ $attributes->get('currentvalue') }}/{{ $attributes->get('totalvalue') }}</div>
        </div>
    </div>
</div>