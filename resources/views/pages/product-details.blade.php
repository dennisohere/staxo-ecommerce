@extends('layouts.site')

@php
/** @var \App\Models\Product $product */
@endphp

@section('page')
    <div class="mt-16">
        <div class="grid grid-cols-1 gap-6 lg:gap-8">
            <div class="scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
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

            </div>
        </div>
    </div>
@endsection
