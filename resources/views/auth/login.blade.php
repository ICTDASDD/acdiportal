<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ACDI-MPC EPortal</title>
	<meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .body-bg {
            background-color: #9921e8;
            background-image: linear-gradient(90deg, #339cd5 0%, #2760cc 100%);
        }
    </style>
</head>
<body class="body-bg" style="font-family:'Lato',sans-serif;">
    
    <div class="body-bg h-screen w-screen">
    <div class="flex flex-col items-center flex-1 h-full justify-center px-4 sm:px-0">
        <div class="flex rounded-lg shadow-lg w-full sm:w-3/4 lg:w-1/2 bg-white sm:mx-0" style="height: 500px">
            <div class="flex flex-col w-full md:w-1/2 p-4">
                <div class="flex flex-col flex-1 justify-center mb-8">
                    <h1 class="text-4xl text-center font-thin">ACDI-MPC EPortal</h1>
                    <div class="w-full mt-4">

                        
            <!-- Session Status -->
                        <x-auth-session-status class="mb-4 text-center font-thin" :status="session('status')" />

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4 text-center font-thin" :errors="$errors" />

                        <form class="form-horizontal w-3/4 mx-auto"  method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="flex flex-col mt-4">
                                <input type="email" id="email" class="flex-grow h-8 px-2 border rounded border-grey-400" placeholder="Email" name="email" :value="old('email')" required>
                            </div>
                            <div class="flex flex-col mt-4">
                                <input type="password" id="password" class="flex-grow h-8 px-2 rounded border border-grey-400" name="password" autocomplete="current-password" required placeholder="Password">
                            </div>
                            <div class="flex items-center mt-4">
                                <input id="remember_me" type="checkbox" class="mr-2" name="remember"> <label for="remember" class="text-sm text-grey-dark">Remember Me</label>
                            </div>
                            <div class="flex flex-col mt-8">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-semibold py-2 px-4 rounded">
                                    Login
                                </button>
                            </div>
                        </form>
                        <div class="text-center mt-4">
                            <a class="no-underline hover:underline text-blue-dark text-xs" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        </div>
                        <div class="text-left mt-4">
                            <p class="text-blue-400 text-xs">
                                For ACDI-MPC employe, If you don't have any access to your portal, please contact ASDD or any HR personel.
                            </p>
                        </div>
                        <div class="text-left mt-4">
                            <p class="text-red-400 text-xs">
                                <b>Note!</b> This WebApp is under development. We will launched this platform after all technical processes are finished. Thanks
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden md:block md:w-1/2 rounded-r-lg" style="background: url('https://images.unsplash.com/photo-1515965885361-f1e0095517ea?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=3300&q=80'); background-size: cover; background-position: center center;"></div>
        </div>
    </div>
</div>


</body>
</html>






