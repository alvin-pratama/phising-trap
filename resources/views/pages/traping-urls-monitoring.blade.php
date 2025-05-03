@extends('layouts.app')

@section('content')
<!-- Card 1 -->
<div class="bg-white shadow-md rounded-lg mt-6 p-6">
    <h2 class="text-xl font-semibold text-gray-800">Daftar Jebakan</h2>
    <p>Target: {{ $target->target }}</p>
    <!-- <p id="count" class="mt-2 text-gray-700">Count: 0</p> -->

    <!-- Button Add -->
    <button onclick="history.back()"
        class="my-3 bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 shadow-lg">
        Kembali
    </button>

    <button onclick="openModal()"
        class="my-3 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 shadow-lg">
        Tambah Jebakan
    </button>

    <!-- Table Wrapper -->
    <div class="overflow-x-auto mt-4">
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2 text-left hidden">Target</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Narasi</th>
                    <th class="border border-gray-300 px-4 py-2 text-left hidden">Source URL</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Generated URL</th>
                    <th class="border border-gray-300 px-4 py-2 text-left hidden">Shortened URL</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Jumlah Akses Link</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Jumlah Entri Form</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody id="trapingTable">
                <!-- Data akan dimuat dengan JavaScript -->
                <tr>
                    <td colspan="5" class="text-center text-gray-600 p-4">Memuat data...</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div id="pagination" class="mt-4 flex justify-center space-x-2"></div>
</div>

<!-- Card 2 -->
<div class="bg-white shadow-md rounded-lg mt-6 p-6">
    <h2 class="text-xl font-semibold text-gray-800">Tren Jumlah Pengguna Terjebak</h2>

    <!-- <p>{{ $tum }}</p> -->
    <div style="max-width: 100%; width: 90%; overflow-x: auto;">
        <canvas id="myChart"></canvas>
    </div>
</div>

