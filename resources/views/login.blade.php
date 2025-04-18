<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - PhisTrap</title>
  <script src="/tailwind.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" type="image/x-icon" href="/favicon.ico">
</head>

<body class="min-h-screen bg-gradient-to-br from-indigo-700 via-indigo-800 to-indigo-900 flex items-center justify-center">
  <div class="bg-white shadow-2xl rounded-2xl p-8 w-full max-w-md">
    <div class="text-center mb-8">
      <img src="/favicon.ico" class="w-14 h-14 mx-auto mb-2" alt="PhisTrap Icon" />
      <h1 class="text-3xl font-bold text-indigo-800">PhisTrap Login</h1>
      <p class="text-gray-500 text-sm mt-1">Masuk untuk mengakses dashboard</p>
    </div>

    <form id="loginForm" class="space-y-6">
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <input type="email" id="email" name="email" placeholder="nama@domain.com" required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" />
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <input type="password" id="password" name="password" placeholder="••••••••" required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" />
      </div>

      <p id="errorMessage" class="text-center text-red-600 text-sm hidden"></p>

      <div>
        <button type="submit"
          class="w-full py-3 text-white font-semibold bg-indigo-600 rounded-lg shadow-md hover:bg-indigo-700 transition">
          Masuk
        </button>
      </div>
    </form>

    <p class="text-center text-sm text-gray-400 mt-6">&copy; {{ date('Y') }} PhisTrap. All rights reserved.</p>
  </div>

  <script>
    document.getElementById("loginForm").addEventListener("submit", function (e) {
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
            window.location.href = "/dashboard";
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
