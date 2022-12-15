<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('shared.link-css')
</head>
{{-- background-image: url('{{ asset('assets/icon/background1.png') }}'); --}}
<body style=" width:100%;background-position:center;background-size:cover;backgrund-repeat:no-repeat;object-fit:cover; background-color:#fff;">
    @include('shared.navbar')
    @yield('main-content')
    @include('shared.link-javascript')

    @yield('javascript')
    @if(session()->get('error'))
        <script>
            iziToast.error({
                title: '',
                position: 'topRight',
                message: '{{ session()->get('error') }}',
            })
        </script>
    @endif
    @if(session()->get('success'))
        <script>
            iziToast.success({
            title: '',
            position: 'topRight',
            message: '{{ session()->get('success') }}',
        })
        </script>
    @endif
</body>
</html>