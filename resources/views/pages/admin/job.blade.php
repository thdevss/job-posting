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

            <div class="pb-4">
                <input type="hidden" id="bulk-update-url" value="{{ route('admin.job.bulk_update') }}" />
            
                @if ($type == 'wait_approve')
                    <a id="approve-all-job" href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 lg:px-5 lg:py-2.5 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        อนุมัติโพสงานที่เลือก
                    </a>
                @endif

                <a id="delete-all-job" href="#" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 lg:px-5 lg:py-2.5 mr-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                    ลบโพสงานที่เลือก
                </a>


            </div>
            


            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-6">

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-job-all" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-job-all" class="sr-only">checkbox</label>
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
                                    <input id="checkbox-job-{{ $job->id }}" type="checkbox" value="{{ $job->id }}" name="job[{{ $job->id }}][id]" class="checkbox-job w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-job-{{ $job->id }}" class="sr-only">checkbox</label>
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

                                <a href="{{ route('admin.job.show', $job) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> | 
                                <form style="display:inline;" action="{{ route('admin.job.destroy', $job) }}" method="POST" onsubmit="return confirm_action();">
                                    @csrf
                                    @method('DELETE')
                                    <button class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</button>
                                </form>

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
