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
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <body class="bg-gray-100 text-gray-700 font-sans quicksand">

            <div class="p-6 sm:p-10 md:p-16 flex flex-wrap">

                <div class="w-full md:w-1/2 md:pr-32 order-3 md:order-1">
                    <div class="max-w-md md:float-right md:text-right leading-loose tracking-tight md:sticky md:top-0 ">
                        <p class="font-bold my-4 md:my-12">日記を書く</p>
                        <p class="font-bold my-4 md:my-12">キーワード検索</p>
                        <!-- <ul class="flex flex-wrap justify-between flex-col">
                            <li><a href="#" class="nav">日記を書く</a></li>
                        </ul>
                        <a href="#" class="normal font-bold hover:font-bold">more...</a> -->
                    </div>
                </div>
                <div class="w-full md:w-1/2 order-1 md:order-2">
                    <div class="max-w-md leading-loose tracking-tight">
                        <h1 class="font-bold my-12">日記の一覧</h1>
                        <p class="font-bold my-4">楽しかったできごと</p>
                        <ul class="flex flex-wrap justify-between flex-row md:flex-col">
                            <li><a href="#" class="nav mx-2 md:mx-0">1.洗濯物がすぐ乾いた</a></li>
                            <li><a href="#" class="nav mx-2 md:mx-0">2.今日も、ちゃんと出勤できた。</a></li>
                            <li><a href="#" class="nav mx-2 md:mx-0">3.連絡を取っていなかった友達に連絡ができた。</a></li>
                        </ul>
                    </div>
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
