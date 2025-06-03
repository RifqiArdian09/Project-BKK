<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>BKK || SMKN 01 BENGKULU</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>

<body class="index-page">
    @include('components.header')
    @include('components.hero')
    @include('components.menu')
    @include('components.profile')
    @include('menu.formalumni')
    @include('menu.surveymodal')
  
    <footer class="bg-teal-700 text-white w-full mt-16">
    <div class="max-w-7xl mx-auto px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Info Sekolah -->
            <div class="flex flex-col md:flex-row items-center md:items-start space-y-6 md:space-y-0 md:space-x-6">
                <img src="{{ asset('images/logo smk1.png') }}" alt="Logo SMKN 1 Bengkulu" class="h-24 w-auto" />
                <div class="text-center md:text-left">
                    <h3 class="text-2xl text-white/90 font-bold mb-2">SMK Negeri 1 Bengkulu</h3>
                    <p class="text-white/90">Jalan Jati No 41, Kelurahan Padang Jati</p>
                    <p class="text-white/90">Kecamatan Ratu Samban, Kota Bengkulu</p>
                    <p class="text-white/90">38222</p>
                </div>
            </div>

            <!-- Sosial Media dan Kontak -->
            <div class="flex flex-col items-center md:items-end space-y-6">
                <!-- Media Sosial -->
                <div class="flex space-x-5">
                    <a href="https://www.youtube.com/channel/UCydN3u2tCciDrJKo06ug-oQ" class="social-icon">
                        <i class="fab fa-youtube text-3xl hover:text-red-600 text-red-500"></i>
                    </a>
                    <a href="https://twitter.com/smkn1kotabkl" class="social-icon">
                        <i class="fab fa-twitter text-3xl hover:text-blue-500 text-blue-400"></i>
                    </a>
                    <a href="https://web.facebook.com/Smkn1KotaBengkulu/" class="social-icon">
                        <i class="fab fa-facebook text-3xl hover:text-blue-700 text-blue-600"></i>
                    </a>
                    <a href="https://instagram.com/bkk_smkn1bengkulu" class="social-icon">
                        <i class="fab fa-instagram text-3xl hover:text-pink-600 text-pink-500"></i>
                    </a>
                </div>

                <!-- Kontak -->
                <div class="text-center md:text-right">
                    <h4 class="text-lg text-white/90 font-semibold mb-3">Hubungi Kami:</h4>
                    <div class="flex flex-col sm:flex-row sm:justify-end gap-3">
                        <a href="https://wa.me/6289628893111" class="contact-card flex items-center justify-center gap-2 bg-white/10 px-4 py-2 rounded-lg hover:bg-white/20">
                            <i class="fab fa-whatsapp text-green-400 text-xl"></i>
                            <span>Maya</span>
                        </a>
                        <a href="https://wa.me/6282261962048" class="contact-card flex items-center justify-center gap-2 bg-white/10 px-4 py-2 rounded-lg hover:bg-white/20">
                            <i class="fab fa-whatsapp text-green-400 text-xl"></i>
                            <span>Fachri</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="border-t border-white/20 mt-10 pt-6 text-center text-white/70 text-sm">
            <p>&copy; {{ date('Y') }} Bursa Kerja Khusus SMKN 1 Bengkulu. All rights reserved.</p>
        </div>
    </div>
</footer>



    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>