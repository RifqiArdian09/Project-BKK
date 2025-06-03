<!-- NISN Verification Modal -->
<div id="verificationModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden p-4">
    <div class="bg-white rounded-xl shadow-2xl p-6 w-full max-w-md">
        <!-- Modal Header -->
        <div class="flex justify-between items-center mb-6 pb-4 border-b border-gray-200">
            <div>
                <h2 class="text-2xl font-bold text-teal-700">Verifikasi NISN</h2>
                <p class="text-gray-500 mt-1">Masukkan NISN Anda untuk melanjutkan</p>
                <p class="text-gray-500 mt-1">Note: tiap alumni hanya bisa mengisi 1x</p>
            </div>
            <button id="closeVerificationModal" class="text-gray-500 hover:text-gray-700 transition transform hover:rotate-90">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        
        <!-- Verification Form -->
        <div class="space-y-6">
            <div>
                <label class="block text-gray-700 font-medium mb-2">NISN <span class="text-red-500">*</span></label>
                <input type="text" id="nisnInput" placeholder="Masukkan NISN Anda" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition" required>
                <p id="errorMessage" class="text-red-500 mt-2 hidden"></p>
            </div>
            
            <div class="flex justify-center">
                <button id="verifyBtn" class="bg-teal-600 hover:bg-teal-700 text-white font-bold py-3 px-6 rounded-lg shadow hover:shadow-md transition flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    Verifikasi
                </button>
            </div>
        </div>
    </div>
</div>
          
