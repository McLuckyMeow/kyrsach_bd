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

    <link rel="stylesheet" href="https://bootstraptema.ru/plugins/2016/snackbarjs/snackbar.min.css" />

    <!-- MDB -->
    <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}"/>
</head>

<!--Main layout-->
@include('includes.header')


<div class="container" style="margin-top: 10.5em; margin-bottom: 20.5em">
    <div class="row">

        <div class="form-group pull-right">
            <input type="text" class="searchKey form-control" placeholder="Введите товар">
        </div>
        <span class="searchCount pull-right"></span>
        <table class="table table-hover table-bordered results">
            <thead>
            <tr>
                <th class="col-md-5 col-xs-5">Наименование</th>
                <th class="col-md-4 col-xs-4">Цена за шт</th>
                <th class="col-md-3 col-xs-3">Количество</th>
                <th class="col-md-3 col-xs-2">Сохранить</th>
                <th class="col-md-3 col-xs-2">Удалить</th>
            </tr>
            <tr class="warning no-result">
                <td colspan="4"><i class="fa fa-warning"></i> Совпадения не найдены</td>
            </tr>
            </thead>

            <tbody>
            @foreach($items as $item)
                <tr>
                    <th scope="row">{{$item->products->name}}</th>
                    <td>{{$item->products->price}}</td>
                    <form method="post" action="{{route('checkout.edit', ['basket' => $item->id])}}">
                    <td><input value="{{$item->count}}" name="count"></td>
                    <td>

                            @csrf
                            <button class="btn"><i class="fas fa-check flex-row fas fa-times mr-2"></i></button>

                    </td>
                    </form>
                    <td>
                        <form method="post" action="{{route('checkout.del', ['basket' => $item->id])}}">
                            @csrf
                            <button class="btn" data-toggle="snackbar" data-content="Товар успешно удален" data-timeout=9000><i class="fa fa-close flex-row fas fa-times mr-2"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <span class="text-success">Итог (RUB)</span>
        <strong class="text-success">{{$items->sum(function ($item){
             return $item->products->price * $item->count;})}}</strong>
        <form class="card-body" method="GET" action="{{route('checkout.check')}}">
            @csrf
            <a href="{{route('checkout.check')}}" class="btn btn-danger btn-lg btn-block {{$items->count() == 0 ? 'disabled' : ''}}"
               data-toggle="snackbar" data-content="Товар успешно оплачен" data-timeout=9000
               type="submit">Оплатить заказ</a>
        </form>
    </div>
</div>



@include('includes.footer')
</main>
<!--Main layout-->

<!-- MDB -->
<script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
<!-- Custom scripts -->
<script type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

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

<style>
    .results tr[visible='false'],
    .no-result {
        display: none;
    }

    .results tr[visible='true'] {
        display: table-row;
    }

    .searchCount {
        padding: 8px;
        color: #ccc;
    }
</style>

<script>
    function createExpr(arr) {
        var index = 0;
        var expr = [":containsiAND('" + arr[0] + "')"];
        for (var i = 1; i < arr.length; i++) {
            if (arr[i] === 'AND') {
                expr[index] += ":containsiAND('" + arr[i + 1] + "')";
                i++;
            } else if (arr[i] === 'OR') {
                index++;
                expr[index] = ":containsiOR('" + arr[i + 1] + "')";
                i++;
            }
        }
        return expr;
    }

    $(document).ready(function () {

        $(".searchKey").keyup(function () {
            var searchTerm = $(".searchKey").val().replace(/["']/g, "");
            var arr = searchTerm.split(/(AND|OR)/);
            var exprs = createExpr(arr);
            var searchSplit = searchTerm.replace(/AND/g, "'):containsiAND('").replace(/OR/g, "'):containsiOR('");

            $.extend($.expr[':'], {
                'containsiAND': function (element, i, match, array) {
                    return (element.textContent || element.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
                }
            });

            $('.results tbody tr').attr('visible', 'false');
            for (var expr in exprs) {
                $(".results tbody tr" + exprs[expr]).each(function (e) {
                    $(this).attr('visible', 'true');
                });
            }

            var searchCount = $('.results tbody tr[visible="true"]').length;

            $('.searchCount').text('Найдено совпадений ' + searchCount);
            if (searchCount == '0') {
                $('.no-result').show();
            } else {
                $('.no-result').hide();
            }
            if ($('.searchKey').val().length == 0) {
                $('.searchCount').hide();
            } else {
                $('.searchCount').show();
            }
        });
    });
</script>
