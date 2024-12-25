<head>
    <!-- MDB icon -->
    <link rel="icon" href="{{asset('img/mdb-favicon.ico')}}" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}" />

    <link rel="stylesheet" href="https://bootstraptema.ru/plugins/2016/snackbarjs/snackbar.min.css" />
    <link rel="stylesheet" href="https://bootstraptema.ru/plugins/2016/b-magnify/bootstrap-magnify.min.css" />

</head>


<body>
<title>{{$product->name}}</title>
@include('includes.header')
<div class="container my-5 py-5 z-depth-1" style="height: 45rem">


    <!--Section: Content-->
    <section class="text-center">

        <!-- Section heading -->
        <h3 class="font-weight-bold mb-5">Товар из категории <p class="badge bg-danger">{{$product->category}}</p></h3>

        <div class="row">

            <div class="col-lg-6">

                <!--Carousel Wrapper-->
                <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">

                    <!--Slides-->
                    <div class="carousel-inner text-center text-md-left" role="listbox">
                        <div class="carousel-item active">
                            <img src="{{$product->image_url}}"
                                 alt="First slide" class="img-fluid"
                                 data-toggle="magnify"

                                 style="overflow:hidden; height:400px; width:250px;">
                        </div>
                    </div>
                    <!--/.Slides-->

                    <!--Thumbnails-->
                    <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    <!--/.Thumbnails-->
                </div>
                <!--/.Carousel Wrapper-->
            </div>
            <div class="col-lg-5 text-center text-md-left">
                <h3 class="h3-responsive text-center text-md-left product-name font-weight-bold dark-grey-text mb-1 ml-xl-0 ml-4">
                    <strong>{{$product->name}}</strong>
                </h3>
                <span class="badge badge-danger product mb-4 ml-xl-0 ml-4">bestseller</span>
                <h3 class="h3-responsive text-center text-md-left mb-5 ml-xl-0 ml-4">
                    @if(is_null($product->old_price))
                        <span class="red-text font-weight-bold">
            <strong>{{$product->price}} руб.</strong>
          </span>
                    @else
                        <span class="red-text font-weight-bold ">
            <strong>{{$product->price}} руб.</strong>
          </span>


                        <span class="text-warning text-decoration-line-through">
            <small>
              <p>{{$product->old_price}} руб.</p>
            </small>
          </span>
                    @endif


                </h3>


                <!--Accordion wrapper-->
                <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

                    <!-- Accordion card -->
                    <div class="card">

                        <!-- Card header -->
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
                                    Описание
                                </button>
                            </h2>
                            <div
                                id="flush-collapseTwo"
                                class="accordion-collapse collapse"
                                aria-labelledby="flush-headingTwo"
                                data-mdb-parent="#accordionFlushExample"
                            >
                                <div class="accordion-body">
                                    {{$product->description}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.Accordion wrapper-->

                    <!-- Add to Cart -->
                    <section class="color">
                        <div class="mt-5">
                            @if(!is_null(auth()->user()))
                            <p class="grey-text">Выберите количество</p>

                            <form method="post" action="{{route('checkout.buy')}}">
                                @csrf
                                <div class="row text-center text-md-left">
                                    <div class="form-group quantity">
                                        <select name="count" class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>
                                <input hidden value="{{$product->id}}" name="product_id"/>
                                <input hidden value="{{auth()->user()->id}}" name="user_id"/>
                                <div class="row mt-3">
                                    <div class="col-md-12 text-center text-md-left text-md-right">
                                        <button class="btn btn-danger" data-toggle="snackbar" data-content="Товар успешно добавлен в корзину" data-timeout=9000>
                                            <i class="fas fa-cart-plus mr-2 " aria-hidden="true"></i> Добавить в корзину
                                        </button>
                                    </div>
                                </div>
                            </form>
                                @endif
                        </div>
                    </section>
                    <!-- /.Add to Cart -->

                </div>

            </div>

        </div>
    </section>
    <!--Section: Content-->


</div>
@include('includes.footer')
</body>

<style>
    /* Стили подсказки по умолчанию */
    .snackbar {
        background-color: #F93154;
        color: #FFFFFF;
        font-size: 14px;
        border-radius: 2px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        height: 0;
        -moz-transition: -moz-transform 0.2s ease-in-out, opacity 0.2s ease-in, height 0 linear 0.2s, padding 0 linear 0.2s, height 0 linear 0.2s;
        -webkit-transition: -webkit-transform 0.2s ease-in-out, opacity 0.2s ease-in, height 0 linear 0.2s, padding 0 linear 0.2s, height 0 linear 0.2s;
        transition: transform 0.2s ease-in-out, opacity 0.2s ease-in, height 0 linear 0.2s, padding 0 linear 0.2s, height 0 linear 0.2s;
        -moz-transform: translateY(200%);
        -webkit-transform: translateY(200%);
        transform: translateY(200%);
    }
    .snackbar.snackbar-opened {
        padding: 14px 15px;
        margin-bottom: 20px;
        height: auto;
        -moz-transition: -moz-transform 0.2s ease-in-out, opacity 0.2s ease-in, height 0 linear 0.2s;
        -webkit-transition: -webkit-transform 0.2s ease-in-out, opacity 0.2s ease-in, height 0 linear 0.2s;
        transition: transform 0.2s ease-in-out, opacity 0.2s ease-in, height 0 linear 0.2s, height 0 linear 0.2s;
        -moz-transform: none;
        -webkit-transform: none;
        transform: none;
    }
    .snackbar.toast {
        border-radius: 200px;
    }
</style>

<!-- MDB -->
<script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
<!-- Custom scripts -->
<script type="text/javascript"></script>
<script src="https://bootstraptema.ru/plugins/jquery/jquery-1.11.3.min.js"></script>
<script src="https://bootstraptema.ru/plugins/2016/snackbarjs/snackbar.min.js"></script>
<script src="https://bootstraptema.ru/plugins/2016/b-magnify/bootstrap-magnify.min.js"></script>

