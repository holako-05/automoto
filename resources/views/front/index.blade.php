@extends('layouts/front')
@section('content')
<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <!-- Pour le service d'entretien -->
            <div class="carousel-item active">
                <img class="w-100" src="/assets/front/img/carousel-bg-1.jpg" alt="Entretien Image">
                <div class="carousel-caption d-flex align-items-center">
                    <div class="container">
                        <div class="row align-items-center justify-content-center justify-content-lg-start">
                            <div class="col-10 col-lg-7 text-center text-lg-start">
                                <h6 class="text-white text-uppercase mb-3 animated slideInDown">Entretien Automobile
                                </h6>
                                <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">Entretien fiable,
                                    performance assurée.</h1>
                                <a href="" class="btn btn-primary py-3 px-5 animated slideInDown">En savoir
                                    plus<i class="fa fa-arrow-right ms-3"></i></a>
                            </div>
                            <div class="col-lg-5 d-none d-lg-flex animated zoomIn">
                                <img class="img-fluid" src="/assets/front/img/carousel-4.png" alt="Entretien Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pour le service de lavage -->
            <div class="carousel-item">
                <img class="w-100" src="/assets/front/img/carousel-bg-2.jpg" alt="Lavage Image">
                <div class="carousel-caption d-flex align-items-center">
                    <div class="container">
                        <div class="row align-items-center justify-content-center justify-content-lg-start">
                            <div class="col-10 col-lg-7 text-center text-lg-start">
                                <h6 class="text-white text-uppercase mb-3 animated slideInDown">Lavage Automobile</h6>
                                <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">Brillance à chaque
                                    passage.</h1>
                                <a href="" class="btn btn-primary py-3 px-5 animated slideInDown">En savoir
                                    plus<i class="fa fa-arrow-right ms-3"></i></a>
                            </div>
                            <div class="col-lg-5 d-none d-lg-flex animated zoomIn">
                                <img class="img-fluid" src="/assets/front/img/carousel-4.png" alt="Lavage Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Précédent</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Suivant</span>
        </button>
    </div>
</div>

<!-- Carousel End -->


<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Confort des clients -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="d-flex py-5 px-4">
                    <i class="fa fa-coffee fa-3x text-primary flex-shrink-0"></i>
                    <div class="ps-4">
                        <h5 class="mb-3">Confort du Client</h5>
                        <p>Détendez-vous dans notre café en attendant que votre voiture soit prête. Votre confort est
                            notre priorité.</p>
                        <a class="text-secondary border-bottom" href="">En savoir plus</a>
                    </div>
                </div>
            </div>

            <!-- Espace enfants -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="d-flex bg-light py-5 px-4">
                    <i class="fa fa-child fa-3x text-primary flex-shrink-0"></i>
                    <div class="ps-4">
                        <h5 class="mb-3">Espace Enfants</h5>
                        <p>Un espace dédié, sécurisé et ludique pour vos petits, pour qu'ils s'amusent et explorent
                            joyeusement pendant que vous vous détendez.</p>
                        <a class="text-secondary border-bottom" href="">En savoir plus</a>
                    </div>
                </div>
            </div>

            <!-- Lavage Écologique -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="d-flex py-5 px-4">
                    <i class="fa fa-tint fa-3x text-primary flex-shrink-0"></i>
                    <div class="ps-4">
                        <h5 class="mb-3">Lavage Écologique</h5>
                        <p>Adoptez un lavage responsable ! Nous utilisons des produits biodégradables, respectant à la
                            fois votre voiture et la nature.</p>
                        <a class="text-secondary border-bottom" href="">En savoir plus</a>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>


<!-- Service End -->


