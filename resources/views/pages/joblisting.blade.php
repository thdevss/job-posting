<x-guest-layout>

    <div class="py-12 m-2">
        <h3 class="mb-3 text-xl font-medium text-gray-900 dark:text-white">งานอัพเดทล่าสุด...</h3>
            
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ประกาศเมื่อ
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ตำแหน่งงาน
                        </th>
                        <th scope="col" class="px-6 py-3">
                            จำนวน
                        </th>
                        <th scope="col" class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jobs as $job)
                        <tr class="align-top bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                            <td class="px-6 py-4">
                                {{ $job->created_at }}
                            </td>
                            <th scope="row" class="px-6 py-4 text-gray-900 dark:text-white whitespace-nowrap">
                                <p class="text-2xl font-medium mb-2">
                                {{ $job->job_title }}
                                </p>

                                <div class="text-sm font-thin leading-relaxed">
                                    <p>วุฒิการศึกษา: {{ $job->job_degree }}</p>
                                    <p>เงินเดือน: {{ number_format($job->job_salary, 0) }}</p>
                                    <p>สถานที่ทำงาน: {{ $job->job_province }}</p>
                                </div>
                                

                            </th>
                            
                            <td class="px-6 py-4 text-start">
                                {{ $job->job_amount }} ตำแหน่ง
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('job.detail', [ 'job' => $job ]) }}" target="_blank" class="text-gray-900 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-500 mr-2 mb-2">
                                    รายละเอียดเพิ่มเติม
                                </a>

                            </td>
                        </tr>
                    @endforeach
                   
                </tbody>
            </table>
            <div class="mt-5 mb-5">
                {{ $jobs->links() }}
            </div>  
        </div>

    </div>
</x-guest-layout>

