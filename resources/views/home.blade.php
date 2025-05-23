<x-layouts.app title="Home">
    <div class="relative min-h-screen flex items-start bg-[url('/public/storage/assets/background.png')] bg-center bg-cover bg-no-repeat md:items-center overflow-hidden">
        <div class="container mx-auto flex flex-col md:flex-row items-start md:items-center justify-between w-10/12 px-4 pt-24 relative">
            <div class="text-left text-white">
                <h1 class="text-5xl font-bold leading-tight">Delivering Trust,</h1>
                <h1 class="text-5xl font-bold leading-tight">
                    <span class="text-yellow-400">Connecting</span> the Future
                </h1>
            </div>
        </div>
        <img src="{{ asset('storage/assets/mobil.png') }}" alt="Mobil" class="absolute bottom-0 right-0 w-auto h-1/2 md:h-2/3 md:max-w-[80%] max-h-3/4 -mr-6 object-cover object-left-top">

        <!-- Ombak di Bagian Bawah -->
        <div class="absolute bottom-0 left-0 w-full">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#FFFFFF" fill-opacity="1" d="M0,288L80,266.7C160,245,320,203,480,208C640,213,800,267,960,277.3C1120,288,1280,256,1360,240L1440,224L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
            </svg>
        </div>
    </div>

    <!-- Stats Section -->
  <div class="bg-white py-16">
    <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-10 text-center">
      <div>
        <div class="text-indigo-500 text-6xl mb-4">
          <i class="fas fa-car"></i>
        </div>
        <h3 class="text-2xl font-semibold">10k +</h3>
        <p class="text-gray-500">deliver the car</p>
      </div>
      <div>
        <div class="text-indigo-500 text-6xl mb-4">
          <i class="fas fa-map-marker-alt"></i>
        </div>
        <h3 class="text-2xl font-semibold">30</h3>
        <p class="text-gray-500">Company Branch</p>
      </div>
      <div>
        <div class="text-indigo-500 text-6xl mb-4">
          <i class="fas fa-truck"></i>
        </div>
        <h3 class="text-2xl font-semibold">46</h3>
        <p class="text-gray-500">Has a Truck Fleet</p>
      </div>
    </div>
  </div>

  <!-- Partnership Section -->
  <div class="bg-gray-100 py-12">
    <h2 class="text-center text-2xl font-semibold mb-10">PARTNERSHIP</h2>
    <div class="flex justify-center flex-wrap gap-8">
      <img src="/images/wuling.png" class="h-16" alt="Wuling">
      <img src="/images/toyota.png" class="h-16" alt="Toyota">
      <img src="/images/honda.png" class="h-16" alt="Honda">
      <img src="/images/suzuki.png" class="h-16" alt="Suzuki">
    </div>
  </div>
</x-layouts.app>
