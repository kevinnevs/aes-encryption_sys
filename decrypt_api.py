#!/usr/bin/python3
"""API Web Flask Application"""
from flask import Flask, request, jsonify
from Crypto.Cipher import AES
import base64

app = Flask(__name__)

@app.route('/api/decrypt', methods=['POST'])
def decrypt_file():
    """Get the encrypted file and decryption key from the request payload"""
    encrypted_file = request.files['file']
    decryption_key = request.form['key']

    """Verify the decryption key"""
    if not decryption_key:
        abort(400, "Not a valid key")

    """Decrypt the file"""
    cipher = AES.new(decryption_key, AES.MODE_EAX, nonce=nonce)
    decrypted_file = cipher.decrypt_and_verify(encrypted_file.read())

    """Return the decrypted file"""
    response = make_response(decrypted_file)
    response.headers['Content-Disposition'] = 'attachment; filename=decrypted_file'
    return response
