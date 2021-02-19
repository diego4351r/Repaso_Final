document.addEventListener('submit', (ev) => {
  ev.preventDefault();

  fetch('http://localhost/Repaso_Final/php/insertar_usuario.php', {
    method: 'POST',
    body: new FormData(document.getElementById('form'))
  })
    .then(res => res.ok ? Promise.resolve(res) : Promise.reject(res))
    .then(res => res.json())
    .then(res => {
      if (res === '?error'){
        window.open('http://localhost/Repaso_Final/html/mensaje.html?error')
      } else {
        window.open('http://localhost/Repaso_Final/html/mensaje.html')
      }
      
    }) 

    
});