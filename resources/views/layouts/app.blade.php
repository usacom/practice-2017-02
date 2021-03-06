<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<div id="app">
    <br>
    @yield('content')
</div>
<div>
    {{--<p>--}}
        {{--Идейные соображения высшего порядка, а также рамки и место обучения кадров влечет за собой процесс внедрения и--}}
        {{--модернизации системы обучения кадров, соответствует насущным потребностям. Товарищи! сложившаяся структура--}}
        {{--организации влечет за собой процесс внедрения и модернизации систем массового участия. Таким образом--}}
        {{--консультация с широким активом требуют определения и уточнения направлений прогрессивного развития.--}}
    {{--</p>--}}
    {{--<p>--}}
        {{--Таким образом дальнейшее развитие различных форм деятельности способствует подготовки и реализации позиций,--}}
        {{--занимаемых участниками в отношении поставленных задач. Идейные соображения высшего порядка, а также постоянное--}}
        {{--информационно-пропагандистское обеспечение нашей деятельности представляет собой интересный эксперимент проверки--}}
        {{--соответствующий условий активизации. Равным образом рамки и место обучения кадров требуют определения и--}}
        {{--уточнения направлений прогрессивного развития. Задача организации, в особенности же новая модель организационной--}}
        {{--деятельности представляет собой интересный эксперимент проверки направлений прогрессивного развития. Товарищи!--}}
        {{--консультация с широким активом обеспечивает широкому кругу (специалистов) участие в формировании существенных--}}
        {{--финансовых и административных условий. Равным образом консультация с широким активом требуют определения и--}}
        {{--уточнения форм развития.--}}
    {{--</p>--}}
    {{--<p>--}}
        {{--Равным образом укрепление и развитие структуры в значительной степени обуславливает создание систем массового--}}
        {{--участия. Идейные соображения высшего порядка, а также консультация с широким активом играет важную роль в--}}
        {{--формировании модели развития. Товарищи! начало повседневной работы по формированию позиции играет важную роль в--}}
        {{--формировании форм развития. Идейные соображения высшего порядка, а также укрепление и развитие структуры требуют--}}
        {{--от нас анализа позиций, занимаемых участниками в отношении поставленных задач. Равным образом рамки и место--}}
        {{--обучения кадров требуют определения и уточнения системы обучения кадров, соответствует насущным потребностям.--}}
        {{--Товарищи! дальнейшее развитие различных форм деятельности требуют от нас анализа позиций, занимаемых участниками--}}
        {{--в отношении поставленных задач.--}}
    {{--</p>--}}
</div>
<!-- Scripts -->
{{--<script src="/js/app.js"></script>--}}
<script src="http://localhost:8080/js/app.js"></script>
</body>
</html>
