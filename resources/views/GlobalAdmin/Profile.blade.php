@include('GlobalAdmin.headerGA')
<style>
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .profile-img {
        width: 150px;
        height: 150px;
        border: 5px solid #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .info-icon {
        font-size: 1.2rem;
        margin-right: 10px;
        padding: 10px;
        color: #007bff;
    }

    .btn-custom {
        padding: 10px 20px;
        border-radius: 25px;
        font-size: 1rem;
        font-weight: bold;
    }

    .btn-custom-primary {
        background-color: #007bff;
        border-color: #007bff;
        color: white;
    }

    .btn-custom-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
        color: white;
    }

    .btn-custom-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .btn-custom-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
    }
    .position-relative {
    position: relative;
}

.edit-icon {
    position: absolute;
    bottom: 5px;
    right: 5px;
    background: rgba(5, 58, 119, 0.6);
    color: white;
    border-radius: 50%;
    padding: 8px;
    cursor: pointer;
    font-size: 14px;
}

.edit-icon:hover {
    background: rgba(3, 57, 101, 0.8);
}

</style>
<section style="background-color: #eee;" class="mt-5">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <div class="position-relative d-inline-block">
                            <img src="{{ asset('storage/' . $globalAdmins->globalAdmin->image) }}" alt="avatar" class="profile-img rounded-circle">
                            <label for="upload-image" class="edit-icon">
                                <i class="fas fa-camera"></i>
                            </label>
                            <input type="file" id="upload-image" class="d-none">
                        </div>
                        <h5 class="my-3">{{ $globalAdmins->globalAdmin->name }} {{ $globalAdmins->globalAdmin->prenom }}</h5>
                        <p class="mb-4" style="font-size: 16px; font-weight: bold; color: #282827;">
                            M. {{ strtoupper($globalAdmins->globalAdmin->name) }} {{ strtoupper($globalAdmins->globalAdmin->prenom) }}, Directeur général de CFPM
                        </p>
                        <div class="d-flex justify-content-center mb-2">
                            <button type="button" class="btn btn-custom btn-custom-primary" id="modifier">
                                <i class="fas fa-edit"></i> Modifier
                            </button>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body p-4" id="cardInfo">
                        <h2 class="text-muted" style="font-size: 26px">votre informations personnelle</h2>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nom</p>
                            </div>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <p  class="text-dark ml-2" id="email" name="email">{{ $globalAdmins->globalAdmin->name }}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Prénom</p>
                            </div>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <p  class="text-dark ml-2" id="email" name="email">{{ $globalAdmins->globalAdmin->prenom }}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">CIN</p>
                            </div>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                    <p  class="text-dark ml-2" id="email" name="email">{{ $globalAdmins->globalAdmin->cin }}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Adresse</p>
                            </div>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                    <p  class="text-dark ml-2" id="email" name="email">{{ $globalAdmins->globalAdmin->adresse }}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Téléphone</p>
                            </div>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    <p  class="text-dark ml-2" id="email" name="email">{{ $globalAdmins->globalAdmin->telephone }}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <p  class="text-dark ml-2" id="email" name="email">{{ $globalAdmins->email }}</>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card-body p-5 d-none" id="cardEdite">
                        <form action="{{ route('update.globaladmin', $globalAdmins->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Nom</p>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $globalAdmins->globalAdmin->name }}" required>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Prénom</p>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $globalAdmins->globalAdmin->prenom }}" required>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">CIN</p>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        <input type="text" class="form-control" id="cin" name="cin" value="{{ $globalAdmins->globalAdmin->cin }}" required>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Adresse</p>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                        <input type="text" class="form-control" id="adress" name="adress" value="{{ $globalAdmins->globalAdmin->adresse }}" required>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Téléphone</p>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        <input type="number" class="form-control" id="telephone" name="telephone" value="{{ $globalAdmins->globalAdmin->telephone }}" required>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ $globalAdmins->email }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-3">
                                <button type="submit" class="btn btn-success me-2 w-75 m-1"><i class="fas fa-check-circle"></i> Enregistrer</button>
                                <a href="{{ route('profileGA', $globalAdmins->id) }}" class="btn btn-secondary m-1"><i class="fas fa-arrow-left"></i> Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    document.getElementById('modifier').addEventListener('click', function() {
        document.getElementById('cardInfo').classList.add('d-none');
        document.getElementById('cardEdite').classList.remove('d-none');
        document.getElementById('modifier').classList.add('d-none');
    });
</script>
@include('GlobalAdmin.footerGA')
