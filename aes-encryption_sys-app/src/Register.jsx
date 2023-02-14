import React, { useState } from "react";

export const Register = (props) => {
    const [email, setEmail] = useState('');
    const [pass, setPass] = useState('');
    const [name, setName] = useState('');

    const handleSubmit = (e) => {
        e.preventDefault();
        console.log(email);
    }

    return (
        <div className="auth-form-container">
        <form className="login-form-aes">
            <h1>AES IMAGE ENCRYPTION SYSTEM</h1>
            <p>AES (Advanced Encryption Standard) is a widely-used encryption system for secure data transmission. In the context of a website's landing page, AES image encryption could be utilized to secure images that are displayed on the page. 
                With AES encryption, the original image is transformed into a encrypted code using a secret key known only to the sender and receiver. When the encrypted image is transmitted over a network, it cannot be easily intercepted or altered by a third party</p>
            <p> Upon reaching the recipient, the encrypted image can then be decrypted using the secret key, returning it to its original form. By using AES image encryption, the website can ensure that sensitive images, such as logos or product photos, 
                are protected while in transit, providing an added layer of security for the website and its users.</p>
        </form>
            <h2>Register</h2>
        <form className="register-form" onSubmit={handleSubmit}>
            <label htmlFor="name">Full name</label>
            <input value={name} name="name" onChange={(e) => setName(e.target.value)} id="name" placeholder="full Name" />
            <label htmlFor="email">email</label>
            <input value={email} onChange={(e) => setEmail(e.target.value)}type="email" placeholder="youremail@gmail.com" id="email" name="email" />
            <label htmlFor="password">password</label>
            <input value={pass} onChange={(e) => setPass(e.target.value)} type="password" placeholder="********" id="password" name="password" />
            <button type="submit">Log In</button>
        </form>
        <button className="link-btn" onClick={() => props.onFormSwitch('login')}>Already have an account? Login here.</button>
    </div>
    )
}