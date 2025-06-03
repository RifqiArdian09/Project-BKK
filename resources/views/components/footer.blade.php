<!-- Footer -->
<footer class="bg-teal-700 text-white w-full mt-16">
        <div class="container mx-auto px-6 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <!-- School Info -->
                <div class="flex flex-col md:flex-row items-center md:items-start text-center md:text-left space-y-6 md:space-y-0 md:space-x-6">
                    <img src="{{ asset('images/logo smk1.png') }}" alt="Logo SMKN 1 Bengkulu" class="h-24 w-auto" />
                    <div>
                        <h3 class="text-xl font-bold mb-3">SMK Negeri 1 Bengkulu</h3>
                        <p class="text-white/90 mb-1">Jalan Jati No 41, Kelurahan Padang Jati</p>
                        <p class="text-white/90 mb-1">Kecamatan Ratu Samban, Kota Bengkulu</p>
                        <p class="text-white/90">38222</p>
                    </div>
                </div>
                
                <!-- Social Media -->
                <div class="flex flex-col items-center md:items-end space-y-6">
                    <div class="flex space-x-6">
                        <a href="https://www.youtube.com/channel/UCydN3u2tCciDrJKo06ug-oQ" class="social-icon">
                            <i class="fab fa-youtube text-3xl text-red-500 hover:text-red-600"></i>
                        </a>
                        <a href="https://twitter.com/smkn1kotabkl" class="social-icon">
                            <i class="fab fa-twitter text-3xl text-blue-400 hover:text-blue-500"></i>
                        </a>
                        <a href="https://web.facebook.com/Smkn1KotaBengkulu/" class="social-icon">
                            <i class="fab fa-facebook text-3xl text-blue-600 hover:text-blue-700"></i>
                        </a>
                        <a href="https://instagram.com/bkk_smkn1bengkulu" class="social-icon">
                            <i class="fab fa-instagram text-3xl text-pink-500 hover:text-pink-600"></i>
                        </a>
                    </div>
                    
                    <!-- Contact -->
                    <div class="text-center md:text-right">
                        <h4 class="font-semibold mb-3">Hubungi Kami:</h4>
                        <div class="flex flex-col sm:flex-row justify-center md:justify-end space-y-3 sm:space-y-0 sm:space-x-6">
                            <a href="http://wa.me/6289628893111" class="contact-card flex items-center justify-center space-x-2 bg-white/10 px-4 py-2 rounded-lg hover:bg-white/20">
                                <i class="fab fa-whatsapp text-green-400 text-xl"></i>
                                <span>Maya</span>
                            </a>
                            <a href="http://wa.me/6282261962048" class="contact-card flex items-center justify-center space-x-2 bg-white/10 px-4 py-2 rounded-lg hover:bg-white/20">
                                <i class="fab fa-whatsapp text-green-400 text-xl"></i>
                                <span>Fachri</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Copyright -->
            <div class="border-t border-white/20 mt-8 pt-6 text-center text-white/70 text-sm">
                <p>&copy; {{ date('Y') }} Bursa Kerja Khusus SMKN 1 Bengkulu. All rights reserved.</p>
            </div>
        </div>
    </footer>