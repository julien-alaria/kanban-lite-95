<hr>
    <div class="footer">
        <p><small>Application codée avec ❤️</small></p>
    </div>

    <script>
        document.querySelectorAll('.rendered').forEach(el => {
            const raw = el.dataset.md; // récupère le contenu Markdown
            const html = marked.parse(raw); // convertit en HTML
            el.innerHTML = DOMPurify.sanitize(html); // sécurise le HTML
        });
    </script>
</body>
</html>