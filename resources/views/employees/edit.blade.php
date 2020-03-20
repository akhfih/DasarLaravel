@extends('layouts.app')

@section('content')
<div class="container mt-3">
  <div class="row">
    <div class="col-sm-8 col-md-6">
      <h1 class="h2 pt-4">Tambah Employe</h1>
      <hr>

      <form action="{{url('/employees/'.$employees->id)}}" method="POST"
enctype="multipart/form-data">
@method('PATCH')
        @csrf
        <input type="text" id="id" name="id" name="id" value="{{$employees->id}}" hidden>
        <div class="form-group">
          <label for="employees_nama">Nama Employe</label>
          <input type="text"
          class="form-control @error('employees_nama') is-invalid @enderror"
          id="employees_nama" name="employees_nama"
          value="{{ $employees->employees_nama }}">
          @error('employees_nama')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="employees_company_id">Company</label>
          <input type="text"
          class="form-control @error('employees_companies_id') is-invalid @enderror"
          id="employees_company_id" name="employees_companies_id"
          value="{{ $employees->employees_companies_id }}">
          @error('employees_companies_id')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="employees_email">Company</label>
          <input type="text"
          class="form-control @error('employees_email') is-invalid @enderror"
          id="employees_email" name="employees_email"
          value="{{ $employees->employees_email }}">
          @error('employees_companies_id')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

       

        <button type="submit" class="btn btn-primary my-2">Tambah Employe</button>
      </form>

      

@endsection
