@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 p-3">

        <div class="flex gap-5 justify-between">

            <div class="mb-5">
                <a href="{{ url('/') }}">
                    <button class="bg-blue-600 text-white p-4">Back to Tasks</button>
                </a>
            </div>
            <div class="mb-5">
                <a href="{{ url('/product/create') }}">
                    <button class="bg-green-600 text-white p-4">Create product</button>
                </a>
            </div>
        </div>

        <div>
            <form action="{{ url('/product') }}" method="GET">
                <div class="font-semibold mb-2">Filter:</div>
                <div class="flex flex-col md:flex-row gap-3">
                    <div class="flex gap-3 md:w-6/12 lg:w-4/12 xl:w-3/12">
                        <input type="text" id="title"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Product Name" name="title" value="{{ old('title', @request()->title ?? '') }}" />
                    </div>
                    <div class="flex gap-3">
                        <button type="submit"
                            class="text-blue-800 border border-blue-800 hover:bg-blue-800 hover:text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                            Filter
                        </button>
                        <a href="/product"
                            class=" hover:bg-gray-200 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center flex items-center">
                            Reset </a>
                    </div>
                </div>
            </form>
        </div>



        @if (!empty($products) && $products->count())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 p-3 text-center">
                @foreach ($products as $key => $product)
                    <div class="bg-green-200">
                        <div>
                            <img src="{{ $product->thumbnail }}" alt="{{ $product->title }}">
                        </div>
                        <div class="bg-gray-300 p-3">
                            <div>
                                {{ $product->title }}
                            </div>
                            <div>
                                RM{{ number_format($product->price, 2) }}
                            </div>
                            <div class="mt-3">
                                <a href="{{ url('/product/' . $product->id . '/edit') }}"
                                    class="hover:underline text-green-600">Edit</a>
                                <br>

                                <form method="POST" action="{{ url('/product/' . $product->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="hover:underline text-red-600">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="px-5">
                {!! $products->appends(request()->all())->links() !!}
            </div>
        @else
            <div class="bg-red-100 p-5 my-5">
                No data. Please go back to task page and click "fetch API" button.
            </div>
        @endif
    </div>
@endsection

@push('scripts')
@endpush
