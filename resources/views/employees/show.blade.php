@extends('layouts.app')

@section('content')

<div class="container mt-3">
  <div class="row">
    <div class="col-12">

      <div class="pt-4 d-flex justify-content-end align-items-center">
          <h1 class="h2 mr-auto">Detail Employe {{$employees->employees_nama}}</h1>
          
      </div>
      <hr>

      @if(session()->has('pesan'))
      <div class="alert alert-success" role="alert">
        {{ session()->get('pesan')}}
      </div>
      @endif

      <ul>
        <li>Nama Employees: {{$employees->employees_nama}} </li>
        <li>Company Id: {{$employees->employees_companies_id}} </li>
        <li>Email: {{$employees->employees_email}} </li>
      </ul>
    </div>
  </div>
</div>

@endsection
