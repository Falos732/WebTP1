document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('upload-form');
    const loading = document.getElementById('upload-loading');
    const ouvrirModalBtn = document.getElementById('ouvrir-upload-modal');
    const modal = document.getElementById('upload-modal');
    const fermerModalBtn = document.getElementById('fermer-modal-btn');

    if (ouvrirModalBtn && modal && fermerModalBtn) {
        ouvrirModalBtn.addEventListener('click', () => {
            modal.style.display = 'flex';
        });

        fermerModalBtn.addEventListener('click', () => {
            modal.style.display = 'none';
        });

        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });
    }

    if (form) {
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            loading.style.display = 'inline';

            const formData = new FormData(form);

            try {
                const response = await fetch('/php/upload.php', {
                    method: 'POST',
                    body: formData
                });

                const result = await response.json();
                loading.style.display = 'none';

                if (response.ok && result.success) {
                    const url = new URL(window.location.href);
                    url.searchParams.set("reposNom", result.reposNom);
                    url.searchParams.set("reposID", result.reposID);
                    window.location.href = url.toString();
                } else {
                    alert("Erreur : " + result.message);
                }
            } catch (error) {
                loading.style.display = 'none';
                alert("Une erreur s’est produite : " + error.message);
            }
        });
    }
});

function telechargerFichier(reposID, fichierNom) {
  const url = `/php/telechargerFichier.php?reposID=${encodeURIComponent(reposID)}&fichierNom=${encodeURIComponent(fichierNom)}`;
  
  const a = document.createElement('a');
  a.href = url;
  a.download = fichierNom;
  document.body.appendChild(a);
  a.style.display = 'none';
  a.click();
  document.body.removeChild(a);
}