@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 p-3">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            <div class="bg-blue-100 p-5">
                <div class="mb-3 font-semibold">
                    Task 1 : Store Data into Database
                    <div class="text-xs text-black/50">
                        Click the button below to fetch data from dummyjson API
                    </div>
                </div>
                <a href="{{ url('/product/fetch-api') }}" class="bg-blue-600 text-white px-3 py-1">
                    Fetch API
                </a>
            </div>
            <div class="bg-blue-100 p-5">
                <div class="mb-3 font-semibold">
                    Task 2 : Show Products
                    <div class="text-xs text-black/50">
                        Click the button below to redirect to the product page
                    </div>
                </div>
                <a href="{{ url('/product') }}" class="bg-blue-600 text-white px-3 py-1">
                    Show Product Listing
                </a>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
