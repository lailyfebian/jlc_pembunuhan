<nav class="navbar navbar-expand-lg navbar-light navbar-custom fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/logo-header.webp') }}"alt="Logo Justicia Legal Counsel">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse"
             id="navbar">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/') }}">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Layanan</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ url('/#arbitrase') }}">Arbitrase</a></li>
                        <li><a class="dropdown-item" href="{{ url('/#corporate') }}">Corporate & Business</a></li>
                        <li><a class="dropdown-item" href="{{ url('/#keluarga') }}">Hukum Keluarga</a></li>
                        <li><a class="dropdown-item" href="{{ url('/#pajak') }}">Hukum Pajak</a></li>
                        <li><a class="dropdown-item" href="{{ url('/#tun') }}">Hukum Tata Usaha Negara (TUN)</a></li>
                        <li><a class="dropdown-item" href="{{ url('/#notaris') }}">Jasa Notaris & PPAT</a></li>
                        <li><a class="dropdown-item" href="#{{ url('/#perdata') }}">Litigasi Perdata</a></li>
                        <li><a class="dropdown-item" href="{{ url('/#pidana') }}">Litigasi Pidana</a></li>
                        <li><a class="dropdown-item" href="{{ url('/#perizinan') }}">Perizinan Usaha</a></li>
                        <li><a class="dropdown-item" href="{{ url('/#upaya-hukum') }}">Upaya Hukum</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('#tim-kami') }}">Tim Kami</a>
                </li>
                <!--<li class="nav-item">-->
                <!--    <a class="nav-link" href="#">Testimoni</a>-->
                <!--</li>-->
                <!--<li class="nav-item">-->
                <!--    <a class="nav-link" href="#">Artikel</a>-->
                <!--</li>-->
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('#kontak') }}">Kontak</a>
                </li>
            </ul>
            <a href="https://wa.lawfirm-jlc.com/" class="btn btn-consult">Konsultasi Sekarang
                <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</nav>