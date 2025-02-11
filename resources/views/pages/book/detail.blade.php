@extends('layouts.master')
@section('header')
<div class="page-header">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <h2 class="page-title">{{ $data->title }}</h2>
      </div>
      <div class="col-auto ms-auto">
        <div class="btn-list">
          <a href="{{ route('book.index') }}" class="btn btn-default btn-5 d-sm-inline-block">
            Kembali
          </a>
          <a href="{{ route('book.edit', $data->id) }}" class="btn btn-primary btn-5 d-sm-inline-block">
            Sunting Buku
          </a>
          <a href="{{ route('book.destroy', $data->id) }}" class="btn btn-danger btn-5 d-sm-inline-block">
            Hapus Buku
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('content')
<div class="row row-cards">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-6">
          <img src="/storage/{{ $data->cover }}" alt="No Image" class="img-responsive" >
        </div>
        <div class="col-6">
          <div class="mb-3">
            {{ html()->label('Judul Buku', 'title')->class('form-label') }}
            <p>{{ $data->title }} </p>
          </div>
          <div class="mb-3">
            {{ html()->label('Kondisi Buku', 'condition')->class('form-label') }}
            <p>{{ $data->condition }} </p>
          </div>
          <div class="mb-3">
            {{ html()->label('Kategori Buku', 'category')->class('form-label') }}
            <p>{{ $data->category->name }} </p>
          </div>
          <div class="mb-3">
            {{ html()->label('Pengarang Buku', 'author')->class('form-label') }}
            <p>{{ $data->author->name }} </p>
          </div>
          <div class="mb-3">
            {{ html()->label('Penerbit Buku', 'publisher')->class('form-label') }}
            <p>{{ $data->publisher->name }} </p>
          </div>
          <div class="mb-3">
            {{ html()->label('Lokasi Buku', 'location')->class('form-label') }}
            <p>{{ $data->location->name }} </p>
          </div>
          <div class="mb-3">
            {{ html()->label('Jumlah Buku', 'condition')->class('form-label') }}
            <p>{{ $data->quantity }} </p>
          </div>
          <div class="mb-3">
            {{ html()->label('Jumlah Pinjaman Buku', 'borrow_quantity')->class('form-label') }}
            <p>{{ $data->borrow_quantity }} </p>
          </div>
          <div class="mb-3">
            {{ html()->label('Jumlah Akhir Buku', 'condition')->class('form-label') }}
            <p>{{ $data->end_quantity }} </p>
          </div>
          <div class="mb-3">
            {{ html()->label('Harga Buku', 'price')->class('form-label') }}
            <p>{{ $data->price }} </p>
          </div>
          <div class="mb-3">
            {{ html()->label('Jumlah Halaman Buku', 'total_pages')->class('form-label') }}
            <p>{{ $data->total_pages }} </p>
          </div>
          <div class="mb-3">
            {{ html()->label('Sinopsis Buku', 'synopsis')->class('form-label') }}
            <p>{{ $data->synopsis }} </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection