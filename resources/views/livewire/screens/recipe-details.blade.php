<div class="pb-5 ">
    <div class="flex w-full mt-10 items-center">
        <img class="flex-1 w-1/2 rounded" src="https://picturetherecipe.com/wp-content/uploads/2020/01/Rogan-Josh-by-PictureTheRecipe-Featured-1-395x500.jpg"/>
        <div class="h-full flex-1 px-4">
            <h3 class="text-2xl leading-6 font-bold text-gray-600 mb-8">
                {{ $recipe->name }}
            </h3>

            <p class="mt-2 max-w-4xl text-sm text-gray-500">
                {{ $recipe->description }}
            </p>
        </div>

    </div>

    <div class="flex mt-4 items-center">
        <div class="underline mr-4 font-bold">Tags:</div>
        @foreach ($recipe->tags as $tag)
            <div class="text-sm text-blue underline mr-2">{{ $tag->name }}</div>
        @endforeach
    </div>


    <div class="pt-8 text-2xl text-gray-600  pb-4 font-bold">Ingredients</div>
    <div class="bg-white border border-gray-200 shadow-lg rounded-lg p-4">
        @foreach ($recipe->ingredients as $ingredient)
            <div class="flex py-2 items-center border-b border-gray-300 ">
                <img class="w-12 rounded-lg" src="https://images.immediate.co.uk/production/volatile/sites/30/2020/02/Red-peppers-afa27f8.jpg?quality=90&resize=768,574"/>
                <div class="text-sm text-gray-500 ml-4">{{ $ingredient->name }}</div>
            </div>

        @endforeach
    </div>


    <div class="pt-8 text-2xl text-gray-600 font-bold">Instructions</div>
    <div class="pt-4 text-sm text-gray-500">{{ $recipe->instructions }}</div>


</div>
