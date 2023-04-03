@extends('layouts.section')
@section('conge' , 'active')
@section('container')
<div id="kt_app_content" class="app-content flex-column-fluid my-5">
	<!--begin::Content container-->
	<div id="kt_app_content_container" class="app-container container-xxl">
		<!--begin::Products-->
		<div class="card card-flush">
			<div class="card-body p-8 rounded border border-secondary">
				<div class="d-flex justify-content-between mb-10">
					<div class="card-title m-0">
						<h3 class="fw-bold m-0">Liste Conges</h3>
					</div>
					<a href="{{ route('conge_create') }}" class="btn btn-sm btn-primary align-self-center">Ajouter Conge</a>
				</div>
				@if ($conge_index->isEmpty())
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
								<th class="min-w-60px">Le Genre de Conge</th>
								<th class="min-w-60px">Date de Debut</th>
								<th class="min-w-60px">date de Fin</th>
								<th class="min-w-60px">Nombre Jours</th>
								<th class="min-w-60px">Actions</th>
							</tr>
							<!--end::Table row-->
						</thead>
						<!--end::Table head-->
						<!--begin::Table body-->
						<tbody class="fw-semibold text-gray-600 text-center">
							@foreach ( $conge_index as $key => $conge )
								<tr>
									<td>
										<span class="text-gray-800 fs-5 fw-bold">{{ ++$key }}</span>
									</td>
									<td>
										<span class="text-gray-800 fs-5 fw-bold">{{ $conge->employe->nom }}</span>
									</td>
									<td>
										<span class="text-gray-800 fs-5 fw-bold">{{ $conge->employe->prenom }}</span>
									</td>
									<td>
										<span class="text-gray-800 fs-5 fw-bold">{{ $conge->type }}</span>
									</td>
									<td>
										<span class="text-gray-800 fs-5 fw-bold">{{ $conge->date_debut }}</span>
									</td>
									<td>
										<span class="text-gray-800 fs-5 fw-bold">{{ $conge->date_fin }}</span>
									</td>
									<td>
										{{--------   $conge->date_fin   négatif   $conge->date_debut   ---------}}
										<span class="text-gray-800 fs-5 fw-bold">{{ Carbon\Carbon::parse($conge->date_fin)->diffInDays(Carbon\Carbon::parse($conge->date_debut))  }} Jours</span>
									</td>
									<td>
										<a href="{{ route('conge_edit', $conge->id) }}" class="btn btn-sm btn-light btn-active-light-primary" >Edit</a>
									</td>
									<!--end::Action=-->
								</tr>
							@endforeach
						</tbody>
						<!--end::Table body-->
					</table>
					<div class="d-flex justify-content-center">
						{!! $conge_index->links('pagination::bootstrap-4') !!}
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

@section('js')
<script>
    $(document).ready(function(){
        $('.preconfirmed').click(function(e){
            e.preventDefault();
            Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#ff4d4d',
				confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
					Swal.fire(
						'Deleted!',
						'Your file has been deleted.',
						'success'
					)
                    window.location.href = $(this).attr('href');
                }
            })
        })
    });
</script>
@endsection