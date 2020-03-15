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

    @isset ($page->success)
        <div class="alert alert-success">
            {{ $page->success }}
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
<div>
    <h2 class="h6 text-muted">Recently Answered</h2>
    @php(dump($page))
</div>
@endsection
