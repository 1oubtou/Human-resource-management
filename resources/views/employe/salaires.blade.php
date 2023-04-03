@extends('layouts.section')
@section('salaires' , 'active')
@section('container')
<div id="kt_app_content" class="app-content flex-column-fluid my-5">
	<!--begin::Content container-->
	<div id="kt_app_content_container" class="app-container container-xxl">
		<!--begin::Products-->
		<div class="card card-flush">
			<div class="card-body p-8 rounded border border-secondary">
				<div class="d-flex justify-content-between mb-10">
					<div class="card-title m-0">
						<h3 class="fw-bold m-0">Liste Salaires</h3>
					</div>
				</div>
				@if ($employes_salaires->isEmpty())
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
								<th class="min-w-60px">Salaire Mensuel</th>
								<th class="min-w-60px">Salaire Annuel</th>
								<th class="min-w-60px">Actions</th>
							</tr>
							<!--end::Table row-->
						</thead>
						<!--end::Table head-->
						<!--begin::Table body-->
						<tbody class="fw-semibold text-gray-600 text-center">
							@foreach ( $employes_salaires as $key => $employe )
								<tr>
									<td>
										<a href="#" class="text-gray-800 text-hover-primary fw-bold">{{ ++$key }}</a>
									</td>
									<td>
										<a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">{{ $employe->nom }}</a>
									</td>
									<td>
										<span>{{ $employe->prenom }}</span>
									</td>
									<td>
										<span class="fw-bold">{{ $employe->salaire }} MAD</span>
									</td>
									<td>
										<span class="fw-bold">{{ $employe->salaire*12 }} MAD</span>
									</td>
									<td>
										<a href="{{ route('employe_edit', $employe->id) }}" class="btn btn-sm btn-light btn-active-light-primary" >Edit</a>
									</td>
									<!--end::Action=-->
								</tr>
							@endforeach
						</tbody>
						<!--end::Table body-->
					</table>
					<div class="d-flex justify-content-center">
						{!! $employes_salaires->links('pagination::bootstrap-4') !!}
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