@extends('frontend.layouts.app')

@push('css')
    <style>
        .h25px{
            height: 25px;
        }
        .star-rating{
            color: #f39c12;
            width: 1.2rem;
        }
        .rating-div{
            column-gap: 0.5rem;
            margin-bottom: 0.5rem;
        }
    </style>
@endpush

@section('page_conent')

   
<div class="container mt-5">
        <h1 class="mb-4">Shop One - Store Wise Categories & Products</h1>

        @foreach($stores as $store)
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h2>{{ $store->name }}</h2>
                </div>
                <div class="card-body">
                    @foreach($store->categories as $category)
                        <h4 class="mt-3">{{ $category->name }}</h4>
                        <ul class="list-group mb-3">
                            @foreach($category->products as $product)
                                <li class="list-group-item">{{ $product->name }}</li>
                            @endforeach
                        </ul>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

@endsection

