@include('header')
<style>
    .product-card {
    background-color: rgb(234, 232, 232);
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    position: relative; /* Ajouté pour pouvoir modifier le z-index */
    z-index: 2; /* Par défaut, la carte a un z-index de 1 */
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    z-index: 1; /* Lors du survol, la carte passe au-dessus de tout autre élément */
}


        .product-card__image {
            height: 250px;
            overflow: hidden;
        }

        .product-card__image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .product-card:hover .product-card__image img {
            transform: scale(1.05);
        }

        .product-card__info {
            padding: 20px;
        }

        .product-card__title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--text-color);
        }

        .product-card__description {
            font-size: 1rem;
            color: #666;
            margin-bottom: 20px;
        }



        .product-card__btn {
            display: flex;
            justify-content: center;
            border-radius: 50px;
            font-size: 1.2rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none ;
            transition: background-color 0.3s ease;
        }

        .info{
            display: flex;
            justify-content: space-evenly;
            align-items: center;
        }
</style>
<section id="filieres" class="services section py-5 bg-light mb-5 mt-5">

  <!-- Section Title -->
  <div class="container text-center mb-5" data-aos="fade-up">
    <h2 class="fw-bold">Nos Filières</h2>
    <p class="text-muted">Découvrez nos filières de formation certifiantes adaptées aux besoins du marché pour vous offrir des compétences pratiques et solides.</p>
  </div>

  <div class="row">
  @foreach($filieres as $filiere)
  <div class="cont col-md-4 p-3 m-4 ">
    <div class="product-card">
        <div class="product-card__image">
            <img src="{{ asset('storage/' . $filiere->Logo) }}"" alt="logo de filiere">
        </div>
        <div class="product-card__info">
            <h2 class="product-card__title">{{$filiere->nom}}</h2>
            <strong class="product-card__description mt-3">
                {{$filiere->description}}
</strong>
            <div class="info mt-5 ">
               <h4 class="text-muted">durée de formation :</h4>
                <span class="h5 text-dark">{{$filiere->duree}} /mois</span>
            </div>
            <hr>
            <div class="info mt-2">
                <h4 class="text-muted">Niveau d'etude :</h4>
                @if($filiere->niveau_scolaire === 'TS')
                 <span class="h5 text-dark">Technicien Spécialisé</span>
                 @elseif ($filiere->niveau_scolaire === 'T')
                 <span class="h5 text-dark">Technicien</span>
                 @elseif ($filiere->niveau_scolaire === 'Q')
                 <span class="h5 text-dark">Qualification</span>
                 @elseif ($filiere->niveau_scolaire === 'S')
                 <span class="h5 text-dark">Spécialisation</span>
                 @endif
            </div>
            <a href="#" class="btn btn-primary  product-card__btn text-canter mt-5">Inscrire à cette formation</a>
        </div>
    </div>
</div>
  @endforeach
</div>
      </section>
@include('footer')
