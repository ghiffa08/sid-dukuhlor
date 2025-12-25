<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Buat akun')" :description="__('Masukkan detail Anda di bawah ini untuk membuat akun')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="register" class="flex flex-col gap-6">
        <!-- Name -->
        @php
            $field_name = "name";
            $filed_label = __("Nama Lengkap");
            $field_placeholder = $filed_label;
            $required = "required";
        @endphp

        <x-frontend.form.input
            wire:model="{{ $field_name }}"
            type="text"
            :label="$filed_label"
            :required="$required"
        />

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

        <!-- Password -->
        @php
            $field_name = "password";
            $filed_label = __("Kata Sandi");
            $field_placeholder = $filed_label;
            $required = "required";
        @endphp

        <x-frontend.form.input
            wire:model="{{ $field_name }}"
            type="password"
            :label="$filed_label"
            :required="$required"
        />

        <!-- Confirm Password -->
        @php
            $field_name = "password_confirmation";
            $filed_label = __("Konfirmasi Kata Sandi");
            $field_placeholder = $filed_label;
            $required = "required";
        @endphp

        <x-frontend.form.input
            wire:model="{{ $field_name }}"
            type="password"
            :label="$filed_label"
            :required="$required"
        />

        <div class="flex items-center justify-end">
            <x-button class="w-full" variant="primary" type="submit">
                {{ __('Buat akun') }}
            </x-button>
        </div>
    </form>

    <div class="space-x-1 text-center text-sm text-zinc-600 tracking-widest dark:text-zinc-400">
        {{ __('Sudah punya akun?') }}

        <x-frontend.link class="text-sm" :href="route('login')" wire:navigate>
            {{ __('Masuk') }}
        </x-frontend.link>
    </div>
</div>
