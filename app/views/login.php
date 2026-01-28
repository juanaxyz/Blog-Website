<?php
if (isset($_SESSION['username'])) {
    header('Location: /');
};

?>
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>



<div class="bg-gray-50 min-h-screen flex items-center justify-center">
    <form action="/user-login" method="POST"
        class="bg-white w-full max-w-md p-8 border border-gray-200">

        <!-- Title -->
        <h1 class="text-3xl font-serif font-bold text-gray-900 mb-2">
            Login
        </h1>
        <p class="text-sm text-gray-600 mb-6">
            Silakan masuk untuk melanjutkan
        </p>

        <hr class="border-t border-blue-600 w-16 mb-6">

        <!-- Username -->
        <div class="mb-5">
            <label for="username"
                class="block text-sm uppercase tracking-widest font-semibold text-gray-700 mb-2">
                Username
            </label>
            <input type="text" name="username" id="username" required
                class="w-full border border-gray-300 px-4 py-2
                    focus:outline-none focus:border-blue-600">
        </div>

        <!-- Password -->
        <div class="mb-6">
            <label for="password"
                class="block text-sm uppercase tracking-widest font-semibold text-gray-700 mb-2">
                Password
            </label>
            <input type="password" name="password" id="password" required
                class="w-full border border-gray-300 px-4 py-2
                    focus:outline-none focus:border-blue-600">
        </div>

        <!-- Button -->
        <button type="submit"
            class="w-full border border-blue-600 text-blue-700
                   font-semibold uppercase tracking-widest py-2
                   hover:bg-blue-600 hover:text-white transition">
            Login
        </button>

    </form>
</div>


</body>