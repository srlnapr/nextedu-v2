<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @vite('resources/css/app.css')

  <!-- Favicon standar -->
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon_io/favicon-16x16.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon_io/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="48x48" href="{{ asset('assets/favicon_io/favicon-48x48.png') }}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/favicon_io/favicon-96x96.png') }}">
  <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/favicon_io/android-chrome-192x192.png') }}">
  <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('assets/favicon_io/android-chrome-512x512.png') }}">
  <title>nextEdu</title>
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-white min-h-screen">

  <!-- Navbar -->
  <!-- Original navbar code with modified logo section -->
  <header id="navbar"
    class="fixed top-0 left-0 z-50 w-full bg-white shadow-md transition-shadow duration-300 lg:hidden">
    <div class="container">
      <div class="relative flex items-center justify-between py-4">
        <!-- Logo section - modified to contain two logos -->
        <div class="px-4 flex items-center space-x-3">
          <!-- Original nextEdu logo -->
          <a href="/">
            <img src="{{ asset('assets/logo/logo-typo.svg') }}" alt="Logo nextEdu" class="w-28">
          </a>
          <!-- Added second school logo -->
         
        </div>

        <!-- Tombol Hamburger - unchanged -->
        <div class="flex items-center lg:hidden ml-auto mr-4">
          <button id="hamburger" name="hamburger" type="button" class="block">
            <span class="hamburger-line transition duration-300 ease-in-out bg-purpleMain w-6 h-1 mb-1 block"></span>
            <span class="hamburger-line transition duration-300 ease-in-out bg-purpleMain w-6 h-1 mb-1 block"></span>
            <span class="hamburger-line transition duration-300 ease-in-out bg-purpleMain w-6 h-1 block"></span>
          </button>
        </div>
      </div>
    </div>
  </header>
  <!-- Menu Navigasi -->
  <nav id="nav-menu"
    class="fixed top-[60px] right-0 w-1/2 h-screen bg-white shadow-md hidden flex flex-col justify-between z-40 transition-all duration-300">
    <ul class="block w-full text-left mt-6 px-6 space-y-3 text-lg">
      <li><a href="/" class="block py-1 text-black hover:text-purpleMain">Beranda</a></li>
      <li><a href="/tesminatmu" class="block py-1 text-black hover:text-purpleMain">Tes Minatmu</a></li>
      <li><a href="/tanyaJurpan" class="block py-1 text-black hover:text-purpleMain">Edubot</a></li>
      <li><a href="/artikelPage" class="block py-1 text-black hover:text-purpleMain">Artikel</a></li>
      @auth
      <li><a href="/dashboard" class="block py-1 text-black hover:text-purpleMain">Riwayat Tes</a></li>
      <li>
        <form action="/logout" method="post" class="block py-1">
          @csrf
          <button class="w-full text-left text-red-600 hover:text-red-800">Logout</button>
        </form>
      </li>
      @endauth
    </ul>

    <!-- Tombol Login & Signup -->
    @guest
    <div class="px-6 pb-8 w-full mt-8 space-y-8">
      <!-- Tambah space-y-4 untuk jarak antar tombol -->
      <a href="/login"
        class="block w-full text-center bg-purpleMain text-white py-2 rounded-md text-base font-semibold shadow-md hover:bg-purple-700 transition">
        Masuk
      </a>
      <a href="/register"
        class="block w-full text-center border border-purpleMain text-purpleMain py-2 rounded-md text-base font-semibold shadow-md hover:bg-purpleMain hover:text-white transition">
        Daftar
      </a>
    </div>

    @endguest
  </nav>

  <!-- Script -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
  const hamburger = document.getElementById("hamburger");
  const navMenu = document.getElementById("nav-menu");
  const navbar = document.getElementById("navbar");
  const lines = hamburger.querySelectorAll(".hamburger-line");


  // Toggle menu
  hamburger.addEventListener("click", function () {
        navMenu.classList.toggle("hidden");
        navMenu.classList.toggle("flex");

        // Ubah bentuk hamburger jadi "X"
        lines[0].classList.toggle("rotate-45");
        lines[0].classList.toggle("translate-y-2.5");

        lines[1].classList.toggle("opacity-0");

        lines[2].classList.toggle("-rotate-45");
        lines[2].classList.toggle("-translate-y-2.5");
    });

  // Tambah shadow saat discroll
  window.addEventListener("scroll", function () {
      if (window.scrollY > 50) {
          navbar.classList.add("shadow-md", "bg-white");
      } else {
          navbar.classList.remove("shadow-md", "bg-white");
      }
  });
});
  </script>

  <div class="flex flex-col lg:flex-row-reverse w-full h-screen ">
    <!-- Ilustrasi (Di sebelah kanan di desktop) -->
    <div class="w-full lg:w-1/2 flex items-center justify-center px-4">
      <img src="{{ asset('assets/img/imgLogin.svg') }}" alt="Login Illustration"
        class="w-full max-w-xs lg:max-w-md transform -translate-y-6">
    </div>

    <!-- Form Login -->
    <div class="w-full lg:w-2/3 flex items-center justify-center bg-white lg:shadow-lg p-4 lg:p-6">
      <div class="w-full max-w-md">
        <div class="text-center mt-4 mb-8 lg:mb-12">
          <!-- Modified logo section with both logos -->
          <div class="flex items-center justify-center space-x-3 mb-2">
            <!-- NextEdu Logo -->

            <img src="{{ asset('assets/logo/logo-typo.svg') }}" alt="NextEdu Logo" class="h-10 lg:h-12">
            <!-- School Logo -->
          </div>
          <p class="text-gray-600 font-semibold mt-1">Masuk ke akun Anda</p>
        </div>

        <form action="/login" method="POST">
          @csrf
          <!-- Alert Container - Modified to include auto-dismiss -->
  <div id="alerts-container">
    <!-- Display session error message -->
    @if(session('error'))
    <div class="bg-red-100 border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 alert-dismissible" role="alert">
      <span class="block sm:inline">{{ session('error') }}</span>
      <!-- Progress bar and close button will be added by JavaScript -->
    </div>
    @endif
  </div>
          <!-- Display validation errors -->
          @if($errors->any())
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <ul>
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <div class="grid grid-cols-1 gap-y-3">
            <!-- Email -->
            <div class="form-group">
              <label class="label" for="email">Email</label>
              <div class="rectangle">
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="input-field"
                  placeholder="Masukkan email..">
                <div class="icon-container">
                  <div class="icon email-icon"></div>
                </div>
              </div>
              @error('email')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>

            <!-- Password -->
            <div class="form-group">
              <label class="label" for="password">Password</label>
              <div class="rectangle relative">
                <input type="password" id="password" name="password" class="input-field"
                  placeholder="Masukkan password..">

                <!-- Added both eye icons with proper positioning -->
                <!-- Toggle button positioned to the left of the lock icon -->
                <div class="absolute right-14 top-1/2 transform -translate-y-1/2 cursor-pointer z-10"
                  id="togglePassword">
                  <!-- Eye open icon -->
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="black" class="h-5 w-5 text-black hidden" id="showPassword">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>

                  <!-- Eye closed icon -->
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="black" class="h-5 w-5 text-black" id="hidePassword">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                  </svg>
                </div>

                <!-- Lock icon container -->
                <div class="icon-container">
                  <div class="icon lock-icon"></div>
                </div>
              </div>
              @error('password')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>

            <script>
              const togglePassword = document.getElementById('togglePassword');
  const passwordInput = document.getElementById('password');
  const showPasswordIcon = document.getElementById('showPassword');
  const hidePasswordIcon = document.getElementById('hidePassword');
  
  togglePassword.addEventListener('click', function() {
    // Toggle the password field type
    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      showPasswordIcon.classList.remove('hidden');
      hidePasswordIcon.classList.add('hidden');
    } else {
      passwordInput.type = 'password';
      showPasswordIcon.classList.add('hidden');
      hidePasswordIcon.classList.remove('hidden');
    }
  });
            </script>
            <!-- Lupa Password -->
            <div class="flex justify-end items-center -mt-1 -left-20">
              <!-- In your login page, change this link: -->
              <a href="{{ route('password.request') }}" class="forgot-password">Lupa password?</a>
            </div>

            <!-- Tombol Login -->
            <button type="submit"
              class="w-full text-white py-2.5 lg:py-3 rounded-lg mt-6 lg:mt-8 transition bg-[#493D9E] hover:bg-purpleHover font-semibold">
              Masuk
            </button>

            <div class="flex-row">
              <div class="line"></div>
              <span class="atau">Atau</span>
              <div class="line-6"></div>
            </div>

            <!-- Tombol Login dengan Google (diubah dari tombol Register) -->
            <a href="{{ route('login.google') }}"
              class="flex items-center justify-center gap-2 w-full py-3 rounded-lg border border-gray-300 hover:bg-gray-50 transition-all h-12">
              <img src="{{ asset('assets/icon/google-icon.svg') }}" alt="Google" class="w-5 h-5">
              <span class="font-medium">Masuk dengan Google</span>
            </a>

            <!-- Link Pengalihan ke Register -->
            <div class="text-center mt-4 text-gray-500 text-sm">
              Belum punya akun? <a href="/register" class="text-purpleMain font-semibold">Daftar di sini</a>
            </div>

        </form>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Check if there are any error messages
      const hasEmailError = document.querySelector('[class*="email_error"]') !== null;
      const hasPasswordError = document.querySelector('[class*="password_error"]') !== null;
      const generalError = document.querySelector('.bg-red-100');
      
      // Function to add shake animation
      function addShakeAnimation(element) {
        if (element) {
          element.classList.add('animate__animated', 'animate__shakeX');
        }
      }
      
      // Apply shake animation to general error first
      if (generalError) {
        addShakeAnimation(generalError);
      }
      
      // Handle email field error
      if (hasEmailError) {
        const emailField = document.getElementById('email');
        const emailContainer = emailField.closest('.rectangle');
        
        // Add error styling
        emailContainer.classList.add('border-red-500');
        emailField.classList.add('bg-red-50');
        
        // Focus on email field
        setTimeout(() => {
          emailField.focus();
          addShakeAnimation(emailContainer);
        }, 300);
      }
      
      // Handle password field error
      if (hasPasswordError) {
        const passwordField = document.getElementById('password');
        const passwordContainer = passwordField.closest('.rectangle');
        
        // Add error styling
        passwordContainer.classList.add('border-red-500');
        passwordField.classList.add('bg-red-50');
        
        // Only focus on password if no email error (email takes precedence)
        if (!hasEmailError) {
          setTimeout(() => {
            passwordField.focus();
            addShakeAnimation(passwordContainer);
          }, 300);
        }
      }
    });
  </script>
