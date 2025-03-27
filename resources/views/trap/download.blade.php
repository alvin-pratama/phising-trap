<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download APK</title>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let countdown = 5; // Hitungan mundur dalam detik
            const countdownElement = document.getElementById("countdown");
            const downloadButton = document.getElementById("downloadBtn");
            
            const interval = setInterval(() => {
                countdown--;
                countdownElement.textContent = countdown;
                
                if (countdown === 0) {
                    clearInterval(interval);
                    downloadButton.removeAttribute("disabled");
                    downloadButton.classList.remove("bg-gray-400", "cursor-not-allowed");
                    downloadButton.classList.add("bg-blue-500", "hover:bg-blue-600");
                    window.location.href = "{{ asset('app.apk') }}";
                }
            }, 1000);
        });
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="bg-white p-6 rounded-lg shadow-md text-center">
        <h1 class="text-xl font-semibold text-gray-800">Download APK</h1>
        <p class="text-gray-600 mt-2">Unduhan akan dimulai dalam <span id="countdown">5</span> detik.</p>
        <p class="text-gray-600 mt-2">Jika tidak, klik tombol di bawah ini setelah hitungan selesai.</p>
        <a id="downloadBtn" href="{{ asset('app.apk') }}" class="mt-4 inline-block px-6 py-2 text-white bg-gray-400 rounded-lg shadow-md cursor-not-allowed" disabled>Download APK</a>
    </div>
</body>
</html>
