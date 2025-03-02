<script setup>
import { defineProps } from 'vue'
import Button from '@/components/ui/Button.vue';
import Table from  '@/components/ui/table/Table.vue';
import TableRow from '@/components/ui/table/TableRow.vue';
import TableHead from '@/components/ui/table/TableHead.vue';
import TableCell from '@/components/ui/table/TableCell.vue';

defineProps({ counterparties: Array })
</script>

<template>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Мои контрагенты</h1>

        <Button @click="$inertia.visit('/counterparties/create')" class="mb-4">Добавить контрагента</Button>

        <Table v-if="counterparties && counterparties.length">
            <TableRow>
                <TableHead>ИНН</TableHead>
                <TableHead>Название</TableHead>
                <TableHead>ОГРН</TableHead>
                <TableHead>Адрес</TableHead>
            </TableRow>
            <TableRow v-for="counterparty in counterparties" :key="counterparty.id">
                <TableCell>{{ counterparty.inn }}</TableCell>
                <TableCell>{{ counterparty.name }}</TableCell>
                <TableCell>{{ counterparty.ogrn }}</TableCell>
                <TableCell>{{ counterparty.address }}</TableCell>
            </TableRow>
        </Table>

        <div v-else class="text-center mt-6">
            <p class="text-lg">У вас пока нет контрагентов.</p>
            <Button @click="$inertia.visit('/counterparties/create')">Добавить контрагента</Button>
        </div>
    </div>
</template>
