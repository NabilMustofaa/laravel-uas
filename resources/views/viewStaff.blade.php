@extends('layouts.admin')

@section('content')
@include('partials.sidebar')

    <div class="container-fluid d-flex flex-column mside ">
        <p class="h2 ms-4 mt-3">Staff Detail</p>
        
        <div class="d-flex flex-column m-0 ">
          <form action="/dashboard/staff/{{ $staff->id }}" method="post" class="d-flex" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="d-flex flex-row m-0">
                <div class="card text-center m-2 p-5 d-flex flex-col align-items-center bg-white bg-opacity-50" style="width: 25%;">
                  <input type="hidden" name="oldImage" value="{{ $staff->User->image }}">
                  @if ($staff->User->image)
                  <img class="img-fluid img-preview rounded float-start mx-auto d-block d-flex" width="250px" src="{{ asset('uploads/' . $staff->User->image) }}">
                  @else
                  <img class="img-fluid img-preview rounded float-start mx-auto d-block" width="250px">
                  @endif

                  <input class="form-control @error('image') is-invalid @enderror d-none" type="file" id="image" name="image" onchange="previewImage()">

                  @error('image')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
                  <button type="button" class="btn btn-success mt-4" id="change" onclick="input()">Edit Profile</button>
                  
                  <button type="submit" class="btn btn-primary mt-4 d-none" id="submit"> Update Profile </button>


                  <form action="/dashboard/staff/{{ $staff->id }}" method="post">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Hapus data ?')">Delete</button>
                  </form>
                  
                  
                  
                  {{-- <button type="button" class="btn btn-danger mt-4 d-none" id="cancel" onclick="cancel()">Cancel Profile</button> --}}
              </div>
              <div class="card ms-2 my-2 p-4 bg-white bg-opacity-50 " style="width: 58vw;">
                  <p class="h5 m-2">Nama</p>
                  <input class="card p-2 bg-white bg-opacity-10 @error('name') is-invalid @enderror" value="{{ auth()->user()->name }}" id="name" name="name" disabled>
                  @error('name')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
                  <p class="h5 m-2">Jabatan</p>
                  <input class="card p-2 bg-white bg-opacity-10 @error('Jabatan') is-invalid @enderror" value="{{ $staff->Jabatan }}" id="jabatan" name="Jabatan" disabled>
                  @error('Jabatan')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
                  <p class="h5 m-2">Nomor Telephone</p>
                  <input class="card p-2 bg-white bg-opacity-10 @error('NoHp') is-invalid @enderror" value="{{ $staff->NoHp }}" id="nohp" name="NoHp" disabled>
                  @error('NoHp')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
                  <p class="h5 m-2">Alamat</p>
                  <textarea class="card p-2 bg-white bg-opacity-10 @error('Alamat') is-invalid @enderror" id="alamat" name="Alamat" rows="7" disabled>{{ $staff->Alamat }}</textarea>
                  @error('Alamat')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
                </div>
            </div>
          </form>
        </div>
    </div>
    <script>
        function input(){
          let name = document.getElementById("name");
          let noHp = document.getElementById("nohp");
          let Alamat = document.getElementById("alamat");
          let Jabatan = document.getElementById("jabatan");
          let image = document.getElementById("image");
          let edit = document.getElementById("submit");
          let cancel= document.getElementById("cancel");
          let change = document.getElementById("change");
  
          
          name.removeAttribute('disabled');
          noHp.removeAttribute('disabled');
          Alamat.removeAttribute('disabled');
          Jabatan.removeAttribute('disabled');
          change.classList.add("d-none");
          image.classList.remove("d-none");
          edit.classList.remove("d-none");
          cancel.classList.remove("d-none");
          
  
        }
        function previewImage() {
          const image= document.querySelector('#image')
          const imgPreview =document.querySelector('.img-preview')
  
          imgPreview.style.display='flex'
          const oFReader = new FileReader();
          oFReader.readAsDataURL(image.files[0]);
  
          oFReader.onload=function(oFREvent){
              imgPreview.src = oFREvent.target.result;
          }
      }
  
      </script>
  @endsection