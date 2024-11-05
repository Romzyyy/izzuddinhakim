<x-user-layout title="About">
    <x-header :title="$title" :desc="$desc" />
    <!-- Section: About Me -->
    <section class="py-4 sm:py-6 md:py-8 ">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            @foreach ($summaries as $item)
                <div class="tracking-wide">
                    <p class="text-base sm:text-lg md:text-xl lg:indent-8">{{ $item->summary }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Section: Experience -->
    <section class="py-8 sm:py-12 md:py-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-800 dark:text-gray-400">Experience</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8 max-w-6xl mx-auto">
                @foreach ($experiences as $item)
                    <div data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000"
                        data-aos-delay="{{ $loop->index * 300 }}" class="p-4 sm:p-6 rounded-lg shadow-2xl">
                        <div class="flex flex-col sm:flex-row gap-4 items-start md:items-center my-4">
                            <div class="flex-shrink-0 w-36 h-36 sm:w-24 sm:h-24 bg-cover bg-center">
                                <img src="{{ asset('assets/images/experience/' . $item->image) }}"
                                    alt="{{ $item->company_name }}"
                                    class="w-full h-full object-cover shadow-md rounded-lg">
                            </div>
                            <div class="text-left">
                                <h3 class="text-lg sm:text-xl font-bold ">{{ ucfirst($item->job_title) }}</h3>
                                <p class="mt-1 sm:mt-2 text-gray-600">{{ $item->company_name }}</p>
                                @if ($item->currently_working)
                                    <p class="mt-2 text-sm">
                                        {{ \Carbon\Carbon::parse($item->start_date)->format('d M Y') }} -
                                        present</p>
                                @else
                                    <p class="mt-2 text-sm">
                                        {{ \Carbon\Carbon::parse($item->start_date)->format('d M Y') }} -
                                        {{ \Carbon\Carbon::parse($item->end_date)->format('d M Y') }}</p>
                                @endif
                            </div>
                        </div>
                        <p class="mt-4 text-sm sm:text-base text-gray-800 dark:text-gray-400">
                            {{ $item->job_description }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section: Education -->
    <section class="py-8 sm:py-12 md:py-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center md:mb-8">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-800 dark:text-gray-400">Education</h2>
            </div>

            @foreach ($educations as $item)
                <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500"
                    data-aos-delay="{{ $loop->index * 300 }}"
                    class="flex flex-col sm:flex-row items-start justify-between max-w-4xl mx-auto">
                    <div class="flex-1 flex flex-col justify-between p-4 sm:p-6">
                        <!-- Gambar -->
                        <div class="w-24 h-24 sm:w-36 sm:h-36 flex-shrink-0 self-end mt-6">
                            <img src="{{ asset('assets/images/education/' . $item->image) }}"
                                alt="{{ $item->university }}"
                                class="w-full h-full object-contain shadow-md rounded-lg">
                        </div>
                    </div>
                    <div class="flex-1 p-4 sm:p-6 m-0 my-auto">
                        <h3 class="text-lg sm:text-xl font-bold text-gray-800 dark:text-gray-200">
                            {{ $item->degree }}
                        </h3>
                        <p class="mt-1 sm:mt-2 text-gray-600">{{ $item->university }}</p>
                        <p class="mt-1 sm:mt-2 text-sm text-gray-500">
                            {{ date('Y', strtotime($item->graduation_date)) }}
                        </p>
                        <p class="mt-3 sm:mt-4 text-sm sm:text-base text-gray-800 dark:text-gray-400">
                            {{ $item->description }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>






</x-user-layout>
