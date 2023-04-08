@foreach ($recipes as $key => $item)
    <div class="relative mx-4 mb-10">
        <img class="w-full rounded-lg" src="{{ $images[$key] }}"/>
        <div class="backdrop-filter backdrop-blur-lg bg-opacity-10 bg-black w-full flex justify-between px-4" style="position:absolute;bottom:40px">
            <div class="font-bold text-white text-2xl" >
                {{ $item->name }}
            </div>

            <button wire:click="infoHandler({{ $item->id }})">
                <img src="{{ asset('images/info.png') }}"/>
            </button>
        </div>

    </div>
@endforeach
