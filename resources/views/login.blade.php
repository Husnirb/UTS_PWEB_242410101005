<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - PawMeal</title>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500;600;700&family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { 'display': ['Fredoka', 'sans-serif'], 'sans': ['Nunito', 'sans-serif'] },
                    colors: { pawOrange: '#FF6B35', pawBlue: '#2563EB', pawDarkBlue: '#1E3A8A' }
                }
            }
        }
    </script>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
        }
        * { -webkit-tap-highlight-color: transparent; box-sizing: border-box; }
        .pupil-group { transition: transform 0.1s ease-out; transform-origin: center; }
    </style>
</head>
<body class="bg-pawOrange min-h-screen w-full flex flex-col font-sans overflow-x-hidden">

    <div class="h-[55vh] w-full relative flex flex-col justify-between items-center overflow-hidden z-10 shrink-0">

        <div class="mt-8 flex flex-col items-center z-20 text-white">
            <i class="fa-solid fa-paw text-3xl mb-2 animate-bounce"></i>
            <h2 class="font-display font-bold text-2xl tracking-wide">PawMeal</h2>
        </div>

        <div class="absolute inset-0 flex items-center justify-center pointer-events-none z-0 w-full overflow-hidden">
            <h1 class="font-display font-bold text-[22vw] md:text-[18vw] text-white/20 select-none leading-none translate-y-12 whitespace-nowrap">pawmeal</h1>
        </div>

        <div class="relative z-10 w-48 md:w-64">
            <svg viewBox="0 0 200 150" class="w-full h-auto drop-shadow-2xl">
                <path d="M 20,90 L 15,20 L 70,60 Z" fill="#1E3A8A"/>
                <path d="M 26,75 L 24,35 L 55,58 Z" fill="#2563EB"/>
                <path d="M 180,90 L 185,20 L 130,60 Z" fill="#1E3A8A"/>
                <path d="M 174,75 L 176,35 L 145,58 Z" fill="#2563EB"/>
                <path d="M 10,150 C 10,70 190,70 190,150 Z" fill="#1E3A8A"/>
                <circle cx="70" cy="100" r="22" fill="#FDE047" />
                <g class="pupil-group" id="eye-left">
                    <circle cx="70" cy="100" r="14" fill="#000000" />
                    <circle cx="75" cy="95" r="4" fill="#FFFFFF" />
                </g>
                <circle cx="130" cy="100" r="22" fill="#FDE047" />
                <g class="pupil-group" id="eye-right">
                    <circle cx="130" cy="100" r="14" fill="#000000" />
                    <circle cx="135" cy="95" r="4" fill="#FFFFFF" />
                </g>
                <path d="M 95,120 L 105,120 L 100,126 Z" fill="#FCA5A5" />
            </svg>
        </div>
    </div>

    <div class="flex-grow w-full bg-white relative z-20 flex flex-col items-center pt-10 px-6 shadow-[0_-20px_40px_-15px_rgba(0,0,0,0.2)] rounded-t-[2.5rem]">
        <div class="max-w-md text-center mb-6 mt-2">
            <p class="text-pawDarkBlue font-bold text-lg md:text-xl">Pantau jadwal makan si meong hari ini.</p>
            <p class="text-sm text-gray-500 mt-1">Catat porsi, waktu, dan mood anabul dengan mudah.</p>
        </div>

        <form action="{{ route('login.submit') }}" method="POST" class="w-full max-w-sm relative">
            @csrf
            <div class="mb-6 relative">
                <input type="text" id="username" name="username" placeholder="Masukkan Namamu..." required autocomplete="off"
                       class="w-full px-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-2xl text-pawDarkBlue font-bold focus:bg-white focus:border-pawBlue focus:outline-none transition-all duration-300 text-center placeholder-gray-400">
                <i class="fa-solid fa-user absolute left-5 top-5 text-gray-400"></i>
            </div>

            <button type="submit" class="w-full bg-pawBlue hover:bg-blue-700 text-white font-bold py-4 px-6 rounded-2xl shadow-lg transform hover:-translate-y-1 transition-all duration-300 flex justify-center items-center">
                <span>Masuk Dashboard</span>
                <i class="fa-solid fa-arrow-right ml-2"></i>
            </button>
        </form>
    </div>

    <script>
        document.addEventListener('mousemove', (e) => {
            const eyes = [document.getElementById('eye-left'), document.getElementById('eye-right')];
            eyes.forEach(eye => {
                if(eye) {
                    const rect = eye.getBoundingClientRect();
                    const centerX = rect.left + rect.width / 2;
                    const centerY = rect.top + rect.height / 2;
                    const angle = Math.atan2(e.clientY - centerY, e.clientX - centerX);
                    const distance = Math.min(6, Math.hypot(e.clientX - centerX, e.clientY - centerY) / 30);
                    eye.style.transform = `translate(${Math.cos(angle) * distance}px, ${Math.sin(angle) * distance}px)`;
                }
            });
        });
    </script>
</body>
</html>
