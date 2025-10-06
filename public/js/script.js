document.addEventListener('DOMContentLoaded', () => {
    const mde = new SimpleMDE({
        element: document.getElementById("content"),
        placeholder: "Écrivez votre note en Markdown…",
        spellChecker: false,
        status: false,
        autosave: { enabled: true, uniqueId: "Kanban-Lite-content", delay: 1000 },
        toolbar: ["bold", "italic", "heading", "|", "quote", "unordered-list", "ordered-list", "|", "link", "preview", "guide"]
    });

    document.querySelectorAll('.rendered').forEach(el => {
        const raw = el.dataset.md;
        const html = marked.parse(raw);
        el.innerHTML = DOMPurify.sanitize(html);
    });

    document.querySelectorAll('.card').forEach(card => {
        card.addEventListener('dragstart', e => {
            e.dataTransfer.setData('text/plain', card.dataset.id);
        });
    });

    document.querySelectorAll('.dropzone').forEach(zone => {
        zone.addEventListener('dragover', e => {
            e.preventDefault();
            zone.classList.add('drag-over');
        });

        zone.addEventListener('dragleave', () => {
            zone.classList.remove('drag-over');
        });

        zone.addEventListener('drop', e => {
            e.preventDefault();
            zone.classList.remove('drag-over');

            const itemId = e.dataTransfer.getData('text/plain');
            const newStatus = zone.dataset.status;

            const card = document.querySelector(`.card[data-id='${itemId}']`);
            zone.querySelector('.card-container')?.appendChild(card);

            fetch('index.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `route=items.updateStatus&id=${itemId}&status=${newStatus}`
            }).then(res => {
                if (!res.ok) {
                    alert("Erreur lors de la mise à jour du statut.");
                }
            });
        });
    });
});
