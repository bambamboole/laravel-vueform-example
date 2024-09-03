<script setup lang="ts">
import {useForm, usePage} from '@inertiajs/vue3';
import {HTMLAttributes, onMounted, ref, watch} from "vue";


const props = defineProps<{
    schema: any;
    resetOnSuccess?: boolean;
    class?: HTMLAttributes['class'];
}>();
const vueFormRef = ref<any>(null);

const fillValues = () => {
    const initialValues: any = {};
    Object.entries(props.schema.schema).forEach(([key, field]: Array<any>) => initialValues[key] = field.value);
    if (vueFormRef.value) {
        vueFormRef.value.update(initialValues);
    }
};

onMounted(() => {
    fillValues();
});

watch(() => props.schema.schema, () => {
    fillValues();
});

const submitForm = async (FormData: FormData, form$: any) => {
    let data: any = {};
    FormData.forEach((value, key) => {
        data[key] = value;
    });

    const inertiaForm = useForm(data);
    inertiaForm.submit(props.schema.method.toLocaleLowerCase(), props.schema.endpoint, {
        preserveScroll: true,
        onError: (errors: object) => {
            Object.entries(errors).forEach(([key, value]) => {
                form$.el$(key).messageBag.prepend(value);
            });
        },
        onSuccess: () => {
            form$.clearMessages();

            if (props.resetOnSuccess) {
                form$.clear();
                form$.reset();
            }
        },
        onFinish: () => {
            Object.entries(usePage().props.flash ?? {}).forEach(([key, value]) => {
                form$.messageBag.append(value, key);
            });
            setTimeout(() => {
                form$.messageBag.clear()
            }, 2000)
        }
    });
};

</script>

<template>
    <Vueform ref="vueFormRef" :endpoint="submitForm" :schema="schema.schema" :display-errors="false" :class="props.class"/>
</template>
