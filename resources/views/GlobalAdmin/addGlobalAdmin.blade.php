<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Admin Global</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow-lg">
                    <div class="card-header text-center bg-primary text-white">
                        <h3>Ajouter un Admin Global</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('globaladmin.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- User selection -->
                            <div class="mb-3">
                                <label for="user_id" class="form-label">Utilisateur</label>
                                <select class="form-select" id="user_id" name="user_id" required>
                                    <option value="">-- Sélectionnez un utilisateur --</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }} {{ $user->prenom }} ({{ $user->email }})</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Image -->
                            <div class="mb-3">
                                <label for="image" class="form-label">Photo</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>

                            <!-- Téléphone -->
                            <div class="mb-3">
                                <label for="telephone" class="form-label">Téléphone</label>
                                <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Entrez le numéro de téléphone">
                            </div>

                            <!-- Adresse -->
                            <div class="mb-3">
                                <label for="adresse" class="form-label">Adresse</label>
                                <textarea class="form-control" id="adresse" name="adresse" rows="2" placeholder="Entrez l'adresse"></textarea>
                            </div>

                            <!-- CIN -->
                            <div class="mb-3">
                                <label for="cin" class="form-label">CIN</label>
                                <input type="text" class="form-control" id="cin" name="cin" placeholder="Entrez le numéro CIN">
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-success">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
