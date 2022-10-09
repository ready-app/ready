import React from "react";
import { InertiaLink, useForm } from "@inertiajs/inertia-react";
import { Button, FloatingLabel, Form } from "react-bootstrap";

export default function LoginPage() {
    const form = useForm({
        email: "",
        password: ""
    });

    const submit = (e: React.FormEvent) => {
        e.preventDefault();
        form.post("/login");
    };

    return (
        <div className="d-flex align-items-center justify-content-center mt-5">
            <Form onSubmit={submit} className="p-4 bg-light border border-dark rounded">
                <Form.Group className="mb-3" controlId="email-field">
                    <FloatingLabel label="Email Address" controlId="email-field">
                        <Form.Control
                            type="email"
                            placeholder="email@example.com"
                            value={form.data.email}
                            onChange={e => form.setData("email", e.target.value)}
                        />
                    </FloatingLabel>
                    {form.errors.email && <Form.Text className="text-danger">{ form.errors.email }</Form.Text>}
                </Form.Group>
                <Form.Group className="mb-3" controlId="password-field">
                    <FloatingLabel label="Password" controlId="password-field">
                        <Form.Control
                            type="password"
                            placeholder="password"
                            value={form.data.password}
                            onChange={e => form.setData("password", e.target.value)}
                        />
                    </FloatingLabel>
                    {form.errors.password && <Form.Text className="text-danger">{ form.errors.password }</Form.Text>}
                </Form.Group>
                <p>Don't have an account? Register <InertiaLink href="/register">here</InertiaLink>.</p>
                <Button type="submit" variant="primary">
                    Login
                </Button>
            </Form>
        </div>
    );
}
