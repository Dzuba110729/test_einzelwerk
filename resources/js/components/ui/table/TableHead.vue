<template>
    <thead>
    <tr>
        <th v-for="column in columns" :key="column">{{ column }}</th>
    </tr>
    </thead>
</template>

<script setup>
import { defineProps } from "vue";

defineProps({
    columns: Array
});
</script>
