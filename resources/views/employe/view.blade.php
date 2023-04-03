@extends('layouts.section')
@section('employe' , 'active')
@section('container')
<div class="col-xl-11 m-auto my-5">
	<div class="card">
		<div class="card-header">
			<div class="card-title m-0">
				<h3 class="fw-bold m-0">Employe Details</h3>
			</div>
			<div class="align-self-center">
				<a href="{{ route('employe_index') }}" class="btn btn-sm btn-primary mx-2">Liste Employes</a>
				<a href="{{ route('employe_edit', $employe_show->id) }}" class="btn btn-sm btn-primary">Modifier Employe</a>
			</div>
		</div>
		<div class="card-body p-9">
			<div class="row mb-7">
				<label class="col-lg-4 fw-semibold text-muted">Nom</label>
				<div class="col-lg-8">
					<span class="fw-bold fs-6 text-gray-800">{{ $employe_show->nom }}</span>
				</div>
			</div>
			<div class="row mb-7">
				<label class="col-lg-4 fw-semibold text-muted">Prenom</label>
				<div class="col-lg-8 fv-row">
					<span class="fw-semibold text-gray-800 fs-6">{{ $employe_show->prenom }}</span>
				</div>
			</div>
			<div class="row mb-7">
				<label class="col-lg-4 fw-semibold text-muted">Lage </label>
				<div class="col-lg-8 d-flex align-items-center">
					<span class="fw-bold fs-6 text-gray-800 me-2">{{ $employe_show->lage }}</span>
				</div>
			</div>
			<div class="row mb-7">
				<label class="col-lg-4 fw-semibold text-muted">N° CIN</label>
				<div class="col-lg-8">
					<a href="#" class="fw-semibold fs-6 text-gray-800 text-hover-primary">{{ $employe_show->n_cin }}</a>
				</div>
			</div>
			<div class="row mb-7">
				<label class="col-lg-4 fw-semibold text-muted">Sexe</label>
				<div class="col-lg-8">
					<span class="fw-bold fs-6 text-gray-800">{{ $employe_show->sexe }}</span>
				</div>
			</div>
			<div class="row mb-7">
				<label class="col-lg-4 fw-semibold text-muted">Adresse </label>
				<div class="col-lg-8">
					<span class="fw-bold fs-6 text-gray-800">{{ $employe_show->adresse }}</span>
				</div>
			</div>
			<div class="row mb-7">
				<label class="col-lg-4 fw-semibold text-muted">Telephone</label>
				<div class="col-lg-8">
					<span class="fw-bold fs-6 text-gray-800">{{ $employe_show->telephone }}</span>
				</div>
			</div>
			<div class="row mb-7">
				<label class="col-lg-4 fw-semibold text-muted">Emploi</label>
				<div class="col-lg-8">
					<span class="fw-bold fs-6 text-gray-800">{{ $employe_show->emploi }}</span>
				</div>
			</div>
			<div class="row mb-7">
				<label class="col-lg-4 fw-semibold text-muted">Salaire</label>
				<div class="col-lg-8">
					<span class="fw-bold fs-6 text-gray-800">{{ $employe_show->salaire }} MAD</span>
				</div>
			</div>
			<div class="row mb-7">
				<label class="col-lg-4 fw-semibold text-muted">Role</label>
				<div class="col-lg-8">
					<span class="fw-bold fs-6 text-gray-800">{{ $employe_show->role }}</span>
				</div>
			</div>
			<div class="row mb-7">
				<label class="col-lg-4 fw-semibold text-muted">Date Create</label>
				<div class="col-lg-8">
					<span class="fw-semibold fs-6 text-gray-800">{{ $employe_show->created_at->toDateString() }}</span>
				</div>
			</div>
			<div class="row">
				<label class="col-lg-4 fw-semibold text-muted">Date Update</label>
				<div class="col-lg-8">
					<span class="fw-semibold fs-6 text-gray-800">{{ $employe_show->updated_at == $employe_show->created_at ? "No Updated" : $employe_show->updated_at->toDateString() }}</span>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection