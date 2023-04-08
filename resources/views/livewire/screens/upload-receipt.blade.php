<form
    wire:submit.prevent="submit"
    enctype="multipart/form-data"
    x-data="imageData"
    class="flex flex-col justify-between min-h-body"
    x-on:livewire-upload-progress="progress = $event.detail.progress"
    x-on:livewire-upload-start="isUploading = true"
    x-on:livewire-upload-finish="isUploading = false"
>
    <div class="h-full px-4 w-full max-w-md mx-auto">
        <div x-show="!image" class="flex flex-col items-center">

            <h1 class="text-2xl font-medium mb-5 text--primary text-center py-10">Woohoo, {{ auth()->user()->name }}!<br>Your profile is complete.</h1>
            <h1 class="text-3xl font-medium mb-5 text--primary text-center">Upload your first receipt</h1>

            <label class="no-underline inline-block my-5 bg-white rounded-lg shadow-lg p-4 text-center cursor-pointer">
                <i class="fal fa-cloud-upload mb-3 fa-2x text--primary"></i>
                <p class="text--primary text-center font-bold text-lg">Upload Image</p>
                <input type="file" accept="image/jpg, image/jpeg, image/png" x-on:change="onChoose" wire:model.defer="receipt" class="hidden" />
            </label>

            <p class="text-sm text-gray-600 p-4">Make sure the store logo, date,<br>all purchases and digits are showing</p>
        </div>
        <div x-show="image" x-cloak class="flex flex-col items-center w-full">
            <img x-bind:src="image" />
            @error('receipt') <p class="text-red-600 my-2">{{ $message }}</p> @enderror

            <div x-show="isUploading" class="w-full my-5">
                <div class="h-5 w-full bg-white rounded-lg relative flex justify-center items-center overflow-hidden">
                    <div class="h-full bg--secondary absolute z-10" x-bind:style="'width: ' + progress + '%'"></div>
                    <div class="relative z-20 text-sm" x-data x-text="progress + '%'"></div>
                </div>
            </div>

            <p class="text-sm text-gray-600 p-4">Here’s a preview of your image.<br>Are the products, prices, and total visible?</p>

            <div class="grid grid-cols-2 gap-3 w-full">
                <button
                    type="button"
                    class="btn btn--white w-full"
                    x-on:click="image = null"
                >
                    Try again
                </button>
                <button
                    type="submit"
                    class="btn btn--primary w-full"
                    wire:loading.attr="disabled"
                >
                    Confirm
                </button>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('imageData', () => ({

                image: null,

                async onChoose(event) {
                    const response = await window.LoadImage(event.target.files[0], {orientation: true, canvas: true});
                    response.image.toBlob(
                        file => {
                            this.image = URL.createObjectURL(new File([file], 'file', { type: file.type }));
                        },
                        'image/jpeg',
                        0.9
                    );
                },

                progress: 0,

                isUploading: false

            }));
        });
    </script>

    <x-analytics-tracker page="uploadReceipt" />
</form>
