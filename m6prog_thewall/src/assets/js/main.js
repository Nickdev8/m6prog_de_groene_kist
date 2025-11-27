'use strict';

const form = document.querySelector('form');
let wallSection = document.querySelector('#wall-section');

if (form) {
  form.addEventListener('submit', async (event) => {
    event.preventDefault();

    const authorInput = form.querySelector('#author');
    const bodyInput = form.querySelector('#body');
    const payload = {
      text: (bodyInput?.value || '').trim(),
      sign: (authorInput?.value || '').trim(),
    };

    console.log(payload);
    if (!payload.text || !payload.sign) {
      return;
    }

    try {
      const response = await fetch(form.getAttribute('action') || window.location.pathname, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(payload),
      });

      const html = await response.text();
      const template = document.createElement('div');
      template.innerHTML = html;

      const newWall = template.querySelector('#wall-section');
      if (newWall && wallSection) {
        wallSection.outerHTML = newWall.outerHTML;
        wallSection = document.querySelector('#wall-section');
      }

      form.reset();
    } catch (error) {
      console.error('Bericht posten mislukt', error);
    }
  });
}
