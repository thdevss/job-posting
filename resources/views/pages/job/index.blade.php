<x-guest-layout>

    <div class="py-12 m-2">
        <h3 class="mb-3 text-xl font-medium text-gray-900 dark:text-white">{{ $title }}...</h3>
            
        <x-job-listing :jobs="$jobs"/>



    </div>
</x-guest-layout>

