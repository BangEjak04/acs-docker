<x-layouts.app>
    <div class="min-h-screen pt-16 pb-8">
        <section class="text-center py-10 bg-blue-100">
            <h1 class="text-3xl font-bold">Selamat Datang di Berita PT ACS</h1>
        </section>

        <section class="max-w-7xl mx-auto mt-6 mb-12">
            @if ($posts->count())
                <section class="px-4 grid grid-cols-1 gap-6 sm:grid-cols-2 sm:px-6 lg:grid-cols-3 lg:px-8">
                    @foreach ($posts as $post)
                        <x-post :post="$post" :type="__('item')" />
                    @endforeach
                </section>
            @else
                <p class="text-center text-gray-500">Belum ada postingan.</p>
            @endif
        </section>
    </div>
</x-layouts.app>
