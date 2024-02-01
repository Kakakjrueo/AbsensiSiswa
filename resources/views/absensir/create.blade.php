<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Tambah Absensi - Aplikasi Absensi Siswa </title>

	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendors/chartjs/Chart.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
	<link rel="shortcut icon" href="{{ asset('assets/images/LogoCN.png') }}" type="image/x-icon">
	@include('include.style')

<body>
	<div id="app">

		@include('include.sidebar')

		<div id="main" class="main d-flex flex-column">

			@include('include.navbar')

			<div class="main-content container-fluid mb-auto">
				<div class="page-title">
					<h3>Absensi Siswa</h3>
				</div>
				<a href="/AbsenKelas" class="btn icon icon-left btn-primary mb-2">Kembali</a>
				<form action="{{ route('absensir.store') }}" method="POST">
					@csrf
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr class="table-dark">
									<th>No</th>
									<th>Siswa</th>>
									<th>Keterangan</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($siswars as $siswar)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $siswar->nama }}</td>
											<td>
										@foreach ($siswar->kelaser()->get() as $namlas)
												<input type="hidden" name="kelaser_id" value="{{ $namlas->id }}">
										@endforeach
										<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

										<input type="hidden" name="siswar_id[]" value="{{ $siswar->id }}">
										<div class="custom-radio-group" role="group"
											aria-label="Vertical radio toggle button group">

											<input class="form-check-input" type="radio"
												name="keterangan[{{ $siswar->id }}]" id="hadir_{{ $siswar->id }}"
												value="hadir">
											<label class="custom-radio" for="hadir_{{ $siswar->id }}">H</label>

											<input class="form-check-input" type="radio"
												name="keterangan[{{ $siswar->id }}]" id="alpa_{{ $siswar->id }}"
												value="alpa">
											<label class="custom-radio" for="alpa_{{ $siswar->id }}">A</label>

											<input type="radio" name="keterangan[{{ $siswar->id }}]"
												id="sakit_{{ $siswar->id }}" value="sakit">
											<label class="custom-radio" for="sakit_{{ $siswar->id }}">S</label>

											<input type="radio" name="keterangan[{{ $siswar->id }}]"
												id="izin_{{ $siswar->id }}" value="izin">
											<label class="custom-radio" for="izin_{{ $siswar->id }}">I</label>
										</div>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="mb-3 row">
						<div class="col-12 d-flex justify-content-end">
							<button type="submit" class="btn btn-primary btn-lg mt-3">Submit</button>
						</div>
					</div>
				</form>
			</div>
			@include('include.footer')
		</div>
	</div>
	@include('include.script')
