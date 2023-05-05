@extends('layouts.main')

@section('title', 'Registrasi')

@section('content')
    <x-navbar type='registrasi'/>
    <section class="w-full py-[3rem] 2xl:h-[90vh] 2xl:py-0 p-side flex flex-col justify-center items-center font-quicksand">
      <div class="md:w-[300px] xl:w-[400px]">
        <h1 class="text-4xl lg:text-5xl font-bold text-primary text-center">Daftar Akun</h1>
        <p class="text-sm lg:text-lg py-2 text-grey font-semibold w-full text-center">Buat akun Anda agar dapat menggunakan layanan kami</p>
        <form action="{{ route('create.register') }}" method="post">
          @csrf
          <div class="flex flex-col mt-8">
            <label for="name" class="font-semibold">Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name') }}" class="w-full bg-white border border-third focus:outline-none focus:ring-1 focus:ring-third block rounded-md mt-2 py-3 px-4 placeholder-slate-400 font-medium" placeholder="Masukkan nama lengkap Anda" autofocus>
            @error('name')
                <p class="text-red-400 font-medium text-sm">{{ $message }}</p>
            @enderror
          </div>
          <div class="flex flex-col mt-8">
            <label for="email" class="font-semibold">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="w-full bg-white border border-third focus:outline-none focus:ring-1 focus:ring-third block rounded-md mt-2 py-3 px-4 placeholder-slate-400 font-medium" placeholder="Masukkan email Anda" autofocus>
            @error('email')
                <p class="text-red-400 font-medium text-sm">{{ $message }}</p>
            @enderror
          </div>
          <div class="flex flex-col mt-6">
            <label for="name" class="font-semibold">Password</label>
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
          <button type="submit" class="w-full bg-primary text-white mt-6 mb-2 py-3 rounded-md font-semibold">Daftar</button>
        </form>
        <p class="my-4">Sudah memiliki akun? <a href="{{ url('auth/login') }}" class="underline underline-offset-1 text-blue-500 font-medium">Masuk Akun</a></p>
        <div class="flex items-center w-full justify-between gap-5 text-grey">
          <hr class="w-full border-grey">
          atau
          <hr class="w-full border-grey">
        </div>
        <a href="{{ route('google.login') }}" class="w-full my-8 py-3 border border-black rounded-md font-semibold flex justify-center items-center gap-3">
          <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M21.9896 11.2058C21.9896 10.3045 21.9148 9.64674 21.7528 8.96466H11.2192V13.0328H17.4022C17.2776 14.0438 16.6044 15.5663 15.1085 16.5894L15.0875 16.7256L18.418 19.2466L18.6488 19.2691C20.7679 17.3568 21.9896 14.5432 21.9896 11.2058Z" fill="#4285F4"/>
            <path d="M11.2192 21.9244C14.2484 21.9244 16.7913 20.95 18.6488 19.2691L15.1085 16.5894C14.1611 17.235 12.8896 17.6857 11.2192 17.6857C8.25242 17.6857 5.73436 15.7734 4.83675 13.1303L4.70518 13.1412L1.24207 15.76L1.19678 15.883C3.04168 19.464 6.83127 21.9244 11.2192 21.9244Z" fill="#34A853"/>
            <path d="M4.83665 13.1303C4.5998 12.4482 4.46273 11.7174 4.46273 10.9622C4.46273 10.207 4.5998 9.47621 4.82419 8.79413L4.81791 8.64886L1.31141 5.98804L1.19668 6.04136C0.436305 7.52737 0 9.19609 0 10.9622C0 12.7284 0.436305 14.397 1.19668 15.883L4.83665 13.1303Z" fill="#FBBC05"/>
            <path d="M11.2192 4.23869C13.3259 4.23869 14.747 5.12785 15.5573 5.87089L18.7236 2.85018C16.779 1.08405 14.2484 0 11.2192 0C6.83127 0 3.04168 2.46039 1.19678 6.04135L4.82429 8.79412C5.73436 6.15102 8.25242 4.23869 11.2192 4.23869Z" fill="#EB4335"/>
          </svg>
          Daftar dengan Google
        </a>
      </div>
    </section>
@endsection