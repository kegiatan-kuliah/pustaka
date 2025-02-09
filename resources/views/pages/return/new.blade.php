@extends('layouts.master')
@section('content')
<div class="page-header">
	<div class="container-xl">
		<div class="row g-2 align-items-center">
			<div class="col">
				<h2 class="page-title">Tambah Kembalian Buku</h2>
			</div>
		</div>
	</div>
</div>

<div class="page-body">
	<div class="container-xl">
		<div class="row row-cards">
			{{ html()->form('POST', route('return.store'))->open() }}
				<div class="card">
					<div class="card-body">
            <div class="mb-3">
							{{ html()->label('Tanggal Dikembalikan', 'date')->class('form-label') }}
							{{ html()->input('text', 'date')
								->class('form-control datepicker')->attribute('required', true)
								->attribute('placeholder', 'Isikan tanggal dikembalikan') }}
						</div>
						<div class="mb-3">
							{{ html()->label('Kondisi Buku', 'condition')->class('form-label') }}
							{{ html()->input('text', 'condition')
								->class('form-control')->attribute('required', true)
								->attribute('placeholder', 'Isikan kondisi buku') }}
						</div>
            <div class="mb-3">
							{{ html()->label('Deskripsi', 'description')->class('form-label') }}
							{{ html()->input('textarea', 'description')
								->class('form-control')->attribute('required', true)
								->attribute('placeholder', 'Isikan deskripsi') }}
						</div>
            <div class="mb-3">
							{{ html()->label('Buku', 'book_id')->class('form-label') }}
							{{ html()->select('book_id', ['' => 'Pilih Buku'] + $books->toArray())
                  ->class('form-control')
                  ->attribute('required', true) }}
						</div>
            <div class="mb-3">
							{{ html()->label('Anggota', 'member_id')->class('form-label') }}
							{{ html()->select('member_id', ['' => 'Pilih Anggota'] + $members->toArray())
                  ->class('form-control')
                  ->attribute('required', true) }}
						</div>
					</div>
					<div class="card-footer">
						<div class="d-flex justify-content-between">
							<a href="{{ route('book_category.index') }}" class="btn btn-default">Kembali</a>
							{{ html()->button('Simpan')->class('btn btn-primary')->attribute('type', 'submit') }}
						</div>
					</div>
				</div>
			{{ html()->form()->close() }}
		</div>
	</div>
</div>

@endsection
@push('scripts')
<script>
  $('.datepicker').datepicker({
      format: 'yyyy-mm-dd'
  });
</script>
@endpush