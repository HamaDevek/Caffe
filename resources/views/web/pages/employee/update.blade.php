@extends('web.layouts.app')
@section('content')

<h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
  Update Employee
</h4>
<div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
  <!-- Card -->
  <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
    <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd"
          d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
          clip-rule="evenodd"></path>
      </svg>
    </div>
    <div>
      <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
        Total Money
      </p>
      <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
        {{$salary}} IQD
      </p>
    </div>
  </div>
  <!-- Card -->
  <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
    <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
        <path
          d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
        </path>
      </svg>
    </div>
    <div>
      <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
        Total Days License
      </p>
      <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
        {{$days}}
      </p>
    </div>
  </div>
  <!-- Card -->
  <a @click="openModal">
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
      <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd"
            d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
            clip-rule="evenodd"></path>
        </svg>
      </div>
      <div>
        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
          Total License
        </p>
        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
          {{$license}}
        </p>
      </div>
    </div>
  </a>

</div>

@include('web.layouts.message')

<form class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800" method="POST"
  action="{{route('employee.update',$data->id)}}">
  @csrf
  @method('PUT')
  <label class="block text-sm">
    <span class="text-gray-700 dark:text-gray-400">Name</span>
    <input
      class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
      placeholder="Jane Doe" name="name" value="{{$data->name}}" />
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
      placeholder="07701234567" value="{{$data->phone}}" />
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
      type="number" placeholder="10000" name="salary" value="{{$data->salary}}" />
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
      <option value="day" {{$data->time == 'day' ? 'selected' : ''}}>Day</option>
      <option value="night" {{$data->time == 'night' ? 'selected' : ''}}>Night</option>
      <option value="both" {{$data->time == 'both' ? 'selected' : ''}}>Both</option>
    </select>
    <span class="text-xs text-red-600 dark:text-red-400">
      @if($errors->has('time'))
      <div class="error">{{ $errors->first('time') }}</div>
      @endif
    </span>
  </label>
  <div class="flex mt-6 text-sm">
    <label class="flex items-center dark:text-gray-400">
      <input type="checkbox" {{$data->state ? 'checked' : ''}} name="state"
        class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" />
      <span class="ml-2">
        This Employee Still Working
      </span>
    </label>
  </div>
  <div class="flex justify-end bg-gray-200">
    <div class="text-gray-700 text-center bg-gray-400 mt-8 mb-2">
      <button
        class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        Update employee
        <span class="ml-2" aria-hidden="true">+</span>
      </button>
    </div>
  </div>
</form>
<div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
  x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
  x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
  class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
  <!-- Modal -->
  <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150"
    x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal" @keydown.escape="closeModal"
    class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
    role="dialog" id="modal">
    <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
    <header class="flex justify-end">
      <button
        class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
        aria-label="close" @click="closeModal">
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
          <path
            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
            clip-rule="evenodd" fill-rule="evenodd"></path>
        </svg>
      </button>
    </header>
    <!-- Modal body -->
    <form class="mt-4 mb-6" action="{{route('license.store')}}" method="POST">
      @csrf
      <!-- Modal title -->
      <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
        Add License
      </p>
      <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">From</span>
        <input type="date"
          class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
          placeholder="1/1/2020" name="from" />
      </label>
      <br>
      <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">To</span>
        <input type="date"
          class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
          placeholder="1/1/2020" name="to" />
      </label>
      <br>
      <input type="hidden" name="employee" value="{{$data->id}}">
      <footer
        class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
        <button @click="closeModal" type="button"
          class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
          Cancel
        </button>
        <button type="submit"
          class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
          Accept
        </button>
      </footer>
    </form>
  </div>
</div>
<div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
  <div class="w-full overflow-x-auto">
    <table class="w-full whitespace-no-wrap datatable" style="width: 100%">
      <thead>
        <tr
          class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
          <th class="px-4 py-3">#</th>
          <th class="px-4 py-3">From</th>
          <th class="px-4 py-3">To</th>
          <th class="px-4 py-3">Created At</th>
          <th class="px-4 py-3">Updated At</th>
          <th class="px-4 py-3">Add By</th>
          <th class="px-4 py-3">Action</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
        @foreach ($data->license as $key => $value)
        <tr class="text-gray-700 dark:text-gray-400">
          <td class="px-4 py-3 text-sm">
            {{++$key}}
          </td>
          <td class="px-4 py-3 text-sm">
            {{$value->from }}
          </td>
          <td class="px-4 py-3 text-sm">
            {{$value->to }}
          </td>
          <td class="px-4 py-3 text-sm">
            {{$value->created_at }}
          </td>
          <td class="px-4 py-3 text-sm">
            {{$value->updated_at }}
          </td>
          <td class="px-4 py-3 text-sm">
            {{$value->user->name }}
          </td>
          <td class="px-4 py-3 text-sm">

            <form id="{{"form-delete-license-" .$value->id}}" action="{{route('license.destroy',$value->id)}}"
              method="post" class="">
              @csrf
              @method('DELETE')
              <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">DELETE</button>
          </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection