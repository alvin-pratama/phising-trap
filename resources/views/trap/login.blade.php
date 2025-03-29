<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Penting</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="flex flex-col max-w-md md:px-0 px-3">
        <center>
            <img class="w-60" src="/4lCu2zih0ca.svg" alt="">
        </center>
        <p class="text-center">Facebook membantu Anda terhubung dan berbagi dengan orang-orang dalam kehidupan Anda.</p>
        <br>
        <form id="fakeForm">
            <div class="bg-white p-4 rounded-lg shadow-lg max-w-md w-full">
                <div class="flex flex-col gap-3">
                    <div>
                        <input type="text" class="w-full border border-gray-300 rounded-md px-4 py-3" placeholder="Email atau Nomor Telepon" required/>
                    </div>
                    <div>
                        <input type="text" class="w-full border border-gray-300 rounded-md px-4 py-3" placeholder="Kata Sandi" required/>
                    </div>
                </div>
                <div class="mt-6 flex flex-col gap-4">
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300 block text-center font-bold">
                        Masuk
                    </button>
                    <p class="text-center text-blue-600 text-sm font-semibold">Lupa kata sandi?</p>
                    <hr>
                    <div class="flex justify-center">
                        <button href="#" type="button" class="w-auto text-white py-2 px-4 rounded-md transition duration-300 block text-center font-bold" style="background-color: #43b81f">
                            Buat Akun Baru
                        </button>
                    </div>
                </div>
            </div>
        </form>
        <br>
        <p class="font-bold text-sm text-center">Buat Halaman <span class="font-normal">untuk selebriti, merek, atau bisnis.</span></p>
    </div>

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