<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 pt-4" style="min-height: 400px;">
                <div class="position-relative h-100 wow fadeIn" data-wow-delay="0.1s">
                    <img class="position-absolute img-fluid w-100 h-100" src="/assets/front/img/about.jpg" style="object-fit: cover;"
                        alt="">
                    <div class="position-absolute top-0 end-0 mt-n4 me-n4 py-4 px-5"
                        style="background: rgba(0, 0, 0, .08);">
                        <h1 class="display-4 text-white mb-0">10 <span class="fs-4">Years</span></h1>
                        <h4 class="text-white">Experience in Bouskoura</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h6 class="text-primary text-uppercase">About Us</h6>
                <h1 class="mb-4"><span class="text-primary">Atelier Ville Verte</span> - L'excellence au service de
                    votre auto</h1>
                <p class="mb-4">Situé au cœur de la ville verte de Bouskoura, notre atelier vous accueille pour
                    l'entretien et le lavage écologique de votre véhicule. Votre confort étant notre priorité, profitez
                    d'un café détente pendant que votre véhicule est entre de bonnes mains.</p>
                <div class="row g-4 mb-3 pb-3">
                    <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                        <div class="d-flex">
                            <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1"
                                style="width: 45px; height: 45px;">
                                <span class="fw-bold text-secondary">01</span>
                            </div>
                            <div class="ps-3">
                                <h6>Entretien professionnel</h6>
                                <span>Des services d'entretien de haute qualité pour assurer la longévité de votre
                                    auto.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                        <div class="d-flex">
                            <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1"
                                style="width: 45px; height: 45px;">
                                <span class="fw-bold text-secondary">02</span>
                            </div>
                            <div class="ps-3">
                                <h6>Lavage Écologique</h6>
                                <span>Un lavage respectueux de l'environnement avec des produits biodégradables.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                        <div class="d-flex">
                            <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1"
                                style="width: 45px; height: 45px;">
                                <span class="fw-bold text-secondary">03</span>
                            </div>
                            <div class="ps-3">
                                <h6>Espace Confort</h6>
                                <span>Profitez de notre café détente et d'un espace ludique pour vos enfants.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="" class="btn btn-primary py-3 px-5">En savoir plus<i
                        class="fa fa-arrow-right ms-3"></i></a>
            </div>
        </div>
    </div>
</div>


<!-- About End -->


<!-- Fact Start -->
<div class="container-fluid fact bg-dark my-5 py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                <i class="fa fa-leaf fa-2x text-white mb-3"></i>
                <h3 class="text-white mb-2">Lavage Écologique</h3>
                <p class="text-white mb-0">Des solutions respectueuses de l'environnement pour votre auto.</p>
            </div>
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                <i class="fa fa-coffee fa-2x text-white mb-3"></i>
                <h3 class="text-white mb-2">Espace Détente</h3>
                <p class="text-white mb-0">Profitez d'un café pendant que nous nous occupons de votre véhicule.</p>
            </div>
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                <i class="fa fa-child fa-2x text-white mb-3"></i>
                <h3 class="text-white mb-2">Espace Enfants</h3>
                <p class="text-white mb-0">Un espace ludique dédié pour vos enfants.</p>
            </div>
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.7s">
                <i class="fa fa-wrench fa-2x text-white mb-3"></i>
                <h3 class="text-white mb-2">Technologie Avancée</h3>
                <p class="text-white mb-0">Nous utilisons des outils modernes pour une meilleure efficacité.</p>
            </div>
        </div>
    </div>
</div>

<!-- Fact End -->


