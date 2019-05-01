@extends('master')

@section('content')

<div class="row">
 <div class="col-md-12">
  <br />
  <h3 align="center">View Data pada Laravel ~ SMK Telkom Purwokerto</h3>
  <br />
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif
  <div align="right">
   <a href="{{route('data.create')}}" class="btn btn-success">Add</a>
   <br />
   <br />
  </div>
  <table class="table table-bordered table-striped">
   <tr>
    <th>ID</th>
    <th>Judul</th>
    <th>Pengarang</th>
    <th>Kategori</th>
    <th>Tahun Terbit</th>
    <th>Penerbit</th>
    <th>Edit</th>
   </tr>
   @foreach($data as $row)
   <tr>
    <td>{{$row['id']}}</td>
    <td>{{$row['judul']}}</td>
    <td>{{$row['pengarang']}}</td>
    <td>{{$row['kategori']}}</td>
    <td>{{$row['tahun_terbit']}}</td>
    <td>{{$row['penerbit']}}</td>
    <td><a href="{{action('BookController@edit', $row['id'])}}" class="btn btn-info">Edit</a></td>
   
   </tr>
   @endforeach
  </table>
 </div>
</div>

@endsection