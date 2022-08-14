<template>
    <TheModal
        title="Change Password"
        button-text="Change Password"
        button-classes="btn btn-primary"
        @modal-submit="Passsubmit"
    >
        <div class="align-items-left justify-content-left ">
            <form
                @submit.prevent=""
                class=" bg-pink "
            >
                <p
                    class="text-danger"
                    v-if="failedPasswordChange()"
                >
                    Invalid parameters!
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
                    <label for="password-field">Original Password</label>
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
                        id="NewPassword-field"
                        class="form-control"
                        :class="{ 'is-invalid': Passform.errors.NewPassword }"
                        v-model="Passform.NewPassword"
                        placeholder="password"
                    >
                    <label for="NewPassword-field">New Password</label>
                    <div
                        v-if="Passform.errors.NewPassword"
                        class="invalid-feedback"
                    >
                        {{ Passform.errors.NewPassword }}
                    </div>
                </div>
                <div class="mb-3 form-floating">
                    <input
                        type="password"
                        id="ConfirmPassword-field"
                        class="form-control"
                        :class="{ 'is-invalid': Passform.errors.ConfirmPassword }"
                        v-model="Passform.ConfirmPassword"
                        placeholder="password"
                    >
                    <label for="ConfirmPassword-field">Confirm Password</label>
                    <div
                        v-if="Passform.errors.ConfirmPassword"
                        class="invalid-feedback"
                    >
                        {{ Passform.errors.ConfirmPassword }}
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
                        type="text"
                        id="name-field"
                        class="form-control"
                        :class="{ 'is-invalid': Nameform.errors.name}"
                        v-model="Nameform.name"
                        placeholder="name"
                    >
                    <label for="name-field">New name</label>
                    <div
                        v-if="Nameform.errors.name"
                        class="invalid-feedback"
                    >
                        {{ Nameform.errors.name }}
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
    name: "",
});

const Passsubmit = () => {
    Passform.post("/settings/changepassword");

};

const namesubmit = () => {
    Nameform.post("/settings/changename");

};


const failedPasswordChange = () => {
    if(Passform.errors.password || Passform.errors.NewPassword || Passform.errors.ConfirmPassword) {
        return true;
    }
    if(Passform.password == Passform.NewPassword && Passform.password != "" ){ 
        return true;
    }     
    if(Passform.NewPassword != Passform.ConfirmPassword && Passform.NewPassword != "" && Passform.ConfirmPassword != ""){
        return true;
    }    
    return false;
};

const failedNameChange = () => {
    if(Nameform.errors.name){
        return true;
    }
    return false;
};

</script>

<style scoped>

</style>