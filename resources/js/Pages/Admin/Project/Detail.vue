<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

import PrimaryButton from '@/Components/PrimaryButton.vue';
import Modal from '@/Components/Modal.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextArea from '@/Components/TextArea.vue';

const props = defineProps({
    project: Object,
    created: String,
    task: Object,
    user: Object,
})

const form = useForm({
    task_name: '',
    description: '',
})


const modalNewTask = ref(false);
const openCreateModal = () => {
    modalNewTask.value = true;
};

const submit = () => {
    form.post(route('task.store', props.project.id), {
        onSuccess: () => closeModal(), // Tutup modal jika sukses
    });
};

const closeModal = () => {
    modalNewTask.value = false;
    form.reset(); // Reset form saat modal ditutup
};


</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <x-app-layout>
            <div class="p-4 sm:p-8">
                <div class="max-w-7xl mx-auto bg-white rounded-2xl shadow-lg p-6 sm:p-8">
                    <header
                        class="flex flex-col sm:flex-row justify-between items-center pb-4 border-b border-gray-200">
                        <div class="flex items-center space-x-2">
                            <a :href="route('dashboard')"
                                class="flex items-center space-x-2 px-3 py-1.5 border border-gray-300 rounded-md hover:bg-gray-100"><svg
                                    xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7" />
                                </svg>
                                <span class="text-sm font-medium text-gray-700">Back</span>
                            </a>
                        </div>
                        <div class="flex items-center space-x-2 mt-4 sm:mt-0">
                            <button class="text-sm font-medium text-gray-700 px-4 py-1.5 rounded-md hover:bg-gray-100">
                                Tambahkan Team</button>
                            <PrimaryButton @click="openCreateModal">Buat Tugas</PrimaryButton>

                        </div>
                    </header>


                    <main class="mt-6">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900 uppercase">{{ project.project_name }}</h1>
                            <p class="text-gray-500 lowercase text-sm">Dibuat {{ created }}</p>
                        </div>
                        <div
                            class="mt-6 flex flex-col md:flex-row justify-between items-start md:items-center space-y-4 md:space-y-0">
                            <div class="flex flex-wrap gap-4">
                                <div>
                                    <label class="text-xs text-gray-500">Status</label>
                                    <div v-if="project.status === 'pending'"
                                        class="mt-1 flex items-center space-x-2 px-3 py-1.5 border border-gray-200 rounded-md text-sm font-medium">
                                        <span class="w-2 h-2 bg-gray-400 rounded-full"></span>
                                        <span>Pending</span>
                                    </div>
                                    <div v-if="project.status === 'in progress'"
                                        class="mt-1 flex items-center space-x-2 px-3 py-1.5 border border-gray-200 rounded-md text-sm font-medium">
                                        <span class="w-2 h-2 bg-green-400 rounded-full"></span>
                                        <span>sedang diproses</span>
                                    </div>
                                    <div v-if="project.status === 'hold'"
                                        class="mt-1 flex items-center space-x-2 px-3 py-1.5 border border-gray-200 rounded-md text-sm font-medium">
                                        <span class="w-2 h-2 bg-yellow-400 rounded-full"></span>
                                        <span>proses tertunda</span>
                                    </div>
                                    <div v-if="project.status === 'done'"
                                        class="mt-1 flex items-center space-x-2 px-3 py-1.5 border border-gray-200 rounded-md text-sm font-medium">
                                        <span class="w-2 h-2 bg-green-400 rounded-full"></span>
                                        <span>selesai</span>
                                    </div>
                                    <div v-if="project.status === 'reject'"
                                        class="mt-1 flex items-center space-x-2 px-3 py-1.5 border border-gray-200 rounded-md text-sm font-medium">
                                        <span class="w-2 h-2 bg-gray-600 rounded-full"></span>
                                        <span>selesai</span>
                                    </div>
                                    <div v-if="project.status === 'canceled'"
                                        class="mt-1 flex items-center space-x-2 px-3 py-1.5 border bg-gray-200 border-gray-200 rounded-md text-sm font-medium">
                                        <span class="text-red-500">project dibatalkan</span>
                                    </div>
                                </div>
                                <div>
                                    <label class="text-xs text-gray-500">Prioritas</label>
                                    <div v-if="project.priority === 'low'"
                                        class="mt-1 flex items-center space-x-2 px-3 py-1.5 border border-gray-200 rounded-md text-sm font-medium">
                                        <span class="w-2 h-2 bg-yellow-300 rounded-full"></span>
                                        <span>Low</span>
                                    </div>
                                    <div v-else-if="project.priority === 'medium'"
                                        class="mt-1 flex items-center space-x-2 px-3 py-1.5 border border-gray-200 rounded-md text-sm font-medium">
                                        <span class="w-2 h-2 bg-orange-500 rounded-full"></span>
                                        <span>Medium</span>
                                    </div>
                                    <div v-else
                                        class="mt-1 flex items-center space-x-2 px-3 py-1.5 border border-gray-200 rounded-md text-sm font-medium">
                                        <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                        <span>High</span>
                                    </div>
                                </div>
                                <div>
                                    <label class="text-xs text-gray-500">Team Assign</label>
                                    <div class="mt-1 flex items-center pl-1.5">
                                        <img src="https://i.pravatar.cc/150?u=a" alt="avatar"
                                            class="w-7 h-7 rounded-full border-2 border-white">
                                        <img src="https://i.pravatar.cc/150?u=b" alt="avatar"
                                            class="w-7 h-7 rounded-full border-2 border-white -ml-2">
                                    </div>
                                </div>
                            </div>
                            <div class="rounded-xl border flex justify-around items-center py-2 px-6 space-x-4">
                                <div class="relative w-12 h-12 rounded-full overflow-hidden">
                                    <img src="https://www.svgrepo.com/show/384674/account-avatar-profile-user-11.svg"
                                        alt="User Avatar" class="object-cover w-full h-full">
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">{{ project.user.name }}</h3>
                                    <span
                                        class="inline-block bg-gray-200 rounded-full px-2 py-1 text-xs font-semibold text-gray-700">Pemilik
                                        Project</span>
                                    <a href=""
                                        class="inline-block bg-green-200 rounded-full px-2 ml-2 py-1 text-xs font-semibold text-gray-700">
                                        Whatsapp
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="mt-8">
                            <h3 class="text-sm font-semibold text-gray-500 mb-2">Pratinjau Progress</h3>
                            <div class="flex space-x-1">
                                <div class="flex-1 text-center text-sm font-semibold bg-green-100 text-green-800 py-2"
                                    style="clip-path: polygon(0 0, 95% 0, 100% 50%, 95% 100%, 0 100%);">Meeting
                                    scheduled</div>
                                <div class="flex-1 text-center text-sm font-semibold bg-yellow-100 text-yellow-800 py-2 -ml-4"
                                    style="clip-path: polygon(0 0, 95% 0, 100% 50%, 95% 100%, 5% 100%, 0% 50%);">
                                    Proposal Made (Sales)</div>
                                <div class="flex-1 text-center text-sm font-semibold bg-red-100 text-red-800 py-2 -ml-4"
                                    style="clip-path: polygon(0 0, 95% 0, 100% 50%, 95% 100%, 5% 100%, 0% 50%);">Account
                                    Closed (Sales)</div>
                                <div class="flex-1 text-center text-sm font-semibold bg-gray-100 text-gray-500 py-2 -ml-4"
                                    style="clip-path: polygon(0 0, 100% 0, 100% 100%, 5% 100%, 0% 50%);">Onboarding (CS)
                                </div>
                            </div>
                        </div> -->

                        <!-- <div class="mt-8 border-b border-gray-200">
                            <nav class="-mb-px flex space-x-6">
                                <a href="#" class="py-2 px-1 text-gray-500 hover:text-blue-600">Tasks</a>
                                <a href="#"
                                    class="py-2 px-1 text-blue-600 font-semibold border-b-2 border-blue-600">Custom
                                    fields</a>
                                <a href="#" class="py-2 px-1 text-gray-500 hover:text-blue-600">Notes</a>
                                <a href="#" class="py-2 px-1 text-gray-500 hover:text-blue-600">Updates</a>
                            </nav>
                        </div> -->

                        <div class="mt-6">
                            <!-- <div class="flex flex-wrap gap-2 text-sm font-medium text-gray-600">
                                <button class="px-3 py-1 rounded-md bg-gray-100 text-blue-700 font-semibold">All
                                    Customers</button>
                                <button class="px-3 py-1 rounded-md hover:bg-gray-100">All Accounts</button>
                                <button class="px-3 py-1 rounded-md hover:bg-gray-100">Angela's Accounts</button>
                                <button class="px-3 py-1 rounded-md hover:bg-gray-100">Yellow Accounts</button>
                                <button class="px-3 py-1 rounded-md hover:bg-gray-100">Ariel's Accounts</button>
                                <button class="px-3 py-1 rounded-md hover:bg-gray-100">CSM Accounts</button>
                                <button class="px-3 py-1 rounded-md hover:bg-gray-100">Forecast</button>
                            </div> -->
                            <div class="mt-6 border-t border-gray-200 pt-6">
                                <h4 class="text-lg font-semibold text-gray-800">Deskripsi Pekerjaan</h4>
                                <p class="text-gray-600 text-sm">
                                    {{ project.project_desc }}
                                </p>

                            </div>

                            <div class="mt-6 border-t border-gray-200 pt-6">
                                <h4 class="text-lg font-semibold text-gray-800">Daftar Tugas</h4>

                                <div class="max-w-full mt-4 mx-auto" v-if="task.length === 0">
                                    <div class="flex items-center p-4 text-sm text-yellow-800 rounded-lg bg-yellow-50"
                                        role="alert">
                                        <svg class="flex-shrink-0 inline w-5 h-5 me-3" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                        </svg>
                                        <span class="sr-only">Info</span>
                                        <div>
                                            <span class="font-medium">Tidak Ditemukan!</span> Tugas belum dibuat
                                        </div>
                                    </div>
                                </div>

                                <div v-else class=" md:min-h-[20dvh] overflow-hidden mt-4">
                                    <div class="h-auto md:min-h-[20%]">
                                        <div v-for="task in task" :key="task.id" class="space-y-4">
                                            <a href=""
                                                class="grid grid-cols-1 md:grid-cols-6 gap-4 mb-2 items-center bg-gray-50 hover:bg-gray-100 p-4 rounded-lg">
                                                <div class="col-span-1 md:col-span-3 flex items-center">
                                                    <span class="font-semibold text-gray-900">{{ task.task_name }}</span>
                                                </div>
                                                <div class="col-span-1 md:col-span-3 flex items-center">
                                                    <span class="text-sm text-gray-900">
                                                        {{ task.created_ago }}
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="my-4">

                                    </div>
                                </div>

                            </div>
                        </div>
                    </main>
                </div>
            </div>
            <!-- modal tugas -->
            <Modal :show="modalNewTask" @close="closeModal">

                <form @submit.prevent="submit" class="p-6">
                    <!-- <div class="mt-6 flex justify-end"> -->
                    <div class="mt-3">
                        <h4 class="text-gray-700 uppercase font-semibold">Buat Tugas Baru</h4>
                    </div>
                    <div class="mt-4">
                        <InputLabel for="task_name" value="Nama Tugas" />
                        <TextInput id="task_name" type="text" class="mt-1 block w-full" placeholder="Masukan Nama Tugas"
                            v-model="form.task_name" required autofocus />
                        <InputError class="mt-2" :message="form.errors.task_name" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="description" value="Deskripsi Tugas" />
                        <TextArea id="description" label="Deskripsi Project" v-model="form.description" />
                        <InputError :message="form.errors.description" class="mt-2" />
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
