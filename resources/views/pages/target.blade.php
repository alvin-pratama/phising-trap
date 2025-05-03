@extends('layouts.app')

@section('content')
<!-- Card -->
<div class="bg-white shadow-md rounded-lg mt-6 p-6">
    <h2 class="text-xl font-semibold text-gray-800">Target Jebakan</h2>
    <!-- <p id="count" class="mt-2 text-gray-700">Count: 0</p> -->

    <!-- Button Add -->
    <button onclick="openAddModal()"
        class="my-3 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 shadow-lg">
        Tambah Target
    </button>

    <!-- Table Wrapper -->
    <div class="overflow-x-auto mt-4">
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2 text-left">#</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Target</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Jumlah Target</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody id="targetTable">
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
        <div class="bg-white rounded-lg shadow-lg p-6 w-full md:max-w-xl">
            <h2 class="text-xl font-semibold text-gray-800">Tambah Target</h2>

            <!-- Form Input -->
            <div class="mt-4">
                <label class="block text-gray-700">Target</label>
                <textarea id="add_target" class="w-full border px-3 py-2 rounded mt-1" required placeholder="contoh: grup keluarga" rows="4"></textarea>
            </div>

            <div class="mt-4">
                <label class="block text-gray-700">Perkiraan Jumlah Target</label>
                <input type="number" id="add_count_target" class="w-full border px-3 py-2 rounded mt-1" placeholder="0" required>
            </div>

            <!-- Tombol Submit -->
            <div class="mt-4 flex justify-end space-x-2">
                <button onclick="closeAddModal()" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancel</button>
                <button onclick="addData()" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Data -->
<div id="editModal" class="hidden">
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full md:max-w-xl">
            <h2 class="text-xl font-semibold text-gray-800">Tambah Target</h2>

            <!-- Form Input -->
            <input type="text" class="hidden" id="edit_id">
            <div class="mt-4">
                <label class="block text-gray-700">Target</label>
                <textarea id="edit_target" class="w-full border px-3 py-2 rounded mt-1" required placeholder="contoh: grup keluarga" rows="4"></textarea>
            </div>

            <div class="mt-4">
                <label class="block text-gray-700">Rencana Total Target</label>
                <input type="number" id="edit_count_target" class="w-full border px-3 py-2 rounded mt-1" placeholder="0" required>
            </div>

            <!-- Tombol Submit -->
            <div class="mt-4 flex justify-end space-x-2">
                <button onclick="closeEditModal()" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancel</button>
                <button onclick="editData()" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        loadData();
    });

    function loadData(page = 1) {
        fetch(`/targets/by/all?page=${page}`)
            .then(response => response.json())
            .then(data => {
                let table = document.getElementById('targetTable');
                let count = document.getElementById('count');
                let pagination = document.getElementById('pagination');

                table.innerHTML = ""; // Bersihkan tabel sebelum diisi ulang

                if (data.data.length === 0) {
                    table.innerHTML = `<tr>
                        <td colspan="5" class="text-center text-gray-600 p-4">Belum ada data target.</td>
                    </tr>`;
                    count.innerText = "Count: 0";
                    pagination.innerHTML = ""; // Bersihkan pagination
                    return;
                }

                // Isi tabel dengan data baru
                data.data.data.forEach((target, index) => {
                    table.innerHTML += `
                        <tr id="row-${target.id}" class="border-b hover:bg-gray-100">
                            <td class="border border-gray-300 px-4 py-2">${index + 1}</td>
                            <td class="border border-gray-300 px-4 py-2">${target.target}</td>
                            <td class="border border-gray-300 px-4 py-2">${target.count_target}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <button onclick="detailData(${target.id})"
                                    class="bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700 shadow-lg">
                                    Kelola Jebakan
                                </button>
                                <button onclick="openEditModal(${target.id})"
                                    class="bg-green-600 text-white px-4 py-1 rounded hover:bg-green-700 shadow-lg">
                                    Ubah
                                </button>
                                <button onclick="deleteData(${target.id})"
                                    class="bg-red-600 text-white px-4 py-1 rounded hover:bg-red-700 shadow-lg">
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
            .catch(error => console.error('Error:', error));
    }

    function openAddModal() {
        document.getElementById("addModal").classList.remove("hidden");
    }

    function closeAddModal() {
        document.getElementById("addModal").classList.add("hidden");
    }

    function addData() {
        let target = document.getElementById("add_target").value.trim();
        let count_target = document.getElementById("add_count_target").value.trim();

        if (target === "" || count_target === "") {
            alert("Semua field harus diisi!");
            return;
        }

        fetch("/targets", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    target: target,
                    count_target: count_target
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Target berhasil ditambahkan!");
                    closeAddModal();
                    loadData();
                } else {
                    alert("Gagal menambahkan target!");
                }
            })
            .catch(error => {
                console.error("Error:", error);
                alert("Terjadi kesalahan!");
            });
    }

    function detailData(id) {
        location.href = "/traping-urls-monitoring/target/"+id
    }

    async function openEditModal(id) {
        try {
            const response = await fetch(`/targets/${id}`);
            const result = await response.json();

            if (result.success) {
                const data = result.data;

                document.getElementById("edit_target").value = data.target;
                document.getElementById("edit_count_target").value = data.count_target;

                document.getElementById("editModal").classList.remove("hidden");
            } else {
                alert(result.message || "Gagal mengambil data.");
            }

            document.getElementById("edit_id").value = id;
            document.getElementById("editModal").classList.remove("hidden");
        } catch (e) {
            console.log(e);
        }
    }

    function closeEditModal() {
        document.getElementById("editModal").classList.add("hidden");
    }

    function editData() {
        let id = document.getElementById("edit_id").value.trim();
        let target = document.getElementById("edit_target").value.trim();
        let count_target = document.getElementById("edit_count_target").value.trim();

        if (target === "" || count_target === "") {
            alert("Semua field harus diisi!");
            return;
        }

        fetch(`/targets/${id}`, {
                method: "PUT",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    target: target,
                    count_target: count_target
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Target berhasil diubah!");
                    closeEditModal();
                    loadData();
                } else {
                    alert("Gagal mengubah target!");
                }
            })
            .catch(error => {
                console.error("Error:", error);
                alert("Terjadi kesalahan!");
            });
    }

    function deleteData(id) {
        if (!confirm("Apakah Anda yakin ingin menghapus data ini?")) return;

        fetch(`/targets/${id}`, {
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