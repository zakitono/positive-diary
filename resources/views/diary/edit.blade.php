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
            <form class="w-full" action="{{ route('diary.update') }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="p-6 sm:p-10 md:p-16">
                    <div>
                        <div class="px-4 sm:px-0">
                            <h3 class="text-base font-semibold leading-7 text-gray-900">内容の修正</h3>
                        </div>
                        <div class="mt-6 border-t border-gray-100">
                            <dl class="divide-y divide-gray-100">
                                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                    <input value="{{ $diary->id }}" name="id" type="hidden">
                                </div>
                                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">日付</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                        <div class="mt-2">
                                            <input type="text" name="date" id="date" value="{{ old('date', $diary->date)}}" placeholder="例) 2023-04-1" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                        @error('date')
                                        <div class="text-red-600">{{ $message }}</div>
                                        @enderror
                                    </dd>
                                </div>
                                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">楽しかったこと①</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                        <div class="mt-1">
                                            <textarea id="note" name="note" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md">{{ old('note', $diary->note) }}</textarea>
                                        </div>
                                        @error('note')
                                        <div class="text-red-600">{{ $message }}</div>
                                        @enderror
                                    </dd>
                                </div>
                                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">楽しかったこと②</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                        <div class="mt-1">
                                            <textarea id="note01" name="note01" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md">{{ old('note01', $diary->note01) }}</textarea>
                                        </div>
                                        @error('note01')
                                        <div class="text-red-600">{{ $message }}</div>
                                        @enderror
                                    </dd>
                                </div>
                                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900"> 楽しかったこと③</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                        <div class="mt-1">
                                            <textarea id="note02" name="note02" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md">{{ $diary->note02 }}</textarea>
                                        </div>
                                        @error('note02')
                                        <div class="text-red-600">{{ $message }}</div>
                                        @enderror
                                    </dd>
                                </div>
                            </dl>
                        </div>
                        <div class="flex justify-end">
                            <button onclick="history.back()" class="mt-3 mr-4 shadow bg-gray-500 hover:bg-gray-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">{{ __('戻る') }}</button>
                            <button type="submit" class="mt-3 mr-2 shadow bg-yellow-500 hover:bg-yellow-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">変更</button>
                        </div>
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
            </form>
        </body>
    </div>

    </html>

</x-app-layout>
