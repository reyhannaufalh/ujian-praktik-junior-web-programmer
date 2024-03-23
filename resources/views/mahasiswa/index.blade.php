@extends('layouts.app')

@section('container')
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <div class="grid grid-cols-4 lg:grid-cols-12 mb-4 gap-4">
            <div class="col-span-4 rounded-md bg-green-500 text-white shadow-md py-6 px-4">
                <p class="uppercase">Jumlah Total Mahasiswa</p>
                <p class="text-4xl font-semibold">{{ $data_mahasiswa->count() }}</p>
            </div>
            <div class="col-span-4 rounded-md bg-blue-500 text-white shadow-md py-6 px-4">
                <p class="uppercase">Jumlah Mahasiswa (L)</p>
                <p class="text-4xl font-semibold">{{ $jumlah_mahasiswa }}</p>
            </div>
            <div class="col-span-4 rounded-md bg-pink-500 text-white shadow-md py-6 px-4">
                <p class="uppercase">Jumlah Mahasiswi (P)</p>
                <p class="text-4xl font-semibold">{{ $jumlah_mahasiswi }}</p>
            </div>

        </div>
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                    <form class="flex items-center" action="{{ Request::url() }}">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                    viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" id="simple-search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Search" name="search">

                        </div>
                    </form>
                </div>

                @if (Request::is('admin*'))
                    <a href="{{ route('mahasiswa.create') }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah
                        Mahasiswa</a>
                @endif

            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">NIM</th>
                            <th scope="col" class="px-4 py-3">Nama</th>
                            <th scope="col" class="px-4 py-3">Alamat</th>
                            <th scope="col" class="px-4 py-3">Tanggal Lahir</th>
                            <th scope="col" class="px-4 py-3">Gender</th>
                            <th scope="col" class="px-4 py-3">Usia</th>
                            @if (Request::is('admin*'))
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_mahasiswa as $mahasiswa)
                            <tr class="border-b dark:border-gray-700">
                                <th scope="row"
                                    class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $mahasiswa->nim }}
                                </th>
                                <td class="px-4 py-3">{{ $mahasiswa->nama }}</td>
                                <td class="px-4 py-3">{{ $mahasiswa->alamat }}</td>
                                <td class="px-4 py-3">
                                    {{ Illuminate\Support\Carbon::parse($mahasiswa->tanggal_lahir)->format('d M Y') }}</td>
                                <td class="px-4 py-3">{{ $mahasiswa->gender }}</td>
                                <td class="px-4 py-3">{{ $mahasiswa->usia }}</td>
                                @if (Request::is('admin*'))
                                    <td class="px-4 py-3 flex items-center gap-2">
                                        <a href="/admin/mahasiswa/{{ $mahasiswa->id }}/edit"
                                            class=" bg-orange-500 text-white py-2 px-4 rounded-md">Edit</a>

                                        <form action="/admin/mahasiswa/{{ $mahasiswa->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="alert('Apakah Anda Yakin?')"
                                                class=" bg-red-500 text-white py-2 px-4 rounded-md">Hapus</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
                aria-label="Table navigation">
                <div class="w-full">
                    {{ $data_mahasiswa->links() }}
                </div>
            </nav>
        </div>
    </div>
@endsection
