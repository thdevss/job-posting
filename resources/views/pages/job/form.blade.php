<x-guest-layout>

    <div class="py-12 m-2">
        
        <h3 class="mb-3 text-xl font-medium text-gray-900 dark:text-white">ลงประกาศรับสมัครงานใหม่</h3>
        
        <div class="grid grid-cols-6 gap-4">



            <div class="col-span-4">
                
                @if (Session::has('message'))

                    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                        <span class="font-medium">{{ Session::get('message') }}</span>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                

                <div class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                    
                                        
                    <form method="POST" action="{{ route('job.store') }}">
                        @csrf
                        <x-input-float name="job_title" type="text" id="job_title" display="ตำแหน่งงานที่ต้องการ" />
                        
                        <div class="grid xl:grid-cols-2 xl:gap-6">
                            <x-select :rows="$types" name="job_type" id="job_type" display="ประเภทงาน" />
                            <x-select :rows="$degrees" name="job_degree" id="job_degree" display="วุฒิการศึกษา" />
                        </div>

                        <div class="grid xl:grid-cols-2 xl:gap-6">
                            <x-input-float name="job_amount" type="number" id="job_amount" display="จำนวนที่ต้องการ" />
                            <x-input-float name="job_province" type="text" id="job_province" display="สถานที่ทำงาน" />
                        </div>
                        <x-input-float name="job_salary" type="text" id="job_salary" display="เงินเดือน" />
                       

                        <div class="grid xl:grid-cols-2 xl:gap-6">
                            <x-input-float name="company_name" type="text" id="company_name" display="ชื่อองค์กร" />
                            <x-input-float name="telephone_number" type="text" id="telephone_number" display="เบอร์โทรศัพท์ติดต่อ" />
                        </div>
                        
                        <x-input-float name="company_address" type="text" id="company_address" display="ที่อยู่องค์กรโดยย่อ" />

                        <div class="mb-6">
                            <textarea id="editor" placeholder="รายละเอียดงานโดยย่อ" class="ckeditor block w-full mt-1 rounded-md" name="job_description" rows="3">
                                {{ old('job_description') }}"
                            </textarea>
                            @error('job_description')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>

                </div>


            </div>


            <div class="col-span-2">
                

                <aside id="revue-embed" class="p-4 bg-white rounded-lg border border-gray-200 shadow-md sm:p-6 lg:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <h3 class="mb-3 text-xl font-medium text-gray-900 dark:text-white">กฏกติกาการใช้งาน</h3>
                    <p class="mb-5 text-sm font-medium text-gray-500 dark:text-gray-300">
                        <ol class="list-decimal dark:text-gray-400 rules">
                            <li>อย่าสแปม</li>
                            <li>อย่าสแปม</li>
                            <li>อย่าสแปม</li>
                        </ol>
                    </p>
                    

                </aside>

            </div>
            
            <!-- ... -->
            
        </div>



    </div>


    @push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script>
    
        const editor = ClassicEditor
            .create( document.querySelector( '.ckeditor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <style>
        .ck-editor__editable {
            min-height: 250px;
        }
    </style>
    @endpush

</x-guest-layout>

