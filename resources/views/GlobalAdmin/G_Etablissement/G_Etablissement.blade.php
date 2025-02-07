<div id="gestion" class="tab-content">
    <h4 class="mb-3"><i class="fas fa-cogs"></i> Gérer les Établissements</h4>
    <div class="table-responsive scroll-table">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Telephone</th>
                    <th>Email</th>
                    <th>Directeur</th>
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
                        <form action="{{route('etablissements.destroy',$etablissement->id)}}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Supprimer</button>
                        </form>
                        <a href="" class="btn btn-success btn-sm"><i class="fas fa-info-circle"></i> Voir détails</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
