<template>
    <div
        class="modal fade"
        ref="modalRef"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>{{ title }}</h3>
                </div>
                <div class="modal-body">
                    <slot />
                </div>
                <div class="modal-footer">
                    <button
                        class="btn btn-secondary"
                        type="button"
                        @click="closeModal"
                    >
                        Close
                    </button>
                    <button
                        class="btn btn-primary"
                        type="button"
                        @click="submitModal"
                    >
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { defineProps, onMounted, ref, watch } from "vue";
import { Modal } from "bootstrap";

const props = defineProps<{
    title: string,
    modelValue: boolean
}>();

const emit = defineEmits(["update:modelValue", "modal-submit"]);

let modal: Modal;

let modalRef = ref();

onMounted(() => {
    modal = new Modal(modalRef.value);
    modalRef.value.addEventListener("hide.bs.modal", () => {
        emit("update:modelValue", false);
    });
});

watch(() => props.modelValue, (m) => {
    if (m) {
        openModal();
    }
    else {
        closeModal();
    }
});

const openModal = () => {
    modal.show();
};

const closeModal = () => {
    modal.hide();
};

const submitModal = () => {
    emit("modal-submit");
};

</script>

<style scoped>

</style>
