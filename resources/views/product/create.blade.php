@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 px-3 py-5">

        <h1 class="text-center mb-3 text-2xl font-bold">
            Create Product
        </h1>

        <div class="lg:max-w-lg mx-auto mb-5">
            <form action="{{ url('/product/') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="mb-3">
                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">
                        Product Title<span class="text-red-500">*</span></label>
                    <input id="title" type="text" name="title" value="{{ old('title', '') }}"
                        placeholder="Product 1"
                        class="w-full px-3 py-1 border rounded-lg focus:outline-none focus:border-blue-500">
                    @if ($errors->has('title'))
                        <div class="text-red-500 text-sm mt-1">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="description" class="block text-sm font-medium leading-6 text-gray-900">
                        Product description<span class="text-red-500">*</span></label>
                    <input id="description" type="text" name="description" value="{{ old('description', '') }}"
                        placeholder="Product description"
                        class="w-full px-3 py-1 border rounded-lg focus:outline-none focus:border-blue-500">
                    @if ($errors->has('description'))
                        <div class="text-red-500 text-sm mt-1">
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="price" class="block text-sm font-medium leading-6 text-gray-900">
                        Product Price<span class="text-red-500">*</span></label>
                    <input id="price" type="number" name="price" value="{{ old('price', '') }}" placeholder="10.50"
                        class="w-full px-3 py-1 border rounded-lg focus:outline-none focus:border-blue-500">
                    @if ($errors->has('price'))
                        <div class="text-red-500 text-sm mt-1">
                            {{ $errors->first('price') }}
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="thumbnail" class="block text-sm font-medium leading-6 text-gray-900">
                        Product Thumbnail (URL)<span class="text-red-500">*</span></label>
                    <input id="thumbnail" type="text" name="thumbnail" value="{{ old('thumbnail', '') }}"
                        placeholder="https://cdn.dummyjson.com/products..."
                        class="w-full px-3 py-1 border rounded-lg focus:outline-none focus:border-blue-500">
                    @if ($errors->has('thumbnail'))
                        <div class="text-red-500 text-sm mt-1">
                            {{ $errors->first('thumbnail') }}
                        </div>
                    @endif
                </div>

                <button type="submit"
                    class="w-full bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600 transition duration-300 disabled:opacity-75">
                    Simpan</button>
            </form>
        </div>

        <div class="flex justify-center">
            <a href="{{ url('/product') }}">
                <button class="bg-gray-500 hover:bg-gray-600 text-white px-3 cursor-pointer">
                    Back to product listing
                </button>
            </a>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
