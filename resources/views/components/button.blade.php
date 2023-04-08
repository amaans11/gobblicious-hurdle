<{{ $attributes->get('as') ?? 'button' }}
    {{ $attributes->merge(['class' => 'btn no-underline inline-flex items-center justify-center text-center font-bold text-xl rounded-lg py-3 px-6']) }}
>
    {{ $slot }}
</{{ $attributes->get('as') ?? 'button' }}>
