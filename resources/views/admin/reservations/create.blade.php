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
                    <form action="" enctype="multipart/form-data">
                        <div class="sm:col-span-6">
                            <label for="title" class="block text-sm font-medium text-gray-700">Name</label>
                            <div class="mt-1">
                                <input type="text" id="title" wire:model.lazy="title" name="title" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2">
                            </div>
                        </div>
                        <div sm:col-span-6>
                            <label for="title" class="block text-sm font-medium text-gray-700">Image</label>
                            <div class="mt-1">
                                <input type="file" id="image" wire:model="newImage" name="image" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2">
                            </div>
                        </div>
                        <div sm:col-span-6 pt-5>
                            <label for="title" class="block text-sm font-medium text-gray-700">Description</label>
                            <div class="mt-1">
                                <textarea id="body" rows="3" wire:model="body" name="description" class="shadow-sm w-full focus:ring-indigo-500 appearance-none transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2"></textarea>
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
