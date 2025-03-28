<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="bg-gray-100">

    <div x-data="{ open: false }" class="flex min-h-screen">
        <!-- Sidebar -->
        <div
            :class="open ? 'translate-x-0' : '-translate-x-full'"
            class="fixed md:relative w-64 bg-gray-900 text-white p-5 h-screen md:h-auto md:min-h-screen transition-transform duration-300 ease-in-out md:translate-x-0 flex flex-col">

            <h2 class="text-xl font-bold mb-5">Phising Trap</h2>
            <ul class="flex-1">
                <li class="my-2">
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center gap-2 py-2 px-4 hover:bg-gray-500 rounded {{ request()->routeIs('dashboard') ? 'bg-gray-700' : 'bg-gray-900' }}">
                        <svg width="18px" height="18px" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M55.64 22.751H35.09C34.5596 22.751 34.0509 22.9617 33.6758 23.3368C33.3007 23.7118 33.09 24.2205 33.09 24.751V55.571C33.0916 56.1009 33.3028 56.6087 33.6775 56.9834C34.0523 57.3582 34.5601 57.5694 35.09 57.571H55.64C56.1699 57.5694 56.6777 57.3582 57.0525 56.9834C57.4272 56.6087 57.6384 56.1009 57.64 55.571V24.751C57.64 24.2205 57.4293 23.7118 57.0542 23.3368C56.6791 22.9617 56.1704 22.751 55.64 22.751Z" fill="#999999"></path> <path d="M55.64 5.62695H35.09C34.5596 5.62695 34.0509 5.83767 33.6758 6.21274C33.3007 6.58781 33.09 7.09652 33.09 7.62695V17.8969C33.0916 18.4269 33.3028 18.9347 33.6775 19.3094C34.0523 19.6841 34.5601 19.8954 35.09 19.8969H55.64C56.1699 19.8954 56.6777 19.6841 57.0525 19.3094C57.4272 18.9347 57.6384 18.4269 57.64 17.8969V7.62695C57.64 7.09652 57.4293 6.58781 57.0542 6.21274C56.6791 5.83767 56.1704 5.62695 55.64 5.62695Z" fill="#fff"></path> <path d="M28.24 36.451H7.7C6.59543 36.451 5.7 37.3465 5.7 38.451V55.5711C5.7 56.6756 6.59543 57.5711 7.7 57.5711H28.24C29.3446 57.5711 30.24 56.6756 30.24 55.5711V38.451C30.24 37.3465 29.3446 36.451 28.24 36.451Z" fill="#fff"></path> <path d="M28.24 5.62697H7.70002C7.43712 5.62604 7.17661 5.67714 6.93355 5.77733C6.69048 5.87751 6.46964 6.02477 6.28373 6.21068C6.09783 6.39658 5.95054 6.61742 5.85035 6.86049C5.75017 7.10355 5.6991 7.36406 5.70002 7.62697V31.557C5.70002 32.0874 5.91074 32.5961 6.28581 32.9712C6.66088 33.3462 7.16959 33.557 7.70002 33.557H28.24C28.7704 33.557 29.2791 33.3462 29.6542 32.9712C30.0293 32.5961 30.24 32.0874 30.24 31.557V7.62697C30.2409 7.36406 30.1898 7.10355 30.0896 6.86049C29.9895 6.61742 29.8422 6.39658 29.6563 6.21068C29.4704 6.02477 29.2495 5.87751 29.0065 5.77733C28.7634 5.67714 28.5029 5.62604 28.24 5.62697Z" fill="#999999"></path> </g></svg>
                        Dashboard
                    </a>
                </li>
                <p class="text-gray-500 hidden">Master</p>
                <li class="my-2 hidden">
                    <a href="{{ route('short-link-services') }}"
                        class="flex items-center gap-2 py-2 px-4 hover:bg-gray-500 rounded {{ request()->routeIs('short-link-services') ? 'bg-gray-700' : 'bg-gray-900' }}">
                        <svg width="18px" height="18px" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" stroke=""><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M7.05025 1.53553C8.03344 0.552348 9.36692 0 10.7574 0C13.6528 0 16 2.34721 16 5.24264C16 6.63308 15.4477 7.96656 14.4645 8.94975L12.4142 11L11 9.58579L13.0503 7.53553C13.6584 6.92742 14 6.10264 14 5.24264C14 3.45178 12.5482 2 10.7574 2C9.89736 2 9.07258 2.34163 8.46447 2.94975L6.41421 5L5 3.58579L7.05025 1.53553Z" fill="#fff"></path> <path d="M7.53553 13.0503L9.58579 11L11 12.4142L8.94975 14.4645C7.96656 15.4477 6.63308 16 5.24264 16C2.34721 16 0 13.6528 0 10.7574C0 9.36693 0.552347 8.03344 1.53553 7.05025L3.58579 5L5 6.41421L2.94975 8.46447C2.34163 9.07258 2 9.89736 2 10.7574C2 12.5482 3.45178 14 5.24264 14C6.10264 14 6.92742 13.6584 7.53553 13.0503Z" fill="#fff"></path> <path d="M5.70711 11.7071L11.7071 5.70711L10.2929 4.29289L4.29289 10.2929L5.70711 11.7071Z" fill="#fff"></path> </g></svg>
                        Short Link Services
                    </a>
                </li>
                <li class="my-2 hidden">
                    <a href="{{ route('phising-trap-modes') }}"
                        class="flex items-center gap-2 py-2 px-4 hover:bg-gray-500 rounded {{ request()->routeIs('phising-trap-modes') ? 'bg-gray-700' : 'bg-gray-900' }}">
                        <!-- <svg width="18px" height="18px" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" stroke=""><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M7.05025 1.53553C8.03344 0.552348 9.36692 0 10.7574 0C13.6528 0 16 2.34721 16 5.24264C16 6.63308 15.4477 7.96656 14.4645 8.94975L12.4142 11L11 9.58579L13.0503 7.53553C13.6584 6.92742 14 6.10264 14 5.24264C14 3.45178 12.5482 2 10.7574 2C9.89736 2 9.07258 2.34163 8.46447 2.94975L6.41421 5L5 3.58579L7.05025 1.53553Z" fill="#fff"></path> <path d="M7.53553 13.0503L9.58579 11L11 12.4142L8.94975 14.4645C7.96656 15.4477 6.63308 16 5.24264 16C2.34721 16 0 13.6528 0 10.7574C0 9.36693 0.552347 8.03344 1.53553 7.05025L3.58579 5L5 6.41421L2.94975 8.46447C2.34163 9.07258 2 9.89736 2 10.7574C2 12.5482 3.45178 14 5.24264 14C6.10264 14 6.92742 13.6584 7.53553 13.0503Z" fill="#fff"></path> <path d="M5.70711 11.7071L11.7071 5.70711L10.2929 4.29289L4.29289 10.2929L5.70711 11.7071Z" fill="#fff"></path> </g></svg> -->
                        <svg width="18px" height="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.82 22 21.99 19.83 21.99 16.19V7.81C22 4.17 19.83 2 16.19 2ZM7.67 5.5C7.67 5.09 8.01 4.75 8.42 4.75C8.83 4.75 9.17 5.09 9.17 5.5V9.4C9.17 9.81 8.83 10.15 8.42 10.15C8.01 10.15 7.67 9.81 7.67 9.4V5.5ZM9.52282 16.4313C9.31938 16.5216 9.17 16.7132 9.17 16.9358V18.5C9.17 18.91 8.83 19.25 8.42 19.25C8.01 19.25 7.67 18.91 7.67 18.5V16.9358C7.67 16.7132 7.5206 16.5216 7.31723 16.4311C6.36275 16.0064 5.7 15.058 5.7 13.95C5.7 12.45 6.92 11.22 8.42 11.22C9.92 11.22 11.15 12.44 11.15 13.95C11.15 15.0582 10.4791 16.0066 9.52282 16.4313ZM16.33 18.5C16.33 18.91 15.99 19.25 15.58 19.25C15.17 19.25 14.83 18.91 14.83 18.5V14.6C14.83 14.19 15.17 13.85 15.58 13.85C15.99 13.85 16.33 14.19 16.33 14.6V18.5ZM15.58 12.77C14.08 12.77 12.85 11.55 12.85 10.04C12.85 8.93185 13.5209 7.98342 14.4772 7.55873C14.6806 7.46839 14.83 7.27681 14.83 7.05421V5.5C14.83 5.09 15.17 4.75 15.58 4.75C15.99 4.75 16.33 5.09 16.33 5.5V7.06421C16.33 7.28681 16.4794 7.47835 16.6828 7.56885C17.6372 7.9936 18.3 8.94195 18.3 10.05C18.3 11.55 17.08 12.77 15.58 12.77Z" fill="#fff"></path> </g></svg>
                        Phising Trap Modes
                    </a>
                </li>
                <p class="text-gray-500">Data</p>
                <li class="my-2">
                    <a href="{{ route('traping-urls') }}"
                        class="flex items-center gap-2 py-2 px-4 hover:bg-gray-500 rounded {{ request()->routeIs('traping-urls') ? 'bg-gray-700' : 'bg-gray-900' }}">
                        <!-- <svg width="18px" height="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21 7.52V13.4C21 13.74 20.67 13.98 20.35 13.88L16.42 12.66C15.34 12.33 14.18 12.61 13.39 13.4C12.59 14.2 12.3 15.37 12.64 16.45L13.85 20.35C13.95 20.67 13.71 21 13.37 21H7.52C4.07 21 2 18.94 2 15.48V7.52C2 4.06 4.07 2 7.52 2H15.48C18.93 2 21 4.06 21 7.52Z" fill="#fff"></path> <path d="M21.9597 18.8385L20.3297 19.3885C19.8797 19.5385 19.5197 19.8885 19.3697 20.3485L18.8197 21.9785C18.3497 23.3885 16.3697 23.3585 15.9297 21.9485L14.0797 15.9985C13.7197 14.8185 14.8097 13.7185 15.9797 14.0885L21.9397 15.9385C23.3397 16.3785 23.3597 18.3685 21.9597 18.8385Z" fill="#fff"></path> </g></svg> -->
                        <svg width="18px" height="18px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#fff" d="M246.253 280.552l71.99 97.834-166.207 48.293zm.274-37.243L138.877 97.006 21 279.83l107.65 146.3 114.21-177.108zm162.63 9.728l34.46-53.457-38.665 11.226v33.426zm-115.097-2.12l-10.515-4.89-18.56 5.388-7.17 11.126 77.33 105.143 31.99-49.628-20.28-42.88zm45.55-88.33h65.405v27.44l44.9-13.06L342.254 30.566 154.83 85.02l107.712 146.39 77.055-22.45v-46.373zm45.45 86.06v-66.105h-25.507v49.49l-13.533-5.1-34.012 10.277 49.89 22.937 104.62 221.287 24.482-7.11z"></path></g></svg>
                        Traping Default
                    </a>
                </li>
                <li class="my-2">
                    <a href="{{ route('traping-urls-monitoring') }}"
                        class="flex items-center gap-2 py-2 px-4 hover:bg-gray-500 rounded {{ request()->routeIs('traping-urls-monitoring') ? 'bg-gray-700' : 'bg-gray-900' }}">
                        <!-- <svg width="18px" height="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21 7.52V13.4C21 13.74 20.67 13.98 20.35 13.88L16.42 12.66C15.34 12.33 14.18 12.61 13.39 13.4C12.59 14.2 12.3 15.37 12.64 16.45L13.85 20.35C13.95 20.67 13.71 21 13.37 21H7.52C4.07 21 2 18.94 2 15.48V7.52C2 4.06 4.07 2 7.52 2H15.48C18.93 2 21 4.06 21 7.52Z" fill="#fff"></path> <path d="M21.9597 18.8385L20.3297 19.3885C19.8797 19.5385 19.5197 19.8885 19.3697 20.3485L18.8197 21.9785C18.3497 23.3885 16.3697 23.3585 15.9297 21.9485L14.0797 15.9985C13.7197 14.8185 14.8097 13.7185 15.9797 14.0885L21.9397 15.9385C23.3397 16.3785 23.3597 18.3685 21.9597 18.8385Z" fill="#fff"></path> </g></svg> -->
                        <svg width="18px" height="18px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#fff" d="M246.253 280.552l71.99 97.834-166.207 48.293zm.274-37.243L138.877 97.006 21 279.83l107.65 146.3 114.21-177.108zm162.63 9.728l34.46-53.457-38.665 11.226v33.426zm-115.097-2.12l-10.515-4.89-18.56 5.388-7.17 11.126 77.33 105.143 31.99-49.628-20.28-42.88zm45.55-88.33h65.405v27.44l44.9-13.06L342.254 30.566 154.83 85.02l107.712 146.39 77.055-22.45v-46.373zm45.45 86.06v-66.105h-25.507v49.49l-13.533-5.1-34.012 10.277 49.89 22.937 104.62 221.287 24.482-7.11z"></path></g></svg>
                        Traping Monitoring
                    </a>
                </li>
            </ul>
        </div>

        <!-- Overlay Background (untuk mobile) -->
        <div x-show="open" @click="open = false" class="fixed inset-0 bg-black bg-opacity-0 md:hidden"></div>

        <!-- Main Content -->
        <div class="flex-1">
            <!-- Header -->
            <div class="bg-white shadow-md p-4 flex justify-between items-center">
                <!-- Button Sidebar Mobile -->
                <button @click="open = !open" class="md:hidden p-2 bg-gray-800 text-white rounded">
                    ☰ Menu
                </button>

                <div class="flex items-center gap-2">
                    <svg width="18px" height="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM11.8284 6.75736C12.3807 6.75736 12.8284 7.20507 12.8284 7.75736V12.7245L16.3553 14.0653C16.8716 14.2615 17.131 14.8391 16.9347 15.3553C16.7385 15.8716 16.1609 16.131 15.6447 15.9347L11.4731 14.349C11.085 14.2014 10.8284 13.8294 10.8284 13.4142V7.75736C10.8284 7.20507 11.2761 6.75736 11.8284 6.75736Z" fill="#999999"></path> </g></svg>
                    <!-- Real-time Clock -->
                    <div x-data="{ time: '' }" x-init="setInterval(() => {
                        let now = new Date();
                        time = new Intl.DateTimeFormat('en-US', { 
                            weekday: 'short', 
                            day: '2-digit', 
                            month: 'long', 
                            year: 'numeric',
                            hour: '2-digit',
                            minute: '2-digit',
                            second: '2-digit',
                            hour12: false
                        }).format(now);
                    }, 1000)">
                        <span class="text-lg font-semibold text-gray-700" x-text="time"></span>
                    </div>
                </div>

                <div class="relative" x-data="{ dropdownOpen: false }">
                    <!-- Button Profile (Tampilan Mobile & Desktop) -->
                    <button @click="dropdownOpen = !dropdownOpen"
                        class="flex items-center space-x-2 bg-gray-200 p-2 rounded-lg hover:bg-gray-300">
                        
                        <!-- Avatar (Selalu Tampil di Semua Ukuran) -->
                        <!-- <img src="https://i.pravatar.cc/40" alt="User Avatar" class="w-8 h-8 rounded-full"> -->
                        
                        <!-- Nama User (Hanya tampil di layar Desktop) -->
                        <span class="text-gray-700 font-medium hidden md:block">{{ Auth::user()->email }}</span>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="dropdownOpen" @click.away="dropdownOpen = false"
                        class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200"
                        x-transition>
                        <!-- <a href="" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                            Profile
                        </a> -->
                        <button onclick="logout()" type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                            Logout
                        </button>
                    </div>
                </div>

            </div>

            <!-- Page Content -->
            <div class="p-10">
                @yield('content')
            </div>
        </div>
    </div>

    <script>
        function logout() {
            fetch("{{ route('logout') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = "/login"; // Redirect ke login setelah logout
                } else {
                    alert("Gagal logout!");
                }
            })
            .catch(error => console.error("Error:", error));
        }
    </script>

</body>
</html>
