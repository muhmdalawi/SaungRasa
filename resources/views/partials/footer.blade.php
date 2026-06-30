<footer class="sr-footer">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4">
                <h5 class="d-flex align-items-center mb-3">
                    <img src="{{ asset('assets/logo.png') }}" alt="Saung Rasa" style="height:40px;margin-right:10px;">
                    Saung Rasa
                </h5>
                <p class="small">
                    Saung Rasa menghadirkan cita rasa autentik makanan dan minuman khas Sunda dengan sentuhan
                    modern, profesional, dan elegan untuk pengalaman bersantap yang berkesan.
                </p>
            </div>
            <div class="col-lg-4">
                <h5 class="mb-3">Tautan</h5>
                <ul class="list-unstyled small">
                    <li class="mb-2"><a href="{{ route('home') }}">Home</a></li>
                    <li class="mb-2"><a href="{{ route('home') }}#produk">Katalog Produk</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <h5 class="mb-3">Kontak</h5>
                <ul class="list-unstyled small">
                    <li class="mb-2"><i class="bi bi-geo-alt me-2"></i>Jl. Raya Saung Rasa No. 10, Bogor</li>
                    <li class="mb-2"><i class="bi bi-telephone me-2"></i>082327686584</li>
                    <li class="mb-2"><i class="bi bi-envelope me-2"></i>halo@saungrasa.id</li>
                </ul>
            </div>
        </div>
        <hr class="border-secondary mt-4 mb-3" style="opacity:.2;">
        <p class="small text-center mb-0">&copy; {{ date('Y') }} Saung Rasa. Seluruh hak cipta dilindungi. - by:
            alawi</p>
    </div>
</footer>
