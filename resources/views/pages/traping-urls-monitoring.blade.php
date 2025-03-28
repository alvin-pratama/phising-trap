@extends('layouts.app')

@section('title', 'Traping URL')

@section('content')
<h1 class="text-2xl font-bold">Traping URL Monitoring</h1>
<p class="mt-2 text-gray-700">Atur konfigurasi sistem untuk monitoring di sini.</p>

<!-- Card -->
<div class="bg-white shadow-md rounded-lg mt-6 p-6">
    <h2 class="text-xl font-semibold text-gray-800">Daftar Traping URL</h2>
    <p id="count" class="mt-2 text-gray-700">Count: 0</p>

    <!-- Button Add -->
    <button onclick="openModal()"
        class="my-3 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 shadow-lg">
        + Tambah Trap
    </button>

    <!-- Table Wrapper -->
    <div class="overflow-x-auto mt-4">
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2 text-left">#</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Title</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Description</th>
                    <th class="border border-gray-300 px-4 py-2 text-left hidden">Source URL</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Random URL</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Shortened URL</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Count Access</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Action</th>
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

<!-- Modal Add Traping URL -->
<div id="modalAdd" class="hidden">
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full md:max-w-xl">
            <h2 class="text-xl font-semibold text-gray-800">Tambah Traping URL</h2>
            <form id="addForm">
                <label class="block mt-4">
                    <span class="text-gray-700">Title</span>
                    <input type="text" id="title" class="w-full border px-3 py-2 rounded mt-1" placeholder="ex: keluarga" required>
                </label>
                <label class="block mt-4">
                    <span class="text-gray-700">Description</span>
                    <textarea id="description" class="w-full border px-3 py-2 rounded mt-1" placeholder="ex: ini dikususkan untuk dishare ke keluarga" required></textarea>
                </label>
                <label class="block mt-4">
                    <span class="text-gray-700">Phising Trap Mode</span>
                    <select id="ptm" class="w-full border px-3 py-2 rounded mt-1" onchange="change()" required>
                        <option value=''>- choose one -</option>
                        @foreach ($ptm as $item)
                        <option value='{{ json_encode(["id" => $item->id, "path" => $item->path]) }}'>{{$item->name}}</option>
                        @endforeach
                    </select>
                </label>
                <label class="block mt-4">
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
                        <span class="text-gray-700">Custom URL</span>
                        <span class="text-sm bg-blue-600 text-white px-2 py-1 rounded shadow-md hover:bg-blue-700 cursor-pointer" onclick="generateRandomURL()">Generate Random URL</span>
                    </div>
                    <input type="url" id="url_short" class="w-full border px-3 py-2 rounded mt-1 bg-gray-200" readonly placeholder="click generate random url button" required>
                </label>
                <div class="flex justify-end mt-4">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-500 text-white rounded mr-2">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
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
        fetch(`/traping-urls-monitoring/all?page=${page}`)
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
                        <td class="border border-gray-300 px-4 py-2">${index + 1}</td>
                        <td class="border border-gray-300 px-4 py-2">${item.title}</td>
                        <td class="border border-gray-300 px-4 py-2">${item.description}</td>
                        <td class="border border-gray-300 px-4 py-2 hidden">${item.url_source}</td>
                        <td class="border border-gray-300 px-4 py-2">${item.url_short}</td>
                        <td class="border border-gray-300 px-4 py-2">${item.url_custom}</td>
                        <td class="border border-gray-300 px-4 py-2">${item.count_access}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <button onclick="deleteData(${item.id})"
                                class="bg-red-600 text-white px-1 py-1 rounded hover:bg-red-700">
                                <svg width="18px" height="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M5.16565 10.1534C5.07629 8.99181 5.99473 8 7.15975 8H16.8402C18.0053 8 18.9237 8.9918 18.8344 10.1534L18.142 19.1534C18.0619 20.1954 17.193 21 16.1479 21H7.85206C6.80699 21 5.93811 20.1954 5.85795 19.1534L5.16565 10.1534Z" stroke="#ffffff" stroke-width="2"></path> <path d="M19.5 5H4.5" stroke="#ffffff" stroke-width="2" stroke-linecap="round"></path> <path d="M10 3C10 2.44772 10.4477 2 11 2H13C13.5523 2 14 2.44772 14 3V5H10V3Z" stroke="#ffffff" stroke-width="2"></path> <path d="M14 12V17" stroke="#ffffff" stroke-width="2" stroke-linecap="round"></path> <path d="M10 12V17" stroke="#ffffff" stroke-width="2" stroke-linecap="round"></path> </g></svg>
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
        const baseUrl = window.location.origin + "/trap/";
        const randomString = Math.random().toString(36).substring(2, 15) +
            Math.random().toString(36).substring(2, 15); // Generate string acak

        const fullUrl = baseUrl + randomString;

        // set to documment.getElementById("url_short").value
        document.getElementById("url_short").value = fullUrl; // Set nilai ke input
    }

    function change() {
        const select = document.getElementById("ptm");
        const selectedValue = select.value ? JSON.parse(select.value) : null;
        if (selectedValue) {
            console.log("ID:", selectedValue.id);
            console.log("Path:", selectedValue.path);
        }

        const host = window.location.origin;
        document.getElementById("url_source").value = host + selectedValue.path;
    }

    function closeModal() {
        document.getElementById("modalAdd").classList.add("hidden");
    }

    document.getElementById("addForm").addEventListener("submit", function(event) {
        event.preventDefault();

        const title = document.getElementById("title").value;
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

        const url_short = document.getElementById("url_short").value;

        fetch("/traping-urls-monitoring", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    title,
                    description,
                    short_link_service_id,
                    phising_trap_mode_id,
                    url_source,
                    url_short,
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    closeModal();
                    loadData();
                    alert("Data berhasil ditambahkan.");
                    loaction.reload();
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
</script>
@endsection