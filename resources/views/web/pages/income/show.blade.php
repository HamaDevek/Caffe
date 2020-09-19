@extends('web.layouts.app')
@section('content')

<h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    New Income
</h4>
@include('web.layouts.message')
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">


    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Icomes : <span style="color: green">+{{$incomes->income}} IQD</span>
    </h2>

    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        All Outcome : <span style="color: red">-{{$all_outcome}} IQD</span>
    </h2>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        All Salary : <span style="color: red">-{{$all_salary}} IQD</span>
    </h2>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        All Avarage : <span style="color: {{$avarage > 0 ? 'green' : 'red'}}"> {{$avarage}} IQD</span>
    </h2>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        %50 of Income : {{$avarage / 2}} IQD
    </h2>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Date and Time: {{$incomes->created_at}}
    </h2>

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

</div>
@endsection