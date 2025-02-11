@extends('layouts.master')
@section('header')
<div class="page-header">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <h2 class="page-title">{{ $data->application_no }}</h2>
      </div>
      <div class="col-auto ms-auto">
        <div class="btn-list">
          <a href="{{ route('application.index') }}" class="btn btn-default btn-5 d-sm-inline-block">
            Kembali
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
        <div class="col-12">
          <div class="mb-3">
            {{ html()->label('No Pinjaman', 'code')->class('form-label') }}
            <p>{{ $data->application_code }} </p>
          </div>
          <div class="mb-3">
            {{ html()->label('Tanggal Pinjam', 'name')->class('form-label') }}
            <p>{{ $data->date }} </p>
          </div>
          <div class="mb-3">
            {{ html()->label('Jumlah Buku', 'condition')->class('form-label') }}
            <p>{{ $data->total_quantity }} </p>
          </div>
          <div class="mb-3">
            {{ html()->label('Yang Meminjam', 'out_stock')->class('form-label') }}
            <p>{{ $data->member->name }} </p>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th></th>
                  <th>Judul</th>
                  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody id="renderData">
                @foreach($data->items as $index => $item)
                  <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->quantity }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection