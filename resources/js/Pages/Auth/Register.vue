<script setup>
import { ref } from 'vue'
import { router } from '@inertiajs/vue3'
import Button from '@/components/ui/Button.vue';
import Input from '@/components/ui/Input.vue';
import axios from "axios";

const form = ref({ email: '', password: '' })
const register = async () => {
    console.log("Данные перед отправкой:", form.value);

    try {
        await axios.post("/api/register",
            { ...form.value },
            { headers: { "Content-Type": "application/json" } } // ⬅ Добавляем JSON заголовок
        );
        router.visit("/login");
    } catch (error) {
        console.error("Ошибка при регистрации", error.response?.data);
    }
};
</script>

<template>
    <div class="flex justify-center items-center min-h-screen">
        <div class="p-6 shadow-lg rounded-lg w-96">
            <h2 class="text-xl font-bold mb-4">Регистрация</h2>
            <Input v-model.trim="form.email" type="email" placeholder="Email" class="mb-2"/>
            <Input v-model.trim="form.password" type="password" placeholder="Пароль" class="mb-4"/>
            <Button @click="register" class="w-full">Зарегистрироваться</Button>
            <p class="mt-2 text-center text-sm">
                Уже есть аккаунт? <a href="/login" class="text-blue-500">Войти</a>
            </p>
        </div>
    </div>
</template>
