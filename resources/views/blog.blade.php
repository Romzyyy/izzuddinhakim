<x-user-layout title="Blog">
    <x-header :title="$title" :desc="$desc" />
    <div
        class="grid grid-cols-1 gap-16 py-2 md:grid-cols-2 bg-white dark:bg-gray-950 transition duration-300 ease-in-out text-gray-900 dark:text-gray-100">
        @foreach ($my_blogs as $blog)
            <div data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="{{ $loop->index * 300 }}"
                class="md:rounded-lg p-6
                md:border-b-0 bg-gray-100 shadow-2xl dark:shadow-white/10 dark:bg-gray-900 border-muted-foreground pb-12
                md:pb-6 md:pr-6 md:hover:bg-gray-400/10 ">
                <div class="flex items-center justify-between">
                    <p class="text-sm text-muted-foreground bg-gray-500/50 px-4 py-1 rounded-full">
                        <a href="{{ route('blog.category', ['slug' => Str::slug($blog->category)]) }}">
                            {{ $blog->category }}
                        </a>
                    </p>

                    <p class="text-sm text-muted-foreground">{{ $blog->created_at->format('d F Y') }}</p>
                </div>

                <div class="relative mt-4 ">
                    <img class="w-full h-48 sm:h-56 object-cover rounded-t-md brightness-75"
                        src="{{ asset('assets/images/blog/' . $blog->image) }}" alt="{{ $blog->title }}">
                    <div class="absolute bottom-0 left-0 text-white text-3xl font-bold px-2 py-1 m-2 ">
                        <a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a>
                    </div>
                </div>

                <p class="mt-4 text-muted-foreground">
                    {{ Str::limit(strip_tags($blog->content), 255) }}
                </p>

                <div class="flex justify-between items-center mt-4">
                    <a href="{{ route('blog.show', $blog->slug) }}"
                        class="text-blue-400 hover:text-blue-300 transition-colors duration-200 flex items-center"
                        rel="noopener noreferrer">
                        <span>Read More</span>
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d=" M14 5l7 7m0 0l-7 7m7-7H3">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</x-user-layout>
