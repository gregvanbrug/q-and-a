@extends('layouts.base')

@section('content')
<div class="mb-5">
    <h1 class="d-flex display-4 mb-3"><span class="pr-3">🤔</span><span>{{ $page->title }}</span></h1>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{ $error }}
        </div>
        @endforeach
    @endif

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endisset

    <form method="POST" action="{{ route('answers.store') }}">
        @csrf

        <div class="form-group">
            <label class="sr-only" for="answer">Your answer</label>
            <textarea placeholder="Your answer" class="form-control @error('answer') is-invalid @enderror" name="answer" id="answer" rows="3">{{ old('question') }}</textarea>
            <input type="hidden" name="id" value="{{ $page->id }}">
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </div>
    </form>
</div>
@if(count($page->answers) > 0)
<section>
    <h2 class="h6 text-muted">Recent Answers</h2>
    <ul class=list-group>
        @foreach($page->answers as $answer)
        <li class="d-flex justify-content-between align-items-center list-group-item">
            {{ $answer->title }} <span class="badge badge-pill badge-secondary">{{ $answer->updated_at->diffForHumans() }}</span>
        </li>
        @endforeach
    </ul>
</section>
@endisset
@endsection
