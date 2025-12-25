<div class="mt-4 flex flex-col gap-6">
    <div class="text-center">
        {{ __("Silakan verifikasi alamat email Anda dengan mengklik tautan yang baru saja kami kirimkan melalui email.") }}
    </div>

    @if (session("status") == "verification-link-sent")
        <div class="!dark:text-green-400 text-center font-medium !text-green-600">
            {{ __("Tautan verifikasi baru telah dikirimkan ke alamat email yang Anda berikan saat pendaftaran.") }}
        </div>
    @endif

    <div class="flex flex-col items-center justify-between space-y-3">
        <x-frontend.link wire:click="sendVerification" class="w-full">
            {{ __("Kirim ulang email verifikasi") }}
        </x-frontend.link>

        <x-frontend.link wire:click="logout">{{ __("Keluar") }}</x-frontend.link>
    </div>
</div>
