<x-index-layout>
    <x-slot:header>
    </x-slot>

    <div class="flex flex-col items-center mb-6">
        <img src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Logo" class="h-8 w-auto mb-2">
        <h2 class="text-2xl font-semibold text-center text-gray-800">Sign in to your account</h2>
    </div>
    <div class="flex justify-center items-center min-h-screen -mt-20">
        <div class="w-full max-w-md p-12 bg-white rounded-lg shadow-md">
          <form method="POST" action={{ route('login') }}>
            @csrf
            <div class="mb-4">
              <x-form.label class="mb-2" for="email" >Email address</x-form.label>
              <input value="{{ @old('email') }}" class="appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email">
              <x-form.error name="email"/>
            </div>
            <div class="mb-4">
              <x-form.label class="mb-2" for="password" >Password</x-form.label>
              <input class="appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password">
              <x-form.error name="password"/>
            </div>
            <div class="flex items-center justify-between mb-4">
              <div class="flex items-center">
                <input class="mr-2 leading-tight rounded text-sign-up focus:ring-sign-up" type="checkbox" id="remember">
                <label class="text-sm text-gray-600" for="remember">
                  Remember me
                </label>
              </div>
              <a class="inline-block align-baseline font-medium text-sm text-sign-up hover:opacity-75" href="#">
                Forgot password?
              </a>
            </div>
            <div class="mb-6">
              <button class="w-full bg-sign-up hover:opacity-75 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Sign in
              </button>
            </div>
            <div class="flex items-center justify-between mb-4">
              <span class="border-b w-1/5 lg:w-1/4"></span>
              <span class="text-sm text-center text-black-500 text-bold use font-medium">Or continue with</span>
              <span class="border-b w-1/5 lg:w-1/4"></span>
            </div>
            <div class="flex justify-between mb-6 space-x-2">
              <button class="flex items-center justify-center w-1/2 bg-white border border-gray-300 rounded-lg px-4 py-2 text-gray-600 hover:bg-gray-50" type="button">
                <img src="https://img.icons8.com/color/20/000000/google-logo.png" class="mr-2"> Google
              </button>
              <button class="flex items-center justify-center w-1/2 bg-white border border-gray-300 rounded-lg px-4 py-2 text-gray-600 hover:bg-gray-50" type="button">
                <img src="https://img.icons8.com/ios-glyphs/20/000000/github.png" class="mr-2"> GitHub
              </button>
            </div>
            <div class="text-center">
              <p class="text-sm text-gray-600">
                Not a member? <a class="text-sign-up hover:opacity-75" href="#">Start a 14 day free trial</a>
              </p>
            </div>
          </form>
        </div>
    </div>
      
  
</x-index-layout>