<x-user-layout>
    <div
        class="p-6  pb-12 md:pb-6 md:pr-6 bg-white dark:bg-gray-950 transition duration-300 ease-in-out text-gray-900 dark:text-gray-100">
        <div class="md:rounded-lg mt-4">
            <div class="flex items-center justify-between">
                <p class="text-sm text-muted-foreground bg-gray-500/50 px-4 py-1 rounded-full">{{ $blog->category }}</p>
                <p class="text-sm text-muted-foreground">{{ $blog->created_at->format('d F Y') }}</p>
            </div>
            <h3 class="mt-4 text-2xl font-bold">{{ $blog->title }}</h3>
            <p class="mt-4 text-muted-foreground">
                {!! $blog->content !!}
            </p>
        </div>
    </div>
</x-user-layout>