<!-- Modal Add Traping URL -->
<div id="modalAdd" class="hidden">
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full md:max-w-xl">
            <h2 class="text-xl font-semibold text-gray-800">Tambah Jebakan</h2>
            <form id="addForm">
                <label class="mt-4 hidden">
                    <span class="text-gray-700">Target</span>
                    <input type="text" id="title" class="w-full border px-3 py-2 rounded mt-1" placeholder="contoh: grup keluarga">
                </label>
                <label class="mt-4 hidden">
                    <span class="text-gray-700">Source URL</span>
                    <input type="url" id="url_source" class="w-full border px-3 py-2 rounded mt-1 bg-gray-200" readonly placeholder="select phising trap mode" required>
                </label>
                <label class="block mt-4">
                    <span class="text-gray-700">Short Link Service</span>
                    <select id="short_link_service_id" class="w-full border px-3 py-2 rounded mt-1" required>
                        <!-- Options akan dimuat melalui JavaScript -->
                    </select>
                </label>
                <label class="block mt-4">
                    <div class="flex flex-row gap-2 items-center">
                        <span class="text-gray-700">Link</span>
                        <span class="text-sm bg-blue-600 text-white px-2 py-1 rounded shadow-md hover:bg-blue-700 cursor-pointer" onclick="generateRandomURL()">Generate</span>
                    </div>
                    <input type="url" id="url_custom" class="w-full border px-3 py-2 rounded mt-1 bg-gray-200" readonly placeholder="Klik tombol generate" required>
                </label>
                <label class="block mt-4">
                    <span class="text-gray-700">Shortened Link</span>
                    <input type="url" id="url_short" class="w-full border px-3 py-2 rounded mt-1 bg-gray-200" required placeholder="Klik tombol generate" readonly>
                </label>
                <label class="block mt-4">
                    <span class="text-gray-700">Modus Jebakan</span>
                    <select id="ptm" class="w-full border px-3 py-2 rounded mt-1" onchange="change()" required>
                        <option value=''>- Pilih -</option>
                        @foreach ($ptm as $item)
                        <option value='{{ json_encode(["id" => $item->id, "path" => $item->path, "desc" => $item->desc]) }}'>{{$item->name}}</option>
                        @endforeach
                    </select>
                </label>
                <label class="block mt-4">
                    <span class="text-gray-700">Pilih Narasi</span>
                    <select id="naration" class="w-full border px-3 py-2 rounded mt-1" onchange="change()" required>
                        <option value=''>- Pilih -</option>
                    </select>
                </label>
                <label class="block mt-4">
                    <span class="text-gray-700">Narasi</span>
                    <textarea id="description" class="w-full border px-3 py-2 rounded mt-1 bg-gray-100" placeholder="Pilih Narasi" required rows="7" readonly></textarea>
                </label>
                <div class="flex justify-end mt-4">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-500 text-white rounded mr-2">Tutup</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript untuk AJAX -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        loadData();
        loadShortLinkServices();
    });

    function loadData(page = 1) {
        fetch(`/traping-urls-monitoring/all/${'{{ $target_id }}'}?page=${page}`)
            .then(response => response.json())
            .then(data => {
                let table = document.getElementById("trapingTable");
                let count = document.getElementById("count");
                let pagination = document.getElementById("pagination");

                table.innerHTML = ""; // Bersihkan tabel sebelum diisi ulang

                if (data.data.length === 0) {
                    table.innerHTML = `<tr>
                    <td colspan="5" class="text-center text-gray-600 p-4">Belum ada data Traping URL.</td>
                </tr>`;
                    count.innerText = "Count: 0";
                    pagination.innerHTML = ""; // Bersihkan pagination
                    return;
                }

                // Isi tabel dengan data baru
                data.data.data.forEach((item, index) => {
                    table.innerHTML += `
                    <tr id="row-${item.id}" class="border-b hover:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2 text-sm hidden">${item.title}</td>
                        <td class="border border-gray-300 px-4 py-2 text-sm" onclick="copyToClipboard(this)">
                            <div>
                                <span class="hover:bg-red-100">${item.description}</span>
                                <button class="flex gap-1 bg-gray-200 p-2 rounded-md">
                                    <!-- Ikon Copy -->
                                    <svg fill="#7d7d7d" height="20px" width="20px" version="1.1" id="XMLID_154_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24.00 24.00" xml:space="preserve" stroke="#7d7d7d" stroke-width="0.00024000000000000003"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="copy"> <g> <path d="M19,24H1V4h4V0h12.4L23,5.6V20h-4V24z M3,22h14v-2H5V6H3V22z M7,18h14V8h-6V2H7V18z M17,6h3.6L17,2.4V6z M17,16H9v-2h8V16 z M19,12H9v-2h10V12z M13,8H9V6h4V8z"></path> </g> </g> </g></svg>
                                </button>
                            </div>
                        </td>
                        <td class="border border-gray-300 px-4 py-2 hidden">${item.url_source}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <div class="flex flex-col text-sm">
                                <div>
                                    Link: ${item.url_custom}
                                </div>
                                <div>
                                    ShortLink: ${item.url_short}
                                </div>
                                <div class="text-xs text-gray-600">
                                    Dibuat: ${formatDate(item.created_at)}
                                </div>
                            </div>
                        </td>
                        <td class="border border-gray-300 px-4 py-2" hidden>${item.url_custom}</td>
                        <td class="border border-gray-300 px-4 py-2">${item.count_access}</td>
                        <td class="border border-gray-300 px-4 py-2">${item.count_form_access}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <button onclick="deleteData(${item.id})"
                                class="bg-red-600 text-white px-1 py-1 rounded hover:bg-red-700">
                                <!-- <svg width="18px" height="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M5.16565 10.1534C5.07629 8.99181 5.99473 8 7.15975 8H16.8402C18.0053 8 18.9237 8.9918 18.8344 10.1534L18.142 19.1534C18.0619 20.1954 17.193 21 16.1479 21H7.85206C6.80699 21 5.93811 20.1954 5.85795 19.1534L5.16565 10.1534Z" stroke="#ffffff" stroke-width="2"></path> <path d="M19.5 5H4.5" stroke="#ffffff" stroke-width="2" stroke-linecap="round"></path> <path d="M10 3C10 2.44772 10.4477 2 11 2H13C13.5523 2 14 2.44772 14 3V5H10V3Z" stroke="#ffffff" stroke-width="2"></path> <path d="M14 12V17" stroke="#ffffff" stroke-width="2" stroke-linecap="round"></path> <path d="M10 12V17" stroke="#ffffff" stroke-width="2" stroke-linecap="round"></path> </g></svg> -->
                                Hapus
                            </button>
                        </td>
                    </tr>`;
                });

                count.innerText = `Count: ${data.data.total}`;

                // **Pagination**
                pagination.innerHTML = "";
                for (let i = 1; i <= data.data.last_page; i++) {
                    pagination.innerHTML += `<button onclick="loadData(${i})"
                    class="px-3 py-1 mx-1 rounded ${i === data.data.current_page ? 'bg-blue-600 text-white' : 'bg-gray-300'}">
                    ${i}
                </button>`;
                }
            })
            .catch(error => console.error("Error:", error));
    }

    function loadShortLinkServices() {
        fetch("/short-link-services/all")
            .then(response => response.json())
            .then(data => {
                // console.log(data.data.data)
                const select = document.getElementById("short_link_service_id");
                select.innerHTML = "";
                data.data.data.forEach(service => {
                    select.innerHTML += `<option value="${service.id}">${service.service_name}</option>`;
                });
            })
            .catch(error => console.error("Error:", error));
    }

    function openModal() {
        document.getElementById("modalAdd").classList.remove("hidden");
    }

    function generateRandomURL() {
        // example: http://localhost:8000/trap/f0n2384gfn3fg4mu0smrec8fhm3ifhmsjkg4tu
        const url = 'https://phistrap.web.id'
        // const url = window.location.origin
        const baseUrl = url + "/trap/";
        const randomString = Math.random().toString(36).substring(2, 15) +
            Math.random().toString(36).substring(2, 15); // Generate string acak

        const fullUrl = baseUrl + randomString;

        // set to documment.getElementById("url_custom").value
        document.getElementById("url_custom").value = fullUrl; // Set nilai ke input

        fetch("/generate?link=" + fullUrl, {
                method: "GET",
            })
            .then(response => response.text())
            .then(shortUrl => {
                if (shortUrl) {
                    console.log("Short URL:", shortUrl);
                    document.getElementById("url_short").value = shortUrl;
                } else {
                    alert("Gagal generate short link.");
                }
            })
            .catch(error => console.error("Error:", error));
    }

    function change() {
        const select = document.getElementById("ptm");
        const selectedValue = select.value ? JSON.parse(select.value) : null;
        if (selectedValue) {
            console.log("ID:", selectedValue.id);
            console.log("Path:", selectedValue.path);
            console.log("Desc:", selectedValue.desc);
        }

        const host = window.location.origin;
        document.getElementById("url_source").value = host + selectedValue.path;
        // document.getElementById("description").innerHTML = selectedValue.desc;

        const narationSelect = document.getElementById("naration");
        narationSelect.innerHTML = ""; // Kosongkan dulu isi sebelumnya
        // Tambahkan opsi default
        const defaultOption = document.createElement("option");
        defaultOption.value = "";
        defaultOption.textContent = "- Pilih -";
        defaultOption.disabled = true;
        defaultOption.selected = true;
        narationSelect.appendChild(defaultOption);

        const descData = typeof selectedValue.desc === "string" ? JSON.parse(selectedValue.desc) : selectedValue.desc;

        if (descData.data && Array.isArray(descData.data)) {
            // Isi berdasarkan data
            descData.data.forEach(item => {
                const option = document.createElement("option");
                option.value = item.narasi; // Simpan narasi sebagai value
                option.textContent = stripHtml(item.judul); // Tampilkan kode sebagai teks
                narationSelect.appendChild(option);
            });

            // Set default description sesuai dengan narasi pertama
            document.getElementById("description").innerHTML = "pilih narasi terlebih dahulu";
        }

        // Tambahkan event listener ke <select id="naration">
        narationSelect.onchange = function () {
            const selectedNarasi = this.value;
            // document.getElementById("description").innerHTML = selectedNarasi;
            // document.getElementById("description").value = stripHtml(selectedNarasi);
            // document.getElementById("description").value = htmlToPlainText(selectedNarasi);
            document.getElementById("description").value = htmlToPlainTextWithCustomLink(selectedNarasi);
        };
    }

    function stripHtml(html) {
        const div = document.createElement("div");
        div.innerHTML = html;
        return div.textContent || div.innerText || "";
    }

    function htmlToPlainText(html) {
        const div = document.createElement("div");
        div.innerHTML = html;

        // Ubah semua <br> jadi newline
        div.querySelectorAll("br").forEach(br => br.replaceWith("\n"));

        // Tambahkan newline sebelum dan sesudah <p>
        // div.querySelectorAll("p").forEach(p => {
        //     p.innerHTML = "\n" + p.innerHTML + "\n";
        // });

        return div.textContent || div.innerText || "";
    }

    function htmlToPlainTextWithCustomLink(html) {
        const urlCustom = document.getElementById("url_short").value;

        const div = document.createElement("div");
        div.innerHTML = html;

        // Cari elemen dengan id='link' dan ubah isinya
        const linkSpan = div.querySelector("#link");
        if (linkSpan) {
            linkSpan.textContent = urlCustom || "[Link belum digenerate]";
        }

        // Ubah <br> jadi newline
        div.querySelectorAll("br").forEach(br => br.replaceWith("\n"));

        return div.textContent || div.innerText || "";
    }


    function closeModal() {
        document.getElementById("modalAdd").classList.add("hidden");
    }

    document.getElementById("addForm").addEventListener("submit", function(event) {
        event.preventDefault();

        const target_id = '{{ $target_id }}';
        // console.log("target: "+target_id)
        // return

        // const title = document.getElementById("title").value;
        const description = document.getElementById("description").value;
        const short_link_service_id = document.getElementById("short_link_service_id").value;
        const selectValue = document.getElementById("ptm").value; // Ambil value langsung
        const selectedValue = selectValue ? JSON.parse(selectValue) : null; // Parse JSON jika ada isinya

        let phising_trap_mode_id = null;
        if (selectedValue) {
            phising_trap_mode_id = selectedValue.id;
            console.log("Phishing Trap Mode ID:", phising_trap_mode_id);
        }

        const url_source = document.getElementById("url_source").value;

        const url_custom = document.getElementById("url_custom").value;

        const url_short = document.getElementById("url_short").value;

        // console.log(description)
        // return
        
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        fetch("/traping-urls-monitoring", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken
                },
                body: JSON.stringify({
                    target_id,
                    // title,
                    description,
                    short_link_service_id,
                    phising_trap_mode_id,
                    url_source,
                    url_custom,
                    url_short,
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    closeModal();
                    // loadData();
                    alert("Data berhasil ditambahkan.");
                    location.reload();
                } else {
                    alert("Gagal menambahkan data.");
                }
            })
            .catch(error => console.error("Error:", error));
    });

    function deleteData(id) {
        if (!confirm("Apakah Anda yakin ingin menghapus data ini?")) return;

        fetch(`/traping-urls-monitoring/${id}`, {
                method: "DELETE",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById(`row-${id}`).remove();
                    alert("Data berhasil dihapus.");
                } else {
                    alert("Gagal menghapus data.");
                }
            })
            .catch(error => console.error("Error:", error));
    }

    function formatDate(isoDate) {
        const date = new Date(isoDate);

        // Opsi format dalam bahasa Indonesia
        const options = {
            weekday: 'long',
            day: '2-digit',
            month: 'long',
            year: 'numeric'
        };

        return new Intl.DateTimeFormat('id-ID', options).format(date);
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Ambil data dari Laravel (dikonversi ke format JS)
    const tumData = @json($tum);
    // const tumData = JSON.parse(container.dataset.tum);

    // Ambil label dan value dari data
    const labels = tumData.map(item => formatDate(item.created_at));
    const accessCounts = tumData.map(item => parseInt(item.count_access));
    const formAccessCounts = tumData.map(item => parseInt(item.count_form_access));

    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                    label: 'Jumlah Akses Link',
                    data: accessCounts,
                    backgroundColor: 'rgba(0, 0, 0, 0.7)',
                    borderColor: 'rgba(0, 0, 0, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Jumlah Entri Form',
                    data: formAccessCounts,
                    backgroundColor: 'rgba(255, 0, 0, 0.6)',
                    borderColor: 'rgba(255, 0, 0, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    stepSize: 10
                }
            }
        }
    });
</script>
<script>
    function copyToClipboard(element) {
        const text = element.innerText;

        // Copy ke clipboard
        navigator.clipboard.writeText(text).then(() => {
            alert("Teks berhasil disalin!");
        }).catch(err => {
            console.error("Gagal menyalin teks: ", err);
        });
    }
</script>
@endsection