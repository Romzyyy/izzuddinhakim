<x-user-layout>
    @php
        $isFinished = strtotime($event->tanggal) < strtotime(date('Y-m-d'));
    @endphp
    <div class="max-w-full mx-auto rounded-sm overflow-hidden flex flex-col md:flex-row ">
        <div class="w-full md:w-1/2 p-4">
            <img class="object-cover w-full h-auto rounded-lg mb-4"
                src="{{ asset('assets/images/event/' . $event->gambar) }}" alt="Card Image">
        </div>
        <div class="w-full md:w-1/2 p-6 flex flex-col justify-center">
            <h2 class="text-3xl font-bold text-gray-700 dark:text-gray-200 mb-2 text-wrap">{{ $event->title }}</h2>
            <h3 class="text-lg text-gray-600 mb-4">Oleh : {{ $event->organizer }}</h3>

            <div class="text-sm text-gray-500 mb-4">
                Tanggal: {{ date('d F Y', strtotime($event->tanggal)) }}
            </div>
            <div>
                <div class="text-sm text-gray-500 mb-4">
                    @if ($isFinished)
                        <div>
                            <span>Pendaftaran Selesai</span>
                        </div>
                    @else
                        <a href="{{ $event->link }}" target="_blank">
                            <div
                                class="text-sm text-gray-500 mb-4 px-16 cursor-pointer hover:bg-gray-700 transition duration-300 py-2 rounded-full bg-gray-400 dark:bg-gray-800 dark:hover:bg-gray-600 w-fit">
                                <span class="text-blue-600 my-2 font-semibold tracking-wide">Daftar</span>
                            </div>
                        </a>
                    @endif
                </div>
                <div class="w-full">
                    <p class=" indent-8">{{ $event->desc }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bagian Deskripsi (Lebar Penuh) -->
    {{-- <div class="w-full p-4">
        <p class=" indent-8">{{ $event->desc }}</p>
    </div> --}}
</x-user-layout>
