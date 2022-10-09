import React from "react";
import { Button, Container, Nav, Navbar, NavDropdown } from "react-bootstrap";
import { InertiaLink, usePage } from "@inertiajs/inertia-react";
import { useAppDispatch, useAppSelector } from "@/store";
import { User } from "@/types";
import { Page } from "@inertiajs/inertia";

const leftHeaderPages = [
    {
        name: "Home",
        url: "/",
        alternateUrl: "/home",
        adminOnly: false
    },
    {
        name: "Schedule",
        url: "/schedule",
        alternateUrl: null,
        adminOnly: false
    },
    {
        name: "Administration",
        url: "/admin",
        alternateUrl: null,
        adminOnly: true
    }
];

export default function Header() {
    const page = usePage<Page<{ user: User }>>();

    const dispatch = useAppDispatch();

    dispatch.user.setUser(page.props.user);

    const user = useAppSelector(state => state.user.user);

    return (
        <Navbar bg="dark" expand="lg" variant="dark">
            <Container fluid>
                <Navbar.Brand as={InertiaLink} href="/">
                    READY
                </Navbar.Brand>
                <Navbar.Toggle aria-controls="the-navbar" />
                <Navbar.Collapse id="the-navbar">
                    <Nav className="me-auto">
                        {user !== null && leftHeaderPages.map(hPage => {
                            if (hPage.adminOnly && !user.is_admin) {
                                return;
                            }
                            return (
                                <Nav.Link
                                    as={InertiaLink}
                                    href={hPage.url}
                                    className={page.url === hPage.url || page.url === hPage.alternateUrl ? "active" : ""}
                                    key={hPage.name}
                                >
                                    {hPage.name}
                                </Nav.Link>
                            );
                        })}
                    </Nav>
                    <Nav>
                        { user === null &&
                            <>
                                <Nav.Link as={InertiaLink} href="/login" className="p-0 me-2">
                                    <Button variant="primary">Login</Button>
                                </Nav.Link>
                                <Nav.Link as={InertiaLink} href="/register" className="p-0">
                                    <Button variant="secondary">Register</Button>
                                </Nav.Link>
                            </>
                        }
                        {user !== null &&
                            <NavDropdown title={user.name} align="end">
                                <NavDropdown.Item as={InertiaLink} href="/logout">
                                    Logout
                                </NavDropdown.Item>
                            </NavDropdown>
                        }
                    </Nav>
                </Navbar.Collapse>
            </Container>
        </Navbar>
    );
}
