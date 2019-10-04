@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="container py-5">

        <div class="row">

            <div class="col-lg-6">
                <div class="row">
                    <div class="col-md-8">
                        <h1>Bid info</h1>
                    </div>
                    <div class="col-md-4">
                        @auth
                            <button type="button" class="btn btn-primary">
                                Visits <span class="badge badge-light">{{ $product->visits }}</span>
                            </button>
                        @endauth
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h3> Highest: ZAR {{ $product->highest() }}</h3>
                    </div>
                    <div class="col-md-6">
                        <h3> Average: ZAR {{ $product->average() }}</h3>
                    </div>
                </div>

                <hr />

                @guest
                    <h5>Bid on this coffee!</h5>

                    {!! Form::open(['route' => 'bids.store', 'method' => 'post']) !!}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {!! Form::email('email', old('email'), ['placeholder' => 'Email','class' => 'form-control', 'required']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::number('amount', '', ['placeholder' => '0.00','class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        {!! Form::hidden('product_id', $product->id) !!}
                        {!! Form::submit('Submit bid', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}

                    <hr />

                    <h5>My bids for this coffee!</h5>
                    @forelse ($userBids as $user)
                    <ul>
                        <li>
                            <h5 class="mt-0 mb-1">ZAR {{ $user->amount }}</h5>
                            <small class="text-muted">{{ $user->created_at }}</small>
                        </li>
                    </ul>
                    @empty
                        <p>No bids made.</p>
                    @endforelse
                @else
                    <h5>All bids made for this coffee!</h5>
                    @forelse ($allBids as $user)
                        <ul>
                            <li>
                                <h5 class="mt-0 mb-1">ZAR {{ $user->amount }}</h5>
                                <small class="text-muted">{{ $user->created_at }} - {{ $user->user->email }}</small>
                            </li>
                        </ul>
                    @empty
                        <p>No bids made.</p>
                    @endforelse
                @endguest
            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-6">

                <div class="card mt-4">
                    <img class="card-img-top img-fluid" src="{{ asset($product->image) }}" alt="">
                    <div class="card-body">
                        <h3 class="card-title">{{ $product->title }} <span class="badge badge-dark">ZAR {{ $product->price }}</span></h5></h3>
                        <p class="card-text">{{ $product->description }}</p>
                    </div>
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col-lg-9 -->

        </div>

    </div>
    <!-- /.container -->
@endsection