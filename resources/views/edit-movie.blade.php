@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-secondary">
            <img id="image-tag" class="card-img-top" src="{{ Storage::disk('local')->exists($movie->poster) ? asset($movie->poster) : $movie->poster }}" alt="">
            <div class="card-body">
                <form enctype="multipart/form-data" action="{{ route('update', ['id' => $movie->id]) }}" method="POST">

                    @csrf
                    <div class="form-group">
                        <label class="custom-file bg-secondary text-white position-relative" for=" image">

                            <span class="position-absolute" style="left: .5rem;top: 50%; transform: translateY(-50%); ">{{ __('Change Image') }}</span>

                            <input type="file" name="image" style="cursor: pointer" id="image" placeholder="{{ __('Image') }}" class="custom-file-input" aria-describedby="fileHelpId">
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="title">{{ __('Title') }}</label>
                        <input type="text" name="title" id="title" value="{{ $movie->title }}" class="form-control" placeholder="{{ __('Title') }}" aria-describedby="helpId">

                    </div>
                    <div class="form-group">
                        <label for="publishing_date">{{ __('Publishing date:') }}</label>
                        <input type="date" name="publishing_date" id="publishing_date" value="{{ $movie->publishing_date }}" class="form-control" placeholder="{{ __('Publishing date:') }}" aria-describedby="helpId">
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
