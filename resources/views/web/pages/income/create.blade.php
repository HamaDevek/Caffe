@extends('web.layouts.app')
@section('content')

<h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    New Income
</h4>
@include('web.layouts.message')
<form class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800" method="POST"
    action="{{route('income.store')}}">
    @csrf
    <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Price</span>
        <input
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="10000" type="number" name="income" value="{{old('income')}}" />
        <span class="text-xs text-red-600 dark:text-red-400">
            @if($errors->has('income'))
            <div class="error">{{ $errors->first('income') }}</div>
            @endif
        </span>
    </label>
    <br>

    <div class="flex justify-end bg-gray-200">
        <div class="text-gray-700 text-center bg-gray-400 mt-8 mb-2"><button
                class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Create Income
                <span class="ml-2" aria-hidden="true">+</span>
            </button>
        </div>
    </div>

    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap datatable" style="width: 100%">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Outcome & Salary</th>
                        <th class="px-4 py-3">Type</th>
                        <th class="px-4 py-3">Amount</th>
                        <th class="px-4 py-3">Created At</th>
                        <th class="px-4 py-3">Updated by</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @php
                    $count = 0;
                    @endphp
                    @foreach ($employee as $key => $value)
                    @php
                    $count++;
                    @endphp
                    <tr class="text-gray-700 dark:text-gray-400">

                        <td class="px-4 py-3 text-sm">
                            {{$count}}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{$value->name}}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            Salary
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{$value->salary}} IQD
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{$value->created_at}}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{$value->updated_at}}

                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{$value->updated_at}}

                        </td>
                    </tr>
                    @endforeach
                    @foreach ($outcome as $key => $value)
                    @php
                    $count++;
                    @endphp
                    <tr class="text-gray-700 dark:text-gray-400">

                        <td class="px-4 py-3 text-sm">
                            {{$count}}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{$value->title}}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            Outcome
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{$value->outcome}} IQD
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{$value->created_at}}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{$value->updated_at}}

                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{$value->updated_at}}

                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="text-gray-700 dark:text-gray-400">

                        <td class="px-4 py-3 text-sm">
                        </td>
                        <td class="px-4 py-3 text-sm">
                        </td>
                        <td class="px-4 py-3 text-sm">
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                                {{$all_outcome}} IQD
                            </h2>
                        </td>
                        <td class="px-4 py-3 text-sm">
                        </td>
                        <td class="px-4 py-3 text-sm">

                        </td>
                        <td class="px-4 py-3 text-sm">

                        </td>
                    </tr>

                </tfoot>
            </table>
        </div>
    </div>

</form>
@endsection