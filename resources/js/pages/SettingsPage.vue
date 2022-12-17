<template>
    <div>
        <button
            class="btn btn-secondary"
            @click="passFormOpen = true"
        >
            Change Password
        </button>
        <TheModal
            title="Change Password"
            v-model="passFormOpen"
            @modal-submit="passSubmit"
        >
            <div class="align-items-left justify-content-left">
                <form
                    class="bg-pink"
                    @submit.prevent
                >
                    <p
                        class="text-danger"
                        v-if="passForm.hasErrors"
                    >
                        Invalid parameters!
                    </p>
                    <div class="mb-3 form-floating">
                        <input
                            type="password"
                            id="password-field"
                            class="form-control"
                            :class="{ 'is-invalid': passForm.errors.password }"
                            v-model="passForm.password"
                            placeholder="password"
                        >
                        <label for="password-field">Original Password</label>
                        <div
                            v-if="passForm.errors.password"
                            class="invalid-feedback"
                        >
                            {{ passForm.errors.password }}
                        </div>
                    </div>
                    <div class="mb-3 form-floating">
                        <input
                            type="password"
                            id="NewPassword-field"
                            class="form-control"
                            :class="{ 'is-invalid': passForm.errors.new_password }"
                            v-model="passForm.new_password"
                            placeholder="password"
                        >
                        <label for="NewPassword-field">New Password</label>
                        <div
                            v-if="passForm.errors.new_password"
                            class="invalid-feedback"
                        >
                            {{ passForm.errors.new_password }}
                        </div>
                    </div>
                    <div class="mb-3 form-floating">
                        <input
                            type="password"
                            id="ConfirmPassword-field"
                            class="form-control"
                            :class="{ 'is-invalid': passForm.errors.new_password_confirmation }"
                            v-model="passForm.new_password_confirmation"
                            placeholder="password"
                        >
                        <label for="ConfirmPassword-field">Confirm Password</label>
                        <div
                            v-if="passForm.errors.new_password_confirmation"
                            class="invalid-feedback"
                        >
                            {{ passForm.errors.new_password_confirmation }}
                        </div>
                    </div>
                </form>
            </div>
        </TheModal>
        <br>
        <button
            class="btn btn-secondary"
            @click="nameFormOpen = true"
        >
            Change Name
        </button>
        <TheModal
            title="Change Name"
            v-model="nameFormOpen"
            @modal-submit="nameSubmit"
        >
            <div class="align-items-left justify-content-left">
                <form
                    class="bg-pink"
                    @submit.prevent
                >
                    <p
                        class="text-danger"
                        v-if="nameForm.hasErrors"
                    >
                        Invalid name
                    </p>
                    <div class="mb-3 form-floating">
                        <input
                            type="text"
                            id="name-field"
                            class="form-control"
                            :class="{ 'is-invalid': nameForm.errors.name}"
                            v-model="nameForm.name"
                            placeholder="name"
                        >
                        <label for="name-field">New name</label>
                        <div
                            v-if="nameForm.errors.name"
                            class="invalid-feedback"
                        >
                            {{ nameForm.errors.name }}
                        </div>
                    </div>
                </form>
            </div>
        </TheModal>
    </div>
</template>

<script setup lang="ts">

import { ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
import TheModal from "@/components/TheModal.vue";

const passFormOpen = ref(false);
const nameFormOpen = ref(false);

const passForm = useForm({
    password: "",
    new_password: "",
    new_password_confirmation: ""
});

const nameForm = useForm({
    name: ""
});

const passSubmit = () => {
    passForm.post("/settings/change_password", {
        onSuccess: () => {
            passFormOpen.value = false;
            passForm.reset();
        }
    });
};

const nameSubmit = () => {
    nameForm.post("/settings/change_name", {
        onSuccess: () => {
            nameFormOpen.value = false;
            nameForm.reset();
        }
    });
};

</script>

<style scoped>

</style>
