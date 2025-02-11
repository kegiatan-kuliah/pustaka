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
{{ html()->form('POST', route('application.return_store'))->attribute('enctype', 'multipart/form-data')->open() }}
{{ html()->hidden('id', $data->id) }}
<div class="row row-cards">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-12">
          <div class="mb-3">
            {{ html()->label('No Pinjaman', 'code')->class('form-label') }}
            <p>{{ $data->application_no }} </p>
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
                  <th>Jumlah Yang dikembalikan</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody id="renderData">
                @foreach($data->items as $index => $item)
                  <tr>
                    <td>{{ html()->input('checkbox', 'items['.$index.'][id]', $item->id) }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ html()->input('number', 'items['.$index.'][qty]')
                          ->class('form-control')
                          ->attribute('min', '1')
                          ->attribute('placeholder', 'Isikan jumlah') }}</td>
                    <td>{{ html()->input('text', 'items['.$index.'][description]')
                          ->class('form-control')
                          ->attribute('placeholder', 'Isikan keterangan') }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <div class="d-flex justify-content-between">
        <a href="{{ route('application.index') }}" class="btn btn-default">Kembali</a>
        {{ html()->button('Simpan')->class('btn btn-primary')->attribute('type', 'submit') }}
      </div>
    </div>
  </div>
</div>
{{ html()->form()->close() }}
@endsection