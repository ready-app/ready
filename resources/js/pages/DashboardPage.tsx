import React, { useState } from "react";

export default function DashboardPage() {
    const [text, setText] = useState("test");

    return (
        <>
            <p>hi there</p>
            <input value={text} onChange={e => setText(e.target.value)}></input>
            <p>text: {text}</p>
        </>
    );
}
