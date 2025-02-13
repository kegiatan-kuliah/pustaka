@extends('layouts.master')
@section('header')
<div class="page-header">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <h2 class="page-title">Pinjam Buku</h2>
      </div>
      <div class="col-auto ms-auto">
        <div class="btn-list">
          <a href="#" class="btn btn-2" data-bs-toggle="modal" data-bs-target="#modal-borrow">
            Cetak Laporan Pinjaman Periode
          </a>
          <a href="#" class="btn btn-2" data-bs-toggle="modal" data-bs-target="#modal-return">
            Cetak Laporan Pengembalian Periode
          </a>
          <a href="{{ route('application.new') }}" class="btn btn-primary btn-5 d-sm-inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-2">
              <path d="M12 5l0 14"></path>
              <path d="M5 12l14 0"></path>
            </svg>
            Tambah Pinjaman Buku
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal modal-blur fade" id="modal-borrow" tabindex="-1" style="display: none;" aria-hidden="true">
	<div class="modal-dialog modal-1 modal-dialog-centered" role="document">
    {{ html()->form('POST', route('application.borrow_period'))->open() }}
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cetak Laporan Pinjaman Periode</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-6">
              <label for="">Dari</label>
              <input type="text" name="start_date" class="form-control date">
            </div>
            <div class="col-6">
              <label for="">Sampai</label>
              <input type="text" name="end_date" class="form-control date">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
        </div>
      </div>
    {{ html()->form()->close() }}
	</div>
</div>

<div class="modal modal-blur fade" id="modal-return" tabindex="-1" style="display: none;" aria-hidden="true">
	<div class="modal-dialog modal-1 modal-dialog-centered" role="document">
    {{ html()->form('POST', route('application.return_period'))->open() }}
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cetak Laporan Pengembalian Periode</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-6">
              <label for="">Dari</label>
              <input type="text" name="start_date" class="form-control date">
            </div>
            <div class="col-6">
              <label for="">Sampai</label>
              <input type="text" name="end_date" class="form-control date">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
        </div>
      </div>
    {{ html()->form()->close() }}
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
    <script>
      $(document).ready(function() {
        $('.date').datepicker({
            format: 'yyyy-mm-dd'
        });
      })
    </script>
@endpush