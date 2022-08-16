<div class="mt-8 max-w-md">
    <div class="grid grid-cols-1 gap-6">
        <div class="block">
            <x-input.group for="name" title="Имя пользователя" :errors="$errors">
                <x-input.text name="name" placeholder="Введите имя пользователя" :value="old('name')" :errorExists="$errors->has('name')"/>
            </x-input.group>
        </div>
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
            <x-input.group for="password-confirm" title="Подтвердите пароль" :errors="$errors">
                <x-input.password name="password_confirmation" placeholder="Повторите пароль" :value="old('password-confirm')" :errorExists="$errors->has('password-confirm')"/>
            </x-input.group>
        </div>
        <div class="block">
            <x-buttons.orange value="Зарегистрироваться"/>
        </div>
    </div>
</div>