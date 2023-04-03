@extends('layouts.section')
@section('conge' , 'active')
@section('container')
  
<div class="col-xl-11 m-auto my-5">
	<div class="card card-flush">
		<div class="card-body">
			<div class="d-flex justify-content-between mb-10">
				<div class="card-title m-0">
					<h3 class="fw-bold m-0">Modifier Conge</h3>
				</div>
				<a href="{{ route('conge_index') }}" class="btn btn-sm btn-primary align-self-center">Liste Conges</a>
			</div>
			<form action="{{ route('conge_update', $conge_edit->id) }}" method="POST">
				@csrf
				<div class="row row-cols-1 row-cols-sm-2 rol-cols-md-2 row-cols-lg-2">
					<div class="col">
						<div class="fv-row mb-7">
							<label class="fs-6 fw-semibold form-label mt-3">
								<span class="required">Nom Complet</span>
							</label>
							<div class="w-100">
								<select data-control="select2" class="form-select" name="employee_id" required >
									<option selected disabled>Select le nom complet</option>
									@foreach ( $employes as $em )
                                    	<option @if ( $em->id == $conge_edit->employee_id )
											selected
										@endif value="{{ $em->id }}" >{{ $em->nom }} {{ $em->prenom }}</option>
									@endforeach
								</select>
								@error('employee_id')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
						</div>
					</div>
					<div class="col">
						<div class="fv-row mb-7">
							<label class="fs-6 fw-semibold form-label mt-3">
								<span class="required">Le Genre de Conge</span>
							</label>
							<input type="text" class="form-control" name="type" value="{{ $conge_edit->type }}" required  />
							@error('type')
								<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
					</div>
				</div>
				<div class="row row-cols-1 row-cols-sm-2 rol-cols-md-2 row-cols-lg-2">
					<div class="col">
						<div class="fv-row mb-7">
							<label class="fs-6 fw-semibold form-label mt-3">
								<span class="required">Date de Debut</span>
							</label>
							<input type="date" class="form-control date" name="date_debut" value="{{ $conge_edit->date_debut }}" required  />
							@error('date_debut')
								<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
					</div>
					<div class="col">
						<div class="fv-row mb-7">
							<label class="fs-6 fw-semibold form-label mt-3">
								<span class="required">Date de Fin</span>
							</label>
							<input type="date" class="form-control date" name="date_fin" value="{{ $conge_edit->date_fin }}" maxlength="10" required  />
							@error('date_fin')
								<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
					</div>
				</div>
				<div class="d-flex justify-content-end w-lg-100">
					<button type="reset" class="btn border border-secondary mx-5" >Annuler</button>
					<button type="submit" data-kt-contacts-type="submit" class="btn btn-primary">
						<span class="indicator-label">Save</span>
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
@section('js')
	<script>
		$(".date").flatpickr({minDate: "today"});
	</script>
@endsection