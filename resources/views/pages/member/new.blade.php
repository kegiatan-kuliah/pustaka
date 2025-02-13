@extends('layouts.master')
@section('content')
<div class="page-header">
	<div class="container-xl">
		<div class="row g-2 align-items-center">
			<div class="col">
				<h2 class="page-title">Tambah Anggota</h2>
			</div>
		</div>
	</div>
</div>

<div class="page-body">
	<div class="container-xl">
		<div class="row row-cards">
			{{ html()->form('POST', route('member.store'))->attribute('enctype', 'multipart/form-data')->open() }}
				<div class="card">
					<div class="card-body">
						<div class="mb-3">
							{{ html()->label('Name Anggota', 'name')->class('form-label') }}
							{{ html()->input('text', 'name')
								->class('form-control')->attribute('required', true)
								->attribute('placeholder', 'Isikan nama anggota') }}
						</div>
            <div class="mb-3">
							{{ html()->label('Email Anggota', 'email')->class('form-label') }}
							{{ html()->input('email', 'email')
								->class('form-control')->attribute('required', true)
								->attribute('placeholder', 'Isikan email anggota') }}
						</div>
            <div class="mb-3">
							{{ html()->label('NISN', 'identity_no')->class('form-label') }}
							{{ html()->input('text', 'identity_no')
								->class('form-control')->attribute('required', true)
								->attribute('placeholder', 'Isikan nisn') }}
						</div>
						<div class="mb-3">
							{{ html()->label('Foto', 'photo')->class('form-label') }}
							{{ html()->file('photo')
								->class('form-control')->attribute('required', true) }}
						</div>
            <div class="mb-3">
							{{ html()->label('Jenis Kelamin Anggota', 'gender')->class('form-label') }}
							{{ html()->select('gender', ['' => 'Pilih Jenis Kelamin', 'L' => 'Laki Laki', 'P' => 'Perempuan'])
                  ->class('form-control')
                  ->attribute('required', true) }}
						</div>
						<div class="mb-3">
							{{ html()->label('Kelas', 'room_id')->class('form-label') }}
							{{ html()->select('room_id', ['' => 'Pilih Kelas'] + $rooms->toArray())
                  ->class('form-control')
                  ->attribute('required', true) }}
						</div>
					</div>
					<div class="card-footer">
						<div class="d-flex justify-content-between">
							<a href="{{ route('member.index') }}" class="btn btn-default">Kembali</a>
							{{ html()->button('Simpan')->class('btn btn-primary')->attribute('type', 'submit') }}
						</div>
					</div>
				</div>
			{{ html()->form()->close() }}
		</div>
	</div>
</div>

@endsection