<!-- Service Start -->
<div class="container-xxl service py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-primary text-uppercase">Nos Services</h6>
            <h1 class="mb-5">Découvrez Nos Services</h1>
        </div>
        <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
            <div class="col-lg-4">
                <div class="nav w-100 nav-pills me-4">
                    <!-- Service 1 -->
                    <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4 active"
                        data-bs-toggle="pill" data-bs-target="#tab-pane-1" type="button">
                        <i class="fa fa-car-side fa-2x me-3"></i>
                        <h4 class="m-0">Test Diagnostique</h4>
                    </button>
                    <!-- Service 2 -->
                    <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4" data-bs-toggle="pill"
                        data-bs-target="#tab-pane-2" type="button">
                        <i class="fa fa-car fa-2x me-3"></i>
                        <h4 class="m-0">Entretien du Moteur</h4>
                    </button>
                    <!-- Service 3 -->
                    <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4" data-bs-toggle="pill"
                        data-bs-target="#tab-pane-3" type="button">
                        <i class="fa fa-cog fa-2x me-3"></i>
                        <h4 class="m-0">Remplacement des Pneus</h4>
                    </button>
                    <!-- Service 4 -->
                    <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4" data-bs-toggle="pill"
                        data-bs-target="#tab-pane-4" type="button">
                        <i class="fa fa-oil-can fa-2x me-3"></i>
                        <h4 class="m-0">Changement d'Huile</h4>
                    </button>
                    <!-- Nouveau service -->
                    <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4" data-bs-toggle="pill"
                        data-bs-target="#tab-pane-5" type="button">
                        <i class="fa fa-wrench fa-2x me-3"></i>
                        <h4 class="m-0">Nouveau Service</h4>
                    </button>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="tab-content w-100">
                    <!-- Contenu pour Service 1 -->
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <!-- ... (contenu pour Service 1) ... -->
                        <div class="row g-4">
                            <div class="col-md-6" style="min-height: 350px;">
                                <div class="position-relative h-100">
                                    <img class="position-absolute img-fluid w-100 h-100" src="/assets/front/img/service-1.jpg"
                                        style="object-fit: cover;" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3 class="mb-3">15 ans d'expérience dans le service auto</h3>
                                <p class="mb-4">Nous avons acquis une expertise reconnue au fil des ans dans le
                                    domaine du diagnostic automobile. Notre équipe utilise des équipements modernes pour
                                    identifier rapidement et précisément les problèmes potentiels de votre véhicule,
                                    garantissant ainsi sa sécurité et sa performance optimale sur la route. Faites-nous
                                    confiance pour un diagnostic complet et professionnel.</p>
                                <p><i class="fa fa-check text-success me-3"></i>Service de qualité</p>
                                <p><i class="fa fa-check text-success me-3"></i>Équipe d'experts</p>
                                <p><i class="fa fa-check text-success me-3"></i>Équipements modernes</p>
                                <a href="" class="btn btn-primary py-3 px-5 mt-3">En savoir plus<i
                                        class="fa fa-arrow-right ms-3"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Contenu pour Service 2 -->
                    <div class="tab-pane fade" id="tab-pane-2">
                        <!-- ... (contenu pour Service 2) ... -->
                        <div class="row g-4">
                            <div class="col-md-6" style="min-height: 350px;">
                                <div class="position-relative h-100">
                                    <img class="position-absolute img-fluid w-100 h-100" src="/assets/front/img/service-2.jpg"
                                        style="object-fit: cover;" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3 class="mb-3">Spécialistes en Entretien du Moteur</h3>
                                <p class="mb-4">L'entretien du moteur est crucial pour garantir la longévité et la
                                    performance optimale de votre véhicule. Forts de nos 15 ans d'expérience, nous avons
                                    développé une expertise unique dans l'entretien des moteurs. Notre équipe de
                                    professionnels qualifiés utilise des équipements de pointe pour assurer que votre
                                    moteur fonctionne à son meilleur niveau. Confiez-nous l'entretien de votre moteur
                                    pour une tranquillité d'esprit et une performance inégalée.</p>
                                <p><i class="fa fa-check text-success me-3"></i>Techniques d'entretien avancées</p>
                                <p><i class="fa fa-check text-success me-3"></i>Mécaniciens qualifiés</p>
                                <p><i class="fa fa-check text-success me-3"></i>Garantie de satisfaction</p>
                                <a href="" class="btn btn-primary py-3 px-5 mt-3">En savoir plus<i
                                        class="fa fa-arrow-right ms-3"></i></a>
                            </div>

                        </div>
                    </div>
                    <!-- Contenu pour Service 3 -->
                    <div class="tab-pane fade" id="tab-pane-3">
                        <!-- ... (contenu pour Service 3) ... -->
                    </div>
                    <!-- Contenu pour Service 4 -->
                    <div class="tab-pane fade" id="tab-pane-4">
                        <!-- ... (contenu pour Service 4) ... -->
                    </div>
                    <!-- Contenu pour Nouveau Service -->
                    <div class="tab-pane fade" id="tab-pane-5">
                        <div class="row g-4">
                            <div class="col-md-6" style="min-height: 350px;">
                                <div class="position-relative h-100">
                                    <img class="position-absolute img-fluid w-100 h-100" src="/assets/front/img/service-5.jpg"
                                        style="object-fit: cover;" alt="Image du Nouveau Service">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3 class="mb-3">Description du Nouveau Service</h3>
                                <p class="mb-4">Détails et description sur le nouveau service...</p>
                                <p><i class="fa fa-check text-success me-3"></i>Service de Qualité</p>
                                <p><i class="fa fa-check text-success me-3"></i>Experts Qualifiés</p>
                                <p><i class="fa fa-check text-success me-3"></i>Équipement Moderne</p>
                                <a href="" class="btn btn-primary py-3 px-5 mt-3">En Savoir Plus<i
                                        class="fa fa-arrow-right ms-3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Service End -->


