@extends('layouts.master')
@section('content')
<div class="page-header">
	<div class="container-xl">
		<div class="row g-2 align-items-center">
			<div class="col">
				<h2 class="page-title">Tambah Lokasi Buku</h2>
			</div>
		</div>
	</div>
</div>

<div class="page-body">
	<div class="container-xl">
		<div class="row row-cards">
			{{ html()->form('POST', route('book_location.store'))->open() }}
				<div class="card">
					<div class="card-body">
            <div class="mb-3">
							{{ html()->label('Kode Lokasi Buku', 'code')->class('form-label') }}
							{{ html()->input('text', 'code')
								->class('form-control')->attribute('required', true)
								->attribute('placeholder', 'Isikan kode lokasi buku') }}
						</div>
						<div class="mb-3">
							{{ html()->label('Nama Lokasi Buku', 'name')->class('form-label') }}
							{{ html()->input('text', 'name')
								->class('form-control')->attribute('required', true)
								->attribute('placeholder', 'Isikan nama lokasi buku') }}
						</div>
					</div>
					<div class="card-footer">
						<div class="d-flex justify-content-between">
							<a href="{{ route('book_location.index') }}" class="btn btn-default">Kembali</a>
							{{ html()->button('Simpan')->class('btn btn-primary')->attribute('type', 'submit') }}
						</div>
					</div>
				</div>
			{{ html()->form()->close() }}
		</div>
	</div>
</div>

@endsection