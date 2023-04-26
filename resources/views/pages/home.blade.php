@extends('layouts.site')

@php
/** @var \App\Models\Product $product */
@endphp

@section('page')
    <div class="mt-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
            @forelse($products as $product)

                <a href="{{$product->productLink}}" class="scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                    <div>
                        <div class="h-16 w-16 bg-red-50 flex items-center justify-center rounded-full">
                            <img src="{{$product->imageUrl}}" alt="{{$product->name}}">
                        </div>

                        <h2 class="mt-6 text-xl font-semibold text-gray-900">
                            {{$product->name}}
                        </h2>

                        <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                            ${{number_format($product->price)}}
                        </p>
                    </div>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                    </svg>
                </a>


            @empty

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        Catalogue is empty. Please check back later.
                    </div>
                </div>

            @endforelse

        </div>
    </div>
@endsection
