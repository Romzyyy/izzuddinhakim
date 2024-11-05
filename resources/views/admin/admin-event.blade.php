<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>

    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4">
            <x-add-button>Add Event</x-add-button>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 text-gray-900 dark:text-gray-100">
                    @if (session('success'))
                        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                            role="alert">
                            <span class="font-medium"> {{ session('success') }}</span>
                        </div>
                    @elseif(session('error'))
                        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <span class="font-medium">{{ session('error') }}</span>
                        </div>
                    @endif
                    <x-add-modal-admin>
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Create New Event
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-toggle="add-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <form action="{{ route('admin.event.store') }}" class="p-4 md:p-5" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="grid gap-4 mb-4 grid-cols-2">
                                <div class="col-span-2">
                                    <label for="title"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                    <input type="text" name="title" id="title"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Type event title" required="">
                                </div>
                                <div class="col-span-2">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        for="gambar">Upload
                                        gambar</label>
                                    <input
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        aria-describedby="gambar_help" id="gambar" name="gambar" type="file">
                                </div>
                                <div class="col-span-2">
                                    <label for="organizer"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">name of
                                        organizer</label>
                                    <input type="text" name="organizer" id="organizer"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Type event organizer">
                                </div>
                                <div class="relative max-w-sm col-span-2">
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>
                                    <label for="tanggal" class="sr-only">Card expiration date:</label>
                                    <input id="tanggal" name="tanggal" type="date"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="12/23" />
                                </div>
                                <div class="col-span-2">
                                    <label for="link"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Register
                                        link</label>
                                    <input type="url" name="link" id="link"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Type event link">
                                </div>
                                <div class="col-span-2">
                                    <label for="desc"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                        description for event</label>
                                    <textarea id="desc" name="desc" rows="4"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Event description ...."></textarea>
                                </div>
                            </div>
                            <div class="flex items-end justify-end">
                                <button type="submit"
                                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </x-add-modal-admin>
                    <div
                        class="grid my-10 grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6 tracking-wide max-w-screen-2xl mx-auto">
                        @foreach ($my_events as $item)
                            @php
                                $isFinished = strtotime($item->tanggal) < strtotime(date('Y-m-d'));
                            @endphp
                            <div class="max-w-sm bg-[#020617] shadow-md rounded-md overflow-hidden flex flex-col h-fit">
                                <div class="relative w-full h-full">
                                    <img class="w-full h-full object-cover {{ $isFinished ? 'grayscale' : '' }}"
                                        src="{{ asset('assets/images/event/' . $item->gambar) }}" alt="Card Image">
                                    <div class="absolute inset-0 bg-gradient-to-t from-[#020617] to-transparent"></div>
                                </div>

                                <div class="p-4 flex-grow">
                                    <h2 class="text-xl font-semibold text-white">
                                        {{ $item->title }}
                                    </h2>
                                    <h3 class="text-xs text-gray-300 mt-2 text-muted-foreground">oleh:
                                        {{ $item->organizer }}</h3>
                                    @if ($isFinished)
                                        <div class="h-1/2 flex justify-center items-center">
                                            <p class="text-red-500 text-center">
                                                This event is finished
                                            </p>
                                        </div>
                                    @else
                                        <p class="text-gray-400 mt-2">
                                            {{ Str::limit($item->desc, 150) }}
                                        </p>
                                    @endif
                                </div>

                                <!-- Bagian tombol -->
                                <div class="flex justify-between p-4 mt-auto">
                                    <button data-modal-target="modal-edit{{ $item->id }}"
                                        data-modal-toggle="modal-edit{{ $item->id }}"
                                        class="text-white w-full bg-green-800 hover:bg-green-900 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-800 dark:hover:bg-green-700 dark:focus:ring-green-700 dark:border-green-700"
                                        type="button">
                                        Edit
                                    </button>
                                    <button data-modal-target="modal-detail{{ $item->id }}"
                                        data-modal-toggle="modal-detail{{ $item->id }}"
                                        class="text-white w-full bg-blue-800 hover:bg-blue-900 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-800 dark:hover:bg-blue-700 dark:focus:ring-blue-700 dark:border-blue-700"
                                        type="button">
                                        Detail
                                    </button>
                                    <button data-modal-target="modal-delete{{ $item->id }}"
                                        data-modal-toggle="modal-delete{{ $item->id }}"
                                        class="text-white w-full bg-red-800 hover:bg-red-900 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-800 dark:hover:bg-red-700 dark:focus:ring-red-700 dark:border-red-700"
                                        type="button">
                                        Delete
                                    </button>
                                </div>
                            </div>


                            {{-- Edit Modal --}}
                            <x-edit-modal-admin :id="$item->id">
                                <div
                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Edit {{ $item->organizer }}
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-toggle="modal-edit{{ $item->id }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <form action="{{ route('admin.event.update', $item->id) }}" class="p-4 md:p-5"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                        <div class="col-span-2">
                                            <label for="title"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                            <input type="text" name="title" id="title"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Type event title" value="{{ $item->title }}">
                                        </div>
                                        <div class="col-span-2">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                                for="gambar">Upload
                                                gambar</label>
                                            <input
                                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                                aria-describedby="gambar_help" id="gambar" name="gambar"
                                                type="file">
                                        </div>
                                        <div class="col-span-2">
                                            <label for="organizer"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">name
                                                of
                                                organizer</label>
                                            <input type="text" name="organizer" id="organizer"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Type event organizer" value="{{ $item->organizer }}">
                                        </div>
                                        <div class="relative max-w-sm col-span-2">
                                            <div
                                                class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 20 20">
                                                    <path
                                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                                </svg>
                                            </div>
                                            <label for="tanggal" class="sr-only">Card expiration date:</label>
                                            <input id="tanggal" name="tanggal" type="date"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                value="{{ $item->tanggal }}" />
                                        </div>
                                        <div class="col-span-2">
                                            <label for="link"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Register
                                                link</label>
                                            <input type="url" name="link" id="link"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Type event link" value="{{ $item->link }}">
                                        </div>
                                        <div class="col-span-2">
                                            <label for="desc"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                                description for event</label>
                                            <textarea id="desc" name="desc" rows="4"
                                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Event description ....">{{ $item->desc }}</textarea>
                                        </div>
                                    </div>
                                    <div class="flex items-end justify-end">
                                        <button type="submit"
                                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Submit
                                        </button>
                                    </div>
                                </form>
                            </x-edit-modal-admin>

                            {{-- Delete Modal --}}
                            <x-delete-modal-admin :id="$item->id">
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you
                                    want to delete
                                    this <span class="font-semibold text-gray-100">{{ $item->title }}</span> ?</h3>
                                <form action="{{ route('admin.event.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                        Yes, I'm sure
                                    </button>
                                    <button data-modal-hide="modal-delete{{ $item->id }}" type="button"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                                        cancel</button>
                                </form>
                            </x-delete-modal-admin>

                            {{-- Detail Modal --}}
                            <x-detail-modal-admin :id="$item->id">
                                <div class="max-w-7xl mx-auto bg-white shadow-lg rounded-sm overflow-hidden flex">
                                    <!-- Bagian Kiri (Gambar) -->
                                    <div class="w-1/2">
                                        <img class="object-cover w-full h-full"
                                            src="{{ asset('assets/images/event/' . $item->gambar) }}""
                                            alt="Card Image">
                                    </div>

                                    <!-- Bagian Kanan (Konten) -->
                                    <div class="w-2/3 p-6">
                                        <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $item->title }}</h2>
                                        <h3 class="text-lg text-gray-600 mb-4">Oleh : {{ $item->organizer }}</h3>

                                        <div class="text-sm text-gray-500 mb-4">
                                            Tanggal: {{ date('d F Y', strtotime($item->tanggal)) }}
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-500 mb-4">Register Link : @if ($isFinished)
                                                    <span class="text-gray-500">
                                                        expired link
                                                    </span>
                                                @else
                                                    <a href="{{ $item->link }}" class="text-blue-400 my-2">
                                                        {{ $item->link }}
                                                    </a>
                                                @endif
                                            </p>
                                        </div>


                                        <p class="text-gray-700">
                                            {{ $item->desc }}
                                        </p>
                                    </div>
                                </div>
                            </x-detail-modal-admin>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