<!-- Full Alumni Form Modal (initially hidden) -->
<div id="fullForm" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden p-4">
    <div class="bg-white rounded-xl shadow-2xl p-6 w-full max-w-4xl" style="max-height: 90vh; display: flex; flex-direction: column;">
        <!-- Modal Header -->
        <div class="flex justify-between items-center mb-6 pb-4 border-b border-gray-200">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold text-teal-700">Formulir Data Alumni</h2>
                <p class="text-gray-500 mt-1">SMKN 1 Bengkulu</p>
            </div>
            <button id="closeAlumniFormModal" class="text-gray-500 hover:text-gray-700 transition transform hover:rotate-90">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        
        <!-- Success Message -->
        <div id="successMessage" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded hidden">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p id="successText"></p>
            </div>
        </div>

        <!-- Form Container with scrollable content -->
        <div class="flex-1 overflow-y-auto pr-2"> <!-- Added pr-2 to prevent content shift when scrollbar appears -->
            <form id="formAlumni" action="{{ route('formalumni.store') }}" method="POST" class="space-y-8">
                @csrf
                
                <!-- Hidden inputs for verified data -->
                <input type="hidden" id="nisn" name="nisn">
                <input type="hidden" id="nama" name="nama">
                <input type="hidden" id="jurusan" name="jurusan">
                
                <!-- Personal Information Section -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h3 class="text-xl font-semibold text-teal-700 mb-6 flex items-center">
                        <span class="bg-teal-100 p-2 rounded-full mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-teal-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        Informasi Tambahan
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">NISN <span class="text-red-500">*</span></label>
                            <input type="text" name="nisn" id="formNisn" placeholder="Masukkan NISN" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition" required readonly>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                            <input type="text" name="nama" id="formNama" placeholder="Masukkan nama lengkap" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition" required readonly>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Jurusan <span class="text-red-500">*</span></label>
                            <input type="text" name="jurusan" id="formJurusan" placeholder="Masukkan jurusan" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition" required readonly>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Alamat <span class="text-red-500">*</span></label>
                            <input type="text" id="alamat" name="alamat" placeholder="Masukkan alamat lengkap" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition" required>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Email <span class="text-red-500">*</span></label>
                            <input type="email" id="email" name="email" placeholder="contoh@email.com" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition" required>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Nomor HP/WhatsApp <span class="text-red-500">*</span></label>
                            <input type="tel" id="no_hp" name="no_hp" placeholder="0812-3456-7890" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition" required>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Tahun Lulus <span class="text-red-500">*</span></label>
                            <input type="text" id="tahun_lulus" name="tahun_lulus" placeholder="Tahun Lulus" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition" required>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-medium mb-2">Status Saat Ini <span class="text-red-500">*</span></label>
                            <select id="status" name="status" onchange="toggleFields()"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition appearance-none" required>
                                <option value="" disabled selected>Pilih Status</option>
                                <option value="Kerja">Bekerja</option>
                                <option value="Kuliah">Kuliah</option>
                                <option value="Wirausaha">Berwirausaha</option>
                                <option value="Menganggur">Belum Bekerja/Kuliah</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Conditional Fields -->
                <div id="KerjaFields" style="display: none;" class="bg-blue-50 p-6 rounded-lg transition-all duration-300">
                    <h3 class="text-xl font-semibold text-blue-700 mb-6 flex items-center">
                        <span class="bg-blue-100 p-2 rounded-full mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </span>
                        Informasi Pekerjaan
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Profesi</label>
                            <input type="text" name="profesi" placeholder="Mis: Software Developer" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Jabatan</label>
                            <input type="text" name="jabatan" placeholder="Mis: Staff, Manager" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Lokasi Kerja</label>
                            <input type="text" name="lokasi_kerja" placeholder="Nama Perusahaan,Kota/Provinsi" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Jumlah Gaji</label>
                            <input type="number" name="gaji_kerja" placeholder="Jumlah Gaji" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-medium mb-2">Alasan Bekerja</label>
                            <textarea name="alasan_kerja" placeholder="Apakah pekerjaan Anda sesuai dengan jurusan di SMK? Jelaskan..." 
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition h-32"></textarea>
                        </div>
                    </div>
                </div>

                <div id="KuliahFields" style="display: none;" class="bg-purple-50 p-6 rounded-lg transition-all duration-300">
                    <h3 class="text-xl font-semibold text-purple-700 mb-6 flex items-center">
                        <span class="bg-purple-100 p-2 rounded-full mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                            </svg>
                        </span>
                        Informasi Pendidikan Lanjut
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Nama Perguruan Tinggi</label>
                            <input type="text" name="kampus" placeholder="Nama kampus/universitas" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Program Studi</label>
                            <input type="text" name="jurusan_kuliah" placeholder="Jurusan kuliah" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Lokasi Kampus</label>
                            <input type="text" name="lokasi_kuliah" placeholder="Kota/Provinsi" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-medium mb-2">Alasan Kuliah</label>
                            <textarea name="alasan_kuliah" placeholder="Apakah kuliah Anda sesuai dengan jurusan di SMK? Jelaskan..." 
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition h-32"></textarea>
                        </div>
                    </div>
                </div>

                <div id="WirausahaFields" style="display: none;" class="bg-amber-50 p-6 rounded-lg transition-all duration-300">
                    <h3 class="text-xl font-semibold text-amber-700 mb-6 flex items-center">
                        <span class="bg-amber-100 p-2 rounded-full mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </span>
                        Informasi Wirausaha
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Bidang Usaha</label>
                            <input type="text" name="bidang_usaha" placeholder="Mis: Makanan, Teknologi" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Lokasi Usaha</label>
                            <input type="text" name="lokasi_wirausaha" placeholder="Kota/Provinsi" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Jumlah Gaji</label>
                            <input type="number" name="gaji_wirausaha" placeholder="Jumlah Gaji" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-medium mb-2">Alasan Wirausaha</label>
                            <textarea name="alasan_wirausaha" placeholder="Apakah usaha Anda sesuai dengan jurusan di SMK? Jelaskan..." 
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition h-32"></textarea>
                        </div>
                    </div>
                </div>

                <div id="MenganggurFields" style="display: none;" class="bg-gray-50 p-6 rounded-lg transition-all duration-300">
                    <h3 class="text-xl font-semibold text-gray-700 mb-6 flex items-center">
                        <span class="bg-gray-100 p-2 rounded-full mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </span>
                        Status Saat Ini
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-medium mb-2">Alasan tidak bekerja, berwirausaha, ataupun kuliah</label>
                            <input type="text" name="alasan_menganggur" placeholder="Mis: Masih mencari pekerjaan, belum ada kesempatan kuliah"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition">
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center pt-6">
                    <button type="submit" class="bg-gradient-to-r from-teal-600 to-teal-500 hover:from-teal-700 hover:to-teal-600 text-white font-bold py-4 px-8 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                        </svg>
                        Kirim 
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Success Notification -->
<div id="successNotificationAlumni" class="success-notification">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    <div>
        <h3 class="font-bold text-lg">Data Terkirim!</h3>
        <p id="successMessageAlumni">Terima kasih atas partisipasi Anda.</p>
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

    /* Hide scrollbar but allow scrolling */
    .overflow-y-auto {
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }
    .overflow-y-auto::-webkit-scrollbar {
        display: none;  /* Chrome, Safari and Opera */
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Alumni Form Modal
    const alumniFormBtn = document.getElementById('alumniFormBtn');
    const verificationModal = document.getElementById('verificationModal');
    const closeVerificationModal = document.getElementById('closeVerificationModal');
    const verifyBtn = document.getElementById('verifyBtn');
    const nisnInput = document.getElementById('nisnInput');
    const errorMessage = document.getElementById('errorMessage');
    const fullForm = document.getElementById('fullForm');
    const closeAlumniFormModal = document.getElementById('closeAlumniFormModal');
    const verifiedNisn = document.getElementById('verifiedNisn');
    const verifiedName = document.getElementById('verifiedName');
    const verifiedJurusan = document.getElementById('verifiedJurusan');
    const formNisn = document.getElementById('formNisn');
    const formNama = document.getElementById('formNama');
    const formJurusan = document.getElementById('formJurusan');

    // Open verification modal when alumni form button is clicked
    if (alumniFormBtn) {
        alumniFormBtn.addEventListener('click', function(e) {
            e.preventDefault();
            verificationModal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        });
    }

    // Close verification modal
    closeVerificationModal.addEventListener('click', function() {
        verificationModal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    });

    // Close verification modal when clicking outside
    verificationModal.addEventListener('click', function(e) {
        if (e.target === verificationModal) {
            verificationModal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    });

    // Verify NISN
    verifyBtn.addEventListener('click', function() {
        const nisn = nisnInput.value.trim();
        if (!nisn) {
            errorMessage.textContent = 'Silakan masukkan NISN';
            errorMessage.classList.remove('hidden');
            return;
        }

        // First check if NISN already exists in alumni database
        fetch(`/check-nisn-exists?nisn=${nisn}`)
            .then(response => response.json())
            .then(data => {
                if (data.exists) {
                    errorMessage.textContent = 'Anda sudah mengisi formulir alumni. Setiap alumni hanya dapat mengisi sekali.';
                    errorMessage.classList.remove('hidden');
                    return;
                }

                // If NISN doesn't exist, verify with student database
                fetch(`/verify-nisn?nisn=${nisn}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            verificationModal.classList.add('hidden');
                            fullForm.classList.remove('hidden');
                            // Set Hidden
                            formNisn.value = data.student.nisn;
                            formNama.value = data.student.nama;
                            formJurusan.value = data.student.jurusan;
                            // Set hidden input values
                            document.getElementById('nisn').value = data.student.nisn;
                            document.getElementById('nama').value = data.student.nama;
                            document.getElementById('jurusan').value = data.student.jurusan;
                            errorMessage.classList.add('hidden');
                        } else {
                            errorMessage.textContent = data.message || 'NISN tidak ditemukan';
                            errorMessage.classList.remove('hidden');
                        }
                    });
            })
            .catch(error => {
                console.error('Error:', error);
                errorMessage.textContent = 'Terjadi kesalahan saat memverifikasi NISN';
                errorMessage.classList.remove('hidden');
            });
    });

    // Close full form modal
    closeAlumniFormModal.addEventListener('click', function() {
        fullForm.classList.add('hidden');
        document.body.style.overflow = 'auto';
    });

    // Close full form modal when clicking outside
    fullForm.addEventListener('click', function(e) {
        if (e.target === fullForm) {
            fullForm.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    });

    // Close modals with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            if (!verificationModal.classList.contains('hidden')) {
                verificationModal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }
            if (!fullForm.classList.contains('hidden')) {
                fullForm.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }
        }
    });

    // Handle form submission
    document.getElementById('formAlumni').addEventListener('submit', function(e) {
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
                showSuccessNotification(data.message || 'Data alumni berhasil dikirim!');
                // Reset form dan tutup modal setelah 2 detik
                setTimeout(() => {
                    form.reset();
                    fullForm.classList.add('hidden');
                    document.body.style.overflow = 'auto';
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

    // Fungsi untuk menampilkan notifikasi sukses
    function showSuccessNotification(message) {
        const notification = document.getElementById('successNotificationAlumni');
        const messageElement = document.getElementById('successMessageAlumni');
        if (message) {
            messageElement.textContent = message;
        }
        notification.classList.add('show');
        // Auto hide setelah 5 detik
        setTimeout(() => {
            notification.classList.remove('show');
        }, 5000);
    }

    // Close notification on click
    document.querySelector('#successNotificationAlumni .close-btn').addEventListener('click', function() {
        document.getElementById('successNotificationAlumni').classList.remove('show');
    });
});

// Toggle conditional fields
function toggleFields() {
    const status = document.getElementById("status").value;
    document.getElementById("KerjaFields").style.display = "none";
    document.getElementById("KuliahFields").style.display = "none";
    document.getElementById("WirausahaFields").style.display = "none";
    document.getElementById("MenganggurFields").style.display = "none";
    if (status === "Kerja") {
        document.getElementById("KerjaFields").style.display = "block";
    } else if (status === "Kuliah") {
        document.getElementById("KuliahFields").style.display = "block";
    } else if (status === "Wirausaha") {
        document.getElementById("WirausahaFields").style.display = "block";
    } else if (status === "Menganggur") {
        document.getElementById("MenganggurFields").style.display = "block";
    }
}
</script>