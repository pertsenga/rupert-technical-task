<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow rounded">
                @foreach ($posts as $post)
                    <a href="#" class="block p-6 mb-4 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post["title"] }}</h5>
                        <p class="text-sm mb-2 text-gray-500 dark:text-gray-400">From User ID: {{ $post["userId"] }}</p>
                        <p class="font-normal text-gray-700 dark:text-gray-400">{{ $post["body"] }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
