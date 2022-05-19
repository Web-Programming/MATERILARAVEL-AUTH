<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Program Studi') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1>Detail Program Studi</h1>
        ID Prodi = {{ $programstudi->id }}<br/>
        Kode Prodi = {{ $programstudi->kode_prodi }}<br/>
        Nama Prodi = {{ $programstudi->nama_prodi }}
        </div>
    </div>
</x-app-layout>