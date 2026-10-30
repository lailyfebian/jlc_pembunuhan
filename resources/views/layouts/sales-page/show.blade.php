@extends('layouts.generic')

@section('head')
@if ($page->title ?? '')
    <title>{{ $page->title ?: $keyword->name ?? 'Justicia Legal Counsel | Platform Lawyer & Pengacara Terbaik' }}
    </title>
    <link rel="canonical" href="{{ url()->current() }}" />
    <meta name="description"
        content="{{ $page->meta_description ?: $keyword->name ?: 'Justicia Legal Counsel membantu Anda menemukan lawyer dan pengacara profesional untuk konsultasi hukum, litigasi, bisnis, keluarga, dan berbagai kebutuhan hukum lainnya.' }}" />
    <meta name="keywords" content="{{ $keyword->name ?: '' }} {{ $region->name ?? '' }}">
    <meta property="og:locale" content="id" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $page->title ?: $keyword->name ?: '' }}" />
    <meta property="og:description"
        content="{{ $page->meta_description ?: $keyword->name ?: 'Justicia Legal Counsel membantu Anda menemukan lawyer dan pengacara profesional untuk konsultasi hukum, litigasi, bisnis, keluarga, dan berbagai kebutuhan hukum lainnya.' }}" />
    <meta property="og:site_name" content="{{ $keyword->name ?? '' }}" />
    <meta property="og:image" content="{{ asset('images/hero-image.webp') }}" />
    <meta property="og:image:width" content="1280" />
    <meta property="og:image:height" content="720" />
    <meta property="og:image:type" content="image/webp" />
    <meta name="twitter:card" content="{{ $keyword->name ?? '' }}">
    <meta name="twitter:title" content="{{ $page->title ?? ($keyword->name ?? '') }}">
    <meta name="twitter:description"
        content="{{ $page->meta_description ?: $keyword->name ?: 'Justicia Legal Counsel membantu Anda menemukan lawyer dan pengacara profesional untuk konsultasi hukum, litigasi, bisnis, keluarga, dan berbagai kebutuhan hukum lainnya.' }}">
    <meta name="twitter:image" content="{{ asset('images/hero-image.webp') }}">
    <meta name="twitter:url" content="{{ url()->current() }}">
@else
    <title>{{ $page->title ?: $keyword->name ?? 'Justicia Legal Counsel | Platform Lawyer & Pengacara Terbaik' }} di
        {{ $region->name ?? '' }}</title>
    <link rel="canonical" href="{{ url()->current() }}" />
    <meta name="description"
        content="{{ $page->meta_description ?: $keyword->name ?: 'Justicia Legal Counsel membantu Anda menemukan lawyer dan pengacara profesional untuk konsultasi hukum, litigasi, bisnis, keluarga, dan berbagai kebutuhan hukum lainnya.' }} di {{ $region->name ?? '' }}" />
    <meta name="keywords" content="{{ $keyword->name ?? '' }} di {{ $region->name ?? '' }}">
    <meta property="og:locale" content="id" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $page->title ?: $keyword->name ?: '' }} di {{ $region->name ?? '' }}" />
    <meta property="og:description"
        content="{{ $page->meta_description ?: $keyword->name ?: 'Justicia Legal Counsel membantu Anda menemukan lawyer dan pengacara profesional untuk konsultasi hukum, litigasi, bisnis, keluarga, dan berbagai kebutuhan hukum lainnya.' }} di {{ $region->name ?? '' }}" />
    <meta property="og:site_name" content="{{ $keyword->name ?? '' }}" />
    <meta property="og:image" content="{{ asset('images/hero-image.webp') }}" />
    <meta property="og:image:width" content="1280" />
    <meta property="og:image:height" content="720" />
    <meta property="og:image:type" content="image/webp" />
    <meta name="twitter:card" content="{{ $keyword->name ?? '' }} di {{ $region->name ?? '' }}">
    <meta name="twitter:title" content="{{ $page->title ?? ($keyword->name ?? '') }} di {{ $region->name ?? '' }}">
    <meta name="twitter:description"
        content="{{ $page->meta_description ?: $keyword->name ?: 'Justicia Legal Counsel membantu Anda menemukan lawyer dan pengacara profesional untuk konsultasi hukum, litigasi, bisnis, keluarga, dan berbagai kebutuhan hukum lainnya.' }} di {{ $region->name ?? '' }}">
    <meta name="twitter:image" content="{{ asset('images/hero-image.webp') }}">
    <meta name="twitter:url" content="{{ url()->current() }}">
@endif
@endsection

