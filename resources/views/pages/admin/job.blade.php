<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (Session::has('message'))

                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                    <span class="font-medium">{{ Session::get('message') }}</span>
                </div>
            @endif

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-all" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all" class="sr-only">checkbox</label>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                ลงประกาศเมื่อ
                            </th>
                            <th scope="col" class="px-6 py-3">
                                ชื่อตำแหน่งงาน
                            </th>
                            <th scope="col" class="px-6 py-3">
                                ประเภทงาน
                            </th>
                            <th scope="col" class="px-6 py-3">
                                ชื่อองค์กร
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jobs as $job) 
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-table-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-1" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $job->created_at }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $job->job_title }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $job->type->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $job->company_name }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                @if(is_null($job->approved_at))
                                    <form action="{{ route('admin.job.update', $job) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="action" value="approve_job" />
                                        <button class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Approve?</button> <br />
                                    </form>
                                
                                @endif
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> | 
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>

                            </td>
                        </tr>
                        @endforeach
                       
                    </tbody>
                </table>
            </div>
            <div class="mt-2 nav-admin">
                {{ $jobs->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
