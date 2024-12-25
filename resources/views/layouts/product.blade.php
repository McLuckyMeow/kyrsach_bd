<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Товары</title>
    <!-- MDB icon -->
    <link rel="icon" href="{{asset('img/mdb-favicon.ico')}}" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
    />

    <link rel="stylesheet" href="https://bootstraptema.ru/plugins/2016/snackbarjs/snackbar.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    <!-- MDB -->
    <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}" />
</head>
<body>
@include('includes.header')


<!-- Card -->
<div class="container">


    <div class="row gx-5 justify-content-center">
        <table class="table table-hover table-bordered results">

            @foreach($items as $item)
            <div class="col-lg-3 col-md-6 mt-5">
                        <div class="card position-relative position-relative-example" style="width: 18rem">
                            <div class="position-absolute top-5 end-0 rounded text-white bg-color bg-primary w-50 text-center">{{$item->category}}</div>
{{--                            <img--}}
{{--                                src="/img/{{$item->image}}"--}}
{{--                                class="card-img-top"--}}
{{--                                alt="..."--}}
{{--                            />--}}
                            <img src="{{$item->image_url}}" style="overflow:hidden; height:320px; width:170px; border-radius:10%; margin: 20%" class="card-img-top"/>
                            <div class="card-body">
                                <h5><a href="{{route('product.single',['product'=>$item->id])}}" class="d-inline-block card-title text-truncate text-dark" style="max-width: 250px">{{$item->name}}</a></h5>
                                <p class="card-text text-truncate" style="max-width: 350px">
                                    {{$item->description}}
                                </p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Вес: {{$item->weight}} г.</li>
                                @if(is_null($item->old_price))
                                    <li class="list-group-item">Цена: {{$item->price}} руб.</li>
                                @else
                                    <li class="list-group-item">Цена: {{$item->price}} руб.</li>
                                    <li class="list-group-item g">Старая цена: <a class="text-decoration-line-through text-warning">{{$item->old_price}} руб.</a></li>

                                @endif

                            </ul>

                            <div class="card-body">
                                <form method="post" action="{{route('checkout.buy')}}">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$item->id}}">
{{--                                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">--}}
                                    <input type="hidden" name="count" value="1">
                                <button data-toggle="snackbar" data-content="Товар успешно добавлен в корзину" data-timeout=9000
                                        type="submit" class="btn btn-outline-danger mb-2 w-100 hover-shadow {{auth()->user() == null? "disabled" : ""}}" data-mdb-ripple-color="#000000">
                                        Добавить в корзину </button>
                                </form>
                                <!-- Button add modal -->

{{--                                {{dd(is_null(auth()->user()) ?: auth()->user())}}--}}
                                @if(is_null(auth()->user()) ? false : auth()->user()->IsAdmin)
                                <form method="post" action="{{route('product.delete', ['product'=>$item->id])}}">
                                    @csrf
                                    <a class="btn btn-outline-primary mb-2"
                                       href="{{route('product.edit_view', ['product' => $item->id])}}">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <button type="button submit" class="btn btn-outline-primary mb-2" data-mdb-ripple-color="#000000"
                                            data-toggle="snackbar" data-content="Товар успешно удален" data-timeout=9000>
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                @endif

                            </div>
                        </div>
                </div>
            @endforeach
        </table>
<hr class="my-5">
        </div>
</div>
<!-- Padding -->

<nav class="d-flex justify-content-center wow fadeIn">
    <ul class="pagination pg-blue">
        <li class="page-item">
            <a href="" class="page-link" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        @for($i=1;$i<=$items->lastPage();$i++)
        <li class="page-item @if($i == $items->currentPage()) active @endif">
            <a href="{{url()->current()."?page=".$i}}" class="page-link" aria-label="Previous">
                <span aria-hidden="true">{{$i}}</span>
            </a>
        </li>
        @endfor
        <li class="page-item">
            <a href="" class="page-link" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>




<!-- MDB -->
<script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
<!-- Custom scripts -->
<script type="text/javascript"></script>

<script src="https://bootstraptema.ru/plugins/jquery/jquery-1.11.3.min.js"></script>
<script src="https://bootstraptema.ru/plugins/2016/snackbarjs/snackbar.min.js"></script>
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







@include('includes.footer')
</body>
</html>
