@extends('layouts.master')
@section('content')
<div class="page-header">
	<div class="container-xl">
		<div class="row g-2 align-items-center">
			<div class="col">
				<h2 class="page-title">Sunting Buku</h2>
			</div>
		</div>
	</div>
</div>

<div class="page-body">
	<div class="container-xl">
		<div class="row row-cards">
			{{ html()->form('POST', route('book.update'))->attribute('enctype', 'multipart/form-data')->open() }}
        {{ html()->hidden('id', $data->id) }}
				<div class="card">
					<div class="card-body">
						<div class="mb-3">
							{{ html()->label('Judul Buku', 'title')->class('form-label') }}
							{{ html()->input('text', 'title', $data->title)
								->class('form-control')->attribute('required', true)
								->attribute('placeholder', 'Isikan judul buku') }}
						</div>
            <div class="mb-3">
							{{ html()->label('Kondisi Buku', 'condition')->class('form-label') }}
							{{ html()->input('text', 'condition', $data->condition)
								->class('form-control')->attribute('required', true)
								->attribute('placeholder', 'Isikan kondisi buku') }}
						</div>
            <div class="mb-3">
							{{ html()->label('Jumlah Buku', 'quantity')->class('form-label') }}
							{{ html()->input('number', 'quantity', $data->quantity)
								->class('form-control')->attribute('required', true)
								->attribute('placeholder', 'Isikan jumlah buku')
                ->attribute('min', 1) }}
						</div>
            <div class="mb-3">
							{{ html()->label('Harga Buku', 'price')->class('form-label') }}
							{{ html()->input('number', 'price', $data->price)
								->class('form-control')->attribute('required', true)
								->attribute('placeholder', 'Isikan harga buku')
                ->attribute('min', 1) }}
						</div>
            <div class="mb-3">
							{{ html()->label('Jumlah Halaman Buku', 'total_pages')->class('form-label') }}
							{{ html()->input('number', 'total_pages', $data->total_pages)
								->class('form-control')->attribute('required', true)
								->attribute('placeholder', 'Isikan jumlah halaman buku')
                ->attribute('min', 1) }}
						</div>
            <div class="mb-3">
							{{ html()->label('Sinopsis Buku', 'synopsis')->class('form-label') }}
							{{ html()->input('textarea', 'synopsis', $data->synopsis)
								->class('form-control')->attribute('required', true)
								->attribute('placeholder', 'Isikan sinopsis buku') }}
						</div>
            <div class="mb-3">
							{{ html()->label('Cover Buku', 'cover')->class('form-label') }}
							{{ html()->file('cover')
								->class('form-control')->attribute('required', true) }}
						</div>
            <div class="mb-3">
							{{ html()->label('Kategori Buku', 'book_category_id')->class('form-label') }}
							{{ html()->select('book_category_id', ['' => 'Pilih Kategori Buku'] + $categories->toArray(), $data->book_category_id)
                  ->class('form-control')
                  ->attribute('required', true) }}
						</div>
            <div class="mb-3">
							{{ html()->label('Pengarang Buku', 'author_id')->class('form-label') }}
							{{ html()->select('author_id', ['' => 'Pilih Pengarang Buku'] +  $authors->toArray(), $data->author_id)
                  ->class('form-control')
                  ->attribute('required', true) }}
						</div>
            <div class="mb-3">
							{{ html()->label('Penerbit Buku', 'publisher_id')->class('form-label') }}
							{{ html()->select('publisher_id', ['' => 'Pilih Penerbit Buku'] + $publishers->toArray(), $data->publisher_id)
                  ->class('form-control')
                  ->attribute('required', true) }}
						</div>
            <div class="mb-3">
							{{ html()->label('Lokasi Buku', 'location_id')->class('form-label') }}
							{{ html()->select('book_location_id', ['' => 'Pilih Lokasi Buku'] + $locations->toArray(), $data->book_location_id)
                  ->class('form-control')
                  ->attribute('required', true) }}
						</div>
					</div>
					<div class="card-footer">
						<div class="d-flex justify-content-between">
							<a href="{{ route('publisher.index') }}" class="btn btn-default">Kembali</a>
							{{ html()->button('Simpan')->class('btn btn-primary')->attribute('type', 'submit') }}
						</div>
					</div>
				</div>
			{{ html()->form()->close() }}
		</div>
	</div>
</div>

@endsection