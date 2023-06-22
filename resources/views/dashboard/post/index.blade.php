@extends('layout.main')

@section('title', 'Post')

@section('content')
    <div id="loading" class="hidden fixed inset-0 bg-gray-800 bg-opacity-70 z-50">
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-2xl">Deleteing
            Post...
        </div>
    </div>
    <div class="p-2">
        <div class="flex justify-between items-center">
            <p class="font-semibold text-3xl">Post</p>
            <a href="{{ route('page.post.create') }}"
                class="flex items-center bg-primary px-4 py-2 rounded-full text-white cursor-pointer font-semibold text-md">
                <i class="bi bi-plus mr-2"></i>
                Post Baru
            </a>
        </div>
        <div class="grid grid-cols-3">
            @foreach ($posts as $post)
                <div class="p-6 bg-white border border-gray-200 rounded-lg shadow mt-8 max-w-sm">
                    <p class="font-semibold text-lg">{{ $post->title }}</p>
                    <p class="text-[#BCBCBC] text-[12px] mt-2">{{ $post->created_at->diffForHumans() }}</p>
                    <img src="{{ $post->media[0]->original_url }}" alt="post"
                        class="mt-2 rounded-lg h-44 w-screen max-h-44 object-cover">
                    <p class="mt-2 text-[14px] line-clamp-2">{{ $post->content }}</p>
                    <div class="mt-6 flex items-center gap-2">
                        <a href="{{ route('page.post.edit', $post->id) }}"
                            class="flex items-center text-[#747474] bg-[#D9D9D9] py-1 px-4 rounded-full cursor-pointer hover:bg-primary hover:text-white">
                            <i class="bi bi-pencil-fill mr-3"></i>
                            Edit
                        </a>
                        <a href="#" onclick="confirmDelete('{{ $post->id }}')"
                            class="flex items-center text-[#747474] border border-[#D9D9D9] py-1 px-4 rounded-full cursor-pointer hover:border-red-500 hover:text-red-500">
                            <i class="bi bi-x-lg mr-3"></i>
                            Hapus
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-10 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <p>Show</p>
                <select id="countries"
                    class="border border-gray-300 text-747474 text-sm rounded-full block p-2.5 bg-[#D9D9D9]">
                    <option selected value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="flex items-center gap-4">
                <i class="bi bi-chevron-left text-xl"></i>
                <div class="px-3 py-px bg-primary rounded-full text-white">
                    1
                </div>
                <i class="bi bi-chevron-right text-xl"></i>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const loading = document.getElementById('loading');
        function confirmDelete(id) {
            Swal.fire({
                title: 'Hold Up!',
                text: "Are you sure you want to delete this?",
                type: 'warning',
                icon: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                confirmButtonColor: '#435EBE',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.value) {
                    loading.classList.remove('hidden');
                    fetch("{{ route('page.post.destroy', '') }}" + '/' + id, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    }).then(response => {
                        loading.classList.add('hidden');
                        Swal.fire({
                            title: 'Success!',
                            text: 'Post has been deleted.',
                            type: 'success',
                            icon: 'success'
                        }).then(() => {
                            location.reload();
                        });
                    });
                }
            });
        }
    </script>
@endsection
