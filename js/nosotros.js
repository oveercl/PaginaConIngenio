document.addEventListener('DOMContentLoaded', () => {
    const contentDiv = document.getElementById('about-content');
  
    fetch("https://cors-anywhere.herokuapp.com/https://ciisa.coningenio.cl/v1/about-us/", {
      headers: {
        "Authorization": "Bearer ciisa"
      }
    })
      .then(res => {
        if (!res.ok) throw new Error("Error al obtener información");
        return res.json();
      })
      .then(result => {
        const data = result.data;
  
        const mision = data.find(d => d.titulo.esp.toLowerCase().includes("misi"));
        const vision = data.find(d => d.titulo.esp.toLowerCase().includes("visi"));
        const otros = data.filter(d =>
          !["misi", "visi"].some(k => d.titulo.esp.toLowerCase().includes(k))
        );
  
        const html = `
          <section class="bloque">
            <h2>${mision.titulo.esp}</h2>
            <p>${mision.descripcion.esp}</p>
          </section>
          <section class="bloque">
            <h2>${vision.titulo.esp}</h2>
            <p>${vision.descripcion.esp}</p>
          </section>
          <section class="bloque">
            <h2>Filosofía y Soporte</h2>
            ${otros.map(d => `
              <h3>${d.titulo.esp}</h3>
              <p>${d.descripcion.esp}</p>
            `).join('')}
          </section>
        `;
  
        contentDiv.innerHTML = html;
      })
      .catch(err => {
        console.error("❌ Error:", err);
        contentDiv.innerHTML = '<p>No se pudo cargar la información de la empresa.</p>';
      });
  });
  