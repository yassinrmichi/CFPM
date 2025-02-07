@include('GlobalAdmin.headerGA')

</head>
<body class="bg-light">
    <div class="container py-4">
        <div class="row g-3">
            <div class="col-lg-3 col-md-6 col-sm-12" id="etablissements">
                <div class="card bg-dark text-light">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon">
                                <i class="pe-7s-home"></i>
                            </div>
                            <div>
                                <div class="stat-text text-info">15</div>
                                <div class="stat-heading">Établissements</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Répéter pour chaque statistique -->
            <!-- Stagiaires, Formateurs, Formations, Utilisateurs, Rapports, Directeurs, Employés -->
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Les Établissements</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>Adresse</th>
                                        <th>Directeur</th>
                                        <th>Nombre de Stagiaires</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Établissement A</td>
                                        <td>Adresse 1</td>
                                        <td>Directeur 1</td>
                                        <td>50</td>
                                        <td>
                                            <a href="/admin/etablissement/1" class="btn btn-primary btn-sm">Voir Détails</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Établissement B</td>
                                        <td>Adresse 2</td>
                                        <td>Directeur 2</td>
                                        <td>35</td>
                                        <td>
                                            <a href="/admin/etablissement/2" class="btn btn-primary btn-sm">Voir Détails</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="/assets/js/mainDash.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>


</body>
</html>
