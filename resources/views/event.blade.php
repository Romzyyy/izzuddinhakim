<x-user-layout title="Event">
    <x-header :title="$title" :desc="$desc" />
    <div
        class="container mx-auto px-4 sm:px-6 lg:px-8 flex justify-center bg-white dark:bg-gray-950 transition duration-300 ease-in-out text-gray-900 dark:text-gray-100">
        <div class="max-w-7xl w-full">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 lg:gap-12 tracking-wide">
                @foreach ($my_events as $event)
                    @php
                        $isFinished = strtotime($event->tanggal) < strtotime(date('Y-m-d'));
                    @endphp
                    <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="{{ $loop->index * 300 }}"
                        class="bg-white dark:bg-[#020617] shadow-2xl shadow-gray-400 dark:shadow-gray-50/10 dark:shadow-xl rounded-md overflow-hidden flex flex-col h-fit">
                        <div class="relative w-full h-fit">
                            <img class="w-full h-full object-cover {{ $isFinished ? 'grayscale' : '' }}"
                                src="{{ asset('assets/images/event/' . $event->gambar) }}" alt="Card Image">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-white dark:from-[#020617] to-transparent">
                            </div>
                        </div>

                        <div class="p-4 flex-grow">
                            @if ($isFinished)
                                <h2 class="text-xl font-medium text-gray-600 dark:text-gray-50/50">
                                    {{ $event->title }}
                                </h2>
                                <h3 class="text-sm text-gray-600 dark:text-gray-50/50 mt-2 text-muted-foreground">
                                    oleh:
                                    {{ $event->organizer }}</h3>
                                <div class="h-1/2 flex justify-center items-center">
                                    <p class="text-red-500 text-center text-2xl font-bold">
                                        This event is finished
                                    </p>
                                </div>
                            @else
                                <a href="{{ route('event.show', $event->slug) }}">
                                    <h2 class="text-lg font-semibold ">
                                        {{ $event->title }}
                                    </h2>
                                </a>
                                <h3 class="text-sm  mt-2 text-muted-foreground">
                                    oleh:
                                    {{ $event->organizer }}</h3>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-user-layout>
