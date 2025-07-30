<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ref } from 'vue';
import Modal from '@/Components/Modal.vue';
import { Head, useForm } from '@inertiajs/vue3';

import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Select from '@/Components/Select.vue';
import TextArea from '@/Components/TextArea.vue';

defineProps({
    projects: Object,
    project_saya: String,
    in_progress: String,
    hold: String,
    done: String,
})

const form = useForm({
    project_name: '',
    priority: '',
    due_task: '',
    project_desc: '',
})


const showCreateModal = ref(false);
const openCreateModal = () => {
    showCreateModal.value = true;
};

const PriorityOption = [
    { value: 'low', label: 'Low' },
    { value: 'medium', label: 'Medium' },
    { value: 'high', label: 'High' },
];

const closeModal = () => {
    showCreateModal.value = false;
    form.reset(); // Reset form saat modal ditutup
};

const submitProject = () => {
    form.post(route('project.store'), {
        onSuccess: () => closeModal(), // Tutup modal jika sukses
    });
};



</script>
<template>
    <AuthenticatedLayout>
        <x-app-layout>

            <Head title="Dashboard" />

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-gray-50 rounded-lg shadow-lg p-6 mb-8">
                        <div class="flex justify-between items-center">
                            <div class="">
                                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                                    Assalamualaikum, {{ $page.props.auth.user.name }}
                                </h2>
                                <span class="text-gray-500 text-sm">
                                    Silakan submit project anda.
                                </span>
                            </div>
                            <div class="">
                                <PrimaryButton @click="openCreateModal">Submit Project</PrimaryButton>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h3 class="text-gray-600">Project saya</h3>
                            <p class="text-3xl font-bold mt-2">{{project_saya}}</p>
                        </div>

                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h3 class="text-gray-600">Diproses</h3>
                            <p class="text-3xl font-bold mt-2">{{in_progress}}</p>
                        </div>

                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h3 class="text-gray-600">Tertunda</h3>
                            <p class="text-3xl font-bold mt-2">{{hold}}</p>
                        </div>

                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h3 class="text-gray-600">Selesai</h3>
                            <p class="text-3xl font-bold mt-2">{{done}}</p>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow-md sm:rounded-lg p-6">
                        <h2 class="text-xl font-bold mb-4 text-gray-800">Project saya</h2>

                        <div class="hidden md:grid grid-cols-12 gap-4 text-sm text-gray-500 font-semibold mb-2">
                            <div class="col-span-3">Nama Project</div>
                            <div class="col-span-3">Prioritas</div>
                            <div class="col-span-3">Status</div>
                            <div class="col-span-3">Deadline</div>
                        </div>


                        <div v-for="project in projects" :key="project.id" class="space-y-4">
                            <a :href="route('user.detail-project', project.slug)"
                                class="grid grid-cols-1 md:grid-cols-12 gap-4 mb-2 items-center bg-gray-50 hover:bg-gray-100 p-4 rounded-lg">
                                <div class="col-span-1 md:col-span-3 flex items-center">
                                    <span class="font-semibold text-gray-900">{{ project.project_name }}</span>
                                </div>
                                <div class="col-span-1 md:col-span-3 flex items-center">
                                    <span v-if="project.priority === 'low'"
                                        class="text-xs text-gray-100 bg-blue-600 px-2 py-1 rounded-full">Low</span>
                                    <span v-if="project.priority === 'medium'"
                                        class="text-xs text-gray-900 bg-yellow-600 px-2 py-1 rounded-full">Medium</span>
                                    <span v-if="project.priority === 'high'"
                                        class="text-xs text-gray-900 bg-red-600 px-2 py-1 rounded-full">High</span>
                                </div>
                                <div class="col-span-1 md:col-span-3 flex items-center">
                                    <span v-if="project.status === 'pending'"
                                        class="text-xs text-gray-100 bg-gray-400 px-2 py-1 rounded-full">Pending</span>
                                    <span v-if="project.status === 'in progress'"
                                        class="text-xs text-blue-100 bg-blue-400 px-2 py-1 rounded-full">Proses</span>
                                    <span v-if="project.status === 'hold'"
                                        class="text-xs text-gray-100 bg-yellow-400 px-2 py-1 rounded-full">Tertunda</span>
                                    <span v-if="project.status === 'done'"
                                        class="text-xs text-gray-100 bg-green-400 px-2 py-1 rounded-full">selesai</span>
                                    <span v-if="project.status === 'canceled'"
                                        class="text-xs text-gray-100 bg-red-400 px-2 py-1 rounded-full">Pending</span>
                                    <span v-if="project.status === 'reject'"
                                        class="text-xs text-gray-100 bg-red-600 px-2 py-1 rounded-full">Ditolak</span>
                                </div>
                                <div class="col-span-1 md:col-span-3 flex items-center">
                                    <span class="text-sm text-gray-900">27 Juli 2025</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
        </x-app-layout>
    </AuthenticatedLayout>
</template>