@section('content')
    <section class="hero-section">

        <div class="container">
            <div class="row align-items-center gy-5">
                <div class="col-lg-7 hero-content">
                    <span class="hero-badge">
                        JUSTICIA LEGAL COUNSEL
                    </span>
                    <h1>
                        <h1>
                            @if ($page->title ?? '')
                                {{ $page->title ?? '' }}
                            @else
                                {{ $keyword->name ?? '' }} {{ $region->name ?? '' }}
                            @endif
                        </h1>
                    </h1>
                    <p>
                        Justicia Legal Counsel membantu Anda mendapatkan layanan lawyer profesional yang tepat untuk menangani berbagai kebutuhan hukum, mulai dari sengketa perdata, pidana, hukum keluarga, ketenagakerjaan, bisnis, hingga pendampingan perusahaan. Kami menghubungkan Anda dengan advokat berpengalaman yang siap memberikan solusi hukum secara cepat, profesional, dan terpercaya.
                    </p>
                    <p>
                        Setiap persoalan hukum membutuhkan penanganan yang tepat. Dengan Justicia Legal Counsel, Anda dapat berkonsultasi dengan pengacara sesuai bidang keahlian, memperoleh strategi hukum yang jelas, serta mendapatkan pendampingan hingga proses hukum selesai. Temukan lawyer terbaik dengan lebih mudah, aman, dan transparan.
                    </p>
                    @if ($region ?? '')
                        <p>Layanan Pengacara Kami Juga Tersedia di:
                            {{ $region->name ?? '' }},
                            {{ $region->address ?? '' }}
                        </p>
                    @endif
                    <div class="hero-buttons">
                        <a href="https://wa.lawfirm-jlc.com/" class="btn btn-primary-custom">
                            Konsultasi Sekarang
                            <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="hero-image">
                        <img src="{{ asset('images/hero-image.webp') }}" alt="Lawyer">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="feature-wrapper">
        <div class="container">
            <div class="feature-card">
                <div class="row g-0">
                    <div class="col-lg col-md-4 col-6">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <p class="feature-subtitle">Profesional</p>
                            <p>Tim berpengalaman dan bersertifikat</p>
                        </div>
                    </div>
                    <div class="col-lg col-md-4 col-6">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="bi bi-stars"></i>
                            </div>
                            <p class="feature-subtitle">Integritas</p>
                            <p>Menjunjung tinggi etika serta kejujuran</p>
                        </div>
                    </div>
                    <div class="col-lg col-md-4 col-6">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="bi bi-award"></i>
                            </div>
                            <p class="feature-subtitle">Komitmen</p>
                            <p>Berdedikasi penuh terhadap kepentingan klien</p>
                        </div>
                    </div>
                    <div class="col-lg col-md-6 col-6">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="bi bi-people"></i>
                            </div>
                            <p class="feature-subtitle">Terpercaya</p>
                            <p>Dipercaya individu maupun korporasi</p>
                        </div>
                    </div>
                    <div class="col-lg col-md-6 col-12">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="bi bi-bank"></i>
                            </div>
                            <p class="feature-subtitle">Berkualitas</p>
                            <p>Solusi hukum strategis serta efektif</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-section py-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-8">
                    <span class="about-label">
                        Tentang Kami
                    </span>
                    <h2 class="about-title">
                        Mengapa Memilih Justicia Legal Counsel untuk Menemukan Lawyer Terbaik?
                    </h2>
                    <div class="about-content" id="aboutContent">
                        <p>Menemukan lawyer yang tepat bukan hanya soal mencari pengacara, tetapi memilih pendamping hukum
                            yang benar-benar memahami kebutuhan dan mampu memperjuangkan hak Anda. Justicia Legal Counsel
                            hadir sebagai platform yang memudahkan Anda menemukan lawyer profesional dengan keahlian yang
                            sesuai, baik untuk perkara perdata, pidana, bisnis, perceraian, waris, ketenagakerjaan, hingga
                            sengketa perusahaan.</p>
                        <p>Kami menghubungkan Anda dengan pengacara berpengalaman yang telah memiliki kompetensi di
                            bidangnya. Proses pencarian dibuat lebih mudah, cepat, dan transparan sehingga Anda tidak perlu
                            lagi menghabiskan waktu mencari rekomendasi dari berbagai sumber yang belum tentu terpercaya.
                            Cukup pilih bidang hukum yang dibutuhkan, lalu konsultasikan masalah Anda dengan lawyer yang
                            tepat.</p>
                        <p>Dengan pendampingan hukum yang profesional sejak awal, Anda dapat memahami posisi hukum,
                            meminimalkan risiko, serta menentukan langkah terbaik sebelum mengambil keputusan penting. Baik
                            untuk kebutuhan pribadi maupun bisnis, mendapatkan bantuan dari lawyer yang tepat dapat
                            memberikan rasa aman sekaligus meningkatkan peluang penyelesaian perkara secara optimal.</p>
                        <p>Jangan biarkan masalah hukum semakin rumit karena terlambat mendapatkan pendampingan. Temukan
                            lawyer terbaik melalui Justicia Legal Counsel sekarang juga dan mulai konsultasikan kebutuhan
                            hukum Anda dengan lebih mudah, cepat, dan terpercaya.</p>
                    </div>

                    <button class="btn-about" id="toggleAbout">
                        Baca Selengkapnya
                        <i class="bi bi-arrow-down ms-2"></i>
                    </button>
                </div>
                <div class="col-lg-4">
                    <div class="about-image">
                        <img src="{{ asset('images/gallery/foto-1.webp') }}" alt="Lawyer">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-section">
        <div class="container">
            <div class="cta-box">
                <div class="cta-bg"></div>
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-2">
                        <div class="cta-icon">
                            <img src="{{ asset('images/icon-scale.webp') }}" alt="Scale">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="cta-content">
                            <h4>
                                Temukan Lawyer & Pengacara Terbaik Sesuai Kebutuhan Anda
                            </h4>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 text-lg-end text-center">
                        <a href="https://wa.lawfirm-jlc.com/" class="cta-button">
                            Konsultasi Sekarang
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="why-section">
        <div class="container">
            <div class="section-heading">
                <span class="section-label">Justicia Legal Counsel</span>
                <h3>Butuh Lawyer? <br> Temukan Pengacara Profesional dalam Satu Tempat</h3>
                <p>Tidak semua lawyer memiliki spesialisasi yang sama. Justicia Legal Counsel membantu Anda menemukan
                    pengacara terbaik berdasarkan jenis perkara sehingga konsultasi menjadi lebih efektif dan peluang
                    penyelesaian masalah hukum semakin optimal.</p>

            </div>
            <div class="row justify-content-center gy-4">
                <div class="col-lg-4 col-md-6">
                    <div class="why-item">
                        <div class="why-icon">
                            <i class="bi bi-person"></i>
                        </div>
                        <div class="why-content">
                            <p class="why-title">Temukan Lawyer Sesuai Spesialisasi</p>
                            <p>
                                Tidak semua masalah hukum membutuhkan pengacara yang sama. Justicia Legal Counsel membantu
                                Anda menemukan lawyer profesional berdasarkan bidang keahlian, sehingga penanganan kasus
                                menjadi lebih tepat, efektif, dan sesuai kebutuhan.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="why-item">
                        <div class="why-icon">
                            <i class="bi bi-chat-dots"></i>
                        </div>
                        <div class="why-content">
                            <p class="why-title">Konsultasi Hukum Cepat & Mudah</p>
                            <p>Dapatkan akses konsultasi dengan lawyer terpercaya tanpa proses yang rumit. Sampaikan
                                permasalahan Anda dan temukan solusi hukum terbaik dari pengacara yang berpengalaman
                                menangani berbagai jenis perkara.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="why-item">
                        <div class="why-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <div class="why-content">
                            <p class="why-title">Pendampingan Hukum yang Terpercaya</p>
                            <p>Mulai dari konsultasi awal, penyusunan dokumen hukum, negosiasi, hingga pendampingan di
                                pengadilan, kami menghubungkan Anda dengan lawyer yang siap memperjuangkan hak dan
                                kepentingan Anda secara profesional.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="choose-section">
        <div class="container">
            <div class="row align-items-center gy-lg-5">
                <div class="col-lg-5">
                    <div class="choose-image">
                        <img src="{{ asset('images/gallery/foto-2.jpeg') }}"
                            alt="Mengapa Memilih Justicia Legal Counsel">
                    </div>
                </div>
                <div class="col-lg-7">
                    <h4 class="choose-heading text-lg-start text-center">
                        Mengapa Memilih <span>Justicia Legal Counsel</span>?
                    </h4>
                    <ul class="list-unstyled">
                        <li>» Temukan <b>lawyer dan pengacara terbaik</b> sesuai bidang hukum yang Anda butuhkan.</li>
                        <li>» Akses <b>konsultasi hukum</b> dengan advokat profesional secara lebih cepat, mudah, dan
                            terpercaya.</li>
                        <li>» Pilih lawyer berdasarkan spesialisasi, mulai dari hukum perdata, pidana, bisnis, keluarga,
                            ketenagakerjaan, hingga sengketa perusahaan.</li>
                        <li>» Terhubung dengan pengacara berpengalaman yang siap memberikan strategi dan solusi hukum yang
                            tepat.</li>
                        <li>» Hemat waktu dalam mencari pendamping hukum melalui satu platform yang praktis dan transparan.
                        </li>
                        <li>» Dapatkan pendampingan mulai dari konsultasi, penyusunan dokumen hukum, negosiasi, hingga
                            proses persidangan bila diperlukan.</li>
                        <li>» Lindungi hak dan kepentingan Anda dengan memilih lawyer yang tepat sejak awal agar setiap
                            langkah hukum lebih terarah.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="legal-services-section py-5">
        <div class="container">
            <div class="section-heading text-center mb-5">
                <span class="section-badge">LAYANAN HUKUM PROFESIONAL</span>
                <h2 class="section-title mt-3">Program & Layanan Hukum <span>Justicia Legal Counsel</span></h2>
                <p class="section-description">
                    Justicia Legal Counsel menghadirkan berbagai layanan hukum profesional untuk membantu individu, pelaku
                    usaha, maupun perusahaan menemukan lawyer terbaik sesuai kebutuhan. Mulai dari konsultasi hukum hingga
                    pendampingan perkara, kami menghubungkan Anda dengan pengacara berpengalaman yang siap memberikan solusi
                    hukum secara tepat, cepat, dan terpercaya.
                </p>
            </div>

            <div class="row mt-5 g-4" id="servicesWrapper">
                <div class="col-lg-4 col-md-6 service-item">
                    <div class="service-card">
                        <div class="service-top">
                            <div class="service-icon">
                                <i class="bi bi-bank2"></i>
                            </div>
                            <p class="services-title">Hukum Tata Usaha Negara (TUN)</p>
                        </div>
                        <p>Hukum Tata Usaha Negara (TUN) meliputi:</p>
                        <ul>
                            <li>Pertanahan</li>
                            <li>Kepegawaian</li>
                            <li>Perizinan</li>
                            <li>Lingkungan Hidup</li>
                            <li>Tender / Pengadaan Barang Jasa</li>
                            <li>Badan Hukum / Partai Politik</li>
                            <li>Kepala Desa Dan Perangkat Desa</li>
                            <li>Kepala Daerah</li>
                            <li>Proses Pemilihan Umum</li>
                            <li>Pergantian Antar Waktu</li>
                            <li>Ketenagakerjaan</li>
                            <li>Sengketa Informasi Publik / KIP</li>
                            <li>Pengadaan Tanah</li>
                            <li>Penyalahgunaan Wewenang</li>
                            <li>Tindakan Administrasi Pemerintahan</li>
                            <li>Mahkamah Konstitusi</li>
                            <li>Perselisihan Hasil Pemilu</li>
                            <li>Sengketa Kewenangan</li>
                            <li>Merk</li>
                            <li>Dan lain-lain</li>
                        </ul>
                        <a href="https://wa.lawfirm-jlc.com/?kebutuhan=Hukum TUN" class="service-btn">
                            Konsultasi Sekarang
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 service-item">
                    <div class="service-card">
                        <div class="service-top">
                            <div class="service-icon gold">
                                <i class="bi bi-house-heart-fill"></i>
                            </div>
                            <p class="services-title">Hukum Keluarga</p>
                        </div>
                        <p>Hukum Keluarga meliputi:</p>
                        <ul>
                            <li>Cerai Talak/Cerai Gugat</li>
                            <li>Hak Asuh anak</li>
                            <li>Gugatan Pembagian Harta Gono Gini (Harta Bersama)</li>
                            <li>Penetapan Ahli Waris (PAW)</li>
                            <li>Gugatan Waris</li>
                            <li>Pembatalan Perkawinan</li>
                            <li>Permohonan Isbat Nikah dan Isbat Nikah Kontensius/Pengesahan Perkawinan</li>
                            <li>Pengangkatan Anak/Adopsi Anak</li>
                            <li>Perwalian/Pengesahan/Pengakuan Anak</li>
                            <li>Permohonan Asal Usul Anak Ekonomi Syariah</li>
                            <li>Kekerasan Dalam Rumah Tangga(KDRT)</li>
                            <li>Perzinahan / Overspel</li>
                            <li>Poligami Tanpa Izin Istri</li>
                            <li>Penelantaran Anak</li>
                            <li>Perjanjian Perkawinan</li>
                            <li>Perwalian Anak</li>
                            <li>Pengakuan Anak</li>
                            <li>Asal Usul Anak</li>
                            <li>Dan lain-lain</li>
                        </ul>
                        <a href="https://wa.lawfirm-jlc.com/?kebutuhan=Hukum Keluarga" class="service-btn">
                            Konsultasi Sekarang
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 service-item">
                    <div class="service-card">
                        <div class="service-top">
                            <div class="service-icon">
                                <i class="bi bi-file-earmark-richtext-fill"></i>
                            </div>
                            <p class="services-title">Jasa Notaris & PPAT</p>
                        </div>
                        <p>Jasa Notaris meliputi:</p>
                        <ul>
                            <li>Akta Pendirian PT</li>
                            <li>Perubahan PT</li>
                            <li>Yayasan</li>
                            <li>CV</li>
                            <li>Firma</li>
                            <li>Perjanjian Kerjasama</li>
                            <li>Akta Hutang Piutang</li>
                            <li>Kuasa Menjual</li>
                            <li>Surat Wasiat</li>
                            <li>Legalisasi / Waarmerking</li>
                        </ul>
                        <p class="mt-3">PPAT meliputi:</p>
                        <ul>
                            <li>AJB</li>
                            <li>APHT</li>
                            <li>Roya</li>
                            <li>Balik Nama Sertifikat</li>
                            <li>Pemecahan Sertifikat</li>
                            <li>Penggabungan Sertifikat</li>
                            <li>Hibah Tanah</li>
                            <li>Tukar Menukar</li>
                            <li>Peningkatan SHGB ke SHM</li>
                            <li>SKMHT</li>
                        </ul>
                        <a href="https://wa.lawfirm-jlc.com/?kebutuhan=Jasa Notaris & PPAT" class="service-btn">
                            Konsultasi Sekarang
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 service-item">
                    <div class="service-card">
                        <div class="service-top">
                            <div class="service-icon gold">
                                <i class="bi bi-buildings-fill"></i>
                            </div>
                            <p class="services-title">Corporate & Business</p>
                        </div>
                        <p>Corporate & Business meliputi:</p>
                        <ul>
                            <li>Retainer Perusahaan</li>
                            <li>Corporate Legal</li>
                            <li>Perselisihan Hubungan Industrial (PHI)</li>
                            <li>Dan lain-lain</li>
                        </ul>
                        <a href="https://wa.lawfirm-jlc.com/?kebutuhan=Corporate & Business" class="service-btn">
                            Konsultasi Sekarang
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 service-item">
                    <div class="service-card">
                        <div class="service-top">
                            <div class="service-icon">
                                <i class="bi bi-file-earmark-check-fill"></i>
                            </div>
                            <p class="services-title">Arbitrase</p>
                        </div>
                        <p>Arbitrase meliputi:</p>
                        <ul>
                            <li>Sengketa Perdagangan</li>
                            <li>Arbitrase Institusionnal</li>
                            <li>Arbitrase Ad Hoc</li>
                            <li>Dan lain-lain</li>
                        </ul>
                        <a href="https://wa.lawfirm-jlc.com/?kebutuhan=Arbitrase" class="service-btn">
                            Konsultasi Sekarang
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 service-item">
                    <div class="service-card">
                        <div class="service-top">
                            <div class="service-icon gold">
                                <i class="bi bi-receipt"></i>
                            </div>
                            <p class="services-title">Hukum Pajak</p>
                        </div>
                        <p>Hukum Pajak meliputi:</p>
                        <ul>
                            <li>Banding Pajak</li>
                            <li>Keberatan Pajak</li>
                            <li>Gugatan Pajak</li>
                            <li>Pidana Pajak</li>
                            <li>Peninjauan Kembali</li>
                            <li>Dan lain-lain</li>
                        </ul>
                        <a href="https://wa.lawfirm-jlc.com/?kebutuhan=Hukum Pajak" class="service-btn">
                            Konsultasi Sekarang
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 service-item">
                    <div class="service-card">
                        <div class="service-top">
                            <div class="service-icon">
                                <i class="bi bi-shield"></i>
                            </div>
                            <p class="services-title">Litigasi Pidana</p>
                        </div>
                        <p>Hukum Pidana Umum meliputi:</p>
                        <ul>
                            <li>Pembunuhan</li>
                            <li>Pencurian</li>
                            <li>Penipuan</li>
                            <li>Penggelapan</li>
                            <li>Pemalsuan Dokumen</li>
                            <li>Perampokan</li>
                            <li>Penganiayaan</li>
                            <li>Dan lain-lain</li>
                        </ul>
                        <p class="mt-3">Hukum Pidana Khusus meliputi:</p>
                        <ul>
                            <li>Tindak Pidana Korupsi (TIPIKOR)</li>
                            <li>Tindak Pidana Narkotika</li>
                            <li>Tindak Pidana Berat Pelanggaran HAM</li>
                            <li>Tindak Pidana Terorisme dan Tindak Pidana Pencucian Uang (TPPU)</li>
                            <li>Dan lain-lain</li>
                        </ul>
                        <a href="https://wa.lawfirm-jlc.com/?kebutuhan=Litigasi Pidana" class="service-btn">
                            Konsultasi Sekarang
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 service-item">
                    <div class="service-card">
                        <div class="service-top">
                            <div class="service-icon gold">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <p class="services-title">Litigasi Perdata</p>
                        </div>
                        <p>Hukum Perdata Umum meliputi:</p>
                        <ul>
                            <li>Perbuatan Melawan Hukum (PMH)</li>
                            <li>Wanprestasi</li>
                            <li>Gugatan Sederhana</li>
                            <li>Perceraian (Non Muslim)</li>
                            <li>Perubahan Identitas (Volunter)</li>
                            <li>Dan lain-lain</li>
                        </ul>
                        <p class="mt-3">Hukum Perdata Khusus meliputi:</p>
                        <ul>
                            <li>Kepailitan</li>
                            <li>Penundaan Kewajiban Pembayaran Utang (PKPU)</li>
                            <li>Hak Kekayaan Intelektual (HAKI)</li>
                            <li>Perselisihan Hubungan Industrial (PHI)</li>
                            <li>Komisi Pengawas Persaingan Usaha (KPPU)</li>
                            <li>Dan lain-lain</li>
                        </ul>
                        <a href="https://wa.lawfirm-jlc.com/?kebutuhan=Litigasi Perdata" class="service-btn">
                            Konsultasi Sekarang
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 service-item">
                    <div class="service-card">
                        <div class="service-top">
                            <div class="service-icon">
                                <i class="bi bi-journal-text"></i>
                            </div>
                            <p class="services-title">Upaya Hukum</p>
                        </div>
                        <p>Upaya Hukum meliputi:</p>
                        <ul>
                            <li>Upaya Hukum Verzet (Perlawanan atas Putusan Verstek)</li>
                            <li>Upaya Hukum Banding (Perlawanan atas Putusan Pertama/Pengadilan Negeri)</li>
                            <li>Upaya Hukum Kasasi (Perlawanan terhadap Putusan Banding)</li>
                            <li>Upaya Hukum Peninjauan Kembali/PK (Perlawanan atas Putusan Banding)</li>
                            <li>Dan lain-lain</li>
                        </ul>
                        <a href="https://wa.lawfirm-jlc.com/?kebutuhan=Upaya Hukum" class="service-btn">
                            Konsultasi Sekarang
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 service-item">
                    <div class="service-card">
                        <div class="service-top">
                            <div class="service-icon gold">
                                <i class="bi bi-file-earmark-richtext-fill"></i>
                            </div>
                            <p class="services-title">Perizinan Usaha</p>
                        </div>
                        <p>Biro Jasa meliputi:</p>
                        <ul>
                            <li>Pembuatan NIB</li>
                            <li>NPWP Badan</li>
                            <li>Sertifikat Standar OSS</li>
                            <li>Perubahan Data OSS</li>
                            <li>Izin Reklame</li>
                            <li>Izin Operasional</li>
                            <li>SK Kemenkumham</li>
                            <li>Perizinan Berusaha Berbasis Risiko</li>
                        </ul>
                        <a href="https://wa.lawfirm-jlc.com/?kebutuhan=Perizinan Usaha" class="service-btn">
                            Konsultasi Sekarang
                        </a>
                    </div>
                </div>
            </div>

            <div class="bottom-consultation mt-5">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="consult-left">
                            <div class="consult-icon">
                                <img src="{{ asset('images/icon-scale.webp') }}" alt="Scale CTA">
                            </div>
                            <div>
                                <h5>
                                    Tidak Menemukan Layanan yang Anda Cari?
                                </h5>
                                <p>
                                    Tim kami siap membantu menemukan lawyer terbaik
                                    sesuai kebutuhan hukum Anda.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
                        <a href="https://wa.lawfirm-jlc.com/" class="consult-btn">
                            Hubungi Sekarang
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="jlc-advantage-section">
        <div class="container">
            <div class="jlc-advantage-wrapper">
                <div class="row g-0 align-items-center">
                    <div class="jlc-advantage-body">
                        <div class="jlc-advantage-header">
                            <span class="jlc-advantage-subtitle">
                                KEUNGGULAN
                            </span>
                            <h3 class="jlc-advantage-title">
                                Mengapa Memilih
                                <span>
                                    Justicia Legal Counsel?
                                </span>
                            </h3>
                        </div>
                        <div class="jlc-advantage-timeline">
                            <span class="jlc-advantage-line"></span>
                            <div class="row">
                                <div class="col-lg-6 jlc-advantage-column">
                                    <article class="jlc-advantage-item">
                                        <div class="jlc-advantage-icon">
                                            <i class="bi bi-person-workspace"></i>
                                        </div>
                                        <div class="jlc-advantage-content">
                                            <span class="jlc-advantage-number">01</span>
                                            <p class="jlc-advantage-heading">Lawyer Berpengalaman</p>
                                            <p class="jlc-advantage-text">
                                                Terhubung dengan lawyer dan pengacara profesional yang memiliki pengalaman
                                                menangani berbagai perkara hukum untuk individu maupun perusahaan.
                                            </p>
                                        </div>
                                    </article>
                                    <article class="jlc-advantage-item">
                                        <div class="jlc-advantage-icon">
                                            <i class="bi bi-bullseye"></i>
                                        </div>
                                        <div class="jlc-advantage-content">
                                            <span class="jlc-advantage-number">02</span>
                                            <p class="jlc-advantage-heading">Sesuai Bidang Keahlian</p>
                                            <p class="jlc-advantage-text">
                                                Temukan lawyer berdasarkan spesialisasi, mulai dari hukum pidana, perdata,
                                                keluarga, bisnis, pertanahan, hingga hukum perusahaan.
                                            </p>
                                        </div>
                                    </article>
                                    <article class="jlc-advantage-item">
                                        <div class="jlc-advantage-icon">
                                            <i class="bi bi-chat-dots"></i>
                                        </div>
                                        <div class="jlc-advantage-content">
                                            <span class="jlc-advantage-number">03</span>
                                            <p class="jlc-advantage-heading">Konsultasi Hukum Cepat</p>
                                            <p class="jlc-advantage-text">
                                                Ajukan permasalahan hukum Anda dan dapatkan konsultasi serta arahan awal
                                                dari lawyer yang tepat secara mudah dan efisien
                                            </p>
                                        </div>
                                    </article>
                                </div>

                                <div class="col-lg-6 jlc-advantage-column">
                                    <article class="jlc-advantage-item">
                                        <div class="jlc-advantage-icon">
                                            <i class="bi bi-person-check"></i>
                                        </div>
                                        <div class="jlc-advantage-content">
                                            <span class="jlc-advantage-number">04</span>
                                            <p class="jlc-advantage-heading">Pendampingan Hingga Tuntas</p>
                                            <p class="jlc-advantage-text">
                                                Mulai dari konsultasi, penyusunan dokumen, negosiasi, mediasi, hingga proses
                                                persidangan, kami siap mendampingi setiap langkah hukum Anda.
                                            </p>
                                        </div>
                                    </article>
                                    <article class="jlc-advantage-item">
                                        <div class="jlc-advantage-icon">
                                            <i class="bi bi-folder2-open"></i>
                                        </div>
                                        <div class="jlc-advantage-content">
                                            <span class="jlc-advantage-number">05</span>
                                            <p class="jlc-advantage-heading">Layanan Hukum Lengkap</p>
                                            <p class="jlc-advantage-text">
                                                Akses ratusan layanan hukum dalam satu platform, mulai dari legal opinion,
                                                pembuatan kontrak, sengketa perdata, pidana, hukum keluarga, korporasi,
                                                pertanahan, hingga perizinan usaha.
                                            </p>
                                        </div>
                                    </article>
                                    <article class="jlc-advantage-item">
                                        <div class="jlc-advantage-icon">
                                            <i class="bi bi-shield-check"></i>
                                        </div>
                                        <div class="jlc-advantage-content">
                                            <span class="jlc-advantage-number">06</span>
                                            <p class="jlc-advantage-heading">Solusi Hukum Terpercaya</p>
                                            <p class="jlc-advantage-text">
                                                Setiap kebutuhan hukum ditangani secara profesional dengan pendekatan yang
                                                transparan, responsif, dan berorientasi pada penyelesaian terbaik bagi
                                                klien.
                                            </p>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="tim-kami" class="team-section-2">
        <div class="container">
            <div class="team-section-2-heading">
                <span class="team-section-2-subtitle">
                    Tim Pengacara
                </span>
                <h5 class="team-section-2-title">
                    Profesional.
                    <span>Berpengalaman.</span>
                    Berdedikasi.
                </h5>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="team-section-2-card">
                        <div class="team-section-2-image">
                            <img src="{{ asset('images/advokat/team-1.jpeg') }}" alt="Adv, Dodi dirgantara, S.H">
                        </div>
                        <div class="team-section-2-content">
                            <p class="team-name">Adv. Dodi dirgantara, S.H</p>
                            <span>Advokat</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-section-2-card">
                        <div class="team-section-2-image">
                            <img src="{{ asset('images/advokat/team-7.jpeg') }}" alt="Syahra Irfani, S.H.">
                        </div>
                        <div class="team-section-2-content">
                            <p class="team-name">Adv. Syahra Irfani, S.H.</p>
                            <span>Advokat</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-section-2-card">
                        <div class="team-section-2-image">
                            <img src="{{ asset('images/advokat/team-2.jpeg') }}" alt="Adv, Askan Nor S.H.,M.H">
                        </div>
                        <div class="team-section-2-content">
                            <p class="team-name">Adv. Askan Nor S.H.,M.H</p>
                            <span>Advokat</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-section-2-card">
                        <div class="team-section-2-image">
                            <img src="{{ asset('images/advokat/team-3.jpeg') }}" alt="Riski Ari Wibowo, S.H.">
                        </div>
                        <div class="team-section-2-content">
                            <p class="team-name">Adv. Riski Ari Wibowo, S.H.</p>
                            <span>Advokat</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-section-2-card">
                        <div class="team-section-2-image">
                            <img src="{{ asset('images/advokat/team-4.jpeg') }}" alt="Fadhillah Ahmad Nahrawi, S.H">
                        </div>
                        <div class="team-section-2-content">
                            <p class="team-name">Adv. Fadhillah Ahmad Nahrawi, S.H</p>
                            <span>Advokat</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-section-2-card">
                        <div class="team-section-2-image">
                            <img src="{{ asset('images/advokat/team-5.jpg') }}" alt="Ahmad Said Fandi, S.H.">
                        </div>
                        <div class="team-section-2-content">
                            <p class="team-name">Adv. Ahmad Said Fandi, S.H.</p>
                            <span>Advokat</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-section-2-card">
                        <div class="team-section-2-image">
                            <img src="{{ asset('images/advokat/team-6.jpeg') }}" alt="Muhammad Fawwazul Haqie, S.H.">
                        </div>
                        <div class="team-section-2-content">
                            <p class="team-name">Adv. Muhammad Fawwazul Haqie, S.H.</p>
                            <span>Advokat</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-section-2-card">
                        <div class="team-section-2-image">
                            <img src="{{ asset('images/advokat/team-8.jpeg') }}" alt="Adv. Wandra Saputra, SH">
                        </div>
                        <div class="team-section-2-content">
                            <p class="team-name">Adv. Wandra Saputra, SH</p>
                            <span>Advokat</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-section-2">
        <div class="container">
            <div class="cta-section-2-wrapper">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="cta-section-2-left">
                            <h4 class="cta-section-2-title">Jangan Hadapi
                                <span>
                                    Masalah Hukum Sendirian.
                                </span>
                            </h4>
                            <p class="cta-section-2-subtitle">Temukan Pengacara Terbaik Bersama <b>Justicia Legal
                                    Counsel</b></p>
                            <div class="cta-section-2-divider"></div>
                            <div class="cta-section-2-list">
                                <div class="cta-section-2-list-item">
                                    <i class="bi bi-shield-check"></i>
                                    <span>
                                        Aman & Terpercaya
                                    </span>
                                </div>
                                <div class="cta-section-2-list-item">
                                    <i class="bi bi-clock-history"></i>
                                    <span>
                                        Respon Cepat
                                    </span>
                                </div>
                                <div class="cta-section-2-list-item">
                                    <i class="bi bi-people"></i>
                                    <span>
                                        Lawyer Profesional
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="cta-section-2-center">
                            <p class="cta-section-2-description">
                                Setiap masalah hukum membutuhkan penanganan yang tepat. Justicia Legal Counsel menghubungkan
                                Anda dengan lawyer berpengalaman sesuai bidang keahlian agar Anda mendapatkan pendampingan
                                hukum yang profesional, cepat, dan dapat dipercaya sejak konsultasi hingga penyelesaian
                                perkara.
                            </p>
                            <a href="https://wa.lawfirm-jlc.com/" class="cta-section-2-button">
                                <i class="bi bi-calendar-check"></i>
                                <span>
                                    Konsultasi Sekarang
                                </span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
