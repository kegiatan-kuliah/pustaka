@extends('layouts.master')
@section('content')
<div class="page-header">
	<div class="container-xl">
		<div class="row g-2 align-items-center">
			<div class="col">
				<h2 class="page-title">Tambah Pinjam Buku</h2>
			</div>
		</div>
	</div>
</div>

<div class="page-body">
  {{ html()->form('POST', route('application.store'))->attribute('enctype', 'multipart/form-data')->open() }}
	<div class="container-xl">
		<div class="row row-cards">
      <div class="card">
        <div class="card-body">
          @if(Auth::user()->role === 'member')
            {{ html()->hidden('member_id', Auth::user()->member->id) }}
            <div class="mb-3">
              <label for="" class="form-label">{{ Auth::user()->name }} - {{ Auth::user()->member->member_no }}</label>
            </div>
          @else
          <div class="mb-3">
              {{ html()->label('Anggota', 'member_id')->class('form-label') }}
              {{ html()->select('member_id', ['' => 'Pilih Anggota'] + $members->toArray())
                  ->class('form-control') }}
            </div>
          @endif
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th></th>
                  <th>Judul</th>
                  <th>Sisa Buku</th>
                  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody id="renderData">
                @foreach($books as $index => $book)
                  <tr>
                    <td>{{ html()->input('checkbox', 'items['.$index.'][id]', $book->id) }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->end_quantity }}</td>
                    <td>{{ html()->input('number', 'items['.$index.'][qty]')
                          ->class('form-control')
                          ->attribute('min', '1')
                          ->attribute('placeholder', 'Isikan jumlah') }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
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
  </div>
  {{ html()->form()->close() }}
</div>

@endsection