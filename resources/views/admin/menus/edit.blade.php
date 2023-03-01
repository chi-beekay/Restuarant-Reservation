<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.menus.index') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Return</a>
            </div>
            <div class="m-2 p-2 rounded">
                <div class=" space-y-8 divide-gray-200 w-1/2 mt-10">
                    <form action="{{ route('admin.menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="sm:col-span-6">
                            <label for="title" class="block text-sm font-medium text-gray-700">Name</label>
                            <div class="mt-1">
                                <input type="text" id="name" name="name" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2" value="{{ $menu->name }}">
                            </div>
                        </div>
                        <div sm:col-span-6>
                            <label for="title" class="block text-sm font-medium text-gray-700">Image</label>
                            <div class="mt-1">
                                <div>
                                    <img src="{{ Storage::url($menu->image) }}" alt="" class="w-32 h-32">
                                </div>
                                <input type="file" id="image" wire:model="newImage" name="image" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2">
                            </div>
                        </div>
                        <div sm:col-span-6 pt-5>
                            <label for="title" class="block text-sm font-medium text-gray-700">Price</label>
                            <div class="mt-1">
                                <input type="number" min="0.00" max="10000.00" step="0.01" id="price" name="price" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2" value="{{ $menu->price }}">
                            </div>
                        </div>
                        <div sm:col-span-6 pt-5>
                            <label for="title" class="block text-sm font-medium text-gray-700">Description</label>
                            <div class="mt-1">
                                <textarea id="body" rows="3" name="description" class="shadow-sm w-full focus:ring-indigo-500 appearance-none bg-white border border-gray-400 rounded-md py-2">{{ $menu->description }}</textarea>
                            </div>
                        </div>
                        <div sm:col-span-6 pt-5>
                            <label for="title" class="block text-sm font-medium text-gray-700">Categories</label>
                            <div class="mt-1">
                                <select multiple id="categories" name="categories[]" class=" form-multiselect block w-full mt-1">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @selected($menu->categories->contains($category))>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class=" mt-6 p-4">
                            <button type="submit" class="px-4 py-2 bg-indigo-700 rounded-lg text-white">Update</button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</x-admin-layout>
