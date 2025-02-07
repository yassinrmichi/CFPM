<div id="ajouter" class="tab-content active-tab">
    <h2>Ajouter un établissement public</h2>

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
    <form action="{{ route('etablissements.store') }}" method="POST">
        @csrf
        @method('POST')

        <div class="row mt-5">
            <div class="col-sm-3">
                <p class="mb-0 text-dark">Nom Etablissement </p>
            </div>
            <div class="col-sm-9">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-school"></i></span>
                    <input type="text" class="form-control" id="nom" name="nom" required>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0 text-dark">adresse </p>
            </div>
            <div class="col-sm-9">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                    <input type="text" class="form-control" id="adresse" name="adresse"  required>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0 text-dark">telephone </p>
            </div>
            <div class="col-sm-9">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    <input type="text" class="form-control" id="telephone" name="telephone"required>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0  text-dark">Email </p>
            </div>
            <div class="col-sm-9">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input type="text" class="form-control" id="email" name="email"required>
                </div>
            </div>
        </div>
        <hr>
        <button
            type="submit"
            class="btn btn-primary w-100 mt-5"
        >
            ajouter
        </button>

    </form>
</div>
