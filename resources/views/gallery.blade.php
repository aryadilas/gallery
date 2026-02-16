<x-layouts::simple :title="'Sunflower Photo Gallery'">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="text-center mb-12" data-aos="fade-up" data-aos-duration="800">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-gray-100 mb-4">
                Sunflower Photo Gallery
            </h1>
            <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                Explore our curated collection of beautiful photographs. Each image tells a unique story, capturing moments of beauty, inspiration, and creativity.
            </p>
        </div>

        <div class="grid grid-cols-3 md:grid-cols-3 gap-6 mb-12">
            <div class="text-center p-6 bg-gray-50 dark:bg-zinc-800 rounded-lg" data-aos="fade-up" data-aos-delay="100">
                <div class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-2">11</div>
                <div class="text-sm text-gray-600 dark:text-gray-400">Photos</div>
            </div>
            <div class="text-center p-6 bg-gray-50 dark:bg-zinc-800 rounded-lg" data-aos="fade-up" data-aos-delay="200">
                <div class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-2">4K</div>
                <div class="text-sm text-gray-600 dark:text-gray-400">Quality</div>
            </div>
            <div class="text-center p-6 bg-gray-50 dark:bg-zinc-800 rounded-lg" data-aos="fade-up" data-aos-delay="300">
                <div class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-2">2026</div>
                <div class="text-sm text-gray-600 dark:text-gray-400">Updated</div>
            </div>
        </div>

        <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-6" data-aos="fade-up" data-aos-duration="800">
            Featured Images
        </h2>

        <div class="columns-2 lg:columns-3 gap-4">
            @foreach($images as $image)
                <div class="break-inside-avoid mb-4 relative group" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
                    <a href="/storage/galleries/{{ $image->filename }}"
                       target="_blank"
                       class="block rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                        <img
                            src="/storage/galleries/{{ $image->filename }}"
                            alt="{{ $image->alt_text ?? $image->title ?? 'Gallery image' }}"
                            class="w-full h-auto object-cover transition-transform duration-300 group-hover:scale-105"
                            loading="lazy"
                            onerror="this.src='/assets/404.png';this.onerror=null;"
                        >
                    </a>

                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-end p-4">
                        @if($image->title)
                            <p class="text-white font-medium text-sm">
                                {{ $image->title }}
                            </p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layouts::simple>
