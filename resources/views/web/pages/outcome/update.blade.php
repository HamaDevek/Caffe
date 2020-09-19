@extends('web.layouts.app')
@section('content')

<h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    Update Outcome
</h4>
@include('web.layouts.message')
<form class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800" method="POST"
    action="{{route('outcome.update',$data->id)}}">
    @csrf
    @method('PUT')
    <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Title</span>
        <input
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="Jane Doe" name="title" value="{{$data->title}}" />
        <span class="text-xs text-red-600 dark:text-red-400">
            @if($errors->has('title'))
            <div class="error">{{ $errors->first('title') }}</div>
            @endif
        </span>
    </label>
    <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Price</span>
        <input
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="10000" type="number" name="outcome" value="{{$data->outcome}}" />
        <span class="text-xs text-red-600 dark:text-red-400">
            @if($errors->has('outcome'))
            <div class="error">{{ $errors->first('outcome') }}</div>
            @endif
        </span>
    </label>
    <br>
    <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Information</span>
        <textarea
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            name="info" id="" cols="30" rows="10">{{$data->info}}</textarea>
        <span class="text-xs text-red-600 dark:text-red-400">
            @if($errors->has('info'))
            <div class="error">{{ $errors->first('info') }}</div>
            @endif
        </span>
    </label>
    <br>


    <div class="flex justify-end bg-gray-200">
        <div class="text-gray-700 text-center bg-gray-400 mt-8 mb-2"><button
                class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Update Outcome
                <span class="ml-2" aria-hidden="true">+</span>
            </button></div>

    </div>
</form>
@endsection