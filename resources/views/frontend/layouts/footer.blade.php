<footer class="footer bg-dark">
    <!-- Footer Top -->
    <div class="footer-top pt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-12">
                        <div class="logo">
                            <a href="#"><img src="{{ asset('imagenes/logo-esmarty-cuadrado-claro@0.5x.png') }}"
                                    alt="Logo Esmarty" width="100"></a>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere a eligendi beatae nam
                            dolores blanditiis qui necessitatibus earum facilis exercitationem sint, dicta similique
                            harum placeat vero commodi numquam, non ab.
                        </p>
                </div>

                <div class="col-lg-3 col-md-3 col-12">
                    <div>
                        <h4>Contactanos</h4>
                        <div class="contact">
                            <ul>
                                <li>Esmarty@esmarty.com</li>
                                <li>Telefono: 123123132</li>
                                <li>
                                    <a href=""><i class="fa-brands fa-instagram fa-2x"></i></a>
                                    <a href=""><i class="fa-brands fa-github fa-2x"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Top Fin -->

    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <p>Copyright © {{ date('Y') }} <a href="https://github.com/AJazure/esmarty-webapp-ecommerce"
                                target="_blank">Esmarty</a> - Todos los Derechos Reservados.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>

    var token = '{{ csrf_token() }}';
    let rutaContarItemsCarrito = '{{ route('carrito.contarItemsCarrito') }}';

</script>
<script src="{{asset('js/carrito/cant_items_carrito.js')}}"></script>