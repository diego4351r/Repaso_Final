window.addEventListener('load', (ev) => {
  
  fetch('http://localhost/Repaso_Final/php/ver_usuarios.php')
    .then(res => res.ok ? Promise.resolve(res) : Promise.reject(res))
    .then(res =>res.json())
    .then(res => {

      const table = document.getElementById('table');
      const fragment = document.createDocumentFragment();

      for (const registro of res) {
        const row = document.createElement('TR');
        const dni = document.createElement('TD');
        const nombre = document.createElement('TD');
        const apellidos = document.createElement('TD');
        const fecha = document.createElement('TD');

        dni.textContent = `${registro.dni}`;
        nombre.textContent = `${registro.nombre}`;
        apellidos.textContent = `${registro.apellidos}`;
        fecha.textContent = `${registro.fecha}`;

        row.append(dni);
        row.append(nombre);
        row.append(apellidos);
        row.append(fecha);
        
        fragment.appendChild(row);
      }

      table.append(fragment);

    })
});