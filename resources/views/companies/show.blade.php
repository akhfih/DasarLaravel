@extends('layouts.app')

@section('content')

<div class="container mt-3">
  <div class="row">
    <div class="col-12">

      <div class="pt-4 d-flex justify-content-end align-items-center">
          <h1 class="h2 mr-auto">Detail Companies {{$companies->companies_nama}}</h1>
          
      </div>
      <hr>

      @if(session()->has('pesan'))
      <div class="alert alert-success" role="alert">
        {{ session()->get('pesan')}}
      </div>
      @endif

      <ul>
        <li>Nama Companies: {{$companies->companies_nama}} </li>
        <li>Email: {{$companies->companies_email}} </li>
        <li>Logo: <img height="100" width="100"src="{{ asset('storage/'.$companies->companies_logo) }}"> </li>
        <li>Website: {{$companies->companies_website}} </li>
      </ul>
    </div>
  </div>
</div>

@endsection
