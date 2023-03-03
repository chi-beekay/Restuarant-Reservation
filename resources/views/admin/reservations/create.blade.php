<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.reservations.index') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Return</a>
            </div>
            <div class="m-2 p-2 rounded">
                <div class=" space-y-8 divide-gray-200 w-1/2 mt-10">
                    <form action="{{ route('admin.reservations.store') }}" method="POST">
                        @csrf
                        {{-- first name --}}
                        <div class="sm:col-span-6">
                            <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                            <div class="mt-1">
                                <input type="text" id="first_name" name="first_name" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2">
                            </div>
                        </div>
                        {{-- last name --}}
                        <div class="sm:col-span-6">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                            <div class="mt-1">
                                <input type="text" id="last_name" name="last_name" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2">
                            </div>
                        </div>
                        {{-- email --}}
                        <div class="sm:col-span-6">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <div class="mt-1">
                                <input type="email" id="email" name="email" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2">
                            </div>
                        </div>
                        {{-- tel number --}}
                        <div class="sm:col-span-6">
                            <label for="tel_number" class="block text-sm font-medium text-gray-700">Tel Number</label>
                            <div class="mt-1">
                                <input type="text" id="tel_number" name="tel_number" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2">
                            </div>
                        </div>
                        {{-- reservation date --}}
                        <div class="sm:col-span-6">
                            <label for="res_date" class="block text-sm font-medium text-gray-700">Reservation Date</label>
                            <div class="mt-1">
                                <input type="datetime-local" id="res_date" name="res_date" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2">
                            </div>
                        </div>
                        {{-- guest number --}}
                        <div sm:col-span-6 pt-5>
                            <label for="guest_number" class="block text-sm font-medium text-gray-700">Guest Number</label>
                            <div class="mt-1">
                                <input type="number" min="0.00" max="10000.00" step="0.01" id="guest_number" name="guest_number" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2">
                            </div>
                        </div>
                        {{-- table id --}}
                        <div sm:col-span-6 pt-5>
                            <label for="status" class="block text-sm font-medium text-gray-700">Table ID</label>
                            <div class="mt-1">
                                <select id="table_id" name="table_id" class=" form-multiselect block w-full mt-1">
                                        <@foreach ($tables as $table)
                                        <option value="{{ $table->id }}">{{ $table->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class=" mt-6 p-4">
                            <button type="submit" class="px-4 py-2 bg-indigo-700 rounded-lg text-white">Create</button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</x-admin-layout>
