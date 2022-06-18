<template>
    <div class="d-flex align-items-center justify-content-center mt-5">
        <form
            @submit.prevent="submit"
            class="p-4 bg-light border border-dark rounded"
        >
            <h2 class="text-center">Register</h2>
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
            <div class="form-floating mb-3">
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
            <div class="mb-3 form-floating">
                <input
                    type="password"
                    id="confirm-password-field"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.password_confirmation }"
                    v-model="form.password_confirmation"
                    placeholder="password"
                >
                <label for="confirm-password-field">Confirm Password</label>
                <div
                    v-if="form.errors.password_confirmation"
                    class="invalid-feedback"
                >
                    {{ form.errors.password_confirmation }}
                </div>
            </div>
            <div class="mb-3 form-check">
                <input
                    type="checkbox"
                    id="tos-privacy-field"
                    class="form-check-input"
                    :class="{ 'is-invalid': form.errors.TOS_And_Privacy }"
                    v-model="form.TOS_And_Privacy"
                >
                <label
                    for="tos-privacy-field"
                    class="form-check-label"
                >Do you agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>?</label>
                <div
                    v-if="form.errors.TOS_And_Privacy"
                    class="invalid-feedback"
                >
                    {{ form.errors.TOS_And_Privacy }}
                </div>
            </div>
            <p>Already have an account? Login <Link href="/login">here</Link>.</p>
            <button
                type="submit"
                class="btn btn-primary"
            >
                Login
            </button>
        </form>
    </div>
</template>

<script setup>
import { Link, useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    email: "",
    name: "",
    password: "",
    password_confirmation: "",
    TOS_And_Privacy: false
});

const submit = () => {
    form.post("/register");
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
