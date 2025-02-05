
    @include('header')

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="hero-content" data-aos="fade-up" data-aos-delay="200">

              <h1 class="mb-4">
              Centre de Formation  <br>
                Professionnelle <br>
                <span class="accent-text"> Maroc</span>
              </h1>

              <p class="mb-4 mb-md-5">
              CFPM - Centre de Formation Professionnelle Maroc est un établissement dédié à la formation de qualité, offrant des programmes certifiants adaptés aux besoins du marché. Avec des formateurs qualifiés et des partenariats stratégiques, nous préparons les stagiaires aux défis professionnels en leur fournissant des compétences pratiques et applicables. Notre objectif est de contribuer à l'élévation des compétences au Maroc et à l'insertion réussie des jeunes dans le monde du travail.
              </p>

            </div>
          </div>

          <div class="col-lg-6">
            <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
                <img src="{{ asset('includes/images/CFPM.jpeg') }}" alt="Hero Image" class="img-fluid">              </div>
            </div>
          </div>
        </div>

        <div class="row stats-row gy-4 mt-5" data-aos="fade-up" data-aos-delay="500">
  <div class="col-lg-3 col-md-6">
    <div class="stat-item">
      <div class="stat-icon">
        <i class="bi bi-person-check"></i>
      </div>
      <div class="stat-content">
        <h4>500+ Stagiaires Formés</h4>
        <p class="mb-0">Nombre de stagiaires ayant suivi des formations certifiantes au centre</p>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6">
    <div class="stat-item">
      <div class="stat-icon">
        <i class="bi bi-person-lines-fill"></i>
      </div>
      <div class="stat-content">
        <h4>120+ Formateurs Qualifiés</h4>
        <p class="mb-0">Nos formateurs sont des experts dans leurs domaines respectifs</p>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6">
    <div class="stat-item">
      <div class="stat-icon">
        <i class="bi bi-bar-chart-line"></i>
      </div>
      <div class="stat-content">
        <h4>90% Taux de Réussite</h4>
        <p class="mb-0">Taux de réussite des stagiaires aux examens finaux</p>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6">
    <div class="stat-item">
      <div class="stat-icon">
        <i class="bi bi-calendar-check"></i>
      </div>
      <div class="stat-content">
        <h4>200+ Sessions Formations</h4>
        <p class="mb-0">Nombre total de sessions de formation organisées chaque année</p>
      </div>
    </div>
  </div>
</div>


    </section><!-- /Hero Section -->

<section id="features" class="features section">

  <div class="container">

    <div class="d-flex justify-content-center">

      <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">

        <li class="nav-item">
          <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
            <h4>Programmes</h4>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
            <h4>Formateurs</h4>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
            <h4>Installations</h4>
          </a>
        </li>

      </ul>

    </div>

    <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

      <div class="tab-pane fade active show" id="features-tab-1">
        <div class="row">
          <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
            <h3>Programmes de formation professionnelle</h3>
            <p class="fst-italic">
              Le CFPM propose une variété de programmes de formation professionnelle conçus pour répondre aux besoins du marché de l'emploi au Maroc. Ces programmes incluent des expériences d'apprentissage pratiques, des formateurs experts et une assistance à l'insertion professionnelle pour aider les étudiants à intégrer facilement leur carrière.
            </p>
            <ul>
              <li><i class="bi bi-check2-all"></i> Cours axés sur l'industrie</li>
              <li><i class="bi bi-check2-all"></i> Compétences pratiques pour le lieu de travail</li>
              <li><i class="bi bi-check2-all"></i> Certifications reconnues par les employeurs</li>
            </ul>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 text-center">
            <img src="../includes/images/branches.jpg" alt="Programmes de Formation" class="img-fluid">
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="features-tab-2">
        <div class="row">
          <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
            <h3>Formateurs expérimentés</h3>
            <p class="fst-italic">
              Nos formateurs sont des professionnels expérimentés qui apportent des connaissances concrètes en classe. Ils s'engagent à fournir un enseignement de haute qualité et une attention personnalisée pour aider les étudiants à réussir.
            </p>
            <ul>
              <li><i class="bi bi-check2-all"></i> Formateurs certifiés et expérimentés</li>
              <li><i class="bi bi-check2-all"></i> Accompagnement pratique et soutien</li>
              <li><i class="bi bi-check2-all"></i> Accent mis sur le développement des étudiants</li>
            </ul>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 text-center">
            <img src="../includes/images/formateure.jpeg" alt="Formateurs expérimentés" class="img-fluid">
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="features-tab-3">
        <div class="row">
          <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
            <h3>Installations à la pointe de la technologie</h3>
            <ul>
              <li><i class="bi bi-check2-all"></i> Salles de formation entièrement équipées</li>
              <li><i class="bi bi-check2-all"></i> Accès aux technologies modernes</li>
              <li><i class="bi bi-check2-all"></i> Environnement confortable et professionnel</li>
            </ul>
            <p class="fst-italic">
              Notre centre de formation est équipé des dernières technologies et ressources pour offrir une expérience d'apprentissage optimale.
            </p>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 text-center">
            <img src="../includes/images/Salle de formation.jpeg" alt="Installations de Formation" class="img-fluid">
          </div>
        </div>
      </div>

    </div>

  </div>

</section>


  </main>
@include('footer')
