<nav class="sticky top-0 w-full h-[10vh] bg-white text-blue-500 p-side flex justify-between items-center shadow-sm">
    <div class="flex items-center gap-[12px]">
        <svg class="w-[32px] lg:w-[37px]" viewBox="0 0 37 31" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M36.2927 15.5C36.2927 24.0604 29.3531 31 20.7927 31H1.13415C0.507775 31 0 30.4922 0 29.8659C0 29.2395 0.507775 28.7317 1.13415 28.7317H12.7155C11.9842 28.2844 11.2929 27.7781 10.6482 27.2195H4.91463C4.28826 27.2195 3.78049 26.7117 3.78049 26.0854C3.78049 25.459 4.28826 24.9512 4.91463 24.9512H8.50658C6.49124 22.3353 5.29268 19.0576 5.29268 15.5C5.29268 12.5984 6.08998 9.88301 7.47744 7.56098H1.13415C0.507775 7.56098 0 7.0532 0 6.42683C0 5.80046 0.507775 5.29268 1.13415 5.29268H9.1279C10.1613 4.1127 11.3708 3.09089 12.7155 2.26829H6.42683C5.80046 2.26829 5.29268 1.76052 5.29268 1.13415C5.29268 0.507775 5.80046 0 6.42683 0H20.7927C29.3531 0 36.2927 6.93959 36.2927 15.5ZM31 15.5C31 21.1373 26.43 25.7073 20.7927 25.7073C15.1553 25.7073 10.5854 21.1373 10.5854 15.5C10.5854 9.86265 15.1553 5.29268 20.7927 5.29268C26.43 5.29268 31 9.86265 31 15.5ZM20.7927 19.6585C23.0894 19.6585 24.9512 17.7967 24.9512 15.5C24.9512 13.2033 23.0894 11.3415 20.7927 11.3415C18.496 11.3415 16.6341 13.2033 16.6341 15.5C16.6341 17.7967 18.496 19.6585 20.7927 19.6585Z" fill="#22288F"/>
        </svg>
        <h1 class="text-xl lg:text-2xl text-primary font-bold">Laundry</h1>            
    </div>
    <div class="flex items-center gap-4 text-dark text-xl font-semibold">
        @if ($type === 'login')
            <a href="{{ url('/auth/register') }}">Registrasi</a>
        @elseif($type === 'registrasi')
            <a href="{{ url('/auth/login') }}" class="text-white bg-primary py-2 px-6 rounded text-base xl:text-lg">Login</a>
        @elseif($type === 'landingpage')
            <a href="{{ url('auth/register') }}">Registrasi</a>
            <span>/</span>
            <a href="{{ url('/auth/login') }}" class="text-white bg-primary py-2 px-6 rounded text-base xl:text-lg">Login</a>
        @endif
    </div>
</nav>