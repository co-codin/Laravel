<template>
    <div class="flex flex-wrap lg:flex-no-wrap justify-between items-center bg-white p-8 rounded w-full mb-2">
        <div class="mr-8 mb-2 lg:mb-0">
            <h1 class="text-gray-600 text-xl leading-snug">
                <a href="#" class="text-gray-600">
                    {{ item.name }}
                </a>
            </h1>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            item: {
                required: true,
                type: Object
            }
        }
    }
</script>
