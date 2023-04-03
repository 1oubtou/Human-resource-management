@extends('layouts.section')
@section('presence' , 'active')
@section('container')
  
<div class="col-xl-11 m-auto my-5">
	<div class="card card-flush">
		<div class="card-body">
			<div class="d-flex justify-content-between mb-10">
				<div class="card-title m-0">
					<h3 class="fw-bold m-0">Modifier Presence</h3>
				</div>
			</div>
			<form action="{{ route('presence_update', $presence_edit->id) }}" method="POST">
				@csrf
				<div class="row row-cols-1 row-cols-sm-2 rol-cols-md-2 row-cols-lg-2">
					<div class="col">
						<div class="fv-row mb-7">
							<label class="fs-6 fw-semibold form-label mt-3">
								<span class="required">Nom Complet</span>
							</label>
							<div class="w-100">
								<select data-control="select2" class="form-select" name="employee_id" required >
									@foreach ($employes as $em )
                                    	<option @if ( $em->id == $presence_edit->employee_id )
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
								<span class="required">Statut</span>
							</label>
							<div class="w-100">
								<select data-control="select2" class="form-select" name="statut" required >
									<option @if ($presence_edit->statut == 'absent') selected @endif value="absent">absent</option>
									<option @if ($presence_edit->statut == 'present') selected @endif value="present">present</option>
								</select>
								@error('statut')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
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