@extends('web.layouts.app')
@section('content')

<h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    New Employee
</h4>
@include('web.layouts.message')

<form class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800" method="POST"
    action="{{route('employee.store')}}">
    @csrf
    <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Name</span>
        <input
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="Jane Doe" name="name" value="{{old('name')}}" />
            <span class="text-xs text-red-600 dark:text-red-400">
                @if($errors->has('name'))
                <div class="error">{{ $errors->first('name') }}</div>
                @endif
            </span>
    </label>
    
    <br>
    <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Phone</span>
        <input name="phone"
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="07701234567" value="{{old('phone')}}" />
            <span class="text-xs text-red-600 dark:text-red-400">
                @if($errors->has('phone'))
                <div class="error">{{ $errors->first('phone') }}</div>
                @endif
            </span>
        </label>
    <br>
    <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Salary</span>
        <input
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            type="number" placeholder="10000" name="salary" value="{{old('salary') ?? 10000}}" />
        <span class="text-xs text-red-600 dark:text-red-400">
            @if($errors->has('salary'))
            <div class="error">{{ $errors->first('salary') }}</div>
            @endif
        </span>
    </label>
    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">
            Employee Time
        </span>
        <select name="time"
            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
            <option value="day" {{old('time') == 'day' ? 'selected' : ''}}>Day</option>
            <option value="night" {{old('time') == 'night' ? 'selected' : ''}}>Night</option>
            <option value="both" {{old('time') == 'both' ? 'selected' : ''}}>Both</option>
        </select>
        <span class="text-xs text-red-600 dark:text-red-400">
            @if($errors->has('time'))
            <div class="error">{{ $errors->first('time') }}</div>
            @endif
        </span>
    </label>

    <div class="flex justify-end bg-gray-200">
        <div class="text-gray-700 text-center bg-gray-400 mt-8 mb-2"><button
                class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Create account
                <span class="ml-2" aria-hidden="true">+</span>
            </button></div>

    </div>
</form>
@endsection