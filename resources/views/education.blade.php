<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edukasi Phishing - PhisTrap</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-md overflow-hidden p-6 sm:p-8">
            <!-- Header Section -->
            <div class="text-center mb-8">
                <div class="bg-red-100 border-l-4 border-red-500 p-4 mb-6">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h1 class="text-2xl font-bold text-red-600">ANDA BARU SAJA TERJEBAK DALAM SIMULASI PHISHING!</h1>
                        </div>
                    </div>
                </div>
                
                <p class="text-gray-600 mb-4">Ini hanyalah simulasi yang dirancang oleh <span class="font-semibold text-blue-600">PhisTrap</span> untuk meningkatkan kewaspadaan Anda terhadap ancaman phishing.</p>
                <p class="text-gray-600">Tidak ada data yang disimpan atau dicuri dalam simulasi ini.</p>
            </div>

            <!-- What is Phishing -->
            <div class="mb-8">
                <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                    <svg class="w-6 h-6 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                    Apa Itu Phishing?
                </h2>
                <div class="bg-blue-50 p-4 rounded-lg">
                    <p class="text-gray-700">Phishing adalah upaya penipuan dengan menyamar sebagai pihak yang terpercaya (seperti bank, perusahaan, atau instansi pemerintah) melalui email, pesan teks, atau situs web palsu untuk mencuri informasi sensitif seperti:</p>
                    <ul class="list-disc pl-5 mt-2 space-y-1 text-gray-700">
                        <li>Nama pengguna dan kata sandi</li>
                        <li>Detail kartu kredit</li>
                        <li>Nomor rekening bank</li>
                        <li>Nomor KTP atau data pribadi lainnya</li>
                    </ul>
                </div>
            </div>

            <!-- Characteristics -->
            <div class="mb-8">
                <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                    <svg class="w-6 h-6 text-orange-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                    Ciri-ciri Phishing yang Harus Diwaspadai
                </h2>
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="bg-orange-50 p-4 rounded-lg border-l-4 border-orange-500">
                        <h3 class="font-semibold text-orange-700 mb-2">1. Alamat Email atau URL Mencurigakan</h3>
                        <p class="text-gray-700">Periksa pengirim email dan URL situs web. Seringkali ada kesalahan ketik atau domain yang mirip tetapi tidak sama dengan aslinya.</p>
                    </div>
                    <div class="bg-orange-50 p-4 rounded-lg border-l-4 border-orange-500">
                        <h3 class="font-semibold text-orange-700 mb-2">2. Rasa Urgensi</h3>
                        <p class="text-gray-700">Pesan menciptakan rasa panik seperti "Akun Anda akan dinonaktifkan segera jika tidak verifikasi!"</p>
                    </div>
                    <div class="bg-orange-50 p-4 rounded-lg border-l-4 border-orange-500">
                        <h3 class="font-semibold text-orange-700 mb-2">3. Permintaan Data Sensitif</h3>
                        <p class="text-gray-700">Meminta informasi pribadi atau finansial yang seharusnya tidak diminta melalui email atau pesan.</p>
                    </div>
                    <div class="bg-orange-50 p-4 rounded-lg border-l-4 border-orange-500">
                        <h3 class="font-semibold text-orange-700 mb-2">4. Tata Bahasa Buruk</h3>
                        <p class="text-gray-700">Seringkali mengandung kesalahan tata bahasa atau ejaan yang tidak profesional.</p>
                    </div>
                </div>
            </div>

            <!-- Protection -->
            <div class="mb-8">
                <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                    <svg class="w-6 h-6 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Cara Melindungi Diri dari Phishing
                </h2>
                <div class="bg-green-50 p-4 rounded-lg">
                    <ol class="list-decimal pl-5 space-y-3 text-gray-700">
                        <li><span class="font-semibold">Jangan klik link sembarangan</span> - Selalu verifikasi URL sebelum mengklik</li>
                        <li><span class="font-semibold">Periksa pengirim email</span> - Pastikan alamat email pengirim valid</li>
                        <li><span class="font-semibold">Aktifkan autentikasi dua faktor</span> - Tambahkan lapisan keamanan ekstra</li>
                        <li><span class="font-semibold">Gunakan password manager</span> - Untuk membantu mengenali situs palsu</li>
                        <li><span class="font-semibold">Perbarui perangkat lunak</span> - Pastikan browser dan OS selalu up-to-date</li>
                        <li><span class="font-semibold">Waspada terhadap lampiran</span> - Jangan buka lampiran dari sumber tidak dikenal</li>
                    </ol>
                </div>
            </div>

            <!-- Examples -->
            <div class="mb-8">
                <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                    <svg class="w-6 h-6 text-purple-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    Contoh Modus Phishing
                </h2>
                <div class="space-y-4">
    <!-- 1. Email Bank Palsu -->
    <div class="p-4 border border-gray-200 rounded-lg bg-white shadow-sm">
        <h3 class="font-semibold text-purple-700 mb-2">1. Email Bank Palsu</h3>
        <p class="text-gray-700 mb-3">Email yang mengaku dari bank Anda meminta verifikasi akun karena "kegiatan mencurigakan".</p>
        <div class="bg-gray-100 p-3 rounded-md text-sm italic">
            <p>"Kami mendeteksi aktivitas mencurigakan di akun BCA Anda. Segera verifikasi di <span class="text-red-500">bca-security[.]com</span> atau akun akan dibekukan dalam 24 jam."</p>
        </div>
    </div>

    <!-- 2. Hadiah Menarik -->
    <div class="p-4 border border-gray-200 rounded-lg bg-white shadow-sm">
        <h3 class="font-semibold text-purple-700 mb-2">2. Hadiah Menarik</h3>
        <p class="text-gray-700 mb-3">Pesan menginformasikan Anda memenangkan hadiah dengan syarat mengisi data.</p>
        <div class="bg-gray-100 p-3 rounded-md text-sm italic">
            <p>"SELAMAT! Anda dapat iPhone 14 Pro dari Tokopedia. Segera klaim sebelum 24 jam di: <span class="text-red-500">tokped-giveaway[.]xyz</span> (biaya admin Rp 25.000)"</p>
        </div>
    </div>

    <!-- 3. Pajak/Denda Mendadak -->
    <div class="p-4 border border-gray-200 rounded-lg bg-white shadow-sm">
        <h3 class="font-semibold text-purple-700 mb-2">3. Pajak/Denda Mendadak</h3>
        <p class="text-gray-700 mb-3">Pemberitahuan tagihan pajak/denda yang mengancam.</p>
        <div class="bg-gray-100 p-3 rounded-md text-sm italic">
            <p>"[DJPN] Anda memiliki tunggakan pajak Rp 4.750.000. Segera lunasi di <span class="text-red-500">djp-online[.]info</span> atau akan dikenakan sanksi pidana."</p>
        </div>
    </div>

    <!-- 4. Pengiriman Paket Gagal -->
    <div class="p-4 border border-gray-200 rounded-lg bg-white shadow-sm">
        <h3 class="font-semibold text-purple-700 mb-2">4. Pengiriman Paket Gagal</h3>
        <p class="text-gray-700 mb-3">Pemberitahuan pengiriman paket bermasalah.</p>
        <div class="bg-gray-100 p-3 rounded-md text-sm italic">
            <p>[J&T] Paket No. 8873621 gagal dikirim. Alamat tidak lengkap. Verifikasi di <span class="text-red-500">jt-reschedule[.]online</span></p>
        </div>
    </div>

    <!-- 5. Undangan Meeting Darurat -->
    <div class="p-4 border border-gray-200 rounded-lg bg-white shadow-sm">
        <h3 class="font-semibold text-purple-700 mb-2">5. Undangan Meeting Darurat</h3>
        <p class="text-gray-700 mb-3">Undangan rapat mendesak yang palsu.</p>
        <div class="bg-gray-100 p-3 rounded-md text-sm italic">
            <p>"From: HRD Company <br> Meeting darurat jam 11.00 via <span class="text-red-500">company-zoom[.]site</span> Meeting ID: 555 123 7890 Pass: hr2023"</p>
        </div>
    </div>

    <!-- 6. Tagihan Listrik/BPJS -->
    <div class="p-4 border border-gray-200 rounded-lg bg-white shadow-sm">
        <h3 class="font-semibold text-purple-700 mb-2">6. Tagihan Listrik/BPJS</h3>
        <p class="text-gray-700 mb-3">Peringatan tagihan belum dibayar.</p>
        <div class="bg-gray-100 p-3 rounded-md text-sm italic">
            <p>"[PLN] Tagihan listrik Rp 1.450.000 belum dibayar. Segera bayar di <span class="text-red-500">pln-payment[.]net</span> atau aliran listrik akan diputus."</p>
        </div>
    </div>

    <!-- 7. Akun Media Sosial Diretas -->
    <div class="p-4 border border-gray-200 rounded-lg bg-white shadow-sm">
        <h3 class="font-semibold text-purple-700 mb-2">7. Akun Media Sosial Diretas</h3>
        <p class="text-gray-700 mb-3">Peringatan akun akan diblokir.</p>
        <div class="bg-gray-100 p-3 rounded-md text-sm italic">
            <p>"Instagram: Akun Anda melanggar kebijakan kami. Verifikasi identitas dalam 48 jam di <span class="text-red-500">instagram-verify[.]com</span> atau akun akan dinonaktifkan."</p>
        </div>
    </div>

    <!-- 8. Lowongan Kerja Palsu -->
    <div class="p-4 border border-gray-200 rounded-lg bg-white shadow-sm">
        <h3 class="font-semibold text-purple-700 mb-2">8. Lowongan Kerja Palsu</h3>
        <p class="text-gray-700 mb-3">Tawaran kerja dengan persyaratan mencurigakan.</p>
        <div class="bg-gray-100 p-3 rounded-md text-sm italic">
            <p>"PT ABC membuka posisi Admin (WFH) Gaji Rp 8-12jt. Kirim CV + fotokopi KTP ke hr.abc@mail[.]com & bayar administrasi Rp 150.000 via link berikut..."</p>
        </div>
    </div>

    <!-- 9. Investasi Bodong -->
    <div class="p-4 border border-gray-200 rounded-lg bg-white shadow-sm">
        <h3 class="font-semibold text-purple-700 mb-2">9. Investasi Bodong</h3>
        <p class="text-gray-700 mb-3">Tawaran investasi menggiurkan.</p>
        <div class="bg-gray-100 p-3 rounded-md text-sm italic">
            <p>"🔥 INVESTASI EMAS DIGITAL 🔥 Profit 3%/hari! Minimal deposit Rp 500.000. Daftar sekarang di <span class="text-red-500">gold-invest[.]pro</span> dan dapatkan bonus 10%!"</p>
        </div>
    </div>

    <!-- 10. Deepfake & AI Scam -->
    <div class="p-4 border border-gray-200 rounded-lg bg-white shadow-sm">
        <h3 class="font-semibold text-purple-700 mb-2">10. Deepfake & AI Scam</h3>
        <p class="text-gray-700 mb-3">Pesan darurat palsu dari "keluarga".</p>
        <div class="bg-gray-100 p-3 rounded-md text-sm italic">
            <p>"Nak, ini Ibu. HP Ibu rusak, pinjam nomor teman. Tolong transfer Rp 5jt ke BCA 123-456-7890 a.n. Suryadi. Nanti Ibu ganti pas pulang."</p>
        </div>
    </div>
