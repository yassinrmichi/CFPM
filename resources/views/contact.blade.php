@include('header')

<div class="container mt-5 mb-5">
    <section id="contact" class="contact section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Contact</h2>
          <p>Vous pouvez nous contacter pour toute information relative à nos formations, gestion de stagiaires, ou services professionnels.</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

          <div class="row g-4 g-lg-5">
            <div class="col-lg-5">
              <div class="info-box" data-aos="fade-up" data-aos-delay="200">
                <h3>Informations de Contact</h3>
                <p>CFPM - Centre de Formation Professionnelle Maroc. Nous vous accompagnons dans l'acquisition de compétences pratiques pour votre avenir professionnel.</p>

                <div class="info-item" data-aos="fade-up" data-aos-delay="400">
                  <div class="icon-box">
                    <i class="bi bi-telephone"></i>
                  </div>
                  <div class="content">
                    <h4>Numéros de Téléphone</h4>
                    <p>+212 5 22 12 45 56</p>
                    <p>+212 5 12 34 56 78</p>
                  </div>
                </div>

                <div class="info-item" data-aos="fade-up" data-aos-delay="500">
                  <div class="icon-box">
                    <i class="bi bi-envelope"></i>
                  </div>
                  <div class="content">
                    <h4>Adresse Email</h4>
                    <p>contact@cfpm.ma</p>
                    <p>support@cfpm.ma</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-7">
              <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
                <h3>Entrez en Contact avec Nous</h3>
                <p>Si vous avez des questions concernant nos formations ou si vous souhaitez plus d'informations sur nos services, n'hésitez pas à nous envoyer un message.</p>

                <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                  <div class="row gy-4">

                    <div class="col-md-6">
                      <input type="text" name="name" class="form-control" placeholder="Votre Nom" required="">
                    </div>

                    <div class="col-md-6 ">
                      <input type="email" class="form-control" name="email" placeholder="Votre Email" required="">
                    </div>

                    <div class="col-12">
                      <input type="text" class="form-control" name="subject" placeholder="Sujet" required="">
                    </div>

                    <div class="col-12">
                      <textarea class="form-control" name="message" rows="6" placeholder="Votre Message" required=""></textarea>
                    </div>

                    <div class="col-12 text-center">
                      <div class="loading">Envoi en cours</div>
                      <div class="error-message"></div>
                      <div class="sent-message">Votre message a été envoyé. Merci de nous avoir contacté !</div>

                      <button type="submit" class="btn">Envoyer Message</button>
                    </div>

                  </div>
                </form>

              </div>
            </div>

          </div>

        </div>

        </section>
</div>
@include('footer')
