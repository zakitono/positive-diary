<x-guest-layout>

    <body class="antialiased">
        <div class="relative flex items-top justify-center sm:items-center py-4 sm:pt-0">
            <!-- ルーティング情報が存在するか -->
            @if (Route::has('login'))
            <div>
                <div class="flex group">
                    @auth
                    <a href="{{ url('/diary') }}" class="text-sm text-gray-700 :text-gray-500 underline">トップ画面へ</a>
                    @else
                    <a href="{{ route('login') }}" class="underline text-sm text-gray-600 :text-gray-400 hover:text-gray-900 :hover:text-gray-100">ログインする</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 underline text-sm text-gray-600 :text-gray-400 hover:text-gray-900 :hover:text-gray-100 rounded-md">新規登録する</a>
                </div>
                <div class="flex flex justify-center mt-2">
                    <a href="{{ route('login.gest') }}" class="underline text-sm text-gray-600 :text-gray-400 hover:text-gray-900 :hover:text-gray-100 rounded-md">ゲストログイン</a>
                </div>
                @endif
                @endauth
            </div>
            @endif
        </div>
    </body>
</x-guest-layout>
