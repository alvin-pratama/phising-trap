<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Penting</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Animasi berdenyut */
        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.05);
                opacity: 0.7;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .pulse-button {
            animation: pulse 2s infinite;
        }
    </style>
</head>

<body class="bg-gray-800 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
        <img class="my-2" src="/logo-chrome.png" width="60px" alt="">
        <div class="flex flex-row gap-4">
            <div class="text-3xl">
                <span>"Aplikasi</span> <span class="text-red-800">Chome</span> <span>anda perlu pembaruan"</span>
            </div>
        </div>
        <br>
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Informasi Penting</h1>
        <p class="text-gray-600 mb-6">
            Silakan baca informasi berikut dengan seksama sebelum melanjutkan. Pastikan Anda memahami semua detail yang diberikan.
        </p>
        <div class="space-y-4">
            <div>
                <h2 class="text-lg font-semibold text-gray-700">Detail Informasi</h2>
                <p class="text-gray-600">
                    Ini adalah contoh informasi penting yang perlu Anda ketahui. Harap simpan informasi ini dengan aman.
                </p>
            </div>
            <div>
                <h2 class="text-lg font-semibold text-gray-700">Langkah Selanjutnya</h2>
                <p class="text-gray-600">
                    Klik tombol di bawah untuk melanjutkan ke langkah berikutnya.
                </p>
            </div>
        </div>
        <div class="mt-6">
            <a href="{{ route('next.education') }}" class="pulse-button w-full bg-red-700 text-white py-2 px-4 rounded-lg hover:bg-red-800 transition duration-300 block text-center">
                Lanjutkan
            </a>
        </div>
    </div>
</body>

</html>