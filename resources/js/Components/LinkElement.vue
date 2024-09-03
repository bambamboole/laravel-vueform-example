<script>
import { defineElement } from '@vueform/vueform'
import {toRefs} from "vue";

export default defineElement({
    name: 'LinkElement',
    props: {
        href: {
            type: String,
            required: true,
        },
        content: {
            type: String,
            required: true,
        },
        method: {
            type: String,
            required: false,
            default: 'get',
        },
    },
    setup(props, { element }) {
        const { href, content, method } = toRefs(props)
    }
})
</script>

<template>
    <ElementLayout>
        <template #element>
<!--   I had to import Link as global component in app.ts to make this working. weird...   -->
            <Link as="button" :href="href" v-html="content" :method="method" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"/>
        </template>
    </ElementLayout>
</template>

