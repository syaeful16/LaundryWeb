@extends('layouts.main')

@section('title', 'Lupa Password')

@section('content')
    <x-navbar type=''/>
    <section class="w-full py-28 p-side flex justify-center items-center font-quicksand">
        <div class="md:w-[300px] xl:w-[400px]">
            <div class="text-center">
                <h1 class="text-4xl text-primary font-bold mb-2">Lupa Password</h1>
                <p class="text-base text-gray-500 font-medium">Masukkan Email Anda untuk mendapatkan link biru</p>
            </div>
            @if (session()->has('status'))
                <div class="w-full mt-4 p-3 flex justify-center items-center gap-4 bg-green-200/50 border border-green-700 rounded-md">
                    <i class="fa-regular fa-circle-check text-2xl text-green-600"></i>  
                    <p class="text-base"><span class="font-semibold text-green-600">Berhasil:</span> Link reset password telah terkirim</p>
                </div>
            @endif
            @if ($errors->any())
                <div class="w-full mt-4 p-3 flex justify-center items-center gap-4 bg-red-200/50 border border-red-700 rounded-md">
                    <i class="fa-regular fa-circle-xmark text-2xl text-red-600"></i>
                    <p class="text-base"><span class="font-semibold text-red-600">Gagal:</span> Link reset password gagal terkirim</p>
                </div>
            @endif
            <form action="{{ route('password.email') }}" method="post">
                @csrf
                <div class="flex flex-col mt-4">
                    <label for="email" class="font-semibold">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full bg-white border border-third focus:outline-none focus:ring-1 focus:ring-third block rounded-md mt-2 py-3 px-4 placeholder-slate-400 font-medium" placeholder="Masukkan email Anda">
                    @error('email')
                        <p class="text-red-400 font-medium text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="w-full bg-primary text-white my-6 mb-2 py-3 rounded-md font-semibold">Kirim</button>
            </form>
            <div class="w-full flex justify-center font-semibold text-primary">
                <a href="{{ route('login') }}" class="max-w-max flex justify-center items-center gap-3 mt-2">
                    <i class="fa-solid fa-angle-left"></i>
                    <span class="">Kembali ke Login</span>
                </a>
            </div>
        </div>
    </section>
@endsection