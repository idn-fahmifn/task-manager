<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ref } from 'vue';
import Modal from '@/Components/Modal.vue';
import { Head, useForm } from '@inertiajs/vue3';


import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
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
    link: '',
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


const submit = () => {
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
                        <div class="md:flex justify-between items-center">
                            <div class="">
                                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                                    Assalamualaikum, <span class="capitalize">{{ $page.props.auth.user.name }}</span>
                                </h2>
                                <span class="text-gray-500 text-sm">
                                    Silakan submit project anda.
                                </span>

                            </div>
                            <div class="mt-4 md:mt-0 lg:mt-0">
                                <PrimaryButton @click="openCreateModal">Submit Project</PrimaryButton>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h3 class="text-gray-600">Project saya</h3>
                            <p class="text-3xl font-bold mt-2">{{ project_saya }}</p>
                        </div>

                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h3 class="text-gray-600">Diproses</h3>
                            <p class="text-3xl font-bold mt-2">{{ in_progress }}</p>
                        </div>

                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h3 class="text-gray-600">Tertunda</h3>
                            <p class="text-3xl font-bold mt-2">{{ hold }}</p>
                        </div>

                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h3 class="text-gray-600">Selesai</h3>
                            <p class="text-3xl font-bold mt-2">{{ done }}</p>
                        </div>
                    </div>

                    <div class="max-w-full mx-auto" v-if="projects.length === 0">
                        <div class="flex items-center p-4 text-sm text-yellow-800 rounded-lg bg-yellow-50" role="alert">
                            <svg class="flex-shrink-0 inline w-5 h-5 me-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium">Tidak Ditemukan!</span> Anda belum membuat project.
                            </div>
                        </div>
                    </div>

                    <div v-else class="bg-white overflow-hidden shadow-md sm:rounded-lg p-6">
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
                                    <div v-if="project.priority === 'low'"
                                        class="mt-1 flex items-center space-x-2 px-3 py-1.5 rounded-md text-sm font-medium">
                                        <span class="w-2 h-2 bg-yellow-300 rounded-full"></span>
                                        <span>Low</span>
                                    </div>
                                    <div v-else-if="project.priority === 'medium'"
                                        class="mt-1 flex items-center space-x-2 px-3 py-1.5 rounded-md text-sm font-medium">
                                        <span class="w-2 h-2 bg-orange-500 rounded-full"></span>
                                        <span>Medium</span>
                                    </div>
                                    <div v-else
                                        class="mt-1 flex items-center space-x-2 px-3 py-1.5 rounded-md text-sm font-medium">
                                        <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                        <span>High</span>
                                    </div>
                                </div>
                                <div class="col-span-1 md:col-span-3 flex items-center">
                                    <div v-if="project.status === 'pending'"
                                        class="mt-1 flex items-center space-x-2 px-3 py-1.5 rounded-md text-sm font-medium">
                                        <span class="w-2 h-2 bg-gray-400 rounded-full"></span>
                                        <span>pending</span>
                                    </div>
                                    <div v-if="project.status === 'in progress'"
                                        class="mt-1 flex items-center space-x-2 px-3 py-1.5 rounded-md text-sm font-medium">
                                        <span class="w-2 h-2 bg-green-400 rounded-full"></span>
                                        <span>sedang diproses</span>
                                    </div>
                                    <div v-if="project.status === 'hold'"
                                        class="mt-1 flex items-center space-x-2 px-3 py-1.5 rounded-md text-sm font-medium">
                                        <span class="w-2 h-2 bg-yellow-400 rounded-full"></span>
                                        <span>proses tertunda</span>
                                    </div>
                                    <div v-if="project.status === 'done'"
                                        class="mt-1 flex items-center space-x-2 px-3 py-1.5 rounded-md text-sm font-medium">
                                        <span class="w-2 h-2 bg-green-400 rounded-full"></span>
                                        <span>selesai</span>
                                    </div>
                                    <div v-if="project.status === 'reject'"
                                        class="mt-1 flex items-center space-x-2 px-3 py-1.5 rounded-md text-sm font-medium">
                                        <span class="w-2 h-2 bg-gray-600 rounded-full"></span>
                                        <span>selesai</span>
                                    </div>
                                    <div v-if="project.status === 'canceled'"
                                        class="mt-1 flex items-center space-x-2 px-3 py-1.5 rounded-md text-sm font-medium">
                                        <span class="w-2 h-2 bg-red-600 rounded-full"></span>
                                        <span>project dibatalkan</span>
                                    </div>
                                </div>
                                <div class="col-span-1 md:col-span-3 flex items-center">
                                    <span class="text-sm text-gray-900">
                                        {{ project.due_task }}
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <Modal :show="showCreateModal" @close="closeModal">

                <form @submit.prevent="submit" class="p-6">
                    <!-- <div class="mt-6 flex justify-end"> -->
                    <div class="mt-3">
                        <h4 class="text-gray-700 uppercase font-semibold">Submit Project Baru</h4>
                    </div>
                    <div class="mt-4">
                        <InputLabel for="project_name" value="Nama Project" />
                        <TextInput id="project_name" type="text" class="mt-1 block w-full"
                            placeholder="Masukan nama project anda" v-model="form.project_name" required autofocus />
                        <InputError class="mt-2" :message="form.errors.project_name" />
                    </div>

                    <div class="mt-6">
                        <InputLabel for="prioritas" value="Priority" />
                        <select id="prioritas" v-model="form.priority"
                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <option :value="null" disabled>-- Pilih Kategori --</option>
                            <option v-for="option in PriorityOption" :key="option.value" :value="option.value">
                                {{ option.label }}
                            </option>
                        </select>
                        <InputError :message="form.errors.prioritas" class="mt-2" />
                    </div>

                    <div class="mt-6">
                        <InputLabel for="due_task" value="Deadline" />
                        <TextInput id="due_task" type="date" class="mt-1 block w-full" placeholder="Target selesai"
                            v-model="form.due_task" required autofocus />
                        <InputError class="mt-2" :message="form.errors.due_task" />
                    </div>

                    <div class="mt-6">
                        <InputLabel for="link" value="Link Asset (Jika Ada)" />
                        <TextInput id="link" type="url" class="mt-1 block w-full"
                            placeholder="Masukan URL asset yang dibutuhkan jika ada" v-model="form.link" 
                            autofocus />
                        <InputError class="mt-2" :message="form.errors.link" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="link" value="Deskripsi project" />
                        <TextArea id="project_desc" label="Deskripsi Project" v-model="form.project_desc" />
                        <InputError :message="form.errors.project_desc" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <PrimaryButton type="submit" :disabled="form.processing">Simpan</PrimaryButton>
                    </div>
                    <!-- </div> -->
                </form>
            </Modal>
        </x-app-layout>
    </AuthenticatedLayout>
</template>
