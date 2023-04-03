@extends('layouts.section')
@section('presence' , 'active')
@section('container')
<div id="kt_app_content" class="app-content flex-column-fluid my-5">
	<!--begin::Content container-->
	<div id="kt_app_content_container" class="app-container container-xxl">
		<!--begin::Products-->
		<div class="card card-flush">
			<div class="card-body p-8 rounded border border-secondary">
				<div class="d-flex justify-content-between mb-10">
					<div class="card-title m-0">
						<h3 class="fw-bold m-0">Liste Presences</h3>
					</div>
					<a href="{{ route('presence_create') }}" class="btn btn-sm btn-primary align-self-center">Ajouter Presence</a>
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
								<th class="min-w-60px">Statut</th>
								<th class="min-w-60px">Date Presence</th>
								<th class="min-w-60px">Actions</th>
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
										@if ( $presence->statut == 'absent')
											<span class="badge badge-danger">{{ $presence->statut }}</span>
										@else
											<span class="badge badge-success">{{ $presence->statut }}</span>
										@endif
									</td>
									<td>
										<span class="text-gray-800 fs-5 fw-bold">{{ $presence->created_at->toDateString() }}</span>
									</td>
									<td>
										<a href="{{ route('presence_edit', $presence->id) }}" class="btn btn-sm btn-light btn-active-light-primary">Edit</a>
									</td>
									<!--end::Action=-->
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