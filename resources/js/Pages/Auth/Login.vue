<script setup>
import { ref } from 'vue'
import { router } from '@inertiajs/vue3'
import Button from '@/components/ui/Button.vue';
import Input from '@/components/ui/Input.vue';
import axios from "axios";

const form = ref({ email: '', password: '' })
const login = async () => {
    try {
        const response = await axios.post("/api/login", form.value);
        console.log("Ответ сервера:", response.data);

        // Сохраняем токен в локальном хранилище
        localStorage.setItem("token", response.data.token);
        axios.defaults.headers.common["Authorization"] = `Bearer ${response.data.token}`;

        console.log("Токен сохранен, пробуем редирект...");
        router.visit("/counterparties");
    } catch (error) {
        console.error("Ошибка при входе:", error.response?.data || error.message);
    }
};
</script>

<template>
    <div class="flex justify-center items-center min-h-screen">
        <div class="p-6 shadow-lg rounded-lg w-96">
            <h2 class="text-xl font-bold mb-4">Вход</h2>
            <Input v-model="form.email" type="email" placeholder="Email" class="mb-2"/>
            <Input v-model="form.password" type="password" placeholder="Пароль" class="mb-4"/>
            <Button @click="login" class="w-full">Войти</Button>
            <p class="mt-2 text-center text-sm">
                Нет аккаунта? <a href="/register" class="text-blue-500">Регистрация</a>
            </p>
        </div>
    </div>
</template>
