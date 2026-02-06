<div class="bg-gray-50 min-h-screen py-20 px-4">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Hubungi Kami</h1>
            <p class="text-lg text-gray-600">Kami senang mendengar dari Anda. Silakan isi form di bawah.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            <!-- Info Card 1 -->
            <div class="bg-white p-6 rounded-lg shadow text-center">
                <div class="text-3xl mb-4">📧</div>
                <h3 class="font-semibold text-gray-800 mb-2">Email</h3>
                <p class="text-gray-600">inijuana@gmail.com</p>
            </div>

            <!-- Info Card 2 -->
            <div class="bg-white p-6 rounded-lg shadow text-center">
                <div class="text-3xl mb-4">📍</div>
                <h3 class="font-semibold text-gray-800 mb-2">Lokasi</h3>
                <p class="text-gray-600">Indonesia</p>
            </div>

            <!-- Info Card 3 -->
            <div class="bg-white p-6 rounded-lg shadow text-center">
                <div class="text-3xl mb-4">⏰</div>
                <h3 class="font-semibold text-gray-800 mb-2">Jam Kerja</h3>
                <p class="text-gray-600">24/7 Online</p>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="bg-white rounded-lg shadow-lg p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Kirim Pesan</h2>
            <form class="space-y-6">
                <!-- Nama -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" name="nama" placeholder="Masukkan nama Anda"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-500">
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" placeholder="Masukkan email Anda"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-500">
                </div>

                <!-- Subjek -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Subjek</label>
                    <input type="text" name="subjek" placeholder="Subjek pesan Anda"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-500">
                </div>

                <!-- Pesan -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Pesan</label>
                    <textarea name="pesan" rows="6" placeholder="Tulis pesan Anda di sini..."
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-500 resize-none"></textarea>
                </div>

                <!-- Button -->
                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-sky-600 hover:bg-sky-700 text-white font-bold px-8 py-3 rounded-lg transition">
                        Kirim Pesan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


</body>

</html>
