@include('GlobalAdmin.headerGA')
<style>
    .card-body label {
    text-align: right !important;
}
</style>
<div class="container mt-5">

    @if (session('success'))
    <div class="container-fluide text-center mt-5">
        <div
            class="alert alert-primary"
            role="alert"
        >
            <strong>{{ session('success') }}</strong>
        </div>
    </div>
    @endif
    @if (session('error'))
    <div class="container-fluide text-center">
        <div
            class="alert alert-danger"
            role="alert"
        >
            <strong>{{ session('error') }}</strong>
        </div>
    </div>
    @endif
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-dark text-white text-center py-3">
                    <h4 class="mb-0">Ajouter un Administrateur Global</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('globalAdmins.updateUserToAdmin') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="cin" class="form-label fw-bold">Nom</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" name="name" id="name" class="form-control" placeholder="entrer Votre name" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="cin" class="form-label fw-bold">Prenom</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" name="prenom" id="prenom" class="form-control" placeholder="Entrer votre prenom" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="cin" class="form-label fw-bold">CIN</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                <input type="text" name="cin" id="cin" class="form-control" placeholder="Carte d'Identité Nationale" required>
                            </div>
                        </div>


                        <hr>
                        <div class="mb-4">
                            <label for="email" class="form-label fw-bold">Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Entrer l'email de l'utilisateur" required>
                            </div>
                        </div>
                        <hr>

                        <!-- Établissement -->
                        <div class="mb-4">
                            <label for="etablissement" class="form-label fw-bold">Établissement</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-school"></i></span>
                                <select class="form-select" name="etablissement" id="etablissement" required>
                                    <option selected disabled>Veuillez sélectionner un Établissement</option>
                                    @foreach ($Etablissements as $etablissement)
                                        <option value="{{$etablissement->id}}">{{$etablissement->nom}} , {{$etablissement->adresse}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr>

                        <!-- Rôle -->
                        <div class="mb-4">
                            <label for="role" class="form-label fw-bold">Rôle</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user-shield"></i></span>
                                <select class="form-select" name="role" id="role" required>
                                    <option selected disabled>Veuillez sélectionner un rôle</option>
                                    <option value="superAdmin">Super Admin</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>
                        <hr>

                        <!-- Boutons -->
                        <div class="d-flex justify-content-end mt-5">
                            <button type="submit" class="btn btn-primary fw-bold me-2 shadow-sm w-100">
                                <i class="fas fa-plus-circle"></i> Ajouter
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>



@include('GlobalAdmin.footerGA')
