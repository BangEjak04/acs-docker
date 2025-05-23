<x-layouts.app>
    <div class="max-w-7xl mx-auto min-h-screen pt-16 px-4">
        <div class="my-6">
            <div class="max-w-4xl mx-auto mt-9">
                <h1 class="text-3xl font-bold">{{ $post->title }}</h1>
                <p class="text-sm text-gray-500">{{ date('d M Y', strtotime($post->published_at)) }}</p>

                <img class="mt-4 rounded-md object-cover mx-auto w-full"
                {{-- src="{{ asset('storage/' . $post->image) }}" --}}
                src="{{ $post->image }}"
                alt="{{ $post->title }}">
                @if ($post->img && file_exists(storage_path('app/public/' . $post->img)))
                    <img src="{{ asset('storage/' . $post->img) }}" alt="{{ $post->title }}"
                        class="w-full mt-4 rounded" />
                @endif

                <div class="mt-6 prose max-w-none">
                    {!! $post->body !!}
                </div>
            </div>
        </div>
    </div>

</x-layouts.app>
