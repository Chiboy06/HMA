@if (session()->has('login'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 7000)" x-show="show" class="absolute w-10/12 top-40 md:top-48 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50">
        <div class="bg-green-600/50 px-4 md:px-40 md:py-1 py-2 flex justify-center">
            <p class="text-white">
                {!! session('login') !!}
            </p>
        </div>
    </div>

@endif