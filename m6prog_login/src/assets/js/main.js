'use strict';

async function hashPassword(password) {
  const msgUint8 = new TextEncoder().encode(password);
  const hashBuffer = await crypto.subtle.digest('SHA-256', msgUint8);
  const hashArray = Array.from(new Uint8Array(hashBuffer));
  return hashArray.map((b) => b.toString(16).padStart(2, '0')).join('');
}

async function login() {
  const usernameInput = document.getElementById('username');
  const passwordInput = document.getElementById('password');
  const resultSection = document.getElementById('result');

  const username = usernameInput?.value.trim() ?? '';
  const password = passwordInput?.value ?? '';

  if (!username || !password) {
    resultSection.textContent = 'Vul username en password in.';
    return;
  }

  try {
    const hashed = await hashPassword(password);
    const response = await fetch('login.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ username, password: hashed }),
    });

    const text = await response.text();
    resultSection.textContent = text || `Status: ${response.status}`;
  } catch (error) {
    console.error(error);
    resultSection.textContent = 'Login mislukt.';
  }
}
