document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('servicios-container');
  
    fetch('https://cors-anywhere.herokuapp.com/https://ciisa.coningenio.cl/v1/services/', {
      headers: {
        'Authorization': 'Bearer ciisa'
      }
    })
      .then(response => {
        if (!response.ok) throw new Error('Error al cargar servicios');
        return response.json();
      })
      .then(result => {
        const servicios = result.data;
  
        if (Array.isArray(servicios) && servicios.length > 0) {
          servicios.forEach(service => {
            const card = document.createElement('div');
            card.className = 'card';
  
            card.innerHTML = `
              <h3>${service.titulo.esp}</h3>
              <p>${service.descripcion.esp}</p>
            `;
  
            container.appendChild(card);
          });
        } else {
          container.innerHTML = '<p>No se encontraron servicios.</p>';
        }
      })
      .catch(error => {
        console.error('Error:', error);
        container.innerHTML = '<p>Error al cargar los servicios.</p>';
      });
  });
  