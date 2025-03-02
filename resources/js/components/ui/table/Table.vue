<template>
    <table class="w-full border-collapse border border-gray-200">
        <thead>
        <tr>
            <th class="border border-gray-200 p-2">Название</th>
            <th class="border border-gray-200 p-2">Дата</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="border border-gray-200 p-2">Тестовая строка</td>
            <td class="border border-gray-200 p-2">2025-03-02</td>
        </tr>
        </tbody>
    </table>
</template>

<script setup>
defineProps(["data"]);
</script>
