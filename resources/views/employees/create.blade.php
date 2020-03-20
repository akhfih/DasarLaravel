@extends('layouts.app')

@section('content')
<div class="container mt-3">
  <div class="row">
    <div class="col-sm-8 col-md-6">
      <h1 class="h2 pt-4">Tambah Employe</h1>
      <hr>

      <form action="{{url('/employees')}}" method="POST"
enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="employees_nama">Nama Employe</label>
          <input type="text"
          class="form-control @error('employees_nama') is-invalid @enderror"
          id="employees_nama" name="employees_nama"
          value="{{ old('employees_nama') }}">
          @error('employees_nama')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="employees_nama">Company id</label>
          <input type="text"
          class="form-control @error('employees_company') is-invalid @enderror"
          id="employees_company" name="employees_company"
          value="{{ old('employees_company') }}">
          @error('employees_company')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="employees_email">Email</label>
          <input type="text"
          class="form-control @error('employees_email') is-invalid @enderror"
          id="employees_email" name="employees_email" value="{{ old('employees_email')}}">
          @error('employees_email')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary my-2">Tambah Employe</button>
      </form>

      

@endsection
