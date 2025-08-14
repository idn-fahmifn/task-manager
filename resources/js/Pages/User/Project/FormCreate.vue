<script setup>

import { Head, useForm } from '@inertiajs/vue3';

import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextArea from '@/Components/TextArea.vue';


const form = useForm({
    project_name: '',
    priority: '',
    due_task: '',
    project_desc: '',
    link: '',
})



const PriorityOption = [
    { value: 'low', label: 'Low' },
    { value: 'medium', label: 'Medium' },
    { value: 'high', label: 'High' },
];


</script>
<template>
    

</template>
