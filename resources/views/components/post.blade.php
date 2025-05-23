@props(['post', 'type'])

@php
    $classes = match ($type) {
        'highlight' => 'flex flex-col-reverse space-y-4 md:flex-col',
        'item' => 'space-y-4',
        'mini' => 'flex',
    };
@endphp

<a href="{{ route('post.show', $post->id) }}">
<div {{ $attributes->merge(['class' => $classes]) }}>
    <div>
            <img class="rounded-md object-cover mx-auto" {{-- src="{{ asset('storage/' . $post->image) }}" --}} src="{{ $post->image }}"
                alt="{{ $post->title }}">
            </div>
            <div class="">
        <div class="mb-2 flex justify-between items-center">
            <span class="text-sm py-1 px-2 bg-blue-200 rounded-xs">Berita Terbaru</span>
            <span class="ml-2 text-xs">{{ date('d M Y', strtotime($post->published_at)) }}</span>
        </div>
        <h3 class="text-3xl font-semibold line-clamp-2 hover:underline">{{ $post->title }}</h3>
        {{-- <p class="mt-4">{!! Str::limit($post->body, 100, '...') !!} </p> --}}
        <p class="mt-4 line-clamp-2">{!! $post->body !!}/p>
        </div>
    </div>
</a>
