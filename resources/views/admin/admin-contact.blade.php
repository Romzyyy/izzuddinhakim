<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contact') }}
        </h2>
    </x-slot>

    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4">
            <x-add-button>Add Contact</x-add-button>
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
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Create New Contact
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
                        <form action="{{ route('admin.contact.store') }}" class="p-4 md:p-5" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="grid gap-4 mb-4 grid-cols-2">
                                <div class="col-span-2">
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact
                                        title</label>
                                    <input type="text" name="name" id="name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Type academia title" required="">
                                </div>
                                <div class="col-span-2">
                                    <label for="type"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                                        type of contact</label>
                                    <select id="type" name="type"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="social">Sosial media</option>
                                        <option value="official">contact resmi</option>
                                    </select>
                                </div>
                                <div class="col-span-2">
                                    <label for="link"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload
                                        Url</label>
                                    <input type="text" name="link" id="link"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Type url jurnal">
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

                    <div class="overflow-x-auto py-8">
                        <table class="min-w-full">
                            <thead class="rounded-lg hidden md:table-header-group">
                                <tr>
                                    <th class="text-left py-4 px-4 border-b border-gray-200">Contact Title</th>
                                    <th class="text-left py-4 px-4 border-b border-gray-200">Type</th>
                                    <th class="text-left py-4 px-4 border-b border-gray-200">Link</th>
                                    <th class="text-center py-4 px-4 border-b border-gray-200">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $item)
                                    <tr class="flex flex-col mb-4 border-b md:table-row md:mb-0">
                                        <td class="px-4 py-2 md:py-4">
                                            <span class="font-bold md:hidden">Contact Title:</span>
                                            <span>{{ $item->name }}</span>
                                            <div class="mt-1 text-sm text-gray-500 md:hidden">
                                                <div>Type: {{ $item->type }}</div>
                                                <div>
                                                    <a href="{{ $item->link }}"
                                                        class="text-blue-500 hover:underline">{{ $item->link }}</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="hidden md:table-cell px-4 py-4">{{ $item->type }}</td>
                                        <td class="hidden md:table-cell px-4 py-4">
                                            <a href="{{ $item->link }}"
                                                class="text-gray-200 hover:underline">{{ $item->link }}</a>
                                        </td>
                                        <td class="px-4 py-2 md:py-4">
                                            <div class="flex justify-start md:justify-center">
                                                <button data-modal-target="modal-edit{{ $item->id }}"
                                                    data-modal-toggle="modal-edit{{ $item->id }}"
                                                    class="text-white bg-green-800 hover:bg-green-900 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-800 dark:hover:bg-green-700 dark:focus:ring-green-700 dark:border-green-700"
                                                    type="button">
                                                    Edit
                                                </button>
                                                <button data-modal-target="modal-delete{{ $item->id }}"
                                                    data-modal-toggle="modal-delete{{ $item->id }}"
                                                    class="text-white bg-red-800 hover:bg-red-900 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-800 dark:hover:bg-red-700 dark:focus:ring-red-700 dark:border-red-700"
                                                    type="button">
                                                    Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                    {{-- Edit Modal --}}
                                    <x-edit-modal-admin :id="$item->id">
                                        <div
                                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                Edit {{ $item->title }}
                                            </h3>
                                            <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-toggle="modal-edit{{ $item->id }}">
                                                <svg class="w-3 h-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('admin.contact.update', $item->id) }}" class=""
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="grid gap-4 mb-4 grid-cols-2 p-4">
                                                <div class="col-span-2">
                                                    <label for="name"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact
                                                        title</label>
                                                    <input type="text" name="name" id="name"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        placeholder="Type academia title"
                                                        value="{{ $item->name }}">
                                                </div>
                                                <div class="col-span-2">
                                                    <label for="type"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                                                        type of contact</label>
                                                    <select id="type" name="type"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        <option value="social"
                                                            {{ $item->type == 'social' ? 'selected' : '' }}>
                                                            Sosial media</option>
                                                        <option value="official"
                                                            {{ $item->type == 'official' ? 'selected' : '' }}>
                                                            Contact resmi</option>
                                                    </select>
                                                </div>
                                                <div class="col-span-2">
                                                    <label for="link"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload
                                                        Url</label>
                                                    <input type="text" name="link" id="link"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        placeholder="Type url jurnal" value="{{ $item->link }}">
                                                </div>
                                            </div>
                                            <div class="flex items-end justify-end p-4">
                                                <button type="submit"
                                                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    Submit
                                                </button>
                                            </div>
                                        </form>
                                    </x-edit-modal-admin>

                                    {{-- Delete Modal --}}
                                    <x-delete-modal-admin :id="$item->id">
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you
                                            sure you want to
                                            delete
                                            this <span class="font-semibold text-gray-100">{{ $item->name }}</span>
                                            ?</h3>
                                        <form action="{{ route('admin.contact.destroy', $item->id) }}"
                                            method="POST">
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
