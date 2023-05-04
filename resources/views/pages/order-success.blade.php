@extends('layouts.site')

@php
/** @var \App\Models\Order $order */
@endphp

@section('page')
    <div class="mt-16">
        <div class="grid grid-cols-1">
            <div class="scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                <div class="w-full">
                    <div class="h-16 w-16 bg-red-50 flex items-center justify-center rounded-full">
                        <img src="{{$order->product->imageUrl}}" alt="{{$order->product->name}}">
                    </div>

                    <h2 class="mt-6 text-xl font-semibold text-gray-900">
                        {{$order->product->name}}
                    </h2>

                    <div class="mt-4 text-gray-500 flex justify-between w-full">
                        <p class="text-sm leading-relaxed">
                            ${{number_format($order->product->price, 2)}}
                        </p>
                        <div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection

@section('scripts')

@endsection
