<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Manage Products
            </h2>
            <div>
                <a class="" href="{{route('admin.products.create')}}">
                    + New Product
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="min-w-full text-left text-sm font-light">
                    <thead class="border-b font-medium dark:border-neutral-500">
                    <tr>
                        <th scope="col" class="px-6 py-4">#</th>
                        <th scope="col" class="px-6 py-4">Image</th>
                        <th scope="col" class="px-6 py-4">Name</th>
                        <th scope="col" class="px-6 py-4">Price</th>
                        <th scope="col" class="px-6 py-4"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr class="border-b dark:border-neutral-500">
                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{$loop->iteration}}</td>
                            <td class="whitespace-nowrap px-6 py-4">
                                <img class="h-16 w-16 bg-red-50" src="{{$product->imageUrl}}" alt="{{$product->name}}">
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">
                                {{$product->name}}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">
                                ${{number_format($product->price, 2)}}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">
                                <a href="{{route('admin.products.edit', ['product'=> $product->id])}}"
                                   class="bg-slate-500 hover:bg-slate-700 text-white py-1 px-3 rounded mr-3">
                                    Edit
                                </a>

                                <form action="{{route('admin.products.destroy', ['product' => $product->id])}}"
                                      method="post" class="inline-block">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded"
                                            onclick="event.preventDefault(); if(!confirm('Are you sure?')) return ;  this.closest('form').submit();">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
