<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hostel Booking</title>
  <!-- Tailwind CSS via CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Lucide Icons -->
  <script src="https://unpkg.com/lucide@latest"></script>
  <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            yellow: {
              400: "#FFD700", // Matching the yellow from the image
            },
          },
        },
      },
    }
  </script>
</head>
<body class="min-h-screen bg-white font-sans">
  <!-- Navigation -->
  <nav class="bg-black text-white p-3">
    <div class="container mx-auto flex justify-between items-center">
      <div class="font-bold">LOGO</div>
      <div class="hidden md:flex space-x-6">
        <a href="#" class="text-sm">HOME</a>
        <a href="#" class="text-sm">ROOMS</a>
        <a href="#" class="text-sm">GALLERY</a>
        <a href="#" class="text-sm">LOCATION</a>
        <a href="#" class="text-sm">CONTACT</a>
      </div>
      <div class="flex space-x-2">
        <button class="bg-yellow-400 text-black text-xs px-3 py-1 rounded">BOOK NOW</button>
        <button class="border border-white text-xs px-3 py-1 rounded">CONTACT US</button>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="container mx-auto px-4 py-8">
    <!-- Header -->
    <h1 class="text-2xl font-bold text-center mb-4">THE DORMS AND PRIVATE ROOMS</h1>
    
    <p class="text-center mb-8 max-w-3xl mx-auto text-sm">
      When you're ready for the easiest and most comfortable stay in town, you'll be
      happy to know that our hostel has the best location in the city center plus
      you'll be met with a lot of adventure.
    </p>

    <!-- Room Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
      <!-- Private Single Room -->
      <div class="border border-gray-200 rounded overflow-hidden flex">
        <div class="w-1/3">
          <img 
            src="https://placehold.co/200x200" 
            alt="Private Single Room" 
            class="h-full w-full object-cover"
          />
        </div>
        <div class="w-2/3 p-4 flex flex-col justify-between">
          <div>
            <h3 class="font-bold">Private Single Room</h3>
            <p class="text-xs mt-1">
              A cozy single room with a comfortable bed, perfect for solo travelers.
            </p>
          </div>
          <div class="flex justify-between items-end mt-4">
            <div>
              <div class="flex items-center">
                <span class="mr-2">1</span>
                <span class="text-xs">• 10 m²</span>
              </div>
              <div class="text-lg font-bold">€25</div>
              <div class="text-xs">/ 1 night</div>
            </div>
            <button class="bg-yellow-400 text-black font-bold text-sm px-4 py-1 rounded">
              Book Now
            </button>
          </div>
        </div>
      </div>

      <!-- Private Double Room -->
      <div class="border border-gray-200 rounded overflow-hidden flex">
        <div class="w-1/3">
          <img 
            src="https://placehold.co/200x200" 
            alt="Private Double Room" 
            class="h-full w-full object-cover"
          />
        </div>
        <div class="w-2/3 p-4 flex flex-col justify-between">
          <div>
            <h3 class="font-bold">Private Double Room</h3>
            <p class="text-xs mt-1">
              Spacious double room with a comfortable bed, perfect for couples or friends traveling together.
            </p>
          </div>
          <div class="flex justify-between items-end mt-4">
            <div>
              <div class="flex items-center">
                <span class="mr-2">2</span>
                <span class="text-xs">• 20 m²</span>
              </div>
              <div class="text-lg font-bold">€30</div>
              <div class="text-xs">/ 1 night</div>
            </div>
            <button class="bg-yellow-400 text-black font-bold text-sm px-4 py-1 rounded">
              Book Now
            </button>
          </div>
        </div>
      </div>

      <!-- 8-Bed Mixed Dorm -->
      <div class="border border-gray-200 rounded overflow-hidden flex">
        <div class="w-1/3">
          <img 
            src="https://placehold.co/200x200" 
            alt="8-Bed Mixed Dorm" 
            class="h-full w-full object-cover"
          />
        </div>
        <div class="w-2/3 p-4 flex flex-col justify-between">
          <div>
            <h3 class="font-bold">8-Bed Mixed Dorm</h3>
            <p class="text-xs mt-1">
              Cozy and comfortable 8-bed mixed dorm with shared facilities, perfect for budget travelers.
            </p>
          </div>
          <div class="flex justify-between items-end mt-4">
            <div>
              <div class="flex items-center">
                <span class="mr-2">1</span>
                <span class="text-xs">• 30 m²</span>
              </div>
              <div class="text-lg font-bold">€13</div>
              <div class="text-xs">/ 1 night</div>
            </div>
            <button class="bg-yellow-400 text-black font-bold text-sm px-4 py-1 rounded">
              Book Now
            </button>
          </div>
        </div>
      </div>

      <!-- 5-Bed Mixed Dorm -->
      <div class="border border-gray-200 rounded overflow-hidden flex">
        <div class="w-1/3">
          <img 
            src="https://placehold.co/200x200" 
            alt="5-Bed Mixed Dorm" 
            class="h-full w-full object-cover"
          />
        </div>
        <div class="w-2/3 p-4 flex flex-col justify-between">
          <div>
            <h3 class="font-bold">5-Bed Mixed Dorm</h3>
            <p class="text-xs mt-1">
              Cozy and comfortable 5-bed mixed dorm with shared facilities, perfect for budget travelers.
            </p>
          </div>
          <div class="flex justify-between items-end mt-4">
            <div>
              <div class="flex items-center">
                <span class="mr-2">1</span>
                <span class="text-xs">• 30 m²</span>
              </div>
              <div class="text-lg font-bold">€13</div>
              <div class="text-xs">/ 1 night</div>
            </div>
            <button class="bg-yellow-400 text-black font-bold text-sm px-4 py-1 rounded">
              Book Now
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- What's Included Section -->
    <div class="mb-12">
      <h2 class="text-2xl font-bold mb-6">What's included?</h2>
      <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
        <div class="flex items-center">
          <i data-lucide="check" class="h-5 w-5 text-green-500 mr-2"></i>
          <span class="text-sm">Free WiFi</span>
        </div>
        <div class="flex items-center">
          <i data-lucide="check" class="h-5 w-5 text-green-500 mr-2"></i>
          <span class="text-sm">Shared kitchen and baths</span>
        </div>
        <div class="flex items-center">
          <i data-lucide="check" class="h-5 w-5 text-green-500 mr-2"></i>
          <span class="text-sm">Fresh Linens</span>
        </div>
        <div class="flex items-center">
          <i data-lucide="check" class="h-5 w-5 text-green-500 mr-2"></i>
          <span class="text-sm">Lockers</span>
        </div>
        <div class="flex items-center">
          <i data-lucide="check" class="h-5 w-5 text-green-500 mr-2"></i>
          <span class="text-sm">24hr Open WiFi</span>
        </div>
        <div class="flex items-center">
          <i data-lucide="check" class="h-5 w-5 text-green-500 mr-2"></i>
          <span class="text-sm">Washing Powder</span>
        </div>
      </div>
    </div>

    <!-- Fully Equipped Kitchen -->
    <div class="mb-12">
      <h2 class="text-2xl font-bold mb-6">Fully equipped kitchen</h2>
      <div class="flex flex-col md:flex-row gap-6">
        <div class="md:w-1/2">
          <img 
            src="https://placehold.co/500x300" 
            alt="Fully equipped kitchen" 
            class="w-full h-auto rounded"
          />
        </div>
        <div class="md:w-1/2">
          <p class="text-sm">
            Our fully equipped kitchen allows you to prepare your own meals, saving money during your travels. 
            The kitchen includes a stove, oven, microwave, refrigerator, and all the utensils you need. 
            It's a great place to meet other travelers while cooking your favorite dishes. 
            We also provide basic ingredients like oil, salt, and spices for your convenience.
          </p>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer class="border-t pt-6 mt-12">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div>
          <h3 class="font-bold text-sm mb-2">CONTACT INFO</h3>
          <p class="text-xs">Address: 123 Main St</p>
          <p class="text-xs">Phone: +123 456 7890</p>
        </div>
        <div>
          <h3 class="font-bold text-sm mb-2">LOCATION INFO</h3>
          <p class="text-xs">City Center, close to all attractions</p>
        </div>
        <div>
          <h3 class="font-bold text-sm mb-2">EMAIL US</h3>
          <p class="text-xs">info@hostelbooking.com</p>
        </div>
      </div>
    </footer>
  </main>

  <!-- Initialize Lucide Icons -->
  <script>
    lucide.createIcons();
  </script>
</body>
</html>
