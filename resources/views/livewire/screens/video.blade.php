<div>
    <div class="max-w-lg w-full lg:max-w-xs mb-6 pt-8" >
        <label for="search" class="sr-only">Search for videos</label>
        <div class="relative mt-10">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            </div>
            <input wire:model.debounce.300ms="search"
                id="search"
                class="block w-full h-12 pl-10  pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:border-blue-300 focus:shadow-outline-blue sm:text-sm transition duration-150 ease-in-out"
                placeholder="Search for videos..." type="search" autocomplete="off">
                @if (isset($search) && strlen($search) > 2)
                <ul
                    class="absolute z-50 bg-white border border-gray-300 w-full rounded-md mt-2 text-gray-700 text-sm divide-y divide-gray-200">
                    @forelse ($searchResults as  $key => $result)
                            <li>
                                <button 
                                    class="flex items-center px-4 py-4 hover:bg-gray-200 transition ease-in-out duration-150"
                                    wire:click="setValue({{ $key }})"
                                > 
                                    <div class="text-sm leading-tight">{{$result}}</div>
                                </button>
                            </li>
                    @empty
                        <li class="px-4 py-4">No results found for "{{ $search }}"</li>
                    @endforelse
                </ul>
            @endif
        </div>
    </div>

    @foreach ($videos as $item)
        <div class="relative mb-10 mx-4">
            <video id="homevideo_{{ $item->id }}" preload="auto" data-setup="{}" autoplay="true" onended="run()"
               class="w-full h-full rounded-lg">
            <source src="{{ $item->video?->getUrl() }}" type="video/mp4">
        </video>
        <div class="font-bold text-white w-6/12 text-2xl" style="position:absolute;left:20px;bottom:40px">
            {{ $item->title }}
        </div>

        @if ($item->is_liked)
            <button wire:click="likeVideo({{ $item->id }})" style="position:absolute;right:20px;bottom:40px">
                <img src="{{ asset('images/liked.png') }}"/>
            </button>
        @else
            <button wire:click="" class="text-white" style="position:absolute;right:20px;bottom:100px">
                <img src="{{ asset('images/like.png') }}"/>
            </button>
        @endif
        <button wire:click="infoHandler({{ $item->id }})" style="position:absolute;right:20px;bottom:40px">
            <img src="{{ asset('images/info.png') }}"/>
        </button>
    </div>
@endforeach
<script>
    const videos = @json($videos);
    const windowHeight = window.innerHeight;
    const videoPlayer = document.getElementById("homevideo");
    let video_count = 0;

        window.addEventListener('load', videoScroll);
        window.addEventListener('scroll', videoScroll);

        function run($index) {
            window.scroll({
                top: (((video_count + 1) * windowHeight) - 120),
                left: 0,
                behavior: 'smooth'
            })
            video_count++;
        };

    function videoScroll() {
        if (document.querySelectorAll('video[autoplay]').length > 0) {
            const windowHeight = window.innerHeight,
                videoEl = document.querySelectorAll('video[autoplay]');
            for (let i = 0; i < videoEl.length; i++) {
                let thisVideoEl = videoEl[i],
                    videoHeight = thisVideoEl.clientHeight,
                    videoClientRect = thisVideoEl.getBoundingClientRect().top;
                if (videoClientRect <= ((windowHeight) - (videoHeight * .5)) && videoClientRect >= (0 - (videoHeight *
                    .5))) {
                    thisVideoEl.play();
                } else {
                    thisVideoEl.pause();
                }
            }
        }
    }
</script>
</div>
