@include('GlobalAdmin.headerGA')
<div class="container mt-5">
    <style>
        .card {
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card-header {
    font-size: 1.25rem;
    font-weight: bold;
    text-align: center;
}

.form-label {
    font-weight: 600;
}

.form-select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
    font-size: 16px;
    transition: border-color 0.3s ease-in-out;
}

.form-select:focus {
    border-color: #007bff;
    outline: none;
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    border-radius: 8px;
    padding: 0.5rem 1.5rem;
    transition: background-color 0.3s, box-shadow 0.3s;
}

.btn-primary:hover {
    background-color: #0056b3;
    box-shadow: 0 4px 8px rgba(0, 123, 255, 0.2);
}

.invalid-feedback {
    font-size: 0.875rem;
    color: #dc3545;
}
    </style>
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
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h4>Ajouter un Administrateur Global</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('globalAdmins.updateUserToAdmin') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- CIN -->
                        <div class="mb-3">
                            <label for="cin" class="form-label">CIN</label>
                            <input type="text" name="cin" id="cin" class="form-control" placeholder="Carte d'Identité Nationale">
                        </div>
                        <div class="mb-3">
                            <label for="cin" class="form-label">Email</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="enter email de l'utilisateur">
                        </div>

                        <!-- Rôle -->
                        <div class="mb-3">
                            <label for="role" class="form-label">Etablissement :</label>
                            <select class="form-select" name="etablissement" id="Etablissement">
                                <option selected disabled>Veuillez sélectionner un Etablissement</option>
                                @foreach ($Etablissements as $etablissement)
                                <option value="{{$etablissement->id}}">{{$etablissement->nom}} , {{$etablissement->adresse}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Rôle</label>
                            <select class="form-select" name="role" id="role">
                                <option selected disabled>Veuillez sélectionner un rôle</option>
                                <option value="superAdmin">Super Admin</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@include('GlobalAdmin.footerGA')
