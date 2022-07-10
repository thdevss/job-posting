<x-guest-layout>

    <div class="py-12 m-2">
        
        <h3 class="mb-3 text-xl font-medium text-gray-900 dark:text-white">{{ $title }}</h3>
        
        <div class="grid grid-cols-6 gap-4">
            <div>
                
            
                <div class="w-full text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    @foreach($searchs as $search)
                        <x-search-link href="{{ route($search_type->url, [ $search_type->name => $search]) }}" :active="($current_search->id === $search->id)">
                            {{ $search->name }}
                        </x-search-link>
                    @endforeach

                </div>


            </div>
            <!-- ... -->
            <div class="col-span-5">
                @isset($jobs)
                    <x-job-listing :jobs="$jobs"/>
                @endisset
            </div>
        </div>



    </div>
</x-guest-layout>

