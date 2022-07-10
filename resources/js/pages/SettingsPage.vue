<template>
    <div class="align-items-left justify-content-left ">
        <form
            @submit.prevent="submit"
            class=" bg-pink "
        >
            <h2 class="text-center">Change Password</h2>
            <p
                class="text-danger"
                v-if="failedPasswordChange()"
            >
               Wrong password 
            </p>
            <div class="mb-3 form-floating">
                <input
                    type="password"
                    id="password-field"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.password }"
                    v-model="form.password"
                    placeholder="password"
                >
                <label for="password-field">Orginal Password</label>
                <div
                    v-if="form.errors.password"
                    class="invalid-feedback"
                >
                    {{ form.errors.password }}
                </div>
            </div>
            <div class="mb-3 form-floating">
                <input
                    type="password"
                    id="password-field"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.password }"
                    v-model="form.NewPassword"
                    placeholder="password"
                >
                <label for="password-field">New Password</label>
                <div
                    v-if="form.errors.password"
                    class="invalid-feedback"
                >
                    {{ form.errors.password }}
                </div>
            </div>
            <div class = "mb-3 form-floating">
                <input
                    type="password"
                    id="password-field"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.password }"
                    v-model="form.ConfirmPassword"
                    placeholder="password"
                >
                <label for="password-field">Confirm Password</label>
                <div
                    v-if="form.errors.password"
                    class="invalid-feedback"
                >
                    {{ form.errors.password }}
                </div>
            </div>

            <button
                type="submit"
                class="btn btn-primary"
            >
                Changed Password
            </button>
        </form>
    </div>
    <!-- <div class="form-floating mb-3">
        <input
            type="text"
            id="name-field"
            class="form-control"
            :class="{ 'is-invalid': form.errors.name }"
            v-model="form.name"
            placeholder="name"
        >
        <label for="name-field">Name</label>
        <div
            v-if="form.errors.name"
            class="invalid-feedback"
        >
            {{ form.errors.name }}
        </div>
    </div> -->
        <div class="align-items-left justify-content-left ">
        <form
            @submit.prevent="submit"
            class=" bg-pink "
        >
            <h2 class="text-center">Change Name</h2>
            <p
                class="text-danger"
                v-if="failedNameChange()"
            >
               Error 
            </p>
            <div class="mb-3 form-floating">
                <input
                    type="text"
                    id="name-field"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.name }"
                    v-model="form.name"
                    placeholder="name"
                >
                <label for="name-field">Original Name</label>
                <div
                    v-if="form.errors.password"
                    class="invalid-feedback"
                >
                    {{ form.errors.password }}
                </div>
            </div>
            <div class="mb-3 form-floating">
                <input
                    type="text"
                    id="name-field"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.name }"
                    v-model="form.newname"
                    placeholder="name"
                >
                <label for="password-field">New name</label>
                <div
                    v-if="form.errors.password"
                    class="invalid-feedback"
                >
                    {{ form.errors.password }}
                </div>
            </div>
            <button
                type="submit"
                class="btn btn-primary"
            >
                Changed Name
            </button>
        </form>
    </div>
</template>

<script setup lang="ts">
import { Link, useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    password: "",
    NewPassword: "",
    ConfirmPassword: "",
    name: "",
    newname: "",
});

const submit = () => {
    //Inertia.post("/login", form);
    form.post("/settings");

};

const failedPasswordChange = () => {
    if(form.NewPassword != form.ConfirmPassword){
        return false;
    }
    if (!form.hasErrors) {
        return false;
    }
    if (form.errors.password) {
        return false;
    }
    return true;
};

const failedNameChange = () => {
    if(form.newname != form.name){
        return false;
    }
    return true;
}
</script>

<style scoped>
input[type="text"] {
    width: 100%;
}

form {
    width: 90%;
}

@media (min-width: 768px) {
    form {
        width: 70%;
    }
}

@media (min-width: 1100px) {
    form {
        width: 40%;
    }
}
</style>
