@if(session()->has('message'))
    @if(is_array(session()->get('message')))
        @foreach(session()->get('message') as $message)
            <div class="row notification">
                <div class="col-12">
                    <div class="alert alert-info show" role="alert">
                        {{ $message }}
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="row notification">
            <div class="col-12">
                <div class="alert alert-info show" role="alert">
                    {{ session()->get('message') }}
                </div>
            </div>
        </div>
    @endif
@endif
