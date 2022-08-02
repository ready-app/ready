<template>
    <TheModal
        title="Change Password"
        button-text="Change Password"
        button-classes="btn btn-primary"
    >
        <div class="align-items-left justify-content-left ">
            <form
                @submit.prevent="Passsubmit"
                class=" bg-pink "
            >
                <p
                    class="text-danger"
                    v-if="failedPasswordChange()"
                >
                    Error
                </p>
                <div class="mb-3 form-floating">
                    <input
                        type="password"
                        id="password-field"
                        class="form-control"
                        :class="{ 'is-invalid': Passform.errors.password }"
                        v-model="Passform.password"
                        placeholder="password"
                    >
                    <label for="password-field">Orginal Password</label>
                    <div
                        v-if="Passform.errors.password"
                        class="invalid-feedback"
                    >
                        {{ Passform.errors.password }}
                    </div>
                </div>
                <div class="mb-3 form-floating">
                    <input
                        type="password"
                        id="password-field"
                        class="form-control"
                        :class="{ 'is-invalid': Passform.errors.password }"
                        v-model="Passform.NewPassword"
                        placeholder="password"
                    >
                    <label for="password-field">New Password</label>
                    <div
                        v-if="Passform.errors.password"
                        class="invalid-feedback"
                    >
                        {{ Passform.errors.password }}
                    </div>
                </div>
                <div class="mb-3 form-floating">
                    <input
                        type="password"
                        id="password-field"
                        class="form-control"
                        :class="{ 'is-invalid': Passform.errors.password }"
                        v-model="Passform.ConfirmPassword"
                        placeholder="password"
                    >
                    <label for="password-field">Confirm Password</label>
                    <div
                        v-if="Passform.errors.password"
                        class="invalid-feedback"
                    >
                        {{ Passform.errors.password }}
                    </div>
                </div>
            </form>
        </div> 
    </TheModal>

    <TheModal
        title="Change Username"
        button-text="Change Username"
        button-classes="btn btn-primary"
    >
        <div class="align-items-left justify-content-left ">
            <form
                @submit.prevent="namesubmit"
                class=" bg-pink "
            >
                <p
                    class="text-danger"
                    v-if="failedNameChange()"
                >
                    Invalid name
                </p>
                <div class="mb-3 form-floating">
                    <input
                        type="password"
                        id="password-field"
                        class="form-control"
                        :class="{ 'is-invalid': Nameform.errors.newname}"
                        v-model="Nameform.newname"
                        placeholder="password"
                    >
                    <label for="password-field">New name</label>
                    <div
                        v-if="Nameform.errors.newname"
                        class="invalid-feedback"
                    >
                        {{ Nameform.errors.newname }}
                    </div>
                </div>
            </form>
        </div> 
    </TheModal>
</template>

<script setup lang="ts">

import { useForm } from "@inertiajs/inertia-vue3";
import TheModal from "@/components/TheModal.vue";

const Passform = useForm({
    password: "",
    NewPassword: "",
    ConfirmPassword: "",
});

const Nameform = useForm({
    newname: "",
});

const Passsubmit = () => {
    //Inertia.post("/login", form);
    Passform.post("/settings");

};

const namesubmit = () => {
    //Inertia.post("/login", form);
    Nameform.post("/settings");

};


const failedPasswordChange = () => {
    if(Passform.NewPassword != Passform.ConfirmPassword){
        return false;
    }
    if (!Passform.hasErrors) {
        return false;
    }
    if (Passform.errors.password) {
        return false;
    }
    return true;
};

const failedNameChange = () => {
    if (!Nameform.hasErrors) {
        return false;
    }
    if(Nameform.newname == ""){
        return false;
    }
    return true;
};

</script>

<style scoped>

</style>