<style>
  /* Improved alert styling with countdown */
  .bg-red-100 {
    background-color: #fee2e2;
    border-radius: 6px;
    padding: 12px 16px;
    margin-bottom: 16px;
    display: flex;
    align-items: center;
    position: relative;
    overflow: hidden; /* For the progress bar */
    border-left: 4px solid #ef4444;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    transition: opacity 0.5s ease, transform 0.3s ease;
  }
  
  /* Progress bar animation */
  @keyframes countdown {
    from { width: 100%; }
    to { width: 0%; }
  }
  
  /* Field error messages */
  .text-red-500 {
    color: #ef4444;
    font-size: 0.75rem;
    margin-top: 4px;
    transition: opacity 0.5s ease;
  }
  
  /* Close button hover effect */
  .bg-red-100 button:hover {
    color: #b91c1c;
    transform: scale(1.1);
  }
  
  /* Make sure all transitions are smooth */
  .bg-red-100, .text-red-500, .bg-red-100 button {
    transition: all 0.3s ease;
  }
</style>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Function to add and control progress bar for alerts
    function setupAlertCountdowns() {
      // Duration in milliseconds
      const duration = 5000; 
      
      // Select all error alert elements
      const alertContainers = document.querySelectorAll('.bg-red-100');
      const errorMessages = document.querySelectorAll('.text-red-500');
      
      // Process main alert containers
      if (alertContainers.length > 0) {
        alertContainers.forEach(container => {
          // Add a close button
          const closeBtn = document.createElement('button');
          closeBtn.innerHTML = '&times;';
          closeBtn.className = 'ml-auto text-lg font-bold leading-none';
          closeBtn.style.marginLeft = 'auto';
          closeBtn.onclick = function() {
            container.style.opacity = '0';
            setTimeout(() => container.style.display = 'none', 300);
          };
          container.appendChild(closeBtn);
          
          // Add progress bar
          const progressBar = document.createElement('div');
          progressBar.className = 'absolute bottom-0 left-0 h-1 bg-red-400';
          progressBar.style.width = '100%';
          progressBar.style.transition = `width ${duration/1000}s linear`;
          container.style.position = 'relative';
          container.appendChild(progressBar);
          
          // Start the countdown animation
          setTimeout(() => {
            progressBar.style.width = '0%';
          }, 50);
          
          // Hide the alert when time expires
          setTimeout(() => {
            container.style.transition = 'opacity 0.5s ease';
            container.style.opacity = '0';
            setTimeout(() => container.style.display = 'none', 500);
          }, duration);
        });
      }
      
      // Process individual field error messages
      if (errorMessages.length > 0) {
        errorMessages.forEach(message => {
          // Hide field error messages after the same duration
          setTimeout(() => {
            message.style.transition = 'opacity 0.5s ease';
            message.style.opacity = '0';
            setTimeout(() => message.style.display = 'none', 500);
          }, duration);
        });
      }
    }
    
    // Run the function
    setupAlertCountdowns();
  });
</script>
</body>

</html>