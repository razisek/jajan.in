@extends('layout.main')

@section('title', 'Create Post')

@section('content')
    <div id="loading" class="hidden fixed inset-0 bg-gray-800 bg-opacity-70 z-50">
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-2xl">Creating
            Post...
        </div>
    </div>
    <div class="p-2">
        <div class="flex justify-between items-center">
            <p class="font-semibold text-3xl">Create Post</p>
            <a href="javascript:history.back()"
                class="flex items-center px-4 py-2 rounded-full text-[#737373] cursor-pointer font-semibold text-md">
                <i class="bi bi-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>

        <div id="alert"
            class="hidden mt-4 font-regular relative w-full rounded-lg bg-pink-500 p-4 text-base leading-5 text-white opacity-100"
            data-dismissible="alert">
            <div class="mr-12" id="msg">Alert dismissible</div>
            <div class="absolute top-2.5 right-3 w-max rounded-lg transition-all hover:bg-white hover:bg-opacity-20"
                data-dismissible-target="alert">
                <button role="button" class="w-max rounded-lg p-1" data-alert-dimissible="true">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <form action="{{ route('page.post.store') }}" id="formInput" method="POST"
            class="p-6 bg-white border border-gray-200 rounded-lg shadow mt-8" enctype="multipart/form-data">
            @csrf
            <div class="relative h-full w-full min-w-[200px]">
                <input placeholder="Post Title" name="title"
                    class="peer h-full w-full border-b border-blue-gray-200 bg-transparent pt-4 pb-1.5 font-sans text-md font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border-blue-gray-200 focus:border-primary focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50" />
                <label
                    class="after:content[' '] pointer-events-none absolute left-0 -top-2.5 flex h-full w-full select-none text-lg font-normal leading-tight text-blue-gray-500 transition-all after:absolute after:-bottom-2.5 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-primary after:transition-transform after:duration-300 peer-placeholder-shown:leading-tight peer-placeholder-shown:text-blue-gray-500 peer-focus:text-lg peer-focus:leading-tight peer-focus:text-primborder-primary peer-focus:after:scale-x-100 peer-focus:after:border-primary peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                    Title
                </label>
            </div>
            <div class="relative w-full min-w-[200px] mt-8">
                <textarea placeholder="Some post update for your fans" name="content"
                    class="peer h-full min-h-[180px] w-full resize-none border-b border-blue-gray-200 bg-transparent pt-4 pb-1.5 font-sans text-md font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border-blue-gray-200 focus:border-primary focus:outline-0 disabled:resize-none disabled:border-0 disabled:bg-blue-gray-50"></textarea>
                <label
                    class="after:content[' '] pointer-events-none absolute left-0 -top-2.5 flex h-full w-full select-none text-lg font-normal leading-tight text-blue-gray-500 transition-all after:absolute after:-bottom-1 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-primary after:transition-transform after:duration-300 peer-placeholder-shown:leading-tight peer-placeholder-shown:text-blue-gray-500 peer-focus:text-lg peer-focus:leading-tight peer-focus:text-primborder-primary peer-focus:after:scale-x-100 peer-focus:after:border-primary peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                    Content
                </label>
            </div>
            <p class="text-lg mt-4">Upload Image</p>
            <div class="flex items-center gap-5">
                <div class="flex items-center mt-2">
                    <label
                        class="w-48 h-48 flex flex-col justify-center items-center px-4 py-6 text-gray-500 hover:text-primary hover:border-primary transition-all duration-300 rounded-lg shadow-lg tracking-wide border border-gray-200 cursor-pointer">
                        <i class="bi bi-images text-lg"></i>
                        <p class="text-[12px]">Choose Image</p>
                        <input type="file" class="hidden" id="imageInput" accept="image/*" name="img[]" multiple />
                    </label>
                </div>

                <div id="imagePreview" class="mt-4 flex items-center gap-3"></div>
            </div>
            <div class="mt-4">
                <p>Privacy Options</p>
                <label class="relative inline-flex items-center cursor-pointer mt-2">
                    <input type="checkbox" value="" class="sr-only peer" name="privacy">
                    <div
                        class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primaryLight rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary">
                    </div>
                    <span class="ml-3 text-sm font-medium text-gray-900">Private</span>
                </label>
            </div>
            <div class="flex justify-center">
                <button class="w-2/5 bg-primary text-white py-2 rounded-lg mt-6 font-bold text-sm">
                    Create Post
                </button>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        const imageInput = document.getElementById('imageInput');
        const imagePreview = document.getElementById('imagePreview');
        const formInput = document.getElementById('formInput');
        const alert = document.getElementById('alert');
        let uploadedImages = [];

        imageInput.addEventListener('change', (e) => {
            const files = Array.from(e.target.files);

            if (uploadedImages.length + files.length > 3) {
                alert('Maksimal 3 gambar yang diizinkan.');
                return;
            }

            files.forEach((file) => {
                if (!isSupportedFileType(file)) {
                    alert(
                        'Jenis file tidak didukung. Harap unggah file dengan format PNG, JPG, atau JPEG.'
                    );
                    return;
                }

                if (uploadedImages.some((uploadedImage) => uploadedImage.name === file.name)) {
                    return;
                }

                const reader = new FileReader();

                reader.onload = (event) => {
                    const image = document.createElement('img');
                    image.src = event.target.result;
                    image.classList.add('max-w-48', 'max-h-48', 'mt-2', 'h-48', 'w-48', 'rounded-lg',
                        'object-cover');

                    const deleteButton = document.createElement('button');
                    deleteButton.innerText = 'Delete';
                    deleteButton.classList.add('mt-1', 'text-red-500', 'hover:text-red-700', 'text-sm');
                    deleteButton.addEventListener('click', () => {
                        imagePreview.removeChild(imageContainer);
                        uploadedImages = uploadedImages.filter((uploadedImage) => uploadedImage
                            .name !== file.name);
                    });

                    const imageContainer = document.createElement('div');
                    imageContainer.appendChild(image);
                    imageContainer.appendChild(deleteButton);

                    imagePreview.appendChild(imageContainer);
                    uploadedImages.push(file);
                };

                reader.readAsDataURL(file);
            });
        });

        formInput.addEventListener('submit', (e) => {
            e.preventDefault();

            const formData = new FormData(formInput);
            formData.append('privacy', e.target.privacy.checked ? 'private' : 'public');

            uploadedImages.forEach((uploadedImage) => {
                formData.append('images[]', uploadedImage);
            });

            const loading = document.getElementById('loading');
            loading.classList.remove('hidden');
            alert.classList.add('hidden');

            fetch(e.target.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': e.target._token.value
                    }
                })
                .then((response) => response.json())
                .then((data) => {
                    loading.classList.add('hidden');
                    if (data.status == 'error') {
                        alert.classList.remove('hidden');
                        alert.querySelector('#msg').innerText = data.message;
                        window.scrollTo(0, 0);
                    } else {
                        window.location.href = "{{ route('page.post.index') }}";
                    }
                })
                .catch((error) => {
                    loading.classList.add('hidden');
                    alert(error.message);
                });
        });

        function isSupportedFileType(file) {
            const allowedExtensions = /(\.png|\.jpg|\.jpeg)$/i;
            const fileName = file.name;
            const fileExtension = fileName.slice(fileName.lastIndexOf('.')).toLowerCase();
            return allowedExtensions.test(fileExtension);
        }
    </script>
@endsection
