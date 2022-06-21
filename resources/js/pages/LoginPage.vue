<template>
    <div class="d-flex align-items-center justify-content-center mt-5">
        <form
            @submit.prevent="submit"
            class="p-4 bg-light border border-dark rounded"
        >
            <h2 class="text-center">Login</h2>
            <p
                class="text-danger"
                v-if="failedLogin()"
            >
                Email/password combination invalid!
            </p>
            <div class="form-floating mb-3">
                <input
                    type="email"
                    id="email-field"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.email }"
                    v-model="form.email"
                    placeholder="name@example.com"
                >
                <label for="email-field">Email</label>
                <div
                    v-if="form.errors.email"
                    class="invalid-feedback"
                >
                    {{ form.errors.email }}
                </div>
            </div>
            <div class="mb-3 form-floating">
                <input
                    type="password"
                    id="password-field"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.password }"
                    v-model="form.password"
                    placeholder="password"
                >
                <label for="password-field">Password</label>
                <div
                    v-if="form.errors.password"
                    class="invalid-feedback"
                >
                    {{ form.errors.password }}
                </div>
            </div>
            <p>Don't have an account? Register <Link href="/register">here</Link>.</p>
            <button
                type="submit"
                class="btn btn-primary"
            >
                Login
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
