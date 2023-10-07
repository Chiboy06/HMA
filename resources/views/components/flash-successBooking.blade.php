@if (session()->has('Success Booking'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 10000)" x-show="show" class="absolute w-10/12 top-40 md:top-48 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
        <div class="bg-green-600/50 px-4 md:px-40 md:py-1 py-2">
            <p class="text-white-800">
                {!! session('Success Booking') !!}
            </p>
        </div>
    </div>

@endif