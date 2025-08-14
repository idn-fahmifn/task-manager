<script setup>
import { onMounted, ref, watch } from 'vue';

// Mendefinisikan props untuk v-model
defineProps({
    modelValue: String,
});

// Mendefinisikan event untuk v-model
defineEmits(['update:modelValue']);

// Membuat ref untuk mengakses elemen textarea secara langsung
const textarea = ref(null);

// Fungsi untuk menyesuaikan tinggi textarea
const adjustHeight = () => {
    if (textarea.value) {
        textarea.value.style.height = 'auto';
        textarea.value.style.height = `${textarea.value.scrollHeight}px`;
    }
};

// Panggil adjustHeight saat komponen pertama kali dimuat
onMounted(() => {
    adjustHeight();
});

// Panggil adjustHeight setiap kali nilai modelValue berubah
// (berguna jika data diubah dari luar komponen)
watch(() => textarea.value?.value, () => {
    adjustHeight();
});

// Expose method focus agar bisa dipanggil dari parent
defineExpose({ focus: () => textarea.value.focus() });
</script>

<template>
    <textarea ref="textarea"
        class="border-gray-300 mt-1 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full transition duration-150 ease-in-out"
        :value="modelValue" @input="$emit('update:modelValue', $event.target.value); adjustHeight()"
        rows="3"></textarea>
</template>