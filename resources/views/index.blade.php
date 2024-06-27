@extends('layouts.main')
@section('container')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row gy-4 d-flex justify-content-between">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h2 data-aos="fade-up">{{ $titleHero }}</h2>
                    <p data-aos="fade-up" data-aos-delay="100">Sistem Informasi BKK (Bursa Kerja Khusus) merupakan sebuah
                        tempat untuk alumni dan non-alumni untuk mendapatkan pekerjaan</p>
                </div>
                <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                    <img src="assets/img/hero.png" class="img-fluid mb-3 mb-lg-0" alt="">
                </div>
            </div>
        </div>
    </section><!-- End Hero Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
        <div class="container">
            {{-- <div class="section-title" data-aos="fade-up">
                <h2 class="head">Tentang Kami</h2>
                <p>Magnam dolores commodi suscipit eius consequatur</p>
            </div> --}}
            <div class="section-header">
                <span>Tentang Kami</span>
                <h2>Tentang Kami</h2>
            </div>

            <div class="row">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="image">
                        <img src="{{ asset('assets/logobkk.jpg') }}" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="content pt-4 pt-lg-0 pl-0 pl-lg-3 ">
                        {{-- <h4>Bursa Kerja Khusus (BKK) adalah sebuah lembaga yang dibentuk di Sekolah Menengah
                            Kejuruan Negeri dan Swasta, sebagai unit pelaksana yang memberikan pelayanan dan
                            informasi lowongan kerja, pelaksana pemasaran, penyaluran dan penempatan tenaga kerja,
                            merupakan mitra Dinas Tenaga Kerja dan Transmigrasi.
                        </h4> --}}
                        <h4>
                            BKK adalah singkatan dari "Bursa Kerja Khusus." BKK adalah tempat di mana para pencari kerja
                            bisa bertemu dengan perusahaan atau organisasi yang mencari karyawan. Ini seperti pasar di mana
                            orang yang ingin bekerja bertemu dengan orang yang ingin menyewa mereka.
                        </h4>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End About Us Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq">
        <div class="container">

            {{-- <div class="section-title" data-aos="fade-up">
                <h2>TATA CARA</h2>
                <p>Tata Cara Pendaftaran</p>
            </div> --}}
            <div class="section-header">
                <span>Tata Cara Pendaftara</span>
                <h2>Tata Cara</h2>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class='bx bxs-edit-alt'></i></div>
                        <h4 class="title"><a href="">Tulis Pendaftaran</a></h4>
                        <p class="description">Tulis Pendaftaran Sesuai Kriteria Anda.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><i class="bx bx-shuffle"></i></div>
                        <h4 class="title"><a href="">Proses Verifikasi</a></h4>
                        <p class="description">Tunggu sampai laporan Anda di verifikasi oleh admin/petugas.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon"><i class="bx bx-tachometer"></i></div>
                        <h4 class="title"><a href="">Tindak Lanjut</a></h4>
                        <p class="description">Pendaftaran Anda sedang dalam diproses dan ditindak lanjut.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon"><i class='bx bx-check-shield'></i></div>
                        <h4 class="title"><a href="">Selesai</a></h4>
                        <p class="description">Hasil Akan Di Beritahu Lewat Offline</p>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- End Frequently Asked Questions Section -->
    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">
            <header class="section-testi">
                <h2>Testimonials</h2>
                <p>What they are saying about us</p>
            </header>

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
                <div class="swiper-wrapper">
                    <?php
                    $perusahaan = App\Models\Company::all();
                    ?>
                    @foreach ($perusahaan as $company)
                        <div class="swiper-slide {{ $loop->first }}" data-slide-number="{{ $loop->index }}">
                            <div class="testimonial-item">
                                <p>
                                    {{ $company->excerpt }}
                                </p>
                                <div class="profile mt-auto">
                                    <img src="{{ asset('storage/' . $company->gambar) }}"
                                        class=" testimonial-img card-img-top w-50">
                                    <h3>{{ $company->perusahaan }}</h3>
                                </div>
                            </div>
                        </div>
                        <?php
                        ?>
                    @endforeach

                    <!-- End testimonial item -->

                </div>
                <div class="swiper-pagination"></div>

            </div>

    </section>
    <!-- End Testimonials Section -->


    <section id="service" class="services pt-0">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <span>Lowongan Terbaru</span>
                <h2>Lowongan Terbaru</h2>
            </div>

            <div class="row">
                @foreach ($newLowongan as $lowongan)
                    @php
                        $end_date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $lowongan->batas_waktu);
                        $diff = $end_date->diff(\Carbon\Carbon::now());
                    @endphp
                    <div class="col-md-4 mb-5" data-aos="fade-up" data-aos-delay="100">
                        <div class="card d-flex flex-column justify-content-between">
                            <img src="{{ asset('storage/' . $lowongan->gambar) }}" class="card-img-top" alt="...">
                            <div class="card-body mt-auto">
                                <h5 class="card-title">{{ $lowongan->judul }}</h5>
                                <h6 class="card-text text-danger">
                                    @if ($diff->days > 0)
                                        Sisa Waktu: {{ $diff->days }} hari, {{ $diff->h }} jam
                                    @else
                                        Pendaftaran Di Tutup
                                    @endif
                                </h6>
                            </div>
                            <div class="card-footer">
                                <a href="/lowongan/{{ $lowongan->slug }}"
                                    class="text-decoration-none btn btn-sm btn-primary mt-3">Detail</a>
                                @if ($diff->days > 0)
                                    <a href="/dashboard"
                                        class="btn btn-sm btn-success mt-3 text-decoration-none">Daftar</a>
                                @else
                                    <button href="/"
                                        class="btn btn-sm btn-danger mt-3 text-decoration-none">Lowongan
                                        Ditutup</button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a href="/lowongan"
                class="btn btn-primary position-absolute bottom-20 start-50 translate-middle-x">Selengkapnya
                <i class="bi bi-arrow-right"></i></a>
        </div>
    </section><!-- End Services Section -->
@endsection
<style>
    .head {
        text-align: center;
        font-weight: bold;
        margin-bottom: 50px;
    }
</style>
