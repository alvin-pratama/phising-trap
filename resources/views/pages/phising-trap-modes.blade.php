@extends('layouts.app')

@section('title', 'Phising Trap Modes')

@section('content')
<!-- Card -->
<div class="bg-white shadow-md rounded-lg mt-6 p-6">
    <h2 class="text-xl font-semibold text-gray-800">Daftar Phising Trap Modes</h2>
    <p id="count" class="mt-2 text-gray-700">Count: 0</p>

    <!-- Table Wrapper -->
    <div class="overflow-x-auto mt-4">
        <!-- Tombol Add -->
        <button onclick="openAddModal()"
            class="my-3 bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700 shadow-lg hidden">
            + Add
        </button>
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2 text-left">#</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Name</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Path</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Action</th>
                </tr>
            </thead>
            <tbody id="serviceTable">
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

<!-- Modal Add Data -->
<div id="addModal" class="hidden">
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h2 class="text-xl font-semibold text-gray-800">Tambah Phising Trap Mode</h2>

            <!-- Form Input -->
            <div class="mt-4">
                <label class="block text-gray-700">Name</label>
                <input type="text" id="name" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring" placeholder="Masukkan nama">
            </div>

            <!-- Tombol Submit -->
            <div class="mt-4 flex justify-end space-x-2">
                <button onclick="closeAddModal()" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancel</button>
                <button onclick="addData()" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Script AJAX untuk Fetch Data -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        loadData();
    });

    function loadData(page = 1) {
        fetch(`/phising-trap-modes/all?page=${page}`)
            .then(response => response.json())
            .then(data => {
                let table = document.getElementById('serviceTable');
                let count = document.getElementById('count');
                let pagination = document.getElementById('pagination');

                table.innerHTML = ""; // Bersihkan tabel sebelum diisi ulang

                if (data.data.length === 0) {
                    table.innerHTML = `<tr>
                        <td colspan="5" class="text-center text-gray-600 p-4">Belum ada data short link services.</td>
                    </tr>`;
                    count.innerText = "Count: 0";
                    pagination.innerHTML = ""; // Bersihkan pagination
                    return;
                }

                // Isi tabel dengan data baru
                data.data.data.forEach((service, index) => {
                    table.innerHTML += `
                        <tr id="row-${service.id}" class="border-b hover:bg-gray-100">
                            <td class="border border-gray-300 px-4 py-2">${index + 1}</td>
                            <td class="border border-gray-300 px-4 py-2">${service.name}</td>
                            <td class="border border-gray-300 px-4 py-2">${service.path}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <button onclick="deleteData(${service.id})"
                                    class="bg-red-600 text-white px-4 py-1 rounded hover:bg-red-700 shadow-lg">
                                    Delete
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
            .catch(error => console.error('Error:', error));
    }

    function openAddModal() {
        document.getElementById("addModal").classList.remove("hidden");
    }

    function closeAddModal() {
        document.getElementById("addModal").classList.add("hidden");
    }

    function addData() {
        let name = document.getElementById("name").value.trim();

        if (name === "") {
            alert("Semua field harus diisi!");
            return;
        }

        fetch("/phising-trap-modes", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    name: name
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Data berhasil ditambahkan!");
                    closeAddModal();
                    loadData(); // Reload tabel tanpa refresh halaman
                } else {
                    alert("Gagal menambahkan service!");
                }
            })
            .catch(error => {
                console.error("Error:", error);
                alert("Terjadi kesalahan!");
            });
    }

    function deleteData(id) {
        if (!confirm('Apakah Anda yakin ingin menghapus data ini?')) return;

        fetch(`/phising-trap-modes/${id}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    loadData(); // Muat ulang data setelah delete
                    alert('Data berhasil dihapus.');
                } else {
                    alert('Gagal menghapus data.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan.');
            });
    }
</script>
@endsection