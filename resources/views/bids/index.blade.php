@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-5">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    @include('partials.sidebar-nav')
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h2>Bids</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Email</th>
                            <th>Amount</th>
                            <th>Product</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse($bids as $bid)
                                <tr>
                                    <td>{{ $bid->id }}</td>
                                    <td>{{ $bid->user->email }}</td>
                                    <td>ZAR {{ $bid->amount }}</td>
                                    <td>{{ $bid->product->title }}</td>
                                    <td>{{ $bid->created_at }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">There are currently no bids.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
@endsection