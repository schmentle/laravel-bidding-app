@extends('layouts.app')

@section('content')
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Café</h1>
            <p class="lead text-muted">Bid on our selected coffees.<p>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                @forelse ($products as $product)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img class="card-img-top" data-src="{{ asset($product->image) }}" src="{{ asset($product->image) }}" alt="{{ $product->title }}">
                            <div class="card-body">
                                <h5>{{ $product->title }} <span class="badge badge-dark">ZAR {{ $product->price }}</span></h5>
                                <p class="card-text">{{ $product->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-outline-secondary">View</a>
                                    </div>
                                    @auth <small class="text-muted">{{ $product->visits }} visits</small> @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No products found.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection