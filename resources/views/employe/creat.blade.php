@extends('layouts.section')
@section('employe' , 'active')
@section('container')
    
    
<div class="col-xl-11 m-auto my-5">
	<div class="card card-flush">
		<div class="card-body">
			<div class="d-flex justify-content-between mb-10">
				<div class="card-title m-0">
					<h3 class="fw-bold m-0">Ajouter Employe</h3>
				</div>
				<a href="{{ route('employe_index') }}" class="btn btn-sm btn-primary align-self-center">Liste Employes</a>
			</div>
			<form action="{{ route('employe_store') }}" method="POST">
				@csrf
				<div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
					<div class="col">
						<div class="fv-row mb-7">
							<label class="fs-6 fw-semibold form-label mt-3">
								<span class="required">Nom</span>
							</label>
							<input type="text" class="form-control" name="nom" value="{{ old('nom') }}" maxlength="10" required />
							@error('nom')
								<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
					</div>
					<div class="col">
						<div class="fv-row mb-7">
							<label class="fs-6 fw-semibold form-label mt-3">
								<span class="required">Prenom</span>
							</label>
							<input type="text" class="form-control" name="prenom" value="{{ old('prenom') }}" maxlength="10" required />
							@error('prenom')
								<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
					</div>
				</div>
				<div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
					<div class="col">
						<div class="fv-row mb-7">
							<label class="fs-6 fw-semibold form-label mt-3">
								<span class="required">Lage</span>
							</label>
							<input type="number" class="form-control" name="lage" value="{{ old('lage') }}" maxlength="2" onKeyPress="if(this.value.length==2) return false;" required />
							@error('lage')
								<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
					</div>
					<div class="col">
						<div class="fv-row mb-7">
							<label class="fs-6 fw-semibold form-label mt-3">
								<span class="required">N° CIN</span>
							</label>
							<input type="text" class="form-control" name="n_cin" value="{{ old('n_cin') }}" maxlength="10" required />
							@error('n_cin')
								<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
					</div>
				</div>
				<div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
					<div class="col">
						<div class="fv-row mb-7">
							<label class="fs-6 fw-semibold form-label mt-3">
								<span class="required">Adresse</span>
							</label>
							<input type="text" class="form-control" name="adresse" value="{{ old('adresse') }}" maxlength="50" required />
							@error('adresse')
								<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
					</div>
					<div class="col">
						<div class="fv-row mb-7">
							<label class="fs-6 fw-semibold form-label mt-3">
								<span class="required">Telephone</span>
							</label>
							<input type="tel" class="form-control" name="telephone" value="{{ old('telephone') }}" maxlength="20" required />
							@error('telephone')
								<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
					</div>
				</div>
				<div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
					<div class="col">
						<div class="fv-row mb-7">
							<label class="fs-6 fw-semibold form-label mt-3">
								<span class="required">Sexe</span>
							</label>
							<div class="w-100">
								<select data-control="select2" class="form-select" name="sexe" required >
									<option selected disabled>Select Sexe</option>
                                    <option value="homme" >Homme</option>
                                    <option value="femme" >Femme</option>
								</select>
								@error('sexe')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
						</div>
					</div>
					<div class="col">
						<div class="fv-row mb-7">
							<label class="fs-6 fw-semibold form-label mt-3">
								<span class="required">Emploi</span>
							</label>
							<div class="w-100">
								<select data-control="select2" class="form-select" name="emploi" required >
									<option selected disabled>Select Emploi</option>
                                    <option value="engineering" >Engineering</option>
                                    <option value="human resources" >Human Resources</option>
                                    <option value="finance" >Finance</option>
                                    <option value="marketing" >Marketing</option>
								</select>
								@error('emploi')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
						</div>
					</div>
				</div>
				<div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
					<div class="col">
						<div class="fv-row mb-7">
							<label class="fs-6 fw-semibold form-label mt-3">
								<span class="required">Salaire</span>
							</label>
							<div class="input-group">
                                <input type="number" class="form-control" name="salaire" value="{{ old('salaire') }}" />
                                <span class="input-group-text">
                                    <span class="path2">MAD</span>
                                </span>
                            </div>
							@error('salaire')
								<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
					</div>
					<div class="col">
						<div class="fv-row mb-7">
							<label class="fs-6 fw-semibold form-label mt-3">
								<span class="required">Role</span>
							</label>
							<div class="w-100">
								<select data-control="select2" class="form-select" name="role" required >
									<option selected disabled>Select Role</option>
                                    <option value="admin" >Admin</option>
                                    <option value="employe" >Employe</option>
								</select>
								@error('role')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
						</div>
					</div>
				</div>
				<div class="d-flex justify-content-end">
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