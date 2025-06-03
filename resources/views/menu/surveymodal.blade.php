<!-- NISN Verification Modal -->
<div id="verificationModalSurvey" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden p-4">
    <div class="bg-white rounded-xl shadow-2xl p-6 w-full max-w-md">
        <!-- Modal Header -->
        <div class="flex justify-between items-center mb-6 pb-4 border-b border-gray-200">
            <div>
                <h2 class="text-2xl font-bold text-teal-700">Verifikasi NISN</h2>
                <p class="text-gray-500 mt-1">Masukkan NISN Anda untuk melanjutkan</p>
                <p class="text-gray-500 mt-1">Note: tiap Siswa hanya bisa mengisi 1x</p>
            </div>
            <button id="closeVerificationModalSurvey" class="text-gray-500 hover:text-gray-700 transition transform hover:rotate-90">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        
        <!-- Verification Form -->
        <div class="space-y-6">
            <div>
                <label class="block text-gray-700 font-medium mb-2">NISN <span class="text-red-500">*</span></label>
                <input type="text" id="nisnInputSurvey" placeholder="Masukkan NISN Anda" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition" required>
                <p id="errorMessageSurvey" class="text-red-500 mt-2 hidden"></p>
            </div>
            
            <div class="flex justify-center">
                <button id="verifyBtnSurvey" class="bg-teal-600 hover:bg-teal-700 text-white font-bold py-3 px-6 rounded-lg shadow hover:shadow-md transition flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    Verifikasi
                </button>
            </div>
        </div>
    </div>
</div>
          
