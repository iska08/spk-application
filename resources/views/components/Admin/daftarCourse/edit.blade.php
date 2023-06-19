<!-- Validation inputs -->
<div class="container px-6 mx-auto grid">
<!-- Inputs with icons -->
<h2
    class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
>
    Edit Data Course
</h2>
<form method="POST" action="{{ url('/daftar-course/update/'.$course->id) }}">
    @csrf
    <div
    class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
>
    {{-- Nama Course --}}
    <label class="block mt-4 text-sm">
    <span class="text-gray-700 dark:text-gray-400">Nama Course</span>
    <!-- focus-within sets the color for the icon when input is focused -->
    <div
        class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400"
    >
        <input
        type="text" name="name"
        class="block w-full pr-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
        placeholder="Name Course . ."
        value="{{ $course->name}}"
        />
        <div
        class="absolute inset-y-0 right-0 flex items-center mr-3 pointer-events-none"
        >
        <svg
            class="w-5 h-5"
            aria-hidden="true"
            fill="none"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            viewBox="0 0 24 24"
            stroke="currentColor"
        >
        </svg>
        </div>
    </div>
    </label>

    {{-- Harga --}}
    <label class="block mt-4 text-sm">
    <span class="text-gray-700 dark:text-gray-400">Harga</span>
    <!-- focus-within sets the color for the icon when input is focused -->
    <div
        class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400"
    >
        <input
        type="text" name="harga"
        class="block w-full pr-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
        placeholder="Rp."
        value="{{ $course->harga}}"
        />
        <div
        class="absolute inset-y-0 right-0 flex items-center mr-3 pointer-events-none"
        >
        <svg
            class="w-5 h-5"
            aria-hidden="true"
            fill="none"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            viewBox="0 0 24 24"
            stroke="currentColor"
        >
        </svg>
        </div>
    </div>
    </label>

    {{-- Status --}}
    <label class="block mt-4 text-sm">
    <span class="text-gray-700 dark:text-gray-400">Status</span>
    <!-- focus-within sets the color for the icon when input is focused -->
    <div
        class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400"
    >
        <input
        type="text" name="status"
        class="block w-full pr-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
        placeholder="Aktif / Tidak Aktif"
        value="{{ $course->status}}"
        />
        <div
        class="absolute inset-y-0 right-0 flex items-center mr-3 pointer-events-none"
        >
        <svg
            class="w-5 h-5"
            aria-hidden="true"
            fill="none"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            viewBox="0 0 24 24"
            stroke="currentColor"
        >
        </svg>
        </div>
    </div>
    </label>

    {{-- Deskripsi --}}
    <label class="block mt-4 text-sm">
    <span class="text-gray-700 dark:text-gray-400">Deskripsi</span>
    <!-- focus-within sets the color for the icon when input is focused -->
    <div
        class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400"
    >
        <input
        type="text" name="deskripsi"
        class="block w-full pr-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
        placeholder="Deskripsi . . ."
        value="{{ $course->deskripsi}}"
        />
        <div
        class="absolute inset-y-0 right-0 flex items-center mr-3 pointer-events-none"
        >
        <svg
            class="w-5 h-5"
            aria-hidden="true"
            fill="none"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            viewBox="0 0 24 24"
            stroke="currentColor"
        >
        </svg>
        </div>
    </div>
    </label>
</div>
<div class="px-2 my-2">
    <button
        type="submit"
        class="px-4 py-2 text-sm font-medium leading-5 text-white text-align-center transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
    >
        Simpan
    </button>
    </div>
</div>
</form>


