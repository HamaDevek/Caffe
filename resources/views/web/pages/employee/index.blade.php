@extends('web.layouts.app')
@section('content')

<h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    Table Employee
</h4>
@include('web.layouts.message')

<a class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
    href="{{route('employee.create')}}">
    <div class="flex items-center">
        <svg class="w-5 h-5 mr-2 " fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M13.388,9.624h-3.011v-3.01c0-0.208-0.168-0.377-0.376-0.377S9.624,6.405,9.624,6.613v3.01H6.613c-0.208,0-0.376,0.168-0.376,0.376s0.168,0.376,0.376,0.376h3.011v3.01c0,0.208,0.168,0.378,0.376,0.378s0.376-0.17,0.376-0.378v-3.01h3.011c0.207,0,0.377-0.168,0.377-0.376S13.595,9.624,13.388,9.624z M10,1.344c-4.781,0-8.656,3.875-8.656,8.656c0,4.781,3.875,8.656,8.656,8.656c4.781,0,8.656-3.875,8.656-8.656C18.656,5.219,14.781,1.344,10,1.344z M10,17.903c-4.365,0-7.904-3.538-7.904-7.903S5.635,2.096,10,2.096S17.903,5.635,17.903,10S14.365,17.903,10,17.903z">
            </path>
        </svg>
        <span>Add New Employee</span>
    </div>
    <span>Go &RightArrow;</span>
</a>

<div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap datatable" style="width: 100%">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Phone</th>
                    <th class="px-4 py-3">Salary</th>
                    <th class="px-4 py-3">Time</th>
                    <th class="px-4 py-3">State</th>
                    <th class="px-4 py-3">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach ($data as $key => $value)
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3 text-sm">
                        {{++$key}}
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <a href="{{route('employee.edit',$value->id)}}">{{$value->name }}</a>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <a href="tel:{{$value->phone }}" class="Blondie">
                            {{$value->phone }}
                        </a>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{$value->salary }} IQD
                    </td>
                    <td class="px-4 py-3 text-xs">
                        @if ($value->time == 'day')
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                            {{ucwords($value->time)}}
                        </span>
                        @endif
                        @if ($value->time == 'night')
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700">
                            {{ucwords($value->time)}}
                        </span>
                        @endif
                        @if ($value->time == 'both')
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                            {{ucwords($value->time)}}
                        </span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-sm">
                        
                            {!! $value->state ? 'Still Working' : 'Stoped Work' !!}
                      
                    </td>
                    <td class=" py-3 text-sm">
                        <div class=" md:w-1/3 px-3 mb-6 md:mb-0">
                            <div class="relative ">
                                <select onchange="onchangeDropdown(this,{{$value->id}})"
                                    class="block appearance-none  bg-gray-200 border border-gray-200 text-gray-700  pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-state">
                                    <option>Action</option>
                                    <option>Edit</option>
                                    <option>Delete</option>
                                </select>
                                <form id="{{"form-delete-employee-" .$value->id}}"
                                    action="{{route('employee.destroy',$value->id)}}" method="post" class="hidden">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    function onchangeDropdown(drop,id) {
        var route = "{{route('employee.index')}}";
       switch (drop.selectedIndex) {
           
           case 1:
           window.location.href = route +"/"+id + "/edit";
               break;
           case 2:
           document.getElementById('form-delete-employee-'+id).submit();
               break;
           default:
               break;
       }
    }
</script>
@endsection