@extends('layouts.app')

@section('title', 'Create')

@section('content')
    <section class="text-center card" style="margin-top: 5%;padding: 5%" style="background-color: #eee;">
        <form method="POST">
            <h1 style="margin: 2%">Create Question</h1>
            @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div  class="alert alert-danger" role="alert">{{ $error }}</div>
            @endforeach
        @endif
        @if(session()->has('message'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('message')  }}
            </div>
            <br>
        @endif
  <!-- Name input -->
  @csrf
  <div class="form-outline mb-4">
    <input type="text" id="form4Example1" class="form-control" name="title"/>
    <label class="form-label" for="form4Example1">Title</label>
  </div>

  <!-- Message input -->
  <div class="form-outline mb-4">
    <textarea class="form-control" id="form4Example3" rows="13" name="code"></textarea>
    <label class="form-label" for="form4Example3">Code</label>
  </div>


  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Ask</button>
</form>
    </section>
@endsection
