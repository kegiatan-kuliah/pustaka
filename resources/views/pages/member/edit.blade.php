@extends('layouts.master')
@section('content')
<div class="page-header">
	<div class="container-xl">
		<div class="row g-2 align-items-center">
			<div class="col">
				<h2 class="page-title">Sunting Anggota</h2>
			</div>
		</div>
	</div>
</div>

<div class="page-body">
	<div class="container-xl">
		<div class="row row-cards">
			{{ html()->form('PUT', route('member.update'))->open() }}
        {{ html()->hidden('id', $data->id) }}
				<div class="card">
					<div class="card-body">
						<div class="mb-3">
							{{ html()->label('Name Anggota', 'name')->class('form-label') }}
							{{ html()->input('text', 'name', $data->name)
								->class('form-control')->attribute('required', true)
								->attribute('placeholder', 'Isikan nama anggota') }}
						</div>
            <div class="mb-3">
							{{ html()->label('Email Anggota', 'email')->class('form-label') }}
							{{ html()->input('email', 'email', $data->user->email)
								->class('form-control')->attribute('required', true)
								->attribute('placeholder', 'Isikan email anggota') }}
						</div>
            <div class="mb-3">
							{{ html()->label('NISN', 'identity_no')->class('form-label') }}
							{{ html()->input('text', 'identity_no', $data->identity_no)
								->class('form-control')->attribute('required', true)
								->attribute('placeholder', 'Isikan nisn') }}
						</div>
            <div class="mb-3">
							{{ html()->label('Jenis Kelamin Anggota', 'gender')->class('form-label') }}
							{{ html()->select('gender', ['' => 'Pilih Jenis Kelamin', 'L' => 'Laki Laki', 'P' => 'Perempuan'], $data->gender)
                  ->class('form-control')
                  ->attribute('required', true) }}
						</div>
						<div class="mb-3">
							{{ html()->label('Kelas', 'room_id')->class('form-label') }}
							{{ html()->select('room_id', ['' => 'Pilih Kelas'] + $rooms->toArray(), $data->room_id)
                  ->class('form-control')
                  ->attribute('required', true) }}
						</div>
					</div>
					<div class="card-footer">
						<div class="d-flex justify-content-between">
							<a href="{{ route('user.index') }}" class="btn btn-default">Kembali</a>
							{{ html()->button('Simpan')->class('btn btn-primary')->attribute('type', 'submit') }}
						</div>
					</div>
				</div>
			{{ html()->form()->close() }}
		</div>
	</div>
</div>

@endsection