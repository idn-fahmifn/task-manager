<script setup>
import { onMounted, ref } from 'vue';

// Mendefinisikan props:
// - modelValue: untuk v-model
// - options: array berisi data dropdown
defineProps({
    modelValue: {
        type: [String, Number],
        required: true,
    },
    options: {
        type: Array,
        required: true, // Berisi array of objects, e.g., [{ value: '1', label: 'Opsi 1' }]
    },
});

// Mendefinisikan event yang akan di-emit untuk v-model
defineEmits(['update:modelValue']);

const select = ref(null);

onMounted(() => {
    if (select.value.hasAttribute('autofocus')) {
        select.value.focus();
    }
});

defineExpose({ focus: () => select.value.focus() });
</script>

<template>
    <select ref="select"
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
        :value="modelValue" @change="$emit('update:modelValue', $event.target.value)">
        <option v-for="option in options" :key="option.value" :value="option.value">
            {{ option.label }}
        </option>
    </select>
</template>