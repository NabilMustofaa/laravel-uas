@extends('layouts.admin')

@section('content')
@include('partials.sidebar')
    <div class="container-fluid d-flex flex-column mside ">
        <p class="h2 ms-4 mt-3">Jadwal</p>
        <div class="d-flex me-4 mt-3 justify-content-between">
            <a href= "jadwal/create"class="btn btn-danger d-flex">Buat Jadwal</a>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
        </div>
        
      @if (session()->has('success'))
      <div class="alert alert-success mt-2" role="alert">
          {{ session('success') }}
      </div>
      @endif
      
        <table class="table table-secondary table-hover w-auto mt-2 border rounded overflow-hidden">
            <thead>
              <tr>
                <th scope="col">Tanggal</th>
                <th scope="col">Nama Jadwal</th>
                <th scope="col">Level</th>
                <th scope="col" style="width: 20%">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ( $jadwal as $item)
              <tr>
                <td>{{ $item->tanggalJadwal }}/{{ $item->waktuJadwal }}</td>
                <td>{{ $item->namaJadwal }}</td>
                <td>{{ $item->levelJadwal }}</td>
                <td>
                    <div>
                        <a href="/dashboard/jadwal/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                        <form action="/dashboard/jadwal/{{ $item->id }}" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                          <button class="btn btn-danger" onclick="return confirm('Hapus data ?')">Delete</button>
                        </form>
                        
                    </div>
                </td>
              </tr>
              @endforeach
             
              
            </tbody>
          </table>
          <ul class="pagination mx-auto">
            <li class="page-item disabled">
              <a class="page-link">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active" aria-current="page">
              <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#">Next</a>
            </li>
          </ul>
    </div>

@endsection