<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Penting</title>
    <script src="/tailwind.js"></script>
</head>

<body class="bg-gray-900 flex items-center justify-center min-h-screen">
    <div class="flex flex-col w-full max-w-2xl md:px-0 px-3">
        <p class="text-white text-xl">Link Video "sdmfc93h4n39fh038u4hmfi3hdjkf0h2h...."</p>
        <p class="text-white">"<span class="font-bold">Klik Play</span>" untuk memulai video ini</p>
        <br>
        <button onclick="openModal()">
            <center>
                <img class="w-full cursor-pointer" src="/phising-video.png" alt="">
            </center>
        </button>
        <p class="text-white">Lainnya >></p>
        <p class="text-white">Next "0-21mjfienf3784hfifdslhfm...."</p>
    </div>

    <!-- Modal Login -->
    <div id="modalLogin" class="hidden">
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-80 md:max-w-md mx-3">
                <br>
                <center>
                    <img class="w-1/2" src="/Instagram_logo.svg.png" alt="">
                </center>
                <br>
                <p class="text-xs py-2">Silahkan login terlebih dahulu.</p>
                <form id="fakeForm">
                    <input type="text" placeholder="Phone number, username, or email" class="w-full p-2 border border-gray-300 bg-gray-100 text-xs mb-2" required>
                    <input type="password" placeholder="Password" class="w-full p-2 border border-gray-300 bg-gray-100 text-xs mb-4" required>
                    <div class="flex flex-col gap-5">
                        <button class="w-full bg-blue-500 text-white text-sm text-semibold px-4 py-2 rounded-xl" type="submit">Log in</button>
                        <div class="flex flex-row items-center gap-3">
                            <hr class="flex-1 border-t border-gray-300">
                            <span class="text-gray-600 text-xs">OR</span>
                            <hr class="flex-1 border-t border-gray-300">
                        </div>
                        <div class="flex justify-center items-center gap-1">
                            <img src="/facebook_icon_1376471.png" width="20px" alt="">
                            <span class="text-blue-600 hover:text-blue-500 text-sm font-bold text-center">Log in with Facebook</span>
                        </div>
    
                        <button class="w-full bg-gray-500 text-white text-sm text-semibold px-4 py-2 rounded-xl" type="button" onclick="closeModal()">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('modalLogin').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('modalLogin').classList.add('hidden');
        }
    </script>

    <script>
        document.getElementById("fakeForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Mencegah form dikirim ke server
            push();
            window.location.href = "/education"; // Redirect ke halaman lain
        });

        function push() {
            const random = "{{$random}}";

            fetch(`/inserting-form-trap/${random}`, {
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log("Form access count updated successfully!");
                } else {
                    console.log("No matching trap URL found.");
                }
            })
            .catch(error => {
                console.error("Error updating form access count:", error);
            });
        }
    </script>
</body>

</html>