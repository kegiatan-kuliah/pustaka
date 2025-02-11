@extends('layouts.master')
@section('header')
<div class="page-header">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <h2 class="page-title">Kelas</h2>
      </div>
      <div class="col-auto ms-auto">
        <div class="btn-list">
          <a href="{{ route('room.new') }}" class="btn btn-primary btn-5 d-sm-inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-2">
              <path d="M12 5l0 14"></path>
              <path d="M5 12l14 0"></path>
            </svg>
            Tambah Kelas
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
      <div class="table-responsive">
        {{ $dataTable->table() }}
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush