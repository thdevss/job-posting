<x-guest-layout>

    <div class="py-12 m-2">
        
        <h3 class="mb-3 text-xl font-medium text-gray-900 dark:text-white">รายละเอียดตำแหน่งงาน</h3>
        
        <div class="grid grid-cols-6 gap-4">
            <div class="col-span-5">
                

                <div class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <h5 class="mb-3 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $job->job_title }} ( {{ $job->job_amount }} ตำแหน่ง )</h5>
                    <div class="mb-4 font-normal ">
                        <p class="text-gray-700 dark:text-gray-400">
                            <ul class="dark:text-gray-400 text-lg leading-relaxed">
                                <li>
                                    องค์กร: <span class="font-bold">{{ $job->company_name }}</span>
                                </li>
                                <li>
                                    ประเภทงาน: <span class="font-bold">{{ $job->type->name }}</span>
                                </li>
                                <li>
                                    วุฒิการศึกษา: <span class="font-bold">{{ $job->degree->name }}</span>
                                </li>
                                <li>
                                    สถานที่ปฏิบัติงาน: <span class="font-bold">{{ $job->job_province }}</span>
                                </li>
                                <li>
                                    เงินเดือน: <span class="font-bold">{{ (is_numeric($job->job_salary)) ? number_format($job->job_salary, 0) : $job->job_salary }}</span>
                                </li>
                                <li>
                                    รายละเอียดงานโดยย่อ:<br /><span class="font-bold">{{ $job->job_description }}</span>
                                </li>
                            </ul>
                            
                        </p>

                    </div>
                    <a href="#" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        
                        <svg class="ml-1 mr-2 w-4 h-4"  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-forward" viewBox="0 0 16 16">
                            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zm10.762.135a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 0 1-.708-.708L14.293 4H9.5a.5.5 0 0 1 0-1h4.793l-1.647-1.646a.5.5 0 0 1 0-.708z"/>
                        </svg>
                        Tel Now.
                    </a>
                    <a href="#" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        
                        <svg class="ml-1 mr-2 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-paper" viewBox="0 0 16 16">
                            <path d="M4 0a2 2 0 0 0-2 2v1.133l-.941.502A2 2 0 0 0 0 5.4V14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5.4a2 2 0 0 0-1.059-1.765L14 3.133V2a2 2 0 0 0-2-2H4Zm10 4.267.47.25A1 1 0 0 1 15 5.4v.817l-1 .6v-2.55Zm-1 3.15-3.75 2.25L8 8.917l-1.25.75L3 7.417V2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v5.417Zm-11-.6-1-.6V5.4a1 1 0 0 1 .53-.882L2 4.267v2.55Zm13 .566v5.734l-4.778-2.867L15 7.383Zm-.035 6.88A1 1 0 0 1 14 15H2a1 1 0 0 1-.965-.738L8 10.083l6.965 4.18ZM1 13.116V7.383l4.778 2.867L1 13.117Z"/>
                        </svg>
                        Send email
                    </a>
                </div>


            </div>

            <div>
                
            
                <div class="w-full text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <!-- banner -->

                </div>


            </div>
            <!-- ... -->
            
        </div>



    </div>

    <div class="py-12 m-2">
        
        @if(count($related_job) > 0)
            <h3 class="mb-3 text-xl font-medium text-gray-900 dark:text-white">งานอื่น ๆ ที่คุณอาจสนใจ</h3>
            <x-job-listing :jobs="$related_job"/>
        @endif
    
    </div>
</x-guest-layout>

