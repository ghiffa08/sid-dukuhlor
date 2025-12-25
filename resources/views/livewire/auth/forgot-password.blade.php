<div class="flex flex-col gap-6">
    <x-auth-header
        :title="__('Lupa Kata Sandi')"
        :description="__('Masukkan email Anda untuk menerima tautan reset kata sandi')"
    />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="sendPasswordResetLink" class="flex flex-col gap-6">
        <!-- Email Address -->
        @php
            $field_name = "email";
            $filed_label = __("Alamat Email");
            $field_placeholder = $filed_label;
            $required = "required";
        @endphp

        <x-frontend.form.input
            wire:model="{{ $field_name }}"
            type="email"
            :label="$filed_label"
            :required="$required"
        />

        <div class="flex items-center justify-end">
            <x-button class="w-full" variant="primary" type="submit">
                {{ __("Kirim Link Reset Password") }}
            </x-button>
        </div>
    </form>

    <div class="space-x-1 text-center text-sm text-zinc-600">
        {{ __("Atau, kembali ke") }}
        <x-frontend.link class="text-sm" :href="route('login')" wire:navigate>
            {{ __("masuk") }}
        </x-frontend.link>
    </div>
</div>
