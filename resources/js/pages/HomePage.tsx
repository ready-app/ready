import React from "react";
import { Button, Container } from "react-bootstrap";
import { InertiaLink } from "@inertiajs/inertia-react";

export default function HomePage() {
    return (
        <>
            <div className="p-5 mb-4 bg-light rounded-3 mt-4">
                <Container fluid className="py-5">
                    <h1 className="display-5 fw-bold">READY</h1>
                    <p className="fs-4">A web app to help manage your coursework!</p>
                    <InertiaLink href="/register">
                        <Button variant="primary">Sign up now!</Button>
                    </InertiaLink>
                </Container>
            </div>
            <div className="row align-items-md-stretch">
                <div className="col">
                    <div className="h-100 p-5 bg-light border rounded-3">
                        <h2>Weekly Schedule</h2>
                        <p>View a weekly schedule of your classes, assignments, exams, and more!</p>
                    </div>
                </div>
                <div className="col">
                    <div className="h-100 p-5 bg-light border rounded-3">
                        <h2>Assignment Tracker</h2>
                        <p>Keeps track of your assignments, exams, and more!</p>
                    </div>
                </div>
                <div className="col">
                    <div className="h-100 p-5 bg-light border rounded-3">
                        <h2>Easily add classes</h2>
                        <p>Provide a list of your CRNs and we'll automatically load your classes!</p>
                    </div>
                </div>
            </div>
        </>
    );
}
