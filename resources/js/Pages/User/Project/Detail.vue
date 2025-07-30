<script setup>

defineProps({
    project:Object
})

</script>


<template>
    {{ console.log(project.project_name) }}
</template>