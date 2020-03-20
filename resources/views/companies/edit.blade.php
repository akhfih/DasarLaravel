@extends('layouts.app')

@section('content')
<div class="container mt-3">
  <div class="row">
    <div class="col-sm-8 col-md-6">
      <h1 class="h2 pt-4">Edit Companies</h1>
      <hr>

      <form action="{{url('/companies/'.$companies->id)}}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <input type="text" id="id" name="id" name="id" value="{{$companies->id}}" hidden>
        <div class="form-group">
          <label for="companies_nama">Nama Companies</label>
          <input type="text"
          class="form-control @error('companies_nama') is-invalid @enderror"
          id="companies_nama" name="companies_nama"
          value="{{$companies->companies_nama}}">
          @error('companies_nama')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="companies_email">Email</label>
          <input type="text"
          class="form-control @error('companies_email') is-invalid @enderror"
          id="companies_email" name="companies_email"
          value="{{$companies->companies_email}}">
          @error('companies_email')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

      

        <div class="form-group">
        <label for="companies">Logo</label>
        <input type="file" class="form-control-file" id="companies_logo" name="companies_logo" ">
        @error('companies_logo')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>

        <div class="form-group">
          <label for="companies_website">Website</label>
          <input type="text"
          class="form-control @error('companies_website') is-invalid @enderror"
          id="companies_website" name="companies_website"
          value="{{$companies->companies_website}}">
          @error('companies_website')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

       

        

        <button type="submit" class="btn btn-primary my-2">Update</button>
      </form>

    </div>
  </div>
</div>
@endsection
