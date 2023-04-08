<div class="flex flex-col min-h-screen">
    <video class="video-js" id="homevideo" preload="auto" data-setup="{}" autoplay="true" class="w-full h-full"
        >
        <source src="{{ $video->video->getUrl() }}" type="video/mp4">
    </video>
    <div class="mt-8">
        <div class="text-4xl px-4">Related Recipes</div>
        
        @foreach ($recipes as $recipe)
            <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
                <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                    <div class="ml-4 mt-4">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            {{ $recipe['name'] }}
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">
                            {{ $recipe['description'] }}
                        </p>
                    </div>
                    <div class="ml-4 mt-4 flex-shrink-0">
                        <button type="button"
                            wire:click="viewRecipe({{$recipe['id']}})"
                            class="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            View Recipe Details
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
