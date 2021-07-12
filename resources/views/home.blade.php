@extends('layouts.app')

@section('content')
<div class="container">
    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
</div>
@endif --}}
<div class="d-flex justify-content-center">
    {{ $movies->links() }}
</div>

<div class="row justify-content-center">


    @foreach($movies as $value)
    <div class="col-md-6 mb-4">
        <div class="card">
            <img class="card-img-top" src="{{ $value->poster }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"> {{ $value->title }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">
                    {{ $value->publishing_date }}
                </h6>
                <a href="{{ route('movie', ['id' => $value->id]) }}" class="btn btn-primary">Movie Page</a>
                @auth
                @if(Auth::user()->isAdmin())
                <a href="{{ route('edit', ['id' => $value->id]) }}" class="btn btn-outline-primary">Edit Movie</a>
                <a href="{{ route('destroy', ['id' => $value->id]) }}" class="btn btn-danger">Remove Movie</a>

                @endif
                @endauth
            </div>
        </div>
    </div>
    @endforeach


</div>
<div class="d-flex justify-content-center">
    {{ $movies->links() }}
</div>

</div>
@endsection
