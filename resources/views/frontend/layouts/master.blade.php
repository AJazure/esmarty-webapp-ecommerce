<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/paginaPrincipal.css') }}">
    <script src="https://kit.fontawesome.com/88816cb6bd.js" crossorigin="anonymous"></script>
</head>

<body>

    @include('frontend.layouts.header')

    @yield('main-content')

    @include('frontend.layouts.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#searchButton').click(search);

            $('#busquedaInput').keydown(function(event) {
                if (event.which === 13) {
                    search();
                }
            });

            function search() {
                // Obtén el valor de búsqueda
                var searchTerm = $('#busquedaInput').val().trim();

                // Si el término de búsqueda no está vacío, redirige a la página de resultados
                if (searchTerm !== '') {
                    window.location.href = '/resultados?search=' + searchTerm;
                }
            }
        });
    </script>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            window.addEventListener('scroll', function() {
                var header = document.querySelector('.navbar');
                header.classList.toggle('scrolled', window.scrollY > 0);
            });
        });
    </script>

    <script>
        // Añade este script para actualizar el valor en tiempo real
        var precioRange = document.getElementById('precio_range');
        var selectedPrice = document.getElementById('selected_price');

        precioRange.addEventListener('input', function() {
            selectedPrice.value = precioRange.value;
        });
    </script>

</body>

</html>
