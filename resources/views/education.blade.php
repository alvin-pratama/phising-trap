<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edukasi Keamanan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Efek hover dengan border */
        .image-container:hover {
            border: 4px solid #dc2626;
            /* Warna red-600 */
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="flex flex-col gap-4 py-4 md:mx-40">
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold text-red-800 mb-4">Infomasi</h1>
            <p class="text-gray-600 mb-6 bg-gray-100 px-4 py-2">
                Aduh anda sama sekali tidak curiga dan sayangnya anda terkena phising trap ini.
            </p>
            <div class="space-y-4">
                <div>
                    <h2 class="text-lg font-semibold text-gray-700">Baca informasi berikut ini dengan seksama ya, terkait edukasi tentang phising trap.</h2>
                </div>
            </div>
        </div>
        <div class="bg-white p-8 rounded-lg shadow-lg w-full">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Gambar 1 -->
                <!-- <div class="image-container relative group rounded-xl overflow-hidden">
                    <img src="phising-education/E-book Modus Operandi Phishing.jpg" alt="" class="w-full h-auto rounded-lg" onclick="openModal('phising-education/E-book Modus Operandi Phishing.jpg')">
                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white text-center py-2">
                        1
                    </div>
                </div> -->

                <!-- Gambar 2 -->
                <div class="image-container relative group rounded-xl overflow-hidden">
                    <img src="phising-education/E-book Modus Operandi Phishing-2.jpg" alt="" class="w-full h-auto rounded-lg" onclick="openModal('phising-education/E-book Modus Operandi Phishing-2.jpg')">
                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white text-center py-2">
                        2
                    </div>
                </div>

                <!-- Gambar 3 -->
                <div class="image-container relative group rounded-xl overflow-hidden">
                    <img src="phising-education/E-book Modus Operandi Phishing-3.jpg" alt="" class="w-full h-auto rounded-lg" onclick="openModal('phising-education/E-book Modus Operandi Phishing-3.jpg')">
                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white text-center py-2">
                        3
                    </div>
                </div>

                <!-- Gambar 4 -->
                <div class="image-container relative group rounded-xl overflow-hidden">
                    <img src="phising-education/E-book Modus Operandi Phishing-4.jpg" alt="" class="w-full h-auto rounded-lg" onclick="openModal('phising-education/E-book Modus Operandi Phishing-4.jpg')">
                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white text-center py-2">
                        4
                    </div>
                </div>

                <!-- Gambar 5 -->
                <div class="image-container relative group rounded-xl overflow-hidden">
                    <img src="phising-education/E-book Modus Operandi Phishing-5.jpg" alt="" class="w-full h-auto rounded-lg" onclick="openModal('phising-education/E-book Modus Operandi Phishing-5.jpg')">
                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white text-center py-2">
                        5
                    </div>
                </div>

                <!-- Gambar 6 -->
                <div class="image-container relative group rounded-xl overflow-hidden">
                    <img src="phising-education/E-book Modus Operandi Phishing-6.jpg" alt="" class="w-full h-auto rounded-lg" onclick="openModal('phising-education/E-book Modus Operandi Phishing-6.jpg')">
                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white text-center py-2">
                        6
                    </div>
                </div>

                <!-- Gambar 7 -->
                <div class="image-container relative group rounded-xl overflow-hidden">
                    <img src="phising-education/E-book Modus Operandi Phishing-7.jpg" alt="" class="w-full h-auto rounded-lg" onclick="openModal('phising-education/E-book Modus Operandi Phishing-7.jpg')">
                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white text-center py-2">
                        7
                    </div>
                </div>

                <!-- Gambar 8 -->
                <div class="image-container relative group rounded-xl overflow-hidden">
                    <img src="phising-education/E-book Modus Operandi Phishing-8.jpg" alt="" class="w-full h-auto rounded-lg" onclick="openModal('phising-education/E-book Modus Operandi Phishing-8.jpg')">
                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white text-center py-2">
                        8
                    </div>
                </div>

                <!-- Gambar 9 -->
                <div class="image-container relative group rounded-xl overflow-hidden">
                    <img src="phising-education/E-book Modus Operandi Phishing-9.jpg" alt="" class="w-full h-auto rounded-lg" onclick="openModal('phising-education/E-book Modus Operandi Phishing-9.jpg')">
                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white text-center py-2">
                        9
                    </div>
                </div>

                <!-- Gambar 10 -->
                <div class="image-container relative group rounded-xl overflow-hidden">
                    <img src="phising-education/E-book Modus Operandi Phishing-10.jpg" alt="" class="w-full h-auto rounded-lg" onclick="openModal('phising-education/E-book Modus Operandi Phishing-10.jpg')">
                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white text-center py-2">
                        10
                    </div>
                </div>

                <!-- Gambar 11 -->
                <div class="image-container relative group rounded-xl overflow-hidden">
                    <img src="phising-education/E-book Modus Operandi Phishing-11.jpg" alt="" class="w-full h-auto rounded-lg" onclick="openModal('phising-education/E-book Modus Operandi Phishing-11.jpg')">
                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white text-center py-2">
                        11
                    </div>
                </div>

                <!-- Gambar 12 -->
                <!-- <div class="image-container relative group rounded-xl overflow-hidden">
                    <img src="phising-education/E-book Modus Operandi Phishing-12.jpg" alt="" class="w-full h-auto rounded-lg" onclick="openModal('phising-education/E-book Modus Operandi Phishing-12.jpg')">
                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white text-center py-2">
                        12
                    </div>
                </div> -->

                <!-- Tambahkan gambar lainnya di sini dengan pola yang sama -->
            </div>
        </div>
    </div>

   <!-- Modal -->
   <div id="modal" class="fixed inset-0 bg-black bg-opacity-80 backdrop-blur-sm flex items-center justify-center hidden p-4">
        <div class="bg-white rounded-lg relative max-w-full max-h-full w-auto overflow-y-auto">
            <!-- Tombol Close -->
            <button onclick="closeModal()" class="sticky top-2 right-2 bg-red-600 text-white rounded-full w-8 h-8 flex items-center justify-center hover:bg-red-700 ml-auto">
                &times;
            </button>
            <!-- Gambar Zoom -->
            <img id="modal-image" src="" alt="" class="max-w-full max-h-screen object-contain">
        </div>
    </div>

    <script>
        // Fungsi untuk membuka modal
        function openModal(imageSrc) {
            const modal = document.getElementById('modal');
            const modalImage = document.getElementById('modal-image');
            modalImage.src = imageSrc; // Set sumber gambar
            modal.classList.remove('hidden'); // Tampilkan modal
        }

        // Fungsi untuk menutup modal
        function closeModal() {
            const modal = document.getElementById('modal');
            modal.classList.add('hidden'); // Sembunyikan modal
        }
    </script>
</body>

</html>