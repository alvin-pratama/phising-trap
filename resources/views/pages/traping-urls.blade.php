@extends('layouts.app')

@section('content')
<!-- Card -->
<div class="bg-white shadow-md rounded-lg mt-6 p-6">
    <h2 class="text-xl font-semibold text-gray-800">Mode Jebakan</h2>

    <!-- Button Add -->
    <button onclick="openModal()"
        class="my-3 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 shadow-lg hidden">
        + Add
    </button>

    <!-- Table Wrapper -->
    <div class="overflow-x-auto mt-4">
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2 text-left">#</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Mode</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Deskripsi</th>
                    <th class="border border-gray-300 px-4 py-2 text-left hidden">Halaman</th>
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
        <div class="bg-white rounded-lg shadow-lg p-6 w-96">
            <h2 class="text-xl font-semibold text-gray-800">Tambah Traping URL</h2>
            <form id="addForm">
                <label class="block mt-4">
                    <span class="text-gray-700">Title</span>
                    <input type="text" id="title" class="w-full border px-3 py-2 rounded mt-1">
                </label>
                <label class="block mt-4">
                    <span class="text-gray-700">Description</span>
                    <textarea id="description" class="w-full border px-3 py-2 rounded mt-1"></textarea>
                </label>
                <label class="block mt-4">
                    <span class="text-gray-700">Phising Trap Mode</span>
                    <select id="ptm" class="w-full border px-3 py-2 rounded mt-1" onchange="change()">
                        <option value=''>- choose one -</option>
                        @foreach ($ptm as $item)
                        <option value='{{ json_encode(["id" => $item->id, "path" => $item->path]) }}'>{{$item->name}}</option>
                        @endforeach
                    </select>
                </label>
                <label class="block mt-4">
                    <span class="text-gray-700">Short Link Service</span>
                    <select id="short_link_service_id" class="w-full border px-3 py-2 rounded mt-1">
                        <!-- Options akan dimuat melalui JavaScript -->
                    </select>
                </label>
                <label class="block mt-4">
                    <span class="text-gray-700">Source URL</span>
                    <input type="url" id="url_source" class="w-full border px-3 py-2 rounded mt-1">
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
        fetch(`/traping-urls/all?page=${page}`)
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
        // console.log(url_source);
        // return;

        // console.log(description)
        // return

        fetch("/traping-urls", {
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
                    url_source
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

        fetch(`/traping-urls/${id}`, {
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