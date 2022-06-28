<template>
    <div class="align-items-left justify-content-left ">
        <form
            @submit.prevent="submit"
            class=" bg-pink "
        >
            <h2 class="text-center">Change Password</h2>
            <p
                class="text-danger"
                v-if="failedLogin()"
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
                Submit
            </button>
        </form>
    </div>

    
</template>

<script setup lang="ts">
import { Link, useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    email: "",
    password: ""
});

const submit = () => {
    //Inertia.post("/login", form);
    form.post("/login");
};

const failedLogin = () => {
    if (!form.hasErrors) {
        return false;
    }
    if (form.errors.email || form.errors.password) {
        return false;
    }
    return true;
};

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
