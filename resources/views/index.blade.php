<x-user-layout title="Izzuddin">
    <div class="flex flex-col min-h-[100dvh] ">
        <section class="w-full py-2 md:py-24 lg:py-32 bg-primary">
            <div class="container px-4 md:px-6">
                @foreach ($summaries as $summary)
                    <div class="grid gap-6 lg:grid-cols-[1fr_400px] lg:gap-12 xl:grid-cols-[1fr_600px]">
                        <img data-aos="fade-left" data-aos-duration="900"
                            src="{{ asset('assets/images/summary/' . $summary->image) }}" width="550" height="550"
                            alt="Hero"
                            class="mx-auto aspect-square overflow-hidden rounded-xl object-cover sm:w-full lg:order-last " />
                        <div class="flex flex-col justify-center space-y-4">
                            <div class="space-y-2">
                                <h1
                                    class="text-3xl font-bold tracking-tighter sm:text-5xl xl:text-6xl/none text-primary-foreground">
                                    {{ $summary->name }}
                                </h1>
                                <p class="max-w-[600px] text-primary-foreground/80 md:text-xl">
                                    {{ $summary->short_bio }}
                                </p>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </section>
        <section id="about" class="w-full py-12 md:py-24 lg:py-32 bg-background">
            <div class="container px-4 md:px-6">
                <div class="grid gap-6 lg:grid-cols-1 lg:gap-12">
                    <div class="space-y-4">
                        <div class="inline-block rounded-lg bg-muted px-3 py-1">About Me</div>
                        <h2 class="text-3xl font-bold tracking-tighter sm:text-4xl md:text-5xl">My Background and Skills
                        </h2>
                        @foreach ($summaries as $summary)
                            <p
                                class="max-w-5xl text-muted-foreground md:text-xl/relaxed lg:text-base/relaxed xl:text-xl/relaxed">
                                {{ $summary->summary }}
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section id="blog" class="w-full py-12 md:py-24 lg:py-32 bg-muted">
            <div class="container px-4 md:px-6">
                <div class="flex flex-col items-center justify-center space-y-4 text-center">
                    <div class="space-y-2">
                        <div class="inline-block rounded-lg bg-muted px-3 py-1 text-sm">Latest Posts</div>
                        <h2 class="text-3xl font-bold tracking-tighter sm:text-4xl md:text-5xl">From My Blog</h2>
                        <p
                            class="max-w-[900px] text-muted-foreground md:text-xl/relaxed lg:text-base/relaxed xl:text-xl/relaxed">
                            Check out the latest articles I've written.
                        </p>
                    </div>
                </div>
                <div class="mx-auto grid max-w-7xl grid-cols-1 gap-6 py-12 sm:grid-cols-2 lg:grid-cols-3 lg:gap-12">
                    @foreach ($blogs as $blog)
                        <div data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="{{ $loop->index * 300 }}"
                            class="md:rounded-lg p-6  md:border-b-0 border-muted-foreground pb-12 md:pb-6 md:pr-6 hover:cursor-pointer shadow-gray-950/50 md:bg-gray-400/10 shadow-2xl dark:hover:shadow-white/50">
                            <div class="flex items-center justify-between my-2">
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
                            <div class="mt-4">
                                <a href="{{ route('blog.show', $blog->slug) }}">
                                    <p class="text-muted-foreground">
                                        {{ Str::limit(strip_tags($blog->content), 255) }}
                                    </p>
                                </a>
                            </div>
                            <div class="flex justify-between items-center mt-4">
                                <a href="{{ route('blog.show', $blog->slug) }}"
                                    class="text-blue-400 hover:text-blue-300 transition-colors duration-200 flex items-center"
                                    rel="noopener noreferrer">
                                    <span>Read More</span>
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <x-show-more-button link="{{ route('blog') }}">
                Show More
            </x-show-more-button>
        </section>

        <section id="academia" class="w-full py-12 md:py-24 lg:py-32 bg-muted">
            <div class="container px-4 md:px-6">
                <div class="flex flex-col items-center justify-center space-y-4 text-center">
                    <div class="space-y-2">
                        <div class="inline-block rounded-lg bg-muted px-3 py-1 text-sm">My Academia</div>
                        <h2 class="text-3xl font-bold tracking-tighter sm:text-4xl md:text-5xl">my writing in the
                            publication journal</h2>
                        <p
                            class="max-w-[900px] text-muted-foreground md:text-xl/relaxed lg:text-base/relaxed xl:text-xl/relaxed">
                            Happy reading, I hope my writing can help your life
                        </p>
                    </div>
                </div>
                <div class="mx-auto grid max-w-5xl grid-cols-1 gap-6 py-12 sm:grid-cols-2 lg:grid-cols-3 lg:gap-12">
                    @foreach ($academia as $academi)
                        <div data-aos="zoom-out-up" data-aos-duration="1000" data-aos-delay="{{ $loop->index * 300 }}"
                            class="rounded-lg overflow-hidden shadow-2xl shadow-gray-500/30  hover:shadow-2xl hover:scale-105">
                            <div class="relative">
                                <img class="w-full h-48 sm:h-56 object-cover"
                                    src="{{ asset('assets/images/academia/' . $academi->gambar) }}"
                                    alt="{{ $academi->title }}">
                                <div
                                    class="absolute top-0 right-0 bg-black bg-opacity-50 text-white text-xs px-2 py-1 m-2 rounded">
                                    {{ $academi->created_at->format('d M Y') }}
                                </div>
                            </div>

                            <div class="p-4 h-fit">
                                <a href="{{ $academi->link_jurnal }}" class="text-lg font-medium mb-2">
                                    {{ Str::limit($academi->title, 150) }}
                                </a>
                                <div class="flex justify-between items-center mt-4">
                                    <a href="{{ $academi->link_jurnal }}"
                                        class="text-blue-400 hover:text-blue-300 transition-colors duration-200 flex items-center"
                                        target="_blank" rel="noopener noreferrer">
                                        <span>Read More</span>
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
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
            <x-show-more-button link="{{ route('academia') }}">
                Show More
            </x-show-more-button>
        </section>

        <section id="event" class="w-full py-12 md:py-24 lg:py-32 bg-muted">
            <div class="container px-4 md:px-6">
                <div class="flex flex-col items-center justify-center space-y-4 text-center">
                    <div class="space-y-2">
                        <div class="inline-block rounded-lg bg-muted px-3 py-1 text-sm">Upcoming Events</div>
                        <h2 class="text-3xl font-bold tracking-tighter sm:text-4xl md:text-5xl">Events I'll be
                            Attending</h2>
                        <p
                            class="max-w-[900px] text-muted-foreground md:text-xl/relaxed lg:text-base/relaxed xl:text-xl/relaxed">
                            Check out the upcoming events I'll be attending or speaking at.
                        </p>
                    </div>
                </div>
                <div class="mx-auto grid max-w-5xl grid-cols-1 gap-6 py-12 sm:grid-cols-2 lg:grid-cols-3 lg:gap-12">
                    @foreach ($events as $event)
                        @php
                            $isFinished = strtotime($event->tanggal) < strtotime(date('Y-m-d'));
                        @endphp
                        <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="{{ $loop->index * 300 }}"
                            class="bg-white dark:bg-[#020617] shadow-md rounded-md overflow-hidden flex flex-col h-fit">
                            <div class="relative w-full h-fit">
                                <img class="w-full h-full object-cover {{ $isFinished ? 'grayscale' : '' }}"
                                    src="{{ asset('assets/images/event/' . $event->gambar) }}" alt="Card Image">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-white dark:from-[#020617] to-transparent">
                                </div>
                            </div>

                            <!-- Card Content -->
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
                                    <p class="text-gray-600 dark:text-gray-200 mt-2">
                                        {{ Str::limit($event->desc, 150) }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <x-show-more-button link="{{ route('event') }}">
                Show More
            </x-show-more-button>
        </section>

        <section id="contact" class="w-full p2-12 md:py-24 lg:py-32 bg-muted">
            <div class="container px-4 md:px-6">
                <div class="flex flex-col items-center justify-center space-y-4 text-center">
                    <div class="space-y-2">
                        <div class="inline-block rounded-lg bg-muted px-3 py-1 text-sm">My Contact</div>
                        <h2 class="text-3xl font-bold tracking-tighter sm:text-4xl md:text-5xl">Lets Get in touch</h2>
                        <p
                            class="max-w-[900px] text-muted-foreground md:text-xl/relaxed lg:text-base/relaxed xl:text-xl/relaxed">
                            don't hesitate to say hello to me
                        </p>
                    </div>
                </div>
                <div class="mx-auto px-4 md:px-6 max-w-4xl flex justify-center container overflow-x-auto">
                    <div class="pt-12 px-4">
                        <p>If you are interested in collaborating or have any formal inquiries, please feel
                            free to contact me. I welcome opportunities for collaboration and discussions about various
                            possibilities. Please reach out to me through the official contact details provided below.
                        </p>
                        <div class="overflow-x-auto pt-8">
                            <table class="min-w-full">
                                {{-- <thead>
                                    <tr class="">
                                        <th class="py-2 text-left">Name</th>
                                        <th class="py-2 text-left">Link</th>
                                    </tr>
                                </thead> --}}
                                <tbody>
                                    @foreach ($contacts as $contact)
                                        <tr class="hover:bg-gray-100">
                                            <td class="py-4">{{ $contact->name }}</td>
                                            <td class="py-4">
                                                <a href="{{ $contact->link }}"
                                                    class="hover:underline">{{ $contact->link }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
</x-user-layout>
