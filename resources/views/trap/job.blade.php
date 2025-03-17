<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Loker</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="relative bg-cover bg-center min-h-screen flex items-center justify-center p-4" style="background-image: url('/pabrik.jpg');">
    <div class="absolute inset-0 bg-white/75"></div>
    <div class="relative z-10 bg-white p-2 rounded-lg shadow-lg w-full max-w-2xl">
        <div class="p-6">
            <div class="text-center mb-6">
                <img src="/Google_Forms_logo_(2014-2020).svg.png" alt="Logo Perusahaan" class="mx-auto h-16">
                <h1 class="text-2xl font-bold mt-2">Nama Perusahaan</h1>
                <p class="text-gray-600">Deadline: <span class="font-semibold">30 Maret 2025</span></p>
            </div>

            <p class="bg-gray-100 p-4">Hai, ini kesempatan buat kamu loh.. <br>Buruan lengkapi datamu segera disini, mari bergabung bersama kami, Kuota Terbatas 500 pendaftar.</p>
            <br>
            <form action="{{ route('next.education') }}" method="GET">
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
                    <label class="block text-gray-700 font-medium">Posisi Yang Didaftar</label>
                    <input required type="text" class="w-full p-2 border rounded" placeholder="Masukkan posisi">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium">Pengalaman Kerja</label>
                    <textarea class="w-full p-2 border rounded" rows="3" placeholder="Jelaskan pengalaman kerja Anda"></textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium">Unggah CV</label>
                    <input required type="file" class="w-full p-2 border rounded">
                </div>

                <p><span class="font-bold">Note</span>: Jika sudah selesai, jangan lupa kirim yak!</p>
                <br>
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg font-semibold hover:bg-blue-600 transition">Kirim Pendaftaran</button>
            </form>
        </div>
    </div>
</body>

</html>