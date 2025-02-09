@extends('layouts.master')
@section('content')
<div class="page-header">
	<div class="container-xl">
		<div class="row g-2 align-items-center">
			<div class="col">
				<h2 class="page-title">Sunting Penerbit</h2>
			</div>
		</div>
	</div>
</div>

<div class="page-body">
	<div class="container-xl">
		<div class="row row-cards">
			{{ html()->form('PUT', route('publisher.update'))->open() }}
        {{ html()->hidden('id', $data->id) }}
				<div class="card">
					<div class="card-body">
						<div class="mb-3">
							{{ html()->label('Name Penerbit', 'name')->class('form-label') }}
							{{ html()->input('text', 'name', $data->name)
								->class('form-control')->attribute('required', true)
								->attribute('placeholder', 'Isikan nama penerbit') }}
						</div>
            <div class="mb-3">
							{{ html()->label('Alamat Penerbit', 'name')->class('form-label') }}
							{{ html()->input('textarea', 'address', $data->address)
								->class('form-control')->attribute('required', true)
								->attribute('placeholder', 'Isikan alamat penerbit') }}
						</div>
					</div>
					<div class="card-footer">
						<div class="d-flex justify-content-between">
							<a href="{{ route('author.index') }}" class="btn btn-default">Kembali</a>
							{{ html()->button('Simpan')->class('btn btn-primary')->attribute('type', 'submit') }}
						</div>
					</div>
				</div>
			{{ html()->form()->close() }}
		</div>
	</div>
</div>

@endsection