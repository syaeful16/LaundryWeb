@extends('layouts.main')

@section('title', 'Reset Password')

@section('content')
    <x-navbar type=''/>
    <section class="w-full py-28 p-side flex justify-center items-center font-quicksand">
        <div class="md:w-[300px] xl:w-[400px]">
            <div class="text-center">
                <h1 class="text-4xl text-primary font-bold mb-2">Reset Password</h1>
                <p class="text-base text-gray-500 font-medium">Masukkan password baru Anda</p>
            </div>
            @if (session()->has('status'))
                <div class="w-full mt-4 p-3 flex justify-center items-center gap-4 bg-green-200/50 border border-green-700 rounded-md">
                    <i class="fa-regular fa-circle-check text-2xl text-green-600"></i>  
                    <p class="text-base"><span class="font-semibold text-green-600">Berhasil:</span> Link reset password telah terkirim</p>
                </div>
            @endif
            @if ($errors->any())
                <div class="w-full mt-4 p-3 flex justify-center items-center gap-4 bg-red-200/50 border border-red-700 rounded-md">
                    {{-- <i class="fa-regular fa-circle-xmark text-2xl text-red-600"></i>
                    <p class="text-base"><span class="font-semibold text-red-600">Gagal:</span> Link reset password gagal terkirim</p> --}}
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('password.update') }}" method="post">
                @csrf
                <input type="hidden" name="token" value="{{ request()->token }}">
                <input type="hidden" name="email" value="{{ request()->email }}">
                <div class="flex flex-col mt-6">
                    <label for="password" class="font-semibold">Password</label>
                    <div class="flex relative w-full mt-2">
                      <input type="password" name="password" id="pass" class="w-full bg-white border border-third focus:outline-none focus:ring-1 focus:ring-third block rounded-md py-3 px-4 placeholder-slate-400 font-medium" placeholder="Masukkan password Anda">
                      <i class="fa-regular fa-eye absolute right-4 h-full flex items-center" id="btn-show"></i>
                    </div>
                    @error('password')
                        <p class="text-red-400 font-medium text-sm">{{ $message }}</p>
                    @else
                        <p class="text-grey font-medium text-sm">Min. 8 karakter</p>
                    @enderror
                </div>
                <button type="submit" class="w-full bg-primary text-white my-6 mb-2 py-3 rounded-md font-semibold">Ubah</button>
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