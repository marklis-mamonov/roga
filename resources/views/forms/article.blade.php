<div class="mt-8 max-w-md">
    <div class="grid grid-cols-1 gap-6">
        <div class="block">
            <x-input.group for="title" title="Заголовок новости" :errors="$errors">
                <x-input.text name="title" placeholder="Введите заголовок" :value="$article->title" :errorExists="$errors->has('title')"/>
            </x-input.group>
        </div>
        <div class="block">
            <x-input.group for="description" title="Краткое описание новости">
                <x-input.textarea name="description" :value="$article->description" :errorExists="$errors->has('description')"/>
            </x-input.group>
        </div>
        <div class="block">
            <x-input.group for="body" title="Детальное описание">
                <x-input.textarea name="body" :value="$article->body" :errorExists="$errors->has('body')"/>
            </x-input.group>
        </div>
        <div class="block">
            <x-input.checkbox name="is_published" title="Опубликовать новость"/>
        </div>
        <div class="block">
            <x-buttons.orange value="Сохранить"/>
        </div>
    </div>
</div>