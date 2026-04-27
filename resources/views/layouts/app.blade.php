<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawMeal - @yield('title')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500;600;700&family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { 'display': ['Fredoka', 'sans-serif'], 'sans': ['Nunito', 'sans-serif'] },
                    colors: { pawOrange: '#FF6B35', pawBlue: '#2563EB', pawDarkBlue: '#1E3A8A', pawLight: '#F8FAFC' }
                }
            }
        }
    </script>
    <style>
        .fade-in { animation: fadeIn 0.5s ease-out forwards; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="bg-pawLight font-sans text-pawDarkBlue min-h-screen flex flex-col selection:bg-pawOrange selection:text-white">

    <x-navbar :username="$username ?? 'Tamu'" />

    <main class="flex-grow container mx-auto px-4 py-8 max-w-5xl fade-in">
        @yield('content')
    </main>

    <x-footer />

</body>
</html>
