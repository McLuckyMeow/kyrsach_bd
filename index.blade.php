<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <title>FURRY KITTY</title>
    <!-- MDB icon -->
    <link rel="icon" href="{{asset('img/mdb-favicon.ico')}}" type="image/x-icon"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css"/>
    <!-- Google Fonts Roboto -->
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
    />


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <!-- MDB -->
    <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}"/>
</head>

<body>

@include('resources.views.includes.header')


<hr class="mt-0 mb-4">
<div class="col-xs-12 marquee m-2"><span>АКЦИЯ: СКИДКИ НА ВЕСЬ ИНВЕНТАРЬ ДЛЯ ПЕРНАТЫХ</span></div>
<h1 class="mb-3 h1 text-center">Выбирайте товар по <span class="badge bg-danger"
                                                         style="font-family: 'Ruslan Display', cursive;">категориям</span>
</h1>

<div class="row row-cols-1 row-cols-md-2 g-4">
    <div class="col">
        <div class="card">
            <img
                src="/img/banner_cat.jpg"
                class="card-img-top"
                alt="..."
            />
            <a href="/product?category=Кошки">
                <div class="mask" style="background-color: rgba(0, 0, 0, 0.4)">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <p class="text-white mb-0 fs-2"><strong
                                style="font-family: 'Russo One', sans-serif;">Кошки</strong></p>
                    </div>
                </div>
                <div class="hover-overlay">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <img
                src="/img/banner_dog.jpg"
                class="card-img-top"
                alt="..."
            />
            <a href="/product?category=Собаки">
                <div class="mask" style="background-color: rgba(0, 0, 0, 0.4)">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <p class="text-white mb-0 fs-2"><strong
                                style="font-family: 'Russo One', sans-serif;">Собаки</strong></p>
                    </div>
                </div>
                <div class="hover-overlay">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <img
                src="img/banner_parrot.jpg"
                class="card-img-top"
                alt="..."
            />
            <a href="/product?category=Пернатые">
                <div class="mask" style="background-color: rgba(0, 0, 0, 0.4)">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <p class="text-white mb-0 fs-2"><strong
                                style="font-family: 'Russo One', sans-serif;">Пернатые</strong></p>
                    </div>
                </div>
                <div class="hover-overlay">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <img
                src="/img/banner_hamster.jpg"
                class="card-img-top"
                alt="..."
            />
            <a href="/product?category=Грызуны">
                <div class="mask" style="background-color: rgba(0, 0, 0, 0.4)">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <p class="text-white mb-0 fs-2"><strong
                                style="font-family: 'Russo One', sans-serif;">Грызуны</strong></p>
                    </div>
                </div>
                <div class="hover-overlay">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <img
                src="img/banner_fish.jpg"
                class="card-img-top"
                alt="..."
            />
            <a href="/product?category=Рыбы">
                <div class="mask" style="background-color: rgba(0, 0, 0, 0.4)">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <p class="text-white mb-0 fs-2"><strong
                                style="font-family: 'Russo One', sans-serif;">Рыбы</strong></p>
                    </div>
                </div>
                <div class="hover-overlay">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <img
                src="/img/banner_reptile.jpg"
                class="card-img-top"
                alt="..."
            />
            <a href="/product?category=Рептилии">
                <div class="mask" style="background-color: rgba(0, 0, 0, 0.4)">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <p class="text-white mb-0 fs-2"><strong
                                style="font-family: 'Russo One', sans-serif;">Рептилии</strong></p>
                    </div>
                </div>
                <div class="hover-overlay">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                </div>
            </a>
        </div>
    </div>
</div>


<h1 class="mb-5 mt-5 h3 text-center">Почему именно <span class="badge bg-danger"
                                                         style="font-family: 'Ruslan Display', cursive;">МЫ</span></h1>


<!-- According -->

<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingOne">
            <button
                class="accordion-button collapsed"
                type="button"
                data-mdb-toggle="collapse"
                data-mdb-target="#flush-collapseOne"
                aria-expanded="false"
                aria-controls="flush-collapseOne"
            >
                Самые выгодные цены.
            </button>
        </h2>
        <div
            id="flush-collapseOne"
            class="accordion-collapse collapse"
            aria-labelledby="flush-headingOne"
            data-mdb-parent="#accordionFlushExample"
        >
            <div class="accordion-body">
                Мы регулярно следим за уровнем цен, поддерживая стоимость зоотоваров самой выгодной для Вас.
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingTwo">
            <button
                class="accordion-button collapsed"
                type="button"
                data-mdb-toggle="collapse"
                data-mdb-target="#flush-collapseTwo"
                aria-expanded="false"
                aria-controls="flush-collapseTwo"
            >
                Свежая продукция.
            </button>
        </h2>
        <div
            id="flush-collapseTwo"
            class="accordion-collapse collapse"
            aria-labelledby="flush-headingTwo"
            data-mdb-parent="#accordionFlushExample"
        >
            <div class="accordion-body">
                Качество корма зависит от даты окончания срока годности! В нашем магазине только самый свежий корм от
                официальных дистрибьютеров!
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingThree">
            <button
                class="accordion-button collapsed"
                type="button"
                data-mdb-toggle="collapse"
                data-mdb-target="#flush-collapseThree"
                aria-expanded="false"
                aria-controls="flush-collapseThree"
            >
                Широкий ассортимент.
            </button>
        </h2>
        <div
            id="flush-collapseThree"
            class="accordion-collapse collapse"
            aria-labelledby="flush-headingThree"
            data-mdb-parent="#accordionFlushExample"
        >
            <div class="accordion-body">
                Полный ассортиментный перечень нашего магазина включает в себя более 16500 наименований кормов и товаров
                для животных.
            </div>
        </div>
    </div>
</div>

@include('includes.footer')

<!-- MDB -->
<script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
<!-- Custom scripts -->
<script type="text/javascript"></script>

<style>
    body p {
        font-family: "DublonC"
    }

    @-webkit-keyframes scroll {
        0% {
            -webkit-transform: translate(0, 0);
            transform: translate(0, 0);
        }
        100% {
            -webkit-transform: translate(-100%, 0);
            transform: translate(-100%, 0)
        }
    }

    @keyframes scroll {
        0% {
            transform: translate(0, 0);
        }
        100% {
            transform: translate(-100%, 0)
        }
    }

    .marquee {
        max-width: 100%;
        white-space: nowrap;
        overflow: hidden;
    }

    .marquee * {
        display: inline-block;
        padding-left: 100%;
        -webkit-animation: scroll 21s infinite linear;
        animation: scroll 21s infinite linear;
    }

    .marquee *:hover {
        -webkit-animation-play-state: paused;
        animation-play-state: paused;
    }
</style>
</body>
</html>



