@extends('client.layouts.app')
@section('title')
    @lang('app.products') - @lang('app.app-name')
@endsection
@section('content')
    <div class="container-xl py-4">
        <div class="row g-4 mb-4">
            <div class="col">
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4 mb-4">
                    @foreach($products as $product)
                        <div class="col">
                            @include('client.app.product')
                        </div>
                    @endforeach
                </div>
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection