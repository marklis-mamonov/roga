<div class="mt-8 max-w-md">
    <div class="grid grid-cols-1 gap-6">
        <div class="block">
            <x-input.group for="email" title="Электронная почта" :errors="$errors">
                <x-input.text name="email" placeholder="Введите адрес электронной почты" :value="old('email')" :errorExists="$errors->has('email')"/>
            </x-input.group>
        </div>
        <div class="block">
            <x-input.group for="password" title="Пароль" :errors="$errors">
                <x-input.password name="password" placeholder="Введите пароль" :value="old('password')" :errorExists="$errors->has('password')"/>
            </x-input.group>
        </div>
        <div class="block">
            <x-buttons.orange value="Войти"/>
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Забыли пароль?') }}
                </a>
            @endif
        </div>
    </div>
</div>