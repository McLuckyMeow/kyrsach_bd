<!DOCTYPE html>
<html  >
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>FURRY KITTY</title>
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
</head>

<body>
@include('includes.header')

<h1 class="text-center mt-5">Список пользователей</h1>

<div class="container" style="margin-top: 5.5em; margin-bottom: 25.5em">
    <div class="row">

        <div class="form-group pull-right">
            <input type="text" class="searchKey form-control" placeholder="Введите информацию">
        </div>
        <span class="searchCount pull-right"></span>
        <table class="table table-hover table-bordered results">
            <thead>
            <tr>
                <th>ID</th>
                <th class="col-md-5 col-xs-5">Имя</th>
                <th class="col-md-4 col-xs-4">Email</th>
                <th class="col-md-3 col-xs-3">Уровень прав</th>
                <th class="col-md-3 col-xs-2">Дата регистрации</th>
                <th class="col-md-3 col-xs-2">Функция</th>
            </tr>
            <tr class="warning no-result">
                <td colspan="4"><i class="fa fa-warning"></i> Совпадения не найдены</td>
            </tr>
            </thead>

            <tbody>
            @foreach($items as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->IsAdmin}}</td>
                <td>{{$item->created_at}}</td>
                <td><form method="post" action="{{route('admin.delete', ['user'=>$item->id])}}">
                    @csrf
                    <span class="table-remove"><button type="button submit" class="btn btn-danger btn-rounded btn-sm my-1">Удалить</button></span>
                </form></td>
            </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>

@include('includes.footer')

<!-- MDB -->
<script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
<!-- Custom scripts -->
<script type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

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
    $(document).ready(function() {

        $(".searchKey").keyup(function() {
            var searchTerm = $(".searchKey").val().replace(/["']/g, "");
            var arr = searchTerm.split(/(AND|OR)/);
            var exprs = createExpr(arr);
            var searchSplit = searchTerm.replace(/AND/g, "'):containsiAND('").replace(/OR/g, "'):containsiOR('");

            $.extend($.expr[':'], {
                'containsiAND': function(element, i, match, array) {
                    return (element.textContent || element.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
                }
            });

            $('.results tbody tr').attr('visible', 'false');
            for (var expr in exprs) {
                $(".results tbody tr" + exprs[expr]).each(function(e) {
                    $(this).attr('visible', 'true');
                });
            }

            var searchCount = $('.results tbody tr[visible="true"]').length;

            $('.searchCount').text('Найдено совпадений ' + searchCount );
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

</body>
</html>

