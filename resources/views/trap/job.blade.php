<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Loker</title>
    <script src="/tailwind.js"></script>
</head>

<body class="relative bg-center min-h-screen flex items-center justify-center p-4" style="background-image: url('/cpns.jpg');">
    <div class="absolute inset-0 bg-white/75"></div>
    <div class="relative z-10 bg-white p-2 rounded-lg shadow-lg w-full max-w-2xl">
        <div class="p-6">
            <div class="text-center mb-6">
                <img src="/Google_Forms_logo_(2014-2020).svg.png" alt="Logo Perusahaan" class="mx-auto h-16">
                <h1 class="text-2xl font-bold mt-2">FORM PENDAFTARAN PENDATAAN AWAL CASN 2025 MOJOKERTO</h1>
                <p class="text-gray-600">Deadline: <span class="font-semibold">21 Mei 2025</span></p>
            </div>

            <!-- <p class="bg-gray-100 p-4">Hai, ini kesempatan buat kamu loh.. <br>Buruan lengkapi datamu segera disini, mari bergabung bersama kami, Kuota Terbatas 500 pendaftar.</p> -->
            <div class="bg-gray-100 p-4">
                <p>
                    PENGUMUMAN SELEKSI CPNS & PPPK 2025
                </p>
                <p>
                    Segera lengkapi data Anda untuk mengikuti tahap awal seleksi.
                </p>
            </div>
            <br>
            <form id="fakeForm">
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium">Nama Lengkap</label>
                    <input required type="text" class="w-full p-2 border rounded" placeholder="Masukkan nama Anda">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium">Email</label>
                    <input required type="email" class="w-full p-2 border rounded" placeholder="Masukkan email Anda">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium">Nomor Telepon</label>
                    <input required type="tel" class="w-full p-2 border rounded" placeholder="Masukkan nomor telepon">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium">Alamat</label>
                    <input required type="text" class="w-full p-2 border rounded" placeholder="Masukkan alamat lengkap">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium">Tanggal Lahir</label>
                    <input required type="date" class="w-full p-2 border rounded">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium">Jenis Kelamin</label>
                    <select required class="w-full p-2 border rounded">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium">Pendidikan Terakhir</label>
                    <input required type="text" class="w-full p-2 border rounded" placeholder="Masukkan pendidikan terakhir">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium">Pengalaman Kerja</label>
                    <textarea class="w-full p-2 border rounded" rows="3" placeholder="Jelaskan pengalaman kerja Anda"></textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium">Unggah CV</label>
                    <input required type="file" class="w-full p-2 border rounded">
                </div>

                <br>
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg font-semibold hover:bg-blue-600 transition">Kirim Pendaftaran</button>
            </form>
        </div>
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