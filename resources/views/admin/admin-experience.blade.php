<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Experience') }}
        </h2>
    </x-slot>

    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4">
            <x-add-button>Add Experience</x-add-button>
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
                                Create New Experience
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
                        <form action="{{ route('admin.experience.store') }}" class="p-4 md:p-5" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="grid gap-4 mb-4 grid-cols-2">
                                <div class="col-span-2">
                                    <label for="company_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company
                                        name</label>
                                    <input type="text" name="company_name" id="company_name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Type company title" required="">
                                </div>
                                <div class="col-span-2">
                                    <label for="job_title"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">job
                                        title</label>
                                    <input type="text" name="job_title" id="job_title"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Type job_title title" required="">
                                </div>
                                <div class="col-span-2">
                                    <label for="job_description"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                        job description</label>
                                    <textarea id="job_description" name="job_description" rows="4"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="job description ...."></textarea>
                                </div>
                                <div class="col-span-2">
                                    <label for="start_date">start date</label>
                                    <input type="date" name="start_date" id="start_date"
                                        class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="type start date experience" required>
                                </div>
                                <div class="col-span-2">
                                    <label for="end_date">end date</label>
                                    <input type="date" name="end_date" id="end_date"
                                        class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Type end date experience">
                                    <div class="mt-2 flex items-center">
                                        <input type="hidden" name="currently_working" value="0">
                                        <input type="checkbox" id="currently_working" name="currently_working"
                                            value="1" class="mr-2" onchange="toggleEndDate(this)">
                                        <label for="currently_working">I am
                                            currently working here</label>
                                    </div>
                                </div>
                                <div class="col-span-2">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        for="image">Upload
                                        image</label>
                                    <input
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        aria-describedby="image_help" id="image" name="image" type="file">
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
                        class="grid mt-10 grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-12 tracking-wide max-w-screen-2xl mx-auto">
                        <!-- Education 1 -->
                        @foreach ($experiences as $item)
                            <div class="flex flex-col justify-center h-full ">
                                <div class="relative w-full h-fit flex items-center justify-center">
                                    <img src="{{ asset('assets/images/experience/' . $item->image) }}"
                                        alt="University of Technology" class="shadow-md max-w-full max-h-full">
                                </div>
                                <div class="flex-grow p-4">
                                    @if ($item->currently_working)
                                        <p class="mt-2 text-sm text-gray-500">
                                            {{ \Carbon\Carbon::parse($item->start_date)->format('d M Y') }} -
                                            present</p>
                                    @else
                                        <p class="mt-2 text-sm text-gray-500">
                                            {{ \Carbon\Carbon::parse($item->start_date)->format('d M Y') }} -
                                            {{ \Carbon\Carbon::parse($item->end_date)->format('d M Y') }}</p>
                                    @endif
                                    <h3 class="text-xl font-bold text-gray-200">{{ $item->job_title }}</h3>
                                    <p class="mt-2 text-gray-200">{{ $item->company_name }}</p>
                                    <p class="mt-4 text-gray-200">
                                        {{ Str::limit($item->job_description, 255) }}
                                    </p>
                                </div>
                                <div class="flex justify-between p-4">
                                    <button data-modal-target="modal-edit{{ $item->id }}"
                                        data-modal-toggle="modal-edit{{ $item->id }}"
                                        class="text-white w-full bg-green-800 hover:bg-green-900 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-800 dark:hover:bg-green-700 dark:focus:ring-green-700 dark:border-green-700"
                                        type="button">
                                        Edit
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
                                        Edit {{ $item->degree }}
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
                                <form action="{{ route('admin.experience.update', $item->id) }}" class="p-4 md:p-5"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                        <div class="col-span-2">
                                            <label for="company_name"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">company_name</label>
                                            <input type="text" name="company_name" id="company_name"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Type company title" required=""
                                                value="{{ $item->company_name }}">
                                        </div>
                                        <div class="col-span-2">
                                            <label for="job_title"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">job_title</label>
                                            <input type="text" name="job_title" id="job_title"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Type job_title title" required=""
                                                value="{{ $item->job_title }}">
                                        </div>
                                        <div class="col-span-2">
                                            <label for="job_description"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                                job_description for gradution</label>
                                            <textarea id="job_description" name="job_description" rows="4"
                                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Graduation job_description ....">{{ $item->job_description }}</textarea>
                                        </div>
                                        <div class="col-span-2">
                                            <input type="date" name="start_date" id="start_date"
                                                class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="type start date experience" required=""
                                                value="{{ $item->start_date }}">
                                        </div>
                                        <div>to</div>
                                        <div class="col-span-2">
                                            <input type="date" name="end_date" id="end_date"
                                                class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="type start date experience" required=""
                                                value="{{ $item->end_date }}">
                                        </div>
                                        <div class="col-span-2">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                                for="image">Upload
                                                image</label>
                                            <input
                                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                                aria-describedby="image_help" id="image" name="image"
                                                type="file">
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
                                    want to
                                    delete
                                    this <span class="font-semibold text-gray-100">{{ $item->job_title }}</span> ?
                                </h3>
                                <form action="{{ route('admin.education.destroy', $item->id) }}" method="POST">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    function toggleEndDate(checkbox) {
        const endDateInput = document.getElementById('end_date');
        if (checkbox.checked) {
            endDateInput.disabled = true;
            endDateInput.value = ''; // Clear the value when disabled
        } else {
            endDateInput.disabled = false;
        }
    }
</script>
