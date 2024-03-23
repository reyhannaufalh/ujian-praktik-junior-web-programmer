@extends('layouts.app')

@section('container')
    <div class="w-full md:w-1/2 mx-auto">
        <a href="{{ route('mahasiswa.index') }}" class="inline-block underline text-neutral-400 mb-3">Kembali ke halaman
            utama</a>

        <h1 class="text-xl font-semibold mb-4 text-white">Edit Mahasiswa</h1>

        <form action="/admin/mahasiswa/{{ $mahasiswa->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-5">
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Lengkap</label>
                <input type="text" id="nama" name="nama"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Masukkan Nama Lengkap" required value="{{ $mahasiswa->nama }}" />
            </div>
            <div class="mb-5">
                <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                <input type="text" id="alamat" name="alamat"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Masukkan Alamat" required value="{{ $mahasiswa->alamat }}" />
            </div>

            <div class="mb-5">
                <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                    Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Masukkan Tanggal Lahir" required value="{{ $mahasiswa->tanggal_lahir }}" />
            </div>

            <div class="mb-5">
                <label for="usia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Usia</label>
                <input type="number" id="usia" name="usia"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Masukkan Usia" required value="{{ $mahasiswa->usia }}" />
            </div>

            <div class="mb-5">
                <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>

                <div class="flex gap-8">
                    <div class="flex items-center">
                        <input @if ($mahasiswa->gender == 'L') checked @endif id="default-radio-1" type="radio"
                            value="L" name="gender"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-radio-1"
                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Laki-laki</label>
                    </div>
                    <div class="flex items-center">
                        <input @if ($mahasiswa->gender == 'P') checked @endif id="default-radio-2" type="radio"
                            value="P" name="gender"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-radio-2"
                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Perempuan</label>
                    </div>
                </div>
            </div>

            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>
@endsection
