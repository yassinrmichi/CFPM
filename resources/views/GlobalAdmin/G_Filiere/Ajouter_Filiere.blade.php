@include('GlobalAdmin/headerGA')
<style>
    .tab-content { display: none; }
    .active-tab { display: block; }

    #tabs {
        margin-top: -15px;
        display: flex;
        justify-content: space-evenly;
    }
    #tabs li {
        width: 30%;
        height: 100%;
        border: solid 1px rgb(213, 218, 222);
        border-radius: 40px;
    }
</style>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-dark text-white text-center">
                <h3>Gestion des Filières</h3>
            </div>
            <div class="card-body">
                <!-- Tabs -->
                <ul class="nav nav-tabs mb-4 bg-dark text-light p-3" id="tabs">
                    <li class="nav-item">
                        <a class="nav-link active h1" href="#" href="{{route('Filiere.create')}}"">
                            <i class="fas fa-plus"></i> Ajouter
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link h1" href="{{route('Filiere.gestion')}}" >
                            <i class="fas fa-building"></i> Gérer
                        </a>
                    </li>
                </ul>
                <div id="ajouter" class="mt-4">
                    <h2>Ajouter une Filière</h2>

                    @if(session()->has('success'))
                        <div class="alert alert-primary" role="alert">
                            <strong>{{ session('success') }}</strong>
                        </div>
                    @endif

                    @if(session()->has('error'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ session('error') }}</strong>
                        </div>
                    @endif

                    <form action="{{route('Filiere.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Nom Filière -->
                        <div class="row mt-3">
                            <div class="col-sm-3">
                                <p class="mb-0 text-dark">Nom de la Filière</p>
                            </div>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-book"></i></span>
                                    <input type="text" class="form-control" id="nom" name="nom" required>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <!-- Durée de la formation -->
                        <div class="row mt-3">
                            <div class="col-sm-3">
                                <p class="mb-0 text-dark">Durée de la Formation (en mois)</p>
                            </div>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                    <input type="number" class="form-control" name="duree" min="1" max="36" required>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <!-- Description -->
                        <div class="row mt-3">
                            <div class="col-sm-3">
                                <p class="mb-0 text-dark">Description</p>
                            </div>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                    <textarea class="form-control" name="description" rows="3" placeholder="Entrez une description..."></textarea>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <!-- Niveau Scolaire -->
                        <div class="row mt-3">
                            <div class="col-sm-3">
                                <p class="mb-0 text-dark">Niveau Scolaire</p>
                            </div>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                                    <select class="form-control" name="niveau_scolaire" required>
                                        <option value="">Sélectionner un niveau</option>
                                        <option value="TS">Baccalauréat (TS)</option>
                                        <option value="T">Technicien (T)</option>
                                        <option value="Q">Qualification (Q)</option>
                                        <option value="S">Spécialisation (S)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-3">
                            <div class="col-sm-3">
                                <p class="mb-0 text-dark">Logo de la Filière</p>
                            </div>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-images"></i></span>
                                    <input type="file" class="form-control" name="Logo" accept="image/*" >
                                </div>
                            </div>
                        </div>
                        <hr>



                        <!-- Bouton Ajouter -->
                        <button type="submit" class="btn btn-primary w-100 mt-4">
                            <i class="fas fa-plus"></i> Ajouter
                        </button>
                    </form>
                </div>



            </div>
        </div>
    </div>



@include('GlobalAdmin/footerGA')
