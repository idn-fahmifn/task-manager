<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>


        <x-app-layout>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div
                        class="bg-gray-50 rounded-lg shadow-lg p-6 mb-8">

                        <h2 class="text-xl font-semibold leading-tight text-gray-800">
                            Assalamualaikum, {{ $page.props.auth.user.name }}
                        </h2>

                        <p class="text-sm font-light leading-tight text-gray-800 mt-4">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates explicabo facilis error nam expedita quam tempora cum voluptatibus numquam eveniet.
                        </p>

                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h3 class="text-gray-600">Laporan Saya</h3>
                            <p class="text-3xl font-bold mt-2">18</p>
                        </div>

                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h3 class="text-gray-600">Diproses</h3>
                            <p class="text-3xl font-bold mt-2">132</p>
                        </div>

                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h3 class="text-gray-600">Selesai</h3>
                            <p class="text-3xl font-bold mt-2">12</p>
                        </div>

                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h3 class="text-gray-600">Ditolak</h3>
                            <p class="text-3xl font-bold mt-2">10</p>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow-md sm:rounded-lg p-6">
                        <h2 class="text-xl font-bold mb-4 text-gray-800">Laporan Anda</h2>

                        <div class="hidden md:grid grid-cols-12 gap-4 text-sm text-gray-500 font-semibold mb-2 px-4">
                            <div class="col-span-4">Judul Laporan</div>
                            <div class="col-span-2 text-center">Tanggal Pengaduan</div>
                            <div class="col-span-2 text-center">Jenis Pengaduan</div>
                            <div class="col-span-2 text-center">Status</div>
                            <div class="col-span-2 text-center">Pelapor</div>
                        </div>

                        <div class="space-y-4">
                            <a href=""
                                class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center bg-gray-50 hover:bg-gray-100 p-4 rounded-lg">
                                <div class="col-span-1 md:col-span-4 flex items-center">
                                    <span class="font-semibold text-gray-900">Mobil Hilang</span>
                                </div>
                                <div class="col-span-1 md:col-span-2 text-center text-gray-700">27
                                    Juli 2025
                                </div>
                                <div class="col-span-1 md:col-span-2 text-center">
                                    <span
                                        class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-3 py-1 rounded-full">Kehilangan</span>
                                </div>
                                <div class="col-span-1 md:col-span-2 flex justify-center -space-x-2">
                                    <div class="col-span-1 md:col-span-2 text-center">
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full">diproses</span>
                                    </div>
                                </div>
                                <div class="col-span-1 md:col-span-2 text-center text-gray-700">Fahmi
                                </div>
                            </a>
                            <a href=""
                                class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center bg-gray-50 hover:bg-gray-100 p-4 rounded-lg">
                                <div class="col-span-1 md:col-span-4 flex items-center">
                                    <span class="font-semibold text-gray-900">Mobil Hilang</span>
                                </div>
                                <div class="col-span-1 md:col-span-2 text-center text-gray-700">27
                                    Juli 2025
                                </div>
                                <div class="col-span-1 md:col-span-2 text-center">
                                    <span
                                        class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-3 py-1 rounded-full">Kehilangan</span>
                                </div>
                                <div class="col-span-1 md:col-span-2 flex justify-center -space-x-2">
                                    <div class="col-span-1 md:col-span-2 text-center">
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full">diproses</span>
                                    </div>
                                </div>
                                <div class="col-span-1 md:col-span-2 text-center text-gray-700">Fahmi
                                </div>
                            </a>
                            <a href=""
                                class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center bg-gray-50 hover:bg-gray-100 p-4 rounded-lg">
                                <div class="col-span-1 md:col-span-4 flex items-center">
                                    <span class="font-semibold text-gray-900">Mobil Hilang</span>
                                </div>
                                <div class="col-span-1 md:col-span-2 text-center text-gray-700">27
                                    Juli 2025
                                </div>
                                <div class="col-span-1 md:col-span-2 text-center">
                                    <span
                                        class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-3 py-1 rounded-full">Kehilangan</span>
                                </div>
                                <div class="col-span-1 md:col-span-2 flex justify-center -space-x-2">
                                    <div class="col-span-1 md:col-span-2 text-center">
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full">diproses</span>
                                    </div>
                                </div>
                                <div class="col-span-1 md:col-span-2 text-center text-gray-700">Fahmi
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </x-app-layout>
    </AuthenticatedLayout>
</template>
