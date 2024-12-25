<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Редактирование товара</title>
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
<!-- Edit Modal -->
<div class="modal-dialog modal-lg  modal-dialog-centered" style="margin-top: 10.5em; margin-bottom: 25.5em">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Изменение</h5>
        </div>
        <form enctype='multipart/form-data' method="POST" action="{{route('product.edit', ['product' => $product->id])}}">
            @csrf
            <div class="modal-body">
                <div class="form-outline mb-3">
                    <input type="text" id="name" name="name" class="form-control" value="{{$product->name}}"/>
                    <label class="form-label" for="name">Название</label>
                </div>
                <div class="form-group quantity mb-3">
                    <select name="category" class="form-control">
                        <option @if($product->category == "Собаки") selected="selected" @endif>Собаки</option>
                        <option @if($product->category == "Кошки") selected="selected" @endif>Кошки</option>
                        <option @if($product->category == "Грызуны") selected="selected" @endif>Грызуны</option>
                        <option @if($product->category == "Пернатые") selected="selected" @endif>Пернатые</option>
                        <option @if($product->category == "Рыбы") selected="selected" @endif>Рыбы</option>
                        <option @if($product->category == "Рептилии") selected="selected" @endif>Рептилии</option>
                    </select>
                </div>
                <div class="form-outline mb-3">
                    <input type="text" id="price" name="price" class="form-control" value="{{$product->price}}"/>
                    <label class="form-label" for="price">Цена</label>
                </div>
                <div class="form-outline mb-3">
                    <input type="text" id="old_price" name="old_price" class="form-control" value="{{$product->old_price}}"/>
                    <label class="form-label" for="old_price">Старая цена (если есть)</label>
                </div>
                <div class="form-outline mb-3">
                    <textarea class="form-control" id="description" name="description" rows="4">{{$product->description}}</textarea>
                    <label class="form-label" for="description">Описание</label>
                </div>

                <div class="form-outline mb-3">
                    <input type="text" id="weight" name="weight" class="form-control" value="{{$product->weight}}"/>
                    <label class="form-label" for="weight">Вес</label>
                </div>

                <input type="file" class="form-control" id="image" name="image" />
            </div>
            <div class="modal-footer">
                <a href="{{route('product.all')}}" type="button" class="btn btn-outline-primary" data-mdb-dismiss="modal">
                    Закрыть
                </a>
                <button type="submit" class="btn btn-danger"
                        data-toggle="snackbar" data-content="Товар успешно изменен" data-timeout=9000
                >Сохранить изменения</button>
            </div>
        </form>
    </div>
</div>
@include('includes.footer')

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
</body>
</html>
