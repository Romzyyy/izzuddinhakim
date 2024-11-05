<x-user-layout title="Academia">
    <x-header :title="$title" :desc="$desc" />
    <div
        class="container mx-auto px-4 sm:px-6 lg:px-8 flex justify-center bg-white dark:bg-gray-950 transition duration-300 ease-in-out text-gray-900 dark:text-gray-100">
        <div class="max-w-7xl w-full">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 lg:gap-12 tracking-wide">
                @foreach ($my_academias as $academia)
                    <div data-aos="zoom-out-up" data-aos-duration="1000" data-aos-delay="{{ $loop->index * 300 }}"
                        class="bg-gray-100
                        dark:bg-gray-900 transition duration-300 ease-in-out text-gray-900 dark:text-gray-100 rounded-lg
                        dark:shadow-white/10 shadow-gray-400 overflow-hidden shadow-lg hover:shadow-2xl
                        hover:scale-105">
                        <div class="relative">
                            <img class="w-full h-48 sm:h-56 object-cover"
                                src="{{ asset('assets/images/academia/' . $academia->gambar) }}"
                                alt="{{ $academia->title }}">
                            <div
                                class="absolute top-0 right-0 bg-black bg-opacity-50 text-white text-xs px-2 py-1 m-2 rounded">
                                {{ $academia->created_at->format('d M Y') }}
                            </div>
                        </div>

                        <div class="p-4">
                            <h3 class="text-xl font-medium mb-2">
                                {{ $academia->title }}
                            </h3>
                            <div class="flex justify-between items-center">
                                <a href="{{ $academia->link_jurnal }}"
                                    class="text-blue-400 hover:text-blue-300 transition-colors duration-200 flex items-center"
                                    target="_blank" rel="noopener noreferrer">
                                    <span>Read More</span>
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-user-layout>
