@include('GlobalAdmin.headerGA')
<style>
    .tab-content { display: none; }
    .active-tab { display: block; }
    #tabs{
        margin-top: -15px;
        display: flex;

        justify-content: space-evenly;

    }
    #tabs li{
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
            <h3>Gestion des Établissements</h3>
        </div>
        <div class="card-body">
            <!-- Tabs -->
            <ul class="nav nav-tabs mb-4  mb-5 bg-dark text-light p-3" id="tabs">
                <li class="nav-item ">
                    <a class="nav-link active h1" href="#" onclick="showTab('ajouter')"><i class="fas fa-plus"></i> Ajouter</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link h1" href="#" onclick="showTab('gestion')"><i class="fas fa-building"></i> Gérer</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#" onclick="showTab('rechercher')"><i class="fas fa-search"></i> Rechercher</a>
                </li>
            </ul>

            <!-- Contenu des onglets -->
            @include('GlobalAdmin.G_Etablissement.Add_Etablissement')

            @include('GlobalAdmin.G_Etablissement.G_Etablissement')


            <div id="rechercher" class="tab-content">
                <h4 class="mb-3"><i class="fas fa-search"></i> Rechercher un Établissement</h4>
                <input type="text" id="search" class="form-control mb-3" placeholder="Entrez un nom ou une adresse..." onkeyup="filterTable()">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Adresse</th>
                            <th>Telephone</th>
                            <th>Email</th>
                            <th>Directuer</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Etablissements as $etablissement)
                        <tr>
                            <td>{{ $etablissement->id }}</td>
                            <td>{{ $etablissement->nom }}</td>
                            <td>{{ $etablissement->adresse }}</td>
                            <td>{{ $etablissement->telephone }}</td>
                            <td>{{ $etablissement->email }}</td>
                            <td>{{ $etablissement->superAdmin->name ?? 'Non défini' }} {{ $etablissement->superAdmin->prenom ?? '' }}</td>
                            <td>
                                <a href="" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Modifier</a>
                                <form action="etablissements.destroy" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Supprimer</button>
                                </form>
                                <a href="" class="btn btn-success btn-sm"><i class="fas fa-info-circle"></i> Voir details</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<script>
    function showTab(tabId) {
        document.querySelectorAll('.tab-content').forEach(tab => {
            tab.classList.remove('active-tab');
        });
        document.getElementById(tabId).classList.add('active-tab');

        document.querySelectorAll('.nav-link').forEach(link => {
            link.classList.remove('active');
        });
        event.target.classList.add('active');
    }

    function filterTable() {
        let input = document.getElementById("search").value.toLowerCase();
        let rows = document.querySelectorAll("#etablissementTable tr");

        rows.forEach(row => {
            let nom = row.cells[1].innerText.toLowerCase();
            let adresse = row.cells[2].innerText.toLowerCase();

            if (nom.includes(input) || adresse.includes(input)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }
</script><script>
    $(document).on('click', '.delete-etablissement', function() {
        let etablissementId = $(this).data('id');

        if (confirm("Voulez-vous vraiment supprimer cet établissement ?")) {
            $.ajax({
                url: '/etablissementDELETE/' + etablissementId,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    alert(response.message); // Affiche un message de confirmation
                    refreshTable();
                },
                error: function(xhr) {
                    alert("Erreur lors de la suppression !");
                }
            });
        }
    });

    function refreshTable() {
        $.ajax({
            url: '/etablissements/table', // Créez cette route pour récupérer uniquement la table
            type: 'GET',
            success: function(response) {
                $('#table-container').html(response); // Remplace le contenu du tableau
            }
        });
    }
</script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@include('GlobalAdmin.footerGA')
