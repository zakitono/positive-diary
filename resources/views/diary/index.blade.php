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

    @if(session('status'))
    <x-ui.flash-message message="{{ session('status') }}"></x-ui.flash-message>
    @endif

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <body class="bg-gray-100 text-gray-700 font-sans quicksand">

            <div class="p-6 sm:p-10 md:p-16 flex flex-wrap">

                <div class="w-full md:w-1/2 md:pr-32 order-1 md:order-1">
                    <div class="max-w-md md:float-right md:text-right leading-loose tracking-tight md:sticky md:top-0 ">
                        <button onclick="location.href='/diary/new'" class="text-base shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded my-4 md:my-10">日記を書く</button>
                        <form action="{{ route('diary') }}">
                            <div class="flex items-center md:flex-col">
                                <div class="col-span-6 sm:col-span-3 w-48 relative">
                                    <input type="text" name="note" id="note" value="{{ $note }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="キーワード検索">
                                </div>
                                <div class="col-span-6 sm:col-span-3 py-2 w-48 relative ml-2 sm:mt-0">
                                    <button type="submit" class="bottom-2 mr-2 shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-1 px-4 rounded">検索</button>
                                </div>
                            </div>
                        </form>
                        <!-- <ul class="flex flex-wrap justify-between flex-col">
                            <li><a href="#" class="nav">日記を書く</a></li>
                        </ul>
                        <a href="#" class="normal font-bold hover:font-bold">more...</a> -->
                    </div>
                </div>
                <div class="w-full md:w-1/2 order-3 md:order-2">
                    <!-- <div class="max-w-md leading-loose tracking-tight"> -->
                    <div class="leading-loose tracking-tight">
                        <h1 class="font-bold my-10">日記の一覧</h1>
                        <p class="font-bold my-4">楽しかったできごと</p>
                        @foreach($diaries as $diary)
                        <h2 class="text-2xl font-medium  title-font mb-2">{{Carbon\Carbon::parse($diary->date)->format('Y年n月j日')}}</h2>
                        <p class="leading-relaxed">1. {{Str::limit($diary->note, 100,$end='...')}}</p>
                        <p class="leading-relaxed">2. {{Str::limit($diary->note01, 100,$end='...')}}</p>
                        <p class="leading-relaxed">3. {{Str::limit($diary->note02, 100,$end='...')}}</p>
                        <div class="text-right">
                            <button onclick="location.href='/diary/detail/{{$diary->id }}'" class="text-sm shadow bg-gray-500 hover:bg-gray-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">詳細</button>
                        </div>
                        @endforeach
                    </div>
                    {{ $diaries->links() }}
                </div>

                <!-- <div class="w-full md:w-1/2 md:pr-32 pt-12 md:pt-0 md:sticky md:bottom-0 order-4 md:order-3">
                    <div class="max-w-md md:float-right md:text-right leading-loose tracking-tight md:mb-16">
                        <p class="font-bold my-4 md:my-12">Contact Me</p>

                        <ul class="flex flex-wrap justify-between flex-row md:flex-col">
                            <li><a href="#" class="nav mx-2 md:mx-0">Twitter</a></li>
                            <li><a href="#" class="nav mx-2 md:mx-0">Instagram</a></li>
                            <li><a href="#" class="nav mx-2 md:mx-0">Dribbble</a></li>
                            <li><a href="#" class="nav mx-2 md:mx-0">etc</a></li>
                        </ul>
                    </div>
                </div> -->
            </div>

            <!-- Pin to top right corner -->
            <!-- <div class="absolute top-0 right-0 h-12 w-18 p-4">
                <button class="js-change-theme focus:outline-none">🌙</button>
            </div> -->

            <!-- jQuery if you need it
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            -->

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
