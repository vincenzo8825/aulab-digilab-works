<x-layout>
    <div class="container mt-5">
        <header class="text-center mb-4">
            <h1 class="display-4">Benvenuto su Il Mio Blog</h1>
            <p class="lead">Scopri gli ultimi articoli e aggiornamenti</p>
        </header>

        <div class="row">
            <aside class="col-md-3 bg-light p-3 rounded">
                <h5>Categorie</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-decoration-none">Tecnologia</a></li>
                    <li><a href="#" class="text-decoration-none">Lifestyle</a></li>
                    <li><a href="#" class="text-decoration-none">Viaggi</a></li>
                </ul>
            </aside>
            <main class="col-md-9">
                <div id="featuredCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://picsum.photos/800/400?random=1" class="d-block w-100" alt="Articolo 1">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Articolo in evidenza 1</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis urna a augue faucibus, id ullamcorper nulla volutpat.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/800/400?random=2" class="d-block w-100" alt="Articolo 2">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Articolo in evidenza 2</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis urna a augue faucibus, id ullamcorper nulla volutpat.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/800/400?random=3" class="d-block w-100" alt="Articolo 3">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Articolo in evidenza 3</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis urna a augue faucibus, id ullamcorper nulla volutpat.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#featuredCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#featuredCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>
            </main>



            </main>
        </div>
    </div>
</x-layout>
