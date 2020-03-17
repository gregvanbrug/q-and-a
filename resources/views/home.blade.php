@extends('layouts.base')

@section('content')
<div class="mb-5">
    <h1 class="d-flex display-4 mb-3"><span class="pr-3">🤔</span><span>What would you like to know?</span></h1>

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

    <form method="POST" action="{{ route('questions.store') }}">
        @csrf

        <div class="form-group">
            <label class="sr-only" for="question">Go ahead, ask anything...</label>
            <textarea placeholder="Ex: {{ $page->placeholder }}" class="form-control @error('question') is-invalid @enderror" name="question" id="question" rows="3">{{ old('question') }}</textarea>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </div>
    </form>
</div>
<hr>
@if(count($page->questions) > 0)
<section>
    <h2 class="h6 text-muted">Recently Asked</h2>
    <ul class=list-group>
        @foreach($page->questions as $question)
        <li class="d-flex justify-content-between align-items-center list-group-item">
            <a href="{{ route('questions.show', $question->id) }}">{{ $question->title }}</a> <span class="badge badge-pill badge-secondary">{{ $question->updated_at->diffForHumans() }}</span>
        </li>
        @endforeach
    </ul>
</section>
@endif
@endsection
