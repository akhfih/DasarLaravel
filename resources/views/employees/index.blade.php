@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="row">
      <div class="col-12">

        <div class="py-4 d-flex justify-content-end align-items-center">
          <h1 class="h2 mr-auto">Employees</h1>
          <a href="{{url('/employees/create')}}" class="btn btn-success">
            Tambah Employe
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
            <th>Company</th>
            <th>Email</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($employees as $employe)
          <tr>
            <th>{{$loop->iteration}}</th>
            <td>
                <a href="{{ url('/employees/'.$employe->id) }}">
                  {{$employe->employees_nama}}
                </a>
            </td>
            <td>{{$employe->employees_companies_id}}</td>
            <td>{{$employe->employees_email}}</td>
            <td>
            <form action="{{url('/employees/'.$employe->id)}}" method="POST">
          <a href="{{url('/employees/'.$employe->id.'/edit')}}"
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
	
      {{ $employees->links() }}
 
      
      </div>
    </div>
</div>
@endsection
