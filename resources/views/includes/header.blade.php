
<link rel="stylesheet" href="https://bootstraptema.ru/plugins/2016/snackbarjs/snackbar.min.css" />

<!-- Navbar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid justify-content-between">
        <!-- Left elements -->
        <ul class="navbar-nav flex-row d-none d-md-flex">
            <div class="dropdown">
                <button
                    class="btn btn-danger"
                    type="button"
                    id="dropdownMenuButton"
                    data-mdb-toggle="dropdown"
                    aria-expanded="false"
                >
                    <i class="fas fa-bars fa-2x"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item
                    {{-- 'is' -> навзание route где находится active --}}
                    @if(Route::is('homepage'))
                            active bg-danger
                    @endif
                            " href="/">Главная</a></li>
                    <li>
                        <hr class="dropdown-divider"/>
                    </li>
                    <li><a class="dropdown-item
                    @if(Route::is('product.all') || Route::is('product.single'))
                            active bg-danger
                    @endif
                    " href="{{route('product.all')}}">Все товары</a></li>
                    <li>
                        <hr class="dropdown-divider"/>
                    </li>
{{--                    <li><a class="dropdown-item" href="#">О нас</a></li>--}}
                </ul>
            </div>
        </ul>
        <div class="d-flex">
            <!-- Brand -->
            <a class="navbar-brand text-center" href="/">
                <p style="font-family: 'Ruslan Display', cursive;">FURRY KITTY</p>
            </a>

        </div>
        <!-- Left elements -->

        <!-- Center elements -->
        <!-- Search form -->
{{--        <form class="input-group w-auto my-auto d-none d-sm-flex" method="GET" action="{{route('search')}}">--}}
{{--            @csrf--}}
{{--            <input--}}
{{--                autocomplete="off"--}}
{{--                type="search"--}}
{{--                class="form-control rounded"--}}
{{--                placeholder="Search"--}}
{{--                style="min-width: 125px;"--}}
{{--                id = "search"--}}
{{--                name = "search"--}}
{{--            />--}}
{{--            <span class="input-group-text border-0 d-none d-lg-flex"--}}
{{--            ><a class="fas fa-search"></a--}}
{{--                ></span>--}}
{{--        </form>--}}
        <!-- Center elements -->

        <!-- Right elements -->
        <ul class="navbar-nav flex-row">
            <li class="nav-item me-3 me-lg-1">
                <a class="nav-link d-sm-flex align-items-sm-center" href="#"
                   id="navbarDropdownMenuLink"
                   role="button"
                   data-mdb-toggle="dropdown"
                   aria-expanded="false">
                    @if(auth()->user() != null)
                        <i class="fas fa-user"></i>
                        <strong
                            class="d-none d-sm-block ms-1 dropdown-toggle hidden-arrow">{{auth()->user()->name}}</strong>
                    @else
                        <strong class="d-none d-sm-block ms-1 dropdown-toggle hidden-arrow"><i class="fas fa-sign-in-alt"></i></strong>
                    @endif
                </a>
                <ul
                    class="dropdown-menu dropdown-menu-end"
                    aria-labelledby="navbarDropdownMenuLink"
                >
                    @if(auth()->user() != null)
{{--                        <li><a class="dropdown-item" href="#">Перейти в профиль</a></li>--}}
                        @if(is_null(auth()->user()) ? false : auth()->user()->IsAdmin)
                        <li><a class="dropdown-item" href="/admin">Админ панель</a></li>
                        @endif

                        <li>
                            <form method="POST" action="{{route('logout')}}">
                                @csrf
                                <button class="dropdown-item" type="submit">Выйти из профиля</button>
                            </form>
                        </li>

                    @else
                        <li><a class="dropdown-item"
                               href="/login">Войти</a></li>
                        <li><a class="dropdown-item" href="/register">Регистрация</a></li>
                    @endif
                </ul>
            </li>
            @if(is_null(auth()->user()) ? false : auth()->user()->IsAdmin)
            <li class="nav-item me-3 me-lg-1">
                <a
                    class="nav-link dropdown-toggle hidden-arrow"
                    href="#"
                    id="navbarDropdownMenuLink"
                    role="button"
                    data-mdb-toggle="dropdown"
                    aria-expanded="false"
                >
                    <span><i class="fas fa-plus-circle fa-lg"></i></span>
                </a>
                <ul
                    class="dropdown-menu dropdown-menu-end"
                    aria-labelledby="navbarDropdownMenuLink"
                >
                    <li><a class="dropdown-item" data-mdb-toggle="modal" data-mdb-target="#AddProductModal" href="#"
                        >Добавить товар</a></li>
{{--                    <li><a class="dropdown-item" data-mdb-toggle="modal" data-mdb-target="#AddNewsModal" href="#">Добавить--}}
{{--                            новость</a></li>--}}
                </ul>
            </li>
            @endif
            @if(auth()->user() != null)
            <li class="nav-item dropdown me-3 me-lg-1">
                <a
                    class="nav-link"
                    href="/checkout"
                >
                    <i class="fas fa-shopping-cart"></i>

