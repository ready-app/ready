import React from "react";
import Header from "@/components/Header";
import { Container } from "react-bootstrap";
import Footer from "@/pages/Footer";
import styles from "./Layout.module.css";
import { useAppDispatch } from "@/store";
import { Inertia } from "@inertiajs/inertia";
import { usePage } from "@inertiajs/inertia-react";

export default function Layout(children: never) {

    //const page = usePage().props;

    // const dispatch = useAppDispatch();
    // Inertia.on("success", (e) => {
    //     const props: any = e.detail.page.props;
    //     if ("user" in props) {
    //         dispatch.user.setUser(props.user);
    //     }
    // });

    return (
        <div className={styles.page}>
            <Header />
            <Container className="mt-2">
                {children}
            </Container>
            <div className={styles.footer}>
                <Footer />
            </div>
        </div>
    );
}
