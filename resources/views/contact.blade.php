<x-user-layout title="Contact">
    <x-header :title="$title" :desc="$desc" />
    <div
        class="container mx-auto px-4 sm:px-6 lg:px-8 flex flex-col lg:flex-row gap-4 sm:gap-8 lg:gap-20 h-fit tracking-wide bg-white dark:bg-gray-950 transition duration-300 ease-in-out text-gray-900 dark:text-gray-100">
        <div class="bg-gray-800 w-[1px] hidden lg:block"></div>
        <div class="w-full">
            <article class="text-wrap">
                <p class="mb-4">I am excited to share ideas and experiences through the content I create on various
                    social media platforms. There, you will find a range of materials, from English learning tips to
                    insights on teaching and learning that may be beneficial to you.I believe that social media is an
                    effective way to connect and share knowledge with a wider audience. By following me, you will not
                    only receive the latest information about my work and research but also have the opportunity to
                    engage in discussions and exchange ideas.</p>
                <p>
                    Feel free to explore my content on social media, and let’s connect and share experiences that can
                    inspire one another!
                </p>
            </article>
            <div class="overflow-x-auto py-8">
                <table class="min-w-full">
                    <thead class="rounded-lg">
                        <tr>
                            <th class="text-left py-4 px-4 border-b border-gray-200">Sosial Media</th>
                            <th class="text-left py-4 px-4 border-b border-gray-200">Link</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($socialMediaContact as $sosmed)
                            <tr>
                                <td class="py-4 px-4">{{ $sosmed->name }}</td>
                                <td class="py-4 px-4">
                                    <a href="{{ $sosmed->link }}"
                                        class="hover:underline break-all">{{ $sosmed->link }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <p class="text-base mb-4">If you are interested in collaborating or have any formal inquiries, please feel
                free to contact me. I welcome opportunities for collaboration and discussions about various
                possibilities. Please reach out to me through the official contact details provided below.
            </p>
            <div class="overflow-x-auto py-8">
                <table class="min-w-full">
                    <tbody>
                        @foreach ($officialContact as $contact)
                            <tr>
                                <td class="py-4 px-4">{{ $contact->name }}</td>
                                <td class="py-4 px-4">
                                    <a href="{{ $contact->link }}"
                                        class="hover:underline break-all">{{ $contact->link }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-user-layout>
