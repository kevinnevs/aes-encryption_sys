const encryptLink = document.querySelector('nav a:nth-of-type(1)');
const decryptLink = document.querySelector('nav a:nth-of-type(2)');
const logoutLink = document.querySelector('header a');

encryptLink.addEventListener('click', () => {
  console.log('Encryption link clicked');
});

decryptLink.addEventListener('click', () => {
  console.log('Decryption link clicked');
});

logoutLink.addEventListener('click', () => {
  console.log('Logout link clicked');
});
