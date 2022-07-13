@props(['disabled' => false])
<!-- 
<div class="relative z-0 w-full mb-6 group">
    <input {{ $disabled ? 'disabled' : '' }}  {!! $attributes->merge(['class' => 'block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer']) !!} placeholder=" " value="{{ old($attributes->get('name'), $attributes->get('value')) }}">
    <label for="{{ $attributes->get('id') }}" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ $attributes->get('display') }}</label>

    @error($attributes->get('name'))
        <div class="text-sm text-red-600">{{ $message }}</div>
    @enderror
</div> -->

<div class="relative z-0 w-full mb-6 group">

    <label for="{{ $attributes->get('id') }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">{{ $attributes->get('display') }}</label>
    <select id="{{ $attributes->get('id') }}" {{ $disabled ? 'disabled' : '' }}  {!! $attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) !!} placeholder=" ">
        <option value="">โปรดเลือก{{ $attributes->get('display') }}</option>
        @foreach($attributes->get('rows') as $row)
            <option {{ old($attributes->get('name')) == $row->id ? "selected" : "" }} value="{{ $row->id }}">{{ $row->name }}</option>
        @endforeach
    </select>

    @error($attributes->get('name'))
        <div class="text-sm text-red-600">{{ $message }}</div>
    @enderror
</div>
