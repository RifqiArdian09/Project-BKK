<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{assets('css/menu.css')}}">

</head>
<body class="bg-gray-100 min-h-screen p-4">
  <div class="container mx-auto px-4">
    <section id="menu" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 overflow-visible" data-aos="fade-up" data-aos-delay="100">
      
      <!-- 1. Survey Siswa Card -->
      <a id="surveyBtn" class="card bg-white rounded-xl p-6 flex flex-col items-center text-blue-500 hover:text-blue-600 shadow-md transition-all duration-300 ease-out
            hover:scale-105 hover:-translate-y-2 hover:shadow-2xl group">
        <div class="icon-container bg-blue-100 p-4 rounded-xl mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
          </svg>
        </div>
        <h2 class="text-2xl font-semibold mb-2">Survey siswa</h2>
        <p class="text-center text-gray-600 mb-4">Isi survey untuk siswa SMKN 1 Bengkulu.</p>
        <div class="flex items-center mt-auto">
        <span class="font-medium">Isi Survey</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 arrow" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </div>
      </a>

      <!-- 2. Form Alumni Card -->
      <a href="" id="alumniFormBtn" class="card bg-white rounded-xl p-6 flex flex-col items-center text-blue-500 hover:text-blue-600 shadow-md transition-all duration-300 ease-out
            hover:scale-105 hover:-translate-y-2 hover:shadow-2xl group">
        <div class="icon-container bg-orange-100 p-4 rounded-xl mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
          </svg>
        </div>
        <h2 class="text-2xl font-semibold mb-2">Form Alumni</h2>
        <p class="text-center text-gray-600 mb-4">Isi formulir untuk alumni SMKN 1 Bengkulu.</p>
        <div class="flex items-center mt-auto">
        <span class="font-medium">Isi Form</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 arrow" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </div>
      </a>

      <!-- 2. Info Alumni Card -->
      <a href="{{route ('infoalumni')}}" class="card bg-white rounded-xl p-6 flex flex-col items-center text-blue-500 hover:text-blue-600 shadow-md transition-all duration-300 ease-out
            hover:scale-105 hover:-translate-y-2 hover:shadow-2xl group">
        <div class="icon-container bg-red-100 p-4 rounded-xl mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
        </div>
        <h2 class="text-2xl font-semibold mb-2">Info Alumni</h2>
        <p class="text-center text-gray-600 mb-4">Informasi untuk alumni SMKN 1 Bengkulu.</p>
        <div class="flex items-center mt-auto">
        <span class="font-medium">Lihat Info</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 arrow" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </div>
      </a>
      
      <!-- 4. Job Vacancy Card -->
      <a href="{{route ('infolowongan')}}" class="card bg-white rounded-xl p-6 flex flex-col items-center text-blue-500 hover:text-blue-600 shadow-md transition-all duration-300 ease-out
            hover:scale-105 hover:-translate-y-2 hover:shadow-2xl group">
        <div class="icon-container bg-yellow-100 p-4 rounded-xl mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
          </svg>
        </div>
        <h2 class="text-2xl font-semibold mb-2">Lowongan Kerja</h2>
        <p class="text-center text-gray-600 mb-4">Informasi lowongan kerja untuk alumni.</p>
        <div class="flex items-center mt-auto">
        <span class="font-medium">Cari Lowongan</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 arrow" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </div>
      </a>

      <!-- 5. Alumni Data Card -->
      <a href="{{ route('filament.admin.auth.login') }}" class="card bg-white rounded-xl p-6 flex flex-col items-center text-blue-500 hover:text-blue-600 shadow-md transition-all duration-300 ease-out
            hover:scale-105 hover:-translate-y-2 hover:shadow-2xl group">
        <div class="icon-container bg-green-100 p-4 rounded-xl mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
          </svg>
        </div>
        <h2 class="text-2xl font-semibold mb-2">Data Alumni</h2>
        <p class="text-center text-gray-600 mb-4">Kelola data alumni SMKN 1 Bengkulu.</p>
        <div class="flex items-center mt-auto">
        <span class="font-medium">Kelola Data</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 arrow" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </div>
      </a>
      
      <!-- 6. Alumni Stats Card -->
      <a href="{{route ('menu.statistik')}}" class="card bg-white rounded-xl p-6 flex flex-col items-center text-blue-500 hover:text-blue-600 shadow-md transition-all duration-300 ease-out
            hover:scale-105 hover:-translate-y-2 hover:shadow-2xl group">
        <div class="icon-container bg-teal-100 p-4 rounded-xl mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
          </svg>
        </div>
        <h2 class="text-2xl font-semibold mb-2">Statistik Alumni</h2>
        <p class="text-center text-gray-600 mb-4">Statistik dan analisis data alumni.</p>
        <div class="flex items-center mt-auto">
        <span class="font-medium">Lihat Statistik</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 arrow" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </div>
      </a>
    </section>
  </div>
</body>
</html>

