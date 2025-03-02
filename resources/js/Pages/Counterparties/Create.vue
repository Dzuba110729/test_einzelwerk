<script setup>
import { ref } from 'vue'
import { router } from '@inertiajs/vue3'
import Button from '@/components/ui/Button.vue';
import Input from '@/components/ui/Input.vue';

const form = ref({ inn: '' })
const createCounterparty = async () => {
    try {
        await axios.post('/api/counterparties', form.value, {
            headers: { Authorization: `Bearer ${localStorage.getItem("token")}` }
        });
        router.visit('/counterparties'); // Перенаправление после успешного создания
    } catch (error) {
        console.error("Ошибка при создании контрагента:", error.response?.data || error.message);
    }
};

</script>

<template>
    <div class="flex justify-center items-center min-h-screen">
        <div class="p-6 shadow-lg rounded-lg w-96">
            <h2 class="text-xl font-bold mb-4">Добавить контрагента</h2>
            <Input v-model="form.inn" placeholder="ИНН" class="mb-4"/>
            <Button @click="createCounterparty" class="w-full">Добавить</Button>
        </div>
    </div>
</template>