{{--                    <span class="badge rounded-pill badge-notification bg-danger"></span>--}}
                </a>
                @endif
        </ul>
        <!-- Right elements -->
        <!-- Add Modal -->
        <div class="modal top fade" id="AddProductModal" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
            <div class="modal-dialog modal-lg  modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Добавить товар</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form enctype="multipart/form-data" action="{{route('product.store')}}" method="POST">
                        @csrf
                    <div class="modal-body">
                        <div class="form-outline mb-3">
                            <input type="text" name="name" id="name" class="form-control"/>
                            <label class="form-label" for="name">Название</label>
                        </div>
                        <div class="form-group quantity mb-3">
                            <select class="form-control" name="category" id="category">
                                <option>Собаки</option>
                                <option>Кошки</option>
                                <option>Грызуны</option>
                                <option>Пернатые</option>
                                <option>Рыбы</option>
                                <option>Рептилии</option>
                            </select>
                        </div>
                        <div class="form-outline mb-3">
                            <input type="text" id="price" name="price" class="form-control"/>
                            <label class="form-label" for="price">Цена</label>
                        </div>
                        <div class="form-outline mb-3">
                            <textarea class="form-control" name="description" id="description" rows="4"></textarea>
                            <label class="form-label" for="description">Описание</label>
                        </div>

                        <div class="form-outline mb-3">
                            <input type="text" id="weight" name="weight" class="form-control"/>
                            <label class="form-label" for="weight">Вес</label>
                        </div>
                        <input type="file" name="image" class="form-control" id="image"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-mdb-dismiss="modal">
                            Закрыть
                        </button>
                        <button type="button submit" class="btn btn-danger"
                                data-toggle="snackbar" data-content="Товар успешно добавлен" data-timeout=9000
                        >Добавить товар </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- AddNews Modal -->
        <div class="modal top fade" id="AddNewsModal" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
            <div class="modal-dialog modal-lg  modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Изменение</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-outline mb-3">
                            <input type="text" id="inputHeader" class="form-control"/>
                            <label class="form-label" for="inputHeader">Заголовок</label>
                        </div>
                        <div class="form-group quantity mb-3">
                            <select class="form-control">
                                <option>Акции и скидки</option>
                                <option>События</option>
                                <option>Праздники</option>
                            </select>
                        </div>
                        <div class="form-outline mb-3">
                            <textarea class="form-control" id="inputDescription" rows="4"></textarea>
                            <label class="form-label" for="inputDescription">Описание</label>
                        </div>

                        <input type="file" class="form-control" id="customFile"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-mdb-dismiss="modal">
                            Закрыть
                        </button>
                        <button type="button" class="btn btn-danger">Сохранить изменения</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- Navbar -->

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
