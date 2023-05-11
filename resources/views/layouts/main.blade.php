<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Уголь</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">

        <link href="/fontawesome/css/all.css" rel="stylesheet">
        <link href="/css/general.css" rel="stylesheet">
        <link href="/css/header.css" rel="stylesheet">
        <link href="/css/menu.css" rel="stylesheet">
        <link href="/css/plain-request-form.css" rel="stylesheet">
        <link href="/css/footer.css" rel="stylesheet">

        <link href="/css/dark-theme/general.css" rel="stylesheet">
        <link href="/css/dark-theme/header.css" rel="stylesheet">
        <link href="/css/dark-theme/menu.css" rel="stylesheet">
        <link href="/css/dark-theme/plain-request-form.css" rel="stylesheet">
        <link href="/css/dark-theme/footer.css" rel="stylesheet">

        @yield("css")
    </head>

    <body>
        <div class="wrapper">
            <div class="top">
                <header>
                    <div class="left">
                        <img src="/images/logo.webp" class="logo" alt="logo">
                        <span class="description">Достаквка угля и древесины</span>
                    </div>

                    <div class="right">
                        <span class="schedule">Пн.-Пт.</span>

                        <span class="whatsapp">
                            <a href="tel:89963900000" class="whatsapp-icon icon"><i class="fa-brands fa-whatsapp"></i></a>
                        </span>

                        <span class="telegram">
                            <a href="tel:89963900000" class="telegram-icon icon"><i class="fa-brands fa-telegram"></i></i></a>
                        </span>

                        <span class="phone">
                            <!--<a href="tel:89963900000" class="phone-icon icon"><i class="fa-solid fa-phone"></i></a>-->
                            <a href="tel:89963900000" class="phone-number">8 (996) 390-00-00</a>
                        </span>

                        <button class="order-call">Заказать звонок</button>

                        <span class="dark-mode">
                            <!--<button class="dark-mode-icon icon"><i class="fa-solid fa-sun"></i></button>-->
                            <button class="dark-mode-icon icon"><i class="fa-solid fa-moon"></i></button>
                        </span>
                    </div>
                </header>

                <div class="header-separator-wrapper"><hr class="header-separator"></div>

                <nav class="main-menu">
                    <ul class="link-list">
                        <li class="item"><a class="link" href="/">Главная</a></li>
                        <li class="item"><a class="link" href="/catalog">Каталог</a></li>
                        <li class="item"><a class="link" href="/catalog/coal">Уголь</a></li>
                        <li class="item"><a class="link" href="/catalog/firewood">Дрова</a></li>
                    </ul>

                    <ul class="link-list">
                        <li class="item contact-link"><a class="link" href="/contacts">Контакты</a></li>
                    </ul>

                    <!--<div class="search"><i class="fa-solid fa-magnifying-glass"></i></div>-->
                </nav>

                <div class="header-separator-wrapper"><hr class="header-separator"></div>

                @yield("breadcrumbs")

                @yield("main-slider")

                <div class="content">
                @yield("content", "Скоро здесь будет контент")
                </div>
            </div>

            <footer>
                <div class="footer">
                    <div class="wrapper">
                        <div class="top">
                            <div class="left">
                            </div>

                            <div class="right">
                                <span class="whatsapp">
                                    <a href="tel:89963900000" class="whatsapp-icon icon"><i class="fa-brands fa-whatsapp"></i></a>
                                </span>
                                <span class="telegram">
                                    <a href="tel:89963900000" class="telegram-icon icon"><i class="fa-brands fa-telegram"></i></i></a>
                                </span>
                                <span class="phone">
                                    <!--<a href="tel:89963900000" class="phone-icon icon"><i class="fa-solid fa-phone"></i></a>-->
                                    <a href="tel:89963900000" class="phone-number">8 (996) 390-00-00</a>
                                </span>

                                <button class="order-call">Заказать звонок</button>
                            </div>
                        </div>

                        <div class="footer-separator-wrapper"><hr class="footer-separator"></div>

                        <nav class="bottom main-menu footer-menu">
                            <ul class="link-list">
                                <li class="item"><a class="link" href="/catalog/coal">Уголь</a></li>
                                <li class="item"><a class="link" href="/catalog/firewood">Дрова</a></li>
                            </ul>

                            <ul class="link-list">
                                <li class="item contact-link"><a class="link" href="/contacts">Контакты</a></li>
                            </ul>

                            <!--<div class="search"><i class="fa-solid fa-magnifying-glass"></i></div>-->
                        </nav>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
