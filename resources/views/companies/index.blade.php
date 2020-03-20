@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="row">
      <div class="col-12">

        <div class="py-4 d-flex justify-content-end align-items-center">
          <h1 class="h2 mr-auto">Companies</h1>
          <a href="{{url('/companies/create')}}" class="btn btn-success">
            Tambah Companies
          </a>
        </div>

        @if(session()->has('pesan'))
        <div class="alert alert-success" role="alert">
          {{ session()->get('pesan')}}
        </div>
        @endif

      <table class="table table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Logo</th>
            <th>Website</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($companies as $company)
          <tr>
            <th>{{$loop->iteration}}</th>
            <td>
                <a href="{{ url('/companies/'.$company->id) }}">
                  {{$company->companies_nama}}
                </a>
            </td>
            <td>{{$company->companies_email}}</td>
            <td><img height="100" width="100"src="{{ asset('storage/'.$company->companies_logo) }}"></td>
            <td>{{$company->companies_website}}</td>
            <td>
            <form action="{{url('/companies/'.$company->id)}}" method="POST">
          <a href="{{url('/companies/'.$company->id.'/edit')}}"
            class="btn btn-primary">Edit</a>
         
            
            @method('DELETE')
            <button type="submit" class="btn btn-danger ml-3">Hapus</button>
            @csrf
          </form>
      
            </td>
          </tr>
          @empty
            <td colspan="6" class="text-center">Tidak ada data...</td>
          @endforelse
        </tbody>
      </table>
    
      <br/>
	
      {{ $companies->links() }}
 
      
      </div>
    </div>
</div>
@endsection
