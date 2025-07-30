<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});
</script>

<template>

    <Head title="Welcome" />

    <div class="bg-white font-sans">
        <header class="bg-white shadow-md">
            <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
                <h1 class="text-2xl font-bold text-gray-800">Media IDN</h1>

                <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                    <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Dashboard
                    </Link>

                    <template v-else>
                        <Link :href="route('login')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Log in
                        </Link>

                        <Link v-if="canRegister" :href="route('register')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Register
                        </Link>
                    </template>
                </nav>

                <div class="" v-if="canLogin">

                    <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                    Dashboard
                    </Link>

                    <div class="" v-else>
                        <Link class="text-gray-500" :href="route('login')">Sudah punya akun</Link>

                        <Link v-if="canRegister" :href="route('register')"
                            class="bg-blue-600 text-white ms-4 px-4 py-2 rounded-lg font-semibold hover:bg-blue-700 transition duration-300">
                        Sign up
                        </Link>
                    </div>
                </div>
            </nav>
        </header>

        <main class="bg-gray-50">
            <section class="container mx-auto px-6 py-20 md:py-24">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div>
                        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight">
                            Showcase Your Best Projects to the World.
                        </h1>
                        <p class="mt-4 text-lg text-gray-600">
                            Get feedback, find collaborators, and build your portfolio. Submitting your project is
                            simple and fast.
                        </p>
                        <Link v-if="canRegister" :href="route('register')"
                            class="mt-8 inline-block bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold shadow-lg hover:bg-blue-700 transform hover:-translate-y-1 transition duration-300">
                        Get Started Now
                        </Link>
                    </div>
                    <div class="hidden md:block">
                        <svg class="w-full h-auto" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                            <path fill="#6366F1"
                                d="M49.3,-58.3C62.8,-47.9,71.9,-32.1,75.1,-15C78.4,2,75.8,20.3,66.8,34.8C57.8,49.3,42.4,60.1,26.4,65.6C10.4,71.1,-6.1,71.3,-22.4,66.3C-38.6,61.2,-54.5,50.9,-64.1,36.5C-73.7,22.1,-77,3.6,-73.3,-12.8C-69.6,-29.2,-58.9,-43.5,-45.5,-54.2C-32,-64.9,-16,-72,1.3,-73.4C18.6,-74.8,37.1,-70.2,49.3,-58.3Z"
                                transform="translate(100 100)" />
                        </svg>
                    </div>
                </div>
            </section>
        </main>

        <section class="py-20 px-6">
            <div class="container mx-auto text-center">
                <h2 class="text-3xl font-bold text-gray-800">How It Works</h2>
                <p class="text-gray-600 mt-2">A simple three-step process to get your project noticed.</p>

                <div class="mt-12 grid md:grid-cols-3 gap-10">
                    <div class="bg-gray-50 p-8 rounded-lg">
                        <div
                            class="flex items-center justify-center h-16 w-16 bg-blue-100 text-blue-600 rounded-full mx-auto">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="mt-6 text-xl font-semibold text-gray-800">1. Create Your Submission</h3>
                        <p class="mt-2 text-gray-600">Fill out a simple form with your project details, link, and
                            images.</p>
                    </div>
                    <div class="bg-gray-50 p-8 rounded-lg">
                        <div
                            class="flex items-center justify-center h-16 w-16 bg-blue-100 text-blue-600 rounded-full mx-auto">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <h3 class="mt-6 text-xl font-semibold text-gray-800">2. Get Reviewed</h3>
                        <p class="mt-2 text-gray-600">Our team and community provide constructive feedback to help you
                            improve.</p>
                    </div>
                    <div class="bg-gray-50 p-8 rounded-lg">
                        <div
                            class="flex items-center justify-center h-16 w-16 bg-blue-100 text-blue-600 rounded-full mx-auto">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="mt-6 text-xl font-semibold text-gray-800">3. Join the Community</h3>
                        <p class="mt-2 text-gray-600">Connect with other creators, find collaborators, and grow your
                            network.</p>
                    </div>
                </div>
            </div>
        </section>

        <footer class="bg-gray-800 text-gray-400">
            <div class="container mx-auto px-6 py-8 text-center">
                <p>&copy; {{ new Date().getFullYear() }} ProjectSubmit. All rights reserved.</p>
            </div>
        </footer>
    </div>
</template>