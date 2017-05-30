@extends('main')

@section('title', '| Contact')

@section('container')
  <div id="main">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h1>Contact </h1>
          <hr>
          <form action="{{ url('contact') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
              <label name="email">Email:</label>
              <input id="email" name="email" class="form-control">
            </div>

            <div class="form-group">
              <label name="subject">Subiect:</label>
              <input id="subject" name="subject" class="form-control">
            </div>

            <div class="form-group">
              <label name="message">Mesaj:</label>
              <textarea id="message" name="message" class="form-control">Introdu mesajul tau...</textarea>
            </div>

            <input type="submit" value="Send Message" class="btn btn-success">
          </form>
        </div>
      </div>
    </div>
@endsection