</div>
            </div>

            <!-- Data Privacy -->
            <div class="bg-gray-100 p-4 rounded-lg mb-8">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-gray-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-gray-800">Perhatian!</h3>
                        <div class="mt-2 text-sm text-gray-700">
                            <p>Data yang Anda masukkan dalam simulasi ini <span class="font-bold">tidak disimpan</span>, <span class="font-bold">tidak diproses</span>, atau <span class="font-bold">digunakan</span> untuk tujuan apa pun. Simulasi ini murni untuk tujuan edukasi.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Closing -->
            <div class="text-center bg-yellow-50 p-6 rounded-lg border border-yellow-200">
                <svg class="mx-auto h-12 w-12 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
                <h3 class="mt-2 text-lg font-medium text-gray-900">Tetap Waspada!</h3>
                <div class="mt-2 text-gray-600">
                    <p>Keamanan digital dimulai dari kesadaran diri. Jadilah pengguna internet yang cerdas dengan selalu:</p>
                    <ul class="mt-2 space-y-1">
                        <li>• Verifikasi sebelum mempercayai</li>
                        <li>• Waspada terhadap permintaan data</li>
                        <li>• Laporkan aktivitas mencurigakan</li>
                    </ul>
                </div>
                <div class="mt-4">
                    <p class="text-sm text-gray-500">Terima kasih telah berpartisipasi dalam simulasi ini. Mari bersama-sama membuat internet lebih aman!</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>