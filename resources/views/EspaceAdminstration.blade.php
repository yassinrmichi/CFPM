<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administration - CFPM</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="/EspaceAdminstration.css">
  <style>

  </style>
</head>
<body>
    <div class="sidebar bg-dark">
      <h3 class="text-center">Administration</h3>
      <ul class="nav flex-column mt-4">
        <li class="nav-item p-2"><a href="#" class="nav-link"><i class="fa fa-home me-2"></i>Profile</a></li>
        <li class="nav-item p-2"><a href="#" class="nav-link"><i class="fa fa-tachometer-alt me-2"></i>Tableau de Bord</a></li>
        <li class="nav-item p-2"><a href="#" class="nav-link"><i class="fa fa-user me-2"></i>Stagiaires</a></li>
        <li class="nav-item p-2"><a href="#" class="nav-link"><i class="fa fa-calendar-check me-2"></i>Absences</a></li>
        <li class="nav-item p-2"><a href="#" class="nav-link"><i class="fa fa-graduation-cap me-2"></i>Notes</a></li>
        <li class="nav-item p-2"><a href="#" class="nav-link"><i class="fa fa-chalkboard-teacher me-2"></i>Formateurs</a></li>
        <li class="nav-item p-2"><a href="#" class="nav-link"><i class="fa fa-cogs me-2"></i>Paramètres</a></li>
        <li class="nav-item p-2"><a href="#" class="nav-link"><i class="fa fa-sign-out-alt me-2"></i>Déconnexion</a></li>
      </ul>
    </div>

    <header class="fixed-header navbar navbar-expand-lg navbar-light bg-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#">CFPM</a>
      <form class="d-flex flex-grow-1 mx-3">
        <input class="form-control me-2 w-50" type="search" placeholder="Rechercher..." aria-label="Search">
        <button class="btn btn-outline-primary" type="submit">Search</button>
      </form>
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item position-relative me-3">
          <a class="nav-link" href="#">
            <i class="fa fa-bell fs-4"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">3</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
            <img src="https://via.placeholder.com/40" alt="Profile" class="rounded-circle me-2" width="40" height="40">
            <span>Username</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#">Profil</a></li>
            <li><a class="dropdown-item" href="#">Paramètres</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Déconnexion</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </header>
    <!-- Content -->
    <div class="content">
      <h1 class="mb-4">Tableau de Bord</h1>

      <!-- Dashboard Cards -->
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card p-2">
            <div class="d-flex align-items-center">
              <i class="fa fa-user fa-3x text-primary me-3"></i>
              <div>
                <h4>120</h4>
                <p class="mb-0">Stagiaires</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card p-2">
            <div class="d-flex align-items-center">
              <i class="fa fa-calendar-check fa-3x text-success me-3"></i>
              <div>
                <h4>45</h4>
                <p class="mb-0">Absences</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card p-2">
            <div class="d-flex align-items-center">
              <i class="fa fa-graduation-cap fa-3x text-warning me-3"></i>
              <div>
                <h4>95%</h4>
                <p class="mb-0">Notes Moyennes</p>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="mt-5">
        <h2>Statistiques</h2>
        <canvas id="chart" height="100"></canvas>
      </div>

      <!-- Recent Reports -->
      <div class="mt-5">
        <h2>Rapports Récents</h2>
        <table class="table table-striped mt-3">
          <thead>
            <tr>
              <th>#</th>
              <th>Nom</th>
              <th>Type</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Rapport Mensuel</td>
              <td>PDF</td>
              <td>01/01/2025</td>
              <td><button class="btn btn-primary btn-sm">Télécharger</button></td>
            </tr>
            <tr>
              <td>2</td>
              <td>Liste des Stagiaires</td>
              <td>Excel</td>
              <td>01/01/2025</td>
              <td><button class="btn btn-primary btn-sm">Télécharger</button></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="table-container mt-2">
        <h1 class="text-center mb-4">Gestion d'utilisateur</h1>
        <table class="table table-bordered table-striped table-hover table-primary">
          <thead class="table-dark">
            <tr>
              <th>id</th>
              <th>nom</th>
              <th>prenom</th>
              <th>email</th>
              <th>adresse</th>
              <th>action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td scope="row">1</td>
              <td>yassin</td>
              <td>rmichi</td>
              <td>yassine@gmail.com</td>
              <td>kenita</td>
              <td>
                <button class="btn btn-info btn-sm">Voir</button>
                <button class="btn btn-warning btn-sm">Modifier</button>
                <button class="btn btn-danger btn-sm">Supprimer</button>
              </td>
            </tr>
            <tr>
                <td scope="row">1</td>
                <td>yassin</td>
                <td>rmichi</td>
                <td>yassine@gmail.com</td>
                <td>kenita</td>
                <td>
                  <button class="btn btn-info btn-sm">Voir</button>
                  <button class="btn btn-warning btn-sm">Modifier</button>
                  <button class="btn btn-danger btn-sm">Supprimer</button>
                </td>
              </tr>
          </tbody>
        </table>
      </div>

    </div>
  </div>
        </div>
    </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const ctx = document.getElementById('chart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Absences',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                },
                tooltip: {
                    enabled: true,
                    callbacks: {
                        label: function(context) {
                            return `${context.dataset.label}: ${context.raw} absences`;
                        }
                    }
                }
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Months',
                        font: {
                            size: 14
                        }
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Number of Absences',
                        font: {
                            size: 14
                        }
                    }
                }
            }
        }
    });
</script>


