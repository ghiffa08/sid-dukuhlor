<div class="flex flex-col gap-6">
    <x-auth-header
        :title="__('Konfirmasi Kata Sandi')"
        :description="__('Ini adalah area aman aplikasi. Silakan konfirmasi kata sandi Anda sebelum melanjutkan.')"
    />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="confirmPassword" class="flex flex-col gap-6">
        {{-- Password --}}
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

        <x-button class="w-full" variant="primary" type="submit">
            {{ __("Konfirmasi") }}
        </x-button>
    </form>
</div>