<!-- Survey Modal -->
<div id="surveyModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden p-4">
    <div class="bg-white rounded-xl shadow-2xl p-6 w-full max-w-4xl max-h-[90vh] overflow-y-auto">
        <!-- Modal Header -->
        <div class="flex justify-between items-center mb-6 pb-4 border-b border-gray-200">
            <div class="w-full">
                <h2 class="text-2xl md:text-3xl font-bold text-teal-700">Formulir Survey Siswa</h2>
                <p class="text-gray-500 mt-1">SMKN 1 Bengkulu</p>
            </div>
            <button id="closeSurveyModal" class="text-gray-500 hover:text-gray-700 transition transform hover:rotate-90 self-start">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        
        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p>{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <form id="surveyForm" action="{{ route('formsurvey.store') }}" method="POST" class="space-y-8">
            @csrf
            <!-- Hidden inputs for verified data -->
            <input type="hidden" id="hiddenNisn" name="nisn">
            <input type="hidden" id="hiddenNama" name="nama">
            <input type="hidden" id="hiddenJurusan" name="jurusan">
            
            <!-- Personal Information Section -->
            <div class="bg-gray-50 p-6 rounded-lg">
                <h3 class="text-xl font-semibold text-teal-700 mb-6 flex items-center">
                    <span class="bg-teal-100 p-2 rounded-full mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-teal-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </span>
                    Informasi Pribadi
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">NISN <span class="text-red-500">*</span></label>
                        <input type="text" name="nisn" id="formNisnSurvey" placeholder="Masukkan NISN" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition" required readonly>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" name="nama" id="formNamaSurvey" placeholder="Masukkan nama lengkap" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition" required readonly>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Jurusan <span class="text-red-500">*</span></label>
                        <input type="text" name="jurusan" id="formJurusanSurvey" placeholder="Jurusan Anda" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition" required readonly>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Tahun Ajaran <span class="text-red-500">*</span></label>
                        <input type="text" name="tahun_ajaran" placeholder="Tahun Ajaran" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Tempat Lahir <span class="text-red-500">*</span></label>
                        <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Tanggal Lahir <span class="text-red-500">*</span></label>
                        <input type="date" name="tanggal_lahir" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Alamat <span class="text-red-500">*</span></label>
                        <input type="text" name="alamat" placeholder="Masukkan alamat lengkap" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Email <span class="text-red-500">*</span></label>
                        <input type="email" name="email" placeholder="contoh@email.com" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">WhatsApp <span class="text-red-500">*</span></label>
                        <input type="tel" name="whatsapp" placeholder="0812-3456-7890" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition" required>
                    </div>
                </div>
            </div>

            <!-- Education Choices Section -->
            <div class="bg-blue-50 p-6 rounded-lg">
                <h3 class="text-xl font-semibold text-blue-700 mb-6 flex items-center">
                    <span class="bg-blue-100 p-2 rounded-full mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                        </svg>
                    </span>
                    Informasi Pendidikan
                </h3>
                
                <div class="space-y-6">
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Alasan Memilih SMK <span class="text-red-500">*</span></label>
                        <select name="alasan_memilih_smk" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition appearance-none" required>
                            <option value="" disabled selected>Pilih Alasan</option>
                            <option value="Pilihan_Sendiri">Pilihan Sendiri</option>
                            <option value="orang_tua">Orang Tua</option>
                            <option value="ajakan_teman">Ajakan Teman</option>
                            <option value="letak_sekolah_dekat_rumah">Letak Sekolah Dekat Rumah</option>
                            <option value="setelah_lulus_ingin_cepat_dapat_kerja">Setelah Lulus Ingin Cepat Dapat Kerja</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Setelah lulus nanti saya akan... <span class="text-red-500">*</span></label>
                        <select name="setelah_lulus" id="setelahLulusSelect" onchange="toggleFuturePlanFields()"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition appearance-none" required>
                            <option value="" disabled selected>Pilih Rencana</option>
                            <option value="Kuliah">Kuliah</option>
                            <option value="Bekerja">Bekerja</option>
                            <option value="Berwirausaha">Berwirausaha</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Conditional Fields Section -->
            <div id="KuliahPlanFields" style="display: none;" class="bg-purple-50 p-6 rounded-lg transition-all duration-300">
                <h3 class="text-xl font-semibold text-purple-700 mb-6 flex items-center">
                    <span class="bg-purple-100 p-2 rounded-full mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                        </svg>
                    </span>
                    Rencana Kuliah
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Perguruan Tinggi Tujuan</label>
                        <input type="text" name="kuliah" placeholder="Nama kampus/universitas" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Jurusan Kuliah</label>
                        <input type="text" name="jurusan_kuliah" placeholder="Jurusan yang diminati" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition">
                    </div>
                </div>
            </div>

            <div id="KerjaPlanFields" style="display: none;" class="bg-blue-50 p-6 rounded-lg transition-all duration-300">
                <h3 class="text-xl font-semibold text-blue-700 mb-6 flex items-center">
                    <span class="bg-blue-100 p-2 rounded-full mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </span>
                    Rencana Kerja
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Bidang Pekerjaan</label>
                        <input type="text" name="bidang_kerja" placeholder="Bidang pekerjaan yang diminati" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Posisi yang Diinginkan</label>
                        <input type="text" name="posisi_kerja" placeholder="Posisi pekerjaan" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                    </div>
                </div>
            </div>

            <div id="WirausahaPlanFields" style="display: none;" class="bg-amber-50 p-6 rounded-lg transition-all duration-300">
                <h3 class="text-xl font-semibold text-amber-700 mb-6 flex items-center">
                    <span class="bg-amber-100 p-2 rounded-full mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </span>
                    Rencana Wirausaha
                </h3>
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Jenis Usaha</label>
                        <input type="text" name="wirausaha" placeholder="Jenis usaha yang direncanakan" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition">
                    </div>
                </div>
            </div>

            <!-- Additional Information Section -->
            <div class="bg-green-50 p-6 rounded-lg">
                <h3 class="text-xl font-semibold text-green-700 mb-6 flex items-center">
                    <span class="bg-green-100 p-2 rounded-full mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </span>
                    Informasi Tambahan
                </h3>
                
                <div class="space-y-6">
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Menurut anda, apakah lulusan SMK bisa langsung siap bekerja jika lulus sekolah nanti dengan skill yang dimiliki sesuai jurusannya?</label>
                        <textarea name="pendapat" placeholder="Berikan pendapat Anda..." 
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition h-24"></textarea>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Kesan selama belajar di SMKN 1 Bengkulu</label>
                        <textarea name="kesan" placeholder="Bagikan kesan Anda..." 
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition h-24"></textarea>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Cita-cita</label>
                            <input type="text" name="cita_cita" placeholder="Cita-cita Anda" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Pelajaran Favorit</label>
                            <input type="text" name="pelajaran_favorit" placeholder="Pelajaran favorit Anda" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center">
                <button type="submit" class="bg-gradient-to-r from-teal-600 to-teal-500 hover:from-teal-700 hover:to-teal-600 text-white font-bold py-4 px-8 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                    </svg>
                    Kirim Formulir
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Success Notification -->
<div id="successNotification" class="success-notification">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    <div>
        <h3 class="font-bold text-lg">Survey Terkirim!</h3>
        <p id="successMessage">Terima kasih atas partisipasi Anda.</p>
    </div>
    <span class="close-btn">&times;</span>
</div>

<style>
    .success-notification {
        position: fixed;
        top: 20px;
        right: 20px;
        background: linear-gradient(to right, #38b2ac, #319795);
        color: white;
        padding: 20px 25px;
        border-radius: 10px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        z-index: 9999;
        transform: translateX(150%);
        transition: transform 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }
    
    .success-notification.show {
        transform: translateX(0);
    }
    
    .success-notification svg {
        flex-shrink: 0;
        margin-right: 15px;
    }
    
    .success-notification .close-btn {
        margin-left: 20px;
        cursor: pointer;
        opacity: 0.8;
        transition: opacity 0.3s;
    }
    
    .success-notification .close-btn:hover {
        opacity: 1;
    }
</style>

<script>
    // Toggle future plan fields
    function toggleFuturePlanFields() {
        const plan = document.getElementById("setelahLulusSelect").value;
        document.getElementById("KuliahPlanFields").style.display = "none";
        document.getElementById("KerjaPlanFields").style.display = "none";
        document.getElementById("WirausahaPlanFields").style.display = "none";
        if (plan === "Kuliah") {
            document.getElementById("KuliahPlanFields").style.display = "block";
        } else if (plan === "Bekerja") {
            document.getElementById("KerjaPlanFields").style.display = "block";
        } else if (plan === "Berwirausaha") {
            document.getElementById("WirausahaPlanFields").style.display = "block";
        }
    }

    // Fungsi untuk menampilkan notifikasi sukses
    function showSuccessNotification(message) {
        const notification = document.getElementById('successNotification');
        const messageElement = document.getElementById('successMessage');
        if (message) {
            messageElement.textContent = message;
        }
        notification.classList.add('show');
        // Auto hide setelah 5 detik
        setTimeout(() => {
            notification.classList.remove('show');
        }, 5000);
        // Close button event (bind only once)
        const closeBtn = notification.querySelector('.close-btn');
        if (closeBtn && !closeBtn.hasAttribute('data-bound')) {
            closeBtn.addEventListener('click', () => {
                notification.classList.remove('show');
            });
            closeBtn.setAttribute('data-bound', 'true');
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Get modal elements
        const verificationModal = document.getElementById('verificationModalSurvey');
        const surveyModal = document.getElementById('surveyModal');
        const closeVerificationBtn = document.getElementById('closeVerificationModalSurvey');
        const closeSurveyBtn = document.getElementById('closeSurveyModal');
        const verifyBtn = document.getElementById('verifyBtnSurvey');
        const nisnInput = document.getElementById('nisnInputSurvey');
        const errorMessage = document.getElementById('errorMessageSurvey');
        // Form input elements
        const formNisn = document.getElementById('formNisnSurvey');
        const formNama = document.getElementById('formNamaSurvey');
        const formJurusan = document.getElementById('formJurusanSurvey');
        const hiddenNisn = document.getElementById('hiddenNisn');
        const hiddenNama = document.getElementById('hiddenNama');
        const hiddenJurusan = document.getElementById('hiddenJurusan');
        // Verified info elements
        const verifiedNisn = document.getElementById('verifiedNisnSurvey');
        const verifiedName = document.getElementById('verifiedNameSurvey');
        const verifiedJurusan = document.getElementById('verifiedJurusanSurvey');
        // Function to open verification modal
        function openVerificationModal() {
            verificationModal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        // Function to close verification modal
        function closeVerificationModal() {
            verificationModal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
        // Function to open survey modal
        function openSurveyModal() {
            surveyModal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        // Function to close survey modal
        function closeSurveyModal() {
            surveyModal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
        // Event listeners for buttons
        const surveyBtn = document.getElementById('surveyBtn');
        if (surveyBtn) surveyBtn.addEventListener('click', openVerificationModal);
        if (closeVerificationBtn) closeVerificationBtn.addEventListener('click', closeVerificationModal);
        if (closeSurveyBtn) closeSurveyBtn.addEventListener('click', closeSurveyModal);
        // Close modals when clicking outside
        if (verificationModal) {
            verificationModal.addEventListener('click', function(e) {
                if (e.target === verificationModal) {
                    closeVerificationModal();
                }
            });
        }
        if (surveyModal) {
            surveyModal.addEventListener('click', function(e) {
                if (e.target === surveyModal) {
                    closeSurveyModal();
                }
            });
        }
        // Close modals with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                if (verificationModal && !verificationModal.classList.contains('hidden')) {
                    closeVerificationModal();
                }
                if (surveyModal && !surveyModal.classList.contains('hidden')) {
                    closeSurveyModal();
                }
            }
        });
        // Verify NISN
        if (verifyBtn) {
            verifyBtn.addEventListener('click', function() {
                const nisn = nisnInput.value.trim();
                if (!nisn) {
                    errorMessage.textContent = 'Silakan masukkan NISN';
                    errorMessage.classList.remove('hidden');
                    return;
                }
                // sudah verifikasi NISN
                fetch(`/verify-nisn-survey-exists?nisn=${nisn}`)
                .then(response => response.json())
                .then(data => {
                    if (data.exists) {
                        errorMessage.textContent = 'Anda sudah mengisi survey. Setiap siswa hanya dapat mengisi sekali.';
                        errorMessage.classList.remove('hidden');
                        return;
                    }
                    // AJAX call to verify NISN
                    fetch(`/verify-nisn?nisn=${nisn}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.success) {
                                closeVerificationModal();
                                // set form value
                                formNisn.value = data.student.nisn;
                                formNama.value = data.student.nama;
                                formJurusan.value = data.student.jurusan;
                                // hidden value
                                hiddenNisn.value = data.student.nisn;
                                hiddenNama.value = data.student.nama;
                                hiddenJurusan.value = data.student.jurusan;
                                openSurveyModal();
                                errorMessage.classList.add('hidden');
                            } else {
                                errorMessage.textContent = data.message || 'NISN tidak ditemukan atau sudah mengisi survey';
                                errorMessage.classList.remove('hidden');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            errorMessage.textContent = 'Terjadi kesalahan saat memverifikasi NISN';
                            errorMessage.classList.remove('hidden');
                        });
                })
                .catch(error => {
                    console.error('Error:', error);
                    errorMessage.textContent = 'Terjadi kesalahan saat memeriksa NISN';
                    errorMessage.classList.remove('hidden');
                });
            });
        }
        // Handle form submission
        const surveyForm = document.getElementById('surveyForm');
        if (surveyForm) {
            surveyForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const form = this;
                const formData = new FormData(form);
                fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showSuccessNotification(data.message);
                        setTimeout(() => {
                            form.reset();
                            closeSurveyModal();
                        }, 2000);
                    } else {
                        alert(data.message || 'Terjadi kesalahan');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat mengirim data');
                });
            });
        }
    });
</script>