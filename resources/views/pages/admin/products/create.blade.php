<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Products | New Product
            </h2>
            <div>
                <a class="" href="{{route('admin.products.index')}}">
                    < Back
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4 px-6 bg-white shadow-md overflow-hidden sm:rounded-lg overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{route('admin.products.store')}}" enctype="multipart/form-data">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" value="Product Name" />
                        <x-text-input id="name" class="block mb-5 w-full px-4 py-2" type="text" name="name" :value="old('name')" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Price -->
                    <div>
                        <x-input-label for="price" value="Price ($)" />
                        <x-text-input id="price" class="block mb-5 w-full px-4 py-2" type="text" name="price"
                                      :value="old('price')" required />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>

                    <!-- Image -->
                    <div>
                        <x-input-label for="image" value="Product Image" />
                        <x-text-input id="image" class="block mb-5 w-full px-4 py-2"
                                      accept="image/*"
                                      type="file" name="image"/>
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ml-3">
                            Save
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
