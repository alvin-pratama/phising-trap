<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhisTrap - Solusi Edukasi Phishing Interaktif</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .hero-gradient {
            background: linear-gradient(135deg, #4f46e5 0%, #10b981 100%);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-md py-4 sticky top-0 z-50">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
                <span class="ml-2 text-xl font-bold text-gray-800">PhisTrap</span>
            </div>
            <div class="hidden md:flex space-x-8">
                <a href="#tentang" class="text-gray-600 hover:text-indigo-600">Tentang</a>
                <a href="#penting" class="text-gray-600 hover:text-indigo-600">Pentingnya</a>
                <a href="#cara-kerja" class="text-gray-600 hover:text-indigo-600">Cara Kerja</a>
                <a href="#kontak" class="text-gray-600 hover:text-indigo-600">Kontak</a>
            </div>
            <button class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition duration-300 md:hidden">
                Menu
            </button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-gradient text-white py-20">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-10 md:mb-0">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Tingkatkan Kesadaran Phishing dengan <span class="text-yellow-300">PhisTrap</span></h1>
                <p class="text-xl mb-8">Solusi interaktif untuk melatih karyawan dan masyarakat dalam mengenali serangan phishing sebelum terjadi kerugian nyata.</p>
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="mailto:alinprama@gmail.com" class="bg-white text-indigo-600 px-6 py-3 rounded-md font-semibold hover:bg-gray-100 transition duration-300">
                        Coba Demo
                    </a>
                    <a href="#tentang" class="border-2 border-white text-white px-6 py-3 rounded-md font-semibold hover:bg-white hover:text-indigo-600 transition duration-300">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>
            <div class="md:w-1/2 flex justify-center">
                <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="PhisTrap Illustration" class="rounded-lg shadow-2xl max-w-md w-full">
            </div>
        </div>
    </section>

    <!-- Tentang Phishing Section -->
    <section id="tentang" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Apa Itu Phishing?</h2>
                <div class="w-20 h-1 bg-indigo-600 mx-auto"></div>
            </div>
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <img src="https://images.unsplash.com/photo-1563986768609-322da13575f3?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Phishing Illustration" class="rounded-lg shadow-md w-full max-w-md mx-auto">
                </div>
                <div class="md:w-1/2 md:pl-12">
                    <p class="text-gray-600 mb-4">
                        Phishing adalah teknik penipuan digital dimana pelaku menyamar sebagai pihak yang terpercaya untuk mencuri informasi sensitif seperti username, password, dan detail kartu kredit.
                    </p>
                    <p class="text-gray-600 mb-6">
                        Serangan phishing biasanya dilakukan melalui email, pesan teks, atau website palsu yang terlihat sangat mirip dengan aslinya. Korban seringkali tidak menyadari bahwa mereka telah memberikan informasi rahasia kepada penjahat cyber.
                    </p>
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4">
                        <p class="text-yellow-700">
                            <span class="font-bold">Fakta:</span> FBI’s Internet Crime Report (IC3) 2022 melaporkan bahwa phishing adalah kejahatan siber paling umum dengan kerugian melebihi $12 miliar secara global.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pentingnya Kesadaran Phishing -->
    <section id="penting" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Mengapa Kesadaran Akan Phishing Penting?</h2>
                <div class="w-20 h-1 bg-indigo-600 mx-auto"></div>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <div class="text-indigo-600 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Kerugian Finansial Besar</h3>
                    <p class="text-gray-600">
                        Perusahaan dapat kehilangan jutaan dolar karena serangan phishing yang berhasil. Pelatihan kesadaran dapat mengurangi risiko ini hingga 70%.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <div class="text-indigo-600 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Keamanan Data Perusahaan</h3>
                    <p class="text-gray-600">
                        Satu klik yang ceroboh dapat membocorkan data sensitif perusahaan. Edukasi phishing membantu membangun budaya keamanan siber yang kuat.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <div class="text-indigo-600 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Reputasi Organisasi</h3>
                    <p class="text-gray-600">
                        Kejadian phishing yang berhasil dapat merusak kepercayaan pelanggan dan mitra. Lindungi reputasi Anda dengan pelatihan proaktif.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Cara Kerja PhisTrap -->
    <section id="cara-kerja" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Cara Kerja PhisTrap</h2>
                <div class="w-20 h-1 bg-indigo-600 mx-auto"></div>
            </div>
            
            <div class="max-w-4xl mx-auto">
                <!-- Step 1 -->
                <div class="flex flex-col md:flex-row mb-12 items-center">
                    <div class="md:w-1/3 text-center mb-6 md:mb-0">
                        <div class="bg-indigo-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-indigo-600 text-2xl font-bold">1</span>
                        </div>
                        <h3 class="text-xl font-semibold">Pembuatan Link Phishing</h3>
                    </div>
                    <div class="md:w-2/3 md:pl-8">
                        <p class="text-gray-600 mb-4">
                            PhisTrap memungkinkan Anda membuat berbagai skenario phishing yang realistis, meniru teknik yang biasa digunakan penyerang sungguhan.
                        </p>
                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Step 1" class="rounded-lg shadow-md w-full">
                    </div>
                </div>
                
                <!-- Step 2 -->
                <div class="flex flex-col md:flex-row mb-12 items-center">
                    <div class="md:w-1/3 text-center mb-6 md:mb-0 order-1 md:order-2">
                        <div class="bg-indigo-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-indigo-600 text-2xl font-bold">2</span>
                        </div>
                        <h3 class="text-xl font-semibold">Penyebaran Link</h3>
                    </div>
                    <div class="md:w-2/3 md:pr-8 order-2 md:order-1">
                        <p class="text-gray-600 mb-4">
                            Link phishing disebarkan ke target (karyawan atau masyarakat) melalui email, pesan, atau media lain, persis seperti serangan phishing nyata.
                        </p>
                        <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Step 2" class="rounded-lg shadow-md w-full">
                    </div>
                </div>
                
                <!-- Step 3 -->
                <div class="flex flex-col md:flex-row mb-12 items-center">
                    <div class="md:w-1/3 text-center mb-6 md:mb-0">
                        <div class="bg-indigo-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-indigo-600 text-2xl font-bold">3</span>
                        </div>
                        <h3 class="text-xl font-semibold">Interaksi Target</h3>
                    </div>
                    <div class="md:w-2/3 md:pl-8">
                        <p class="text-gray-600 mb-4">
                            Jika target mengklik link, mereka akan melihat halaman phishing palsu yang sangat meyakinkan, dirancang untuk menguji kewaspadaan mereka.
                        </p>
                        <img src="https://images.unsplash.com/photo-1555774698-0b77e0d5fac6?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Step 3" class="rounded-lg shadow-md w-full">
                    </div>
                </div>
                
                <!-- Step 4 -->
                <div class="flex flex-col md:flex-row mb-12 items-center">
                    <div class="md:w-1/3 text-center mb-6 md:mb-0 order-1 md:order-2">
                        <div class="bg-indigo-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-indigo-600 text-2xl font-bold">4</span>
                        </div>
                        <h3 class="text-xl font-semibold">Edukasi Instan</h3>
                    </div>
                    <div class="md:w-2/3 md:pr-8 order-2 md:order-1">
                        <p class="text-gray-600 mb-4">
                            Jika target memasukkan data, mereka akan langsung dialihkan ke modul edukasi yang menjelaskan kesalahan mereka dan cara mengenali phishing di masa depan.
                        </p>
                        <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Step 4" class="rounded-lg shadow-md w-full">
                    </div>
                </div>
                
                <!-- Step 5 -->
                <div class="flex flex-col md:flex-row items-center">
                    <div class="md:w-1/3 text-center mb-6 md:mb-0">
                        <div class="bg-indigo-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-indigo-600 text-2xl font-bold">5</span>
                        </div>
                        <h3 class="text-xl font-semibold">Analisis & Laporan</h3>
                    </div>
                    <div class="md:w-2/3 md:pl-8">
                        <p class="text-gray-600 mb-4">
                            PhisTrap menyediakan laporan detail dan grafik untuk mengevaluasi efektivitas edukasi.
                        </p>
                        <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Step 5" class="rounded-lg shadow-md w-full">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-indigo-600 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-6">Siap Meningkatkan Kesadaran Phishing di Organisasi Anda?</h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto">
                PhisTrap membantu Anda membangun pertahanan pertama yang paling efektif melawan serangan phishing.
            </p>
            <a href="mailto:alinprama@gmail.com" class="bg-white text-indigo-600 px-8 py-3 rounded-md font-semibold text-lg hover:bg-gray-100 transition duration-300">
                Mulai Sekarang
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer id="kontak" class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between">
                <div class="mb-8 md:mb-0">
                    <div class="flex items-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <span class="ml-2 text-xl font-bold">PhisTrap</span>
                    </div>
                    <p class="text-gray-400 max-w-xs">
                        Solusi inovatif untuk pelatihan kesadaran phishing yang interaktif dan efektif.
                    </p>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-8">
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Navigasi</h3>
                        <ul class="space-y-2">
                            <li><a href="#tentang" class="text-gray-400 hover:text-white">Tentang Phishing</a></li>
                            <li><a href="#penting" class="text-gray-400 hover:text-white">Pentingnya</a></li>
                            <li><a href="#cara-kerja" class="text-gray-400 hover:text-white">Cara Kerja</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Kontak</h3>
                        <ul class="space-y-2">
                            <li class="text-gray-400">alinprama@gmail.com</li>
                            <li class="text-gray-400">+62895700226606</li>
                            <li class="text-gray-400">Mojokerto, Indonesia</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-12 pt-8 text-center text-gray-400">
                <p>© 2025 PhisTrap. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>