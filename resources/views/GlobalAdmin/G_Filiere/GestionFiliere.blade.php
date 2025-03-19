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
                        <a class="nav-link  h1" href="{{route('Filiere.create')}}">
                            <i class="fas fa-plus"></i> Ajouter
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active h1" href="{{route('Filiere.gestion')}}"  >
                            <i class="fas fa-building"></i> Gérer
                        </a>
                    </li>

                </ul>



            </div>
        </div>
    </div>



@include('GlobalAdmin/footerGA')
