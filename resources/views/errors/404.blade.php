<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page not found - 404</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')

</head>

<body>
    <div
        class="lg:px-24 lg:py-24 md:py-20 md:px-44 px-4 py-24 items-center flex justify-center flex-col-reverse lg:flex-row md:gap-28 gap-16 h-screen w-screen">
        <div class="xl:pt-24 w-full xl:w-1/2 relative pb-12 lg:pb-0">
            <div class="relative">
                <div class="absolute">
                    <div>
                        <h1 class="my-2 text-gray-800 font-bold text-2xl">
                            Looks like you've found the
                            doorway to the great nothing
                        </h1>
                        <p class="my-2 text-gray-800">Sorry about that!</p>
                    </div>
                </div>
                <div>
                    <img src={{ asset('/Images/404-Number.png') }} alt="404" />
                </div>
            </div>
        </div>
        <div>
            <img src={{ asset('/Images/404Plug.png') }} alt="404Plug" />
        </div>
    </div>
</body>

</html>
