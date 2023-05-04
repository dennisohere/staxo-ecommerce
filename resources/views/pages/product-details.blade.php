@extends('layouts.site')

@php
/** @var \App\Models\Product $product */
@endphp

@section('page')
    <div class="mt-16" x-data="productDetails({{$product->toJson()}})">
        <div class="grid grid-cols-1">
            <div class="scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                <div class="w-full">
                    <div class="h-16 w-16 bg-red-50 flex items-center justify-center rounded-full">
                        <img src="{{$product->imageUrl}}" alt="{{$product->name}}">
                    </div>

                    <h2 class="mt-6 text-xl font-semibold text-gray-900">
                        {{$product->name}}
                    </h2>

                    <div class="mt-4 text-gray-500 flex justify-between w-full">
                        <p class="text-sm leading-relaxed">
                            ${{number_format($product->price, 2)}}
                        </p>
                        <div>
                            <button class="" @click="toggleBuyNowModal()">
                                Buy
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <template x-if="openModal">
            <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

                <div class="fixed inset-0 z-10 overflow-y-auto">
                    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                        <form method="post" :action="'/catalogue/' + product.slug + '/buy'"
                            class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                            @csrf
                            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                        <i class="ph ph-shopping-cart"></i>
                                    </div>
                                    <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                        <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">
                                            <span x-text="product.name"></span>
                                            --
                                            Buy Now!
                                        </h3>
                                        <div class="mt-2">
                                            <p class="text-sm text-gray-500">
                                                <input type="email" name="email" autofocus placeholder="Enter your email:"
                                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full px-5 py-4">

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <button type="submit" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">
                                    Buy
                                </button>
                                <button type="button" @click="toggleBuyNowModal()"
                                        class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </template>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('productDetails', (product) => ({
                openModal: false,
                product,
                toggleBuyNowModal() {
                    this.openModal = ! this.openModal
                },
                init(){
                    console.debug('loaded', product);
                }
            }))
        })
    </script>
@endsection
