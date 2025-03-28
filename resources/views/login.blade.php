<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="/tailwind.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
</head>

<body class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-center mb-4">Login</h2>

        <form id="loginForm">
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                    required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                    required>
            </div>

            <div class="text-center">
                <button type="submit"
                    class="w-full bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 transition">
                    Enter
                </button>
            </div>

            <p id="errorMessage" class="mt-3 text-center text-red-600 hidden"></p>
        </form>
    </div>

    <script>
        document.getElementById("loginForm").addEventListener("submit", function(e) {
            e.preventDefault();

            let formData = {
                email: document.getElementById("email").value,
                password: document.getElementById("password").value,
            };

            fetch("/login", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify(formData)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.location.href = "/dashboard"; // Redirect setelah login sukses
                    } else {
                        document.getElementById("errorMessage").innerText = data.message;
                        document.getElementById("errorMessage").classList.remove("hidden");
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    document.getElementById("errorMessage").innerText = "Terjadi kesalahan!";
                    document.getElementById("errorMessage").classList.remove("hidden");
                });
        });
    </script>
</body>

</html>