<!-- Booking Start -->
<div class="container-fluid bg-secondary booking my-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-6 py-5">
                <div class="py-5">
                    <h1 class="text-white mb-4">Garage automobile certifié avec des années d'expertise</h1>
                    <p class="text-white mb-0">Notre garage est reconnu pour son expertise en matière d'entretien et de
                        réparation automobile. Chaque véhicule est traité avec le plus grand soin, assurant ainsi la
                        satisfaction de nos clients. Qu'il s'agisse d'un simple entretien ou d'un lavage complet, nous
                        sommes là pour vous.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="bg-primary h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn"
                    data-wow-delay="0.6s">
                    <h1 class="text-white mb-4">Prenez rendez-vous</h1>
                    <form>
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control border-0" placeholder="Votre nom"
                                    style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="email" class="form-control border-0" placeholder="Votre e-mail"
                                    style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <select class="form-select border-0" style="height: 55px;">
                                    <option selected>Choisir un service</option>
                                    <option value="1">Entretien général</option>
                                    <option value="2">Réparation spécifique</option>
                                    <option value="3">Lavage complet</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="date" id="date1" data-target-input="nearest">
                                    <input type="text" class="form-control border-0 datetimepicker-input"
                                        placeholder="Date du service" data-target="#date1"
                                        data-toggle="datetimepicker" style="height: 55px;">
                                </div>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control border-0" placeholder="Demande ou remarque spéciale"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-secondary w-100 py-3" type="submit">Réserver
                                    maintenant</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Booking End -->


<!-- Team Start -->
<!-- <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-primary text-uppercase">Our Technicians</h6>
                <h1 class="mb-5">Our Expert Technicians</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="/assets/front/img/team-1.jpg" alt="">
                            <div class="team-overlay position-absolute start-0 top-0 w-100 h-100">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="bg-light text-center p-4">
                            <h5 class="fw-bold mb-0">Full Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="/assets/front/img/team-2.jpg" alt="">
                            <div class="team-overlay position-absolute start-0 top-0 w-100 h-100">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="bg-light text-center p-4">
                            <h5 class="fw-bold mb-0">Full Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="/assets/front/img/team-3.jpg" alt="">
                            <div class="team-overlay position-absolute start-0 top-0 w-100 h-100">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="bg-light text-center p-4">
                            <h5 class="fw-bold mb-0">Full Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="/assets/front/img/team-4.jpg" alt="">
                            <div class="team-overlay position-absolute start-0 top-0 w-100 h-100">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="bg-light text-center p-4">
                            <h5 class="fw-bold mb-0">Full Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
<!-- Team End -->


<!-- Testimonial Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h6 class="text-primary text-uppercase">Témoignage</h6>
            <h1 class="mb-5">Ce que nos clients disent !</h1>
        </div>
        <div class="owl-carousel testimonial-carousel position-relative">
            <div class="testimonial-item text-center">
                <img class="bg-light rounded-circle p-2 mx-auto mb-3" src="/assets/front/img/testimonial-1.jpg"
                    style="width: 80px; height: 80px;">
                <h5 class="mb-0">Mourad</h5>
                <p>Ingénieur Mécanique</p>
                <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Depuis que je confie mon véhicule à ce garage, je n'ai jamais rencontré de
                        problème. L'équipe est professionnelle et le service est impeccable.</p>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <img class="bg-light rounded-circle p-2 mx-auto mb-3" src="/assets/front/img/testimonial-2.jpg"
                    style="width: 80px; height: 80px;">
                <h5 class="mb-0">Younes</h5>
                <p>Commercial</p>
                <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Un grand merci à l'équipe pour leur réactivité et leur expertise. Mon véhicule
                        fonctionne mieux que jamais grâce à leurs soins attentifs.</p>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <img class="bg-light rounded-circle p-2 mx-auto mb-3" src="/assets/front/img/testimonial-3.jpg"
                    style="width: 80px; height: 80px;">
                <h5 class="mb-0">Abdellah</h5>
                <p>Entrepreneur</p>
                <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Je recommande vivement ce garage pour leur sérieux et leur souci du détail. Ils
                        ont su identifier et résoudre un problème complexe sur mon véhicule.</p>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <img class="bg-light rounded-circle p-2 mx-auto mb-3" src="/assets/front/img/testimonial-4.jpg"
                    style="width: 80px; height: 80px;">
                <h5 class="mb-0">Badr</h5>
                <p>Professeur</p>
                <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">La qualité de service et l'accueil chaleureux me font revenir à chaque fois.
                        Merci pour votre travail exceptionnel.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Testimonial End -->
@stop
