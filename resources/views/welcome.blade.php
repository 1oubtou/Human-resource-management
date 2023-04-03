@extends('layouts.section')
@section('dashboard' , 'active')
@section('container')
{{-- total --}}
<div id="kt_app_content_container" class="app-container container-fluid mt-5">
	<div class="row g-5">
		<div class="col-xxl-3">
			<div class="card card-flush h-xl-100">
				<div class="card-header">
					<h3 class="card-title align-items-start flex-column">
						<span class="card-label fw-bold text-dark">Total Employes</span>
					</h3>
				</div>
				<div class="card-body pt-0 m-auto">
					<h1>{{ $employes }}</h1>
				</div>
			</div>
		</div>
		<div class="col-xxl-3">
			<div class="card card-flush h-xl-100">
				<div class="card-header">
					<h3 class="card-title align-items-start flex-column">
						<span class="card-label fw-bold text-dark">Total Absents D'aujourd</span>
					</h3>
				</div>
				<div class="card-body pt-0 m-auto">
					<h1>{{ $presence }}</h1>
				</div>
			</div>
		</div>
		<div class="col-xxl-3">
			<div class="card card-flush h-xl-100">
				<div class="card-header">
					<h3 class="card-title align-items-start flex-column">
						<span class="card-label fw-bold text-dark">Total Salaires</span>
					</h3>
				</div>
				<div class="card-body pt-0 m-auto">
					<h1>{{ $salaires }} MAD</h1>
				</div>
			</div>
		</div>
		<div class="col-xxl-3">
			<div class="card card-flush h-xl-100">
				<div class="card-header">
					<h3 class="card-title align-items-start flex-column">
						<span class="card-label fw-bold text-dark">aujour de Conge</span>
					</h3>
				</div>
				<div class="card-body pt-0 m-auto">
					<h1>{{ $conges }}</h1>
				</div>
			</div>
		</div>
	</div>
</div>
{{-- and: total --}}

<div id="kt_app_content" class="app-content flex-column-fluid my-5">
	<!--begin::Content container-->
	<div id="kt_app_content_container" class="app-container container-xxl">
		<!--begin::Products-->
		<div class="card card-flush">
			<div class="card-body p-8 rounded border border-secondary">
				<div class="d-flex justify-content-between mb-10">
					<div class="card-title m-0">
						<h3 class="fw-bold m-0">La liste des absences du jour</h3>
					</div>
				</div>
				@if ($presences->isEmpty())
					<h3 class="text-center text-danger">Desole aucune donnee a afficher.</h3>
				@else
					<table class="table table-row-dashed">
						<!--begin::Table head-->
						<thead>
							<!--begin::Table row-->
							<tr class="text-center text-gray-400 fw-bold">
								<th class="min-w-40px">#</th>
								<th class="min-w-60px">Nom</th>
								<th class="min-w-60px">Prenom</th>
								<th class="min-w-60px">Emploi</th>
								<th class="min-w-60px">Role</th>
							</tr>
							<!--end::Table row-->
						</thead>
						<!--end::Table head-->
						<!--begin::Table body-->
						<tbody class="fw-semibold text-gray-600 text-center">
							@foreach ( $presences as $key => $presence )
								<tr>
									<td>
										<span class="text-gray-800 fs-5 fw-bold">{{ ++$key }}</span>
									</td>
									<td>
										<span class="text-gray-800 fs-5 fw-bold">{{ $presence->employe->nom }}</span>
									</td>
									<td>
										<span class="text-gray-800 fs-5 fw-bold">{{ $presence->employe->prenom }}</span>
									</td>
									<td>
										<span class="text-gray-800 fs-5 fw-bold">{{ $presence->employe->emploi }}</span>
									</td>
									<td>
										@if ($presence->employe->role == 'admin') <span class="badge badge-success">{{ $presence->employe->role }}</span> @else
											<span class="badge badge-primary">{{ $presence->employe->role }}</span>
										@endif
									</td>
								</tr>
							@endforeach
						</tbody>
						<!--end::Table body-->
					</table>
					<div class="d-flex justify-content-center">
						{!! $presences->links('pagination::bootstrap-4') !!}
					</div>
				@endif
				<!--end::Table-->
			</div>
		</div>
		<!--end::Products-->
	</div>
	<!--end::Content container-->
</div>
@endsection