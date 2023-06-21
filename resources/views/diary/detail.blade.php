<x-app-layout>
    <!DOCTYPE html>
    <html lang="ja">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>positive diary</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">

        <!-- Font Awesome if you need it
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
        -->
        <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
        <!--Replace with your tailwind.css once created-->

        <link href="https://fonts.googleapis.com/css?family=Nunito:400,700&display=swap" rel="stylesheet">

        <style>
            .quicksand {
                font-family: 'Nunito', sans-serif;
            }

            ::selection {
                background: #E9D8FD;
                color: #202684;

                /* WebKit/Blink Browsers */
            }

            ::-moz-selection {
                background: #E9D8FD;
                color: #202684;
            }

            /* a:not(.nav) {
                font-weight: bold;
                text-decoration: none;
                padding: 2px;
                background: linear-gradient(to right, #5A67D8, #5A67D8);
                background-repeat: repeat-x;
                background-size: 100% 2px;
                background-position: 0 95%;
                -webkit-transition: all 150ms ease-in-out;
                -moz-transition: all 150ms ease-in-out;
                -ms-transition: all 150ms ease-in-out;
                -o-transition: all 150ms ease-in-out;
                transition: all 150ms ease-in-out;
            } */

            a:hover {
                color: #B794F4;
                font-weight: bold;
                text-decoration: none;
                /* padding-bottom: 2px; */
                /* background: linear-gradient(to right, #9F7AEA, #E9D8FD); */
                background-repeat: repeat-x;
                background-size: 100% 2px;
                background-position: 50% 95%;
                -webkit-transition: color 150ms ease-in-out;
                -moz-transition: color 150ms ease-in-out;
                -ms-transition: color 150ms ease-in-out;
                -o-transition: color 150ms ease-in-out;
                transition: color 150ms ease-in-out;
            }

            a:focus {
                outline: none;
                background: #E9D8FD;
            }
        </style>

    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('ポジティブ日記') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <body class="bg-gray-100 text-gray-700 font-sans quicksand">

            <div class="p-6 sm:p-10 md:p-16">
                <div class="px-4 sm:px-0">
                    <h3 class="text-base font-semibold leading-7 text-gray-900">詳細</h3>
                </div>
                <div class="mt-6 border-t border-gray-100">
                    <dl class="divide-y divide-gray-100">
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="font-medium leading-6 text-gray-900 font-bold">日付</dt>
                            <dd class="mt-1 leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{Carbon\Carbon::parse($diary->date)->format('Y年n月j日')}}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="font-medium leading-6 text-gray-900 font-bold">楽しかったこと①</dt>
                            <dd class="mt-1 leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{Str::limit($diary->note, 100,$end='...')}}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="font-medium leading-6 text-gray-900 font-bold">楽しかったこと②</dt>
                            <dd class="mt-1 leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{Str::limit($diary->note01, 100,$end='...')}}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="font-medium leading-6 text-gray-900 font-bold"> 楽しかったこと③</dt>
                            <dd class="mt-1 leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{Str::limit($diary->note02, 100,$end='...')}}</dd>
                        </div>
                    </dl>
                </div>
                <div class="flex justify-center" relative>
                    <button onclick="history.back()" class="mt-3 mr-4 shadow bg-gray-500 hover:bg-gray-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">{{ __('戻る') }}</button>
                    <button onclick="location.href='/diary/edit/{{ $diary->id }}'" class="mt-3 mr-2 shadow bg-yellow-500 hover:bg-yellow-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">変更する</button>
                </div>
                <div class="flex justify-end mt-6">
                    <form action="/diary/remove/{{ $diary->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="mt-4 mr-4 shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">削除</button>
                    </form>
                </div>
            </div>

            <script>
                //Toggle mode
                const toggle = document.querySelector('.js-change-theme');
                const body = document.querySelector('body');
                //const profile = document.getElementById('profile');

                toggle.addEventListener('click', () => {
                    if (body.classList.contains('text-gray-700')) {
                        toggle.innerHTML = "☀️";
                        body.classList.remove('text-gray-700');
                        body.classList.add('text-gray-300');
                        body.classList.remove('bg-gray-100');
                        body.classList.add('bg-gray-900');
                    } else {
                        toggle.innerHTML = "🌙";
                        body.classList.remove('text-gray-300');
                        body.classList.add('text-gray-700');
                        body.classList.remove('bg-gray-900');
                        body.classList.add('bg-gray-100');

                    }
                });
            </script>

        </body>
    </div>

    </html>

</x-app-layout>
