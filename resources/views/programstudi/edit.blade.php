<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Program Studi') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1>Form Edit Program Studi</h1>
        @if (session()->has('info'))
            <div class="alert alert-success">
                {{ session()->get('info') }}
            </div>
        @endif
        <form action="{{ url('programstudi/update/'. $programstudi->id) }}" method="post">
            @csrf
            @method("PATCH")
            
            <div class="form-group">
                <label for="kode">Kode Prodi</label>
                <input type="text" name="kode" id="kode" placeholder="Masukkan Kode Program Studi" class="form-control" value="{{ old('kode') ?? $programstudi->kode_prodi }}">
                @error('kode')
                    <div class="text-danger"> {{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nama">Nama Prodi</label>
                <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Program Studi" class="form-control" value="{{ old('nama') ?? $programstudi->nama_prodi}}">
                @error('nama')
                    <div class="text-danger"> {{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Foto/Logo Lama</label>
                <div>
                    <img src="{{asset('storage/'. $programstudi->foto)}}" alt="" width="100">
                </div>
            </div>
            <div class="form-group">
                <label for="foto">Foto/Logo</label>
                <input type="file" name="foto" id="foto" class="form-control">
                @error('foto')
                    <div class="text-danger"> {{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>
        </div>
    </div>
</x-app-layout>