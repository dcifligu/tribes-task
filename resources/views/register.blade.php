<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')

</head>

<body>

    <div class="flex justify-center">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <div
        class="relative flex lg:overflow-hidden xl:overflow-hidden lg:flex-row xl:flex-row sm:flex-col overflow-x-hidden w-screen h-screen bg-[#18181B]">
        <div class="relative xl:w-1/2 lg:w-1/2 sm:w-screen h-screen mx-auto bg-[#18181b] bg-loginPattern bg-center">
            <div class="flex flex-col px-6 pt-4 m-10 h-screen lg:py-0 z-10">
                <div
                    class="relative px-7 py-5 w-fit m-10 h-fit text-4xl bg-zinc-800 z-10 rounded font-semibold text-gray-200">
                    #
                </div>
                <h1 class="text-3xl pl-10 font-bold text-white sm:text-4xl xl:text-5xl xl:leading-tight">
                    Hello!
                    <br>
                    Please create an account
                </h1>
                <div class="w-fit bg-white h-fit px-6 py-3 rounded mx-10 my-5 shadow-2xl flex-row foreground-index">
                    <span
                        class="text-sm flex font-bold text-[#18181b] sm:text-4xl xl:text-5xl xl:leading-tight capitalize">
                        Create a new account
                    </span>
                    <a class="text-md flex text-[#18181b] hover:underline xl:leading-tight my-4"
                        href="{{ route('showLogin') }}">
                        Already have an account?
                        <br>
                        Click here to login
                    </a>
                </div>
                <div class="absolute lg:hidden">
                    <img class="object-fit w-full h-full opacity-50" alt="Background-Pattern"
                        src={{ URL('Images\background-pattern.png') }} />
                </div>
            </div>
        </div>
        <div class="px-4 mx-auto sm:px-6 lg:px-8 xl:px-12 bg-white w-1/2 sm:w-screen h-screen">
            <div class="relative h-screen bg-white mx-auto">
                <section>
                    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
                        <div class="w-full rounded-lg shadow border md:mt-0 xl:p-0">
                            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                                <h1
                                    class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl flex justify-center">
                                    Create a new account
                                </h1>
                                <!-- Fetch data and create a new normal user-->
                                <form action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div class="flex flex-row gap-2">
                                        <div class="w-1/2 my-5">
                                            <div class="m-2">
                                                <label for="name"
                                                    class="block mb-2 text-sm font-medium text-[#1B1B23]">Name</label>
                                                <input type="name" name="name" id="name"
                                                    class="text-[#1B1B23] bg-gray-50 border border-gray-300 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 placeholder-gray-500  focus:ring-blue-500 focus:border-blue-500"
                                                    placeholder="name" required="" value="{{ old('name') }}">
                                                @error('name')
                                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="m-2">
                                                <label for="password"
                                                    class="block mb-2 text-sm font-medium text-[#1B1B23]">Password</label>
                                                <input type="password" name="password" id="password"
                                                    placeholder="••••••••"
                                                    class="bg-gray-50 border border-gray-300 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 text-[#1B1B23] placeholder-gray-500  focus:ring-blue-500 focus:border-blue-500"
                                                    required="" value="{{ old('password') }}">
                                                @error('password')
                                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="w-1/2  my-5">
                                            <div class="m-2">
                                                <label for="email"
                                                    class="block mb-2 text-sm font-medium text-[#1B1B23]">Email</label>
                                                <input type="email" name="email" id="email"
                                                    class="text-[#1B1B23] bg-gray-50 border border-gray-300 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 placeholder-gray-500  focus:ring-blue-500 focus:border-blue-500"
                                                    placeholder="email" required="" value="{{ old('email') }}">
                                                @error('email')
                                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="m-2">
                                                <label for="password_confirmation"
                                                    class="block mb-2 text-sm font-medium text-[#1B1B23]">Confirm
                                                    Password</label>
                                                <input type="password" name="password_confirmation"
                                                    id="password_confirmation" placeholder="••••••••"
                                                    class="bg-gray-50 border border-gray-300 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 text-[#1B1B23] placeholder-gray-500 focus:ring-blue-500 focus:border-blue-500"
                                                    required="" value="{{ old('password_confirmation') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-start m-2 my-3">
                                            <div class="flex items-center h-5">
                                                <input id="remember" aria-describedby="remember" type="checkbox"
                                                    class="w-4 h-4 border  focus:ring-3 focus:ring-primary-300 bg-gray-700 border-gray-600 focus:ring-primary-600 ring-offset-gray-800">
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="remember" class="text-[#1B1B23]">Remember
                                                    me</label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit"
                                        class="w-full m-2 text-[#1B1B23] bg-gray-300 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center hover:bg-[#18181B] hover:text-white transition-all focus:ring-primary-800">Sign
                                        in</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
</body>

</html>
