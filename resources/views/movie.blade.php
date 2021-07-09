@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-secondary">
            <img class="card-img-top" src="{{ $movie->poster }}" alt="">
            <div class="card-body">
                <h4 class="card-title">{{ $movie->title }}</h4>
                <h6 class="card-subtitle text-muted">{{ $movie->publishing_date }}</h6>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card border-secondary">
            <div class="card-body">
                <form action="">
                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <textarea type="email" class="form-control" name="comment" id="comment" aria-describedby="emailHelpId" placeholder="Comment"></textarea>
                    </div>
                    <div class="form-group d-flex justify-content-end">
                        <button type="button" class="btn btn-primary">Post</button>
                    </div>
                </form>

            </div>
        </div>
        @foreach($movie->comments as $value)
        <div class="card border-secondary mt-3">
            <div class="card-body">
                <p class="card-text">{{ $value->content }}</p>
            </div>
        </div>
        @endforeach

    </div>
</div>



@endsection
