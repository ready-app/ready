import React from "react";
import Header from "@/components/Header";
import { Container } from "react-bootstrap";
import Footer from "@/pages/Footer";
import styles from "./Layout.module.css";

export default function Layout(children: never) {
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
