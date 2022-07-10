<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                
                <th scope="col" class="px-6 py-3">
                    ประเภทงาน
                </th>
                <th scope="col" class="px-6 py-3">
                    ตำแหน่งงาน
                </th>
                <th scope="col" class="text-center px-6 py-3">
                    จำนวน
                </th>
                <th scope="col" class="px-6 py-3">
                    ประกาศเมื่อ
                </th>
                <th scope="col" class="px-6 py-3"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($jobs as $job)
                <tr class="align-top bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                    
                    <td class="px-6 py-4">
                        {{ $job->type->name }}
                    </td>
                    <th scope="row" class="px-6 py-4 text-gray-900 dark:text-white whitespace-nowrap">
                        <p class="text-2xl font-medium mb-2">
                        {{ $job->job_title }}
                        </p>

                        <div class="text-sm font-thin leading-relaxed">
                            <p>วุฒิการศึกษา: {{ $job->degree->name }}</p>
                            <p>เงินเดือน: {{ number_format($job->job_salary, 0) }}</p>
                            <p>สถานที่ทำงาน: {{ $job->job_province }}</p>
                        </div>
                        

                    </th>
                    
                    <td class="px-6 py-4 text-center">
                        <span class="text-2xl">{{ $job->job_amount }}</span>
                    </td>
                    <td class="px-6 py-4">
                        {{ $job->created_at }}
                    </td>
                    <td class="px-6 py-4 text-center w-auto">
                        
                        <a href="{{ route('job.detail', [ 'job' => $job ]) }}" target="_blank" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">

                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-4 h-4 mr-2" fill="currentColor" class="bi bi-info-square" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                            </svg>
                            <span>รายละเอียด</span>
                        </a>
                        <!-- <a href="{{ route('job.detail', [ 'job' => $job ]) }}" target="_blank" class="text-center w-full text-gray-900 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-500 mr-2 mb-2">
                            รายละเอียด
                        </a> -->

                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>
    <div class="mt-5 mb-5">
        {{ $jobs->links() }}
    </div>  
</div>