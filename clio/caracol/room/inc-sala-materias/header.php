
<div id="mh-sm" class="main-header-sala-materias">

    <div class="content-mh-sm-logo">
        <a href="../indexUpgrade.php">caracoLearn</a>
    </div>

    <nav class="navbar-mh-sm">
        <ul class="list-navbar-mh-sm">
            <li id="button-modal-library" class="button-mh-sm-modal">Biblioteca</li>
            <li id="button-modal-files" class="button-mh-sm-modal">Ficheiros</li>
        </ul>
    </nav>

    <div id="windows-library" class="conf-windows windows-library">
        <button id="close-modal-library" class="close-modal">X</button>
        <h1>Biblioteca</h1>
    </div>

    <div id="windows-files" class="conf-windows windows-files">
        <button id="close-modal-files" class="close-modal">X</button>
        <h1>Ficheiros</h1>
    </div>

    <script>
        const btnLibraryModal = document.querySelector('#button-modal-library');
        btnLibraryModal.addEventListener('click', openLibraryModal);

        function openLibraryModal() {
            const windowLibraryModal = document.querySelector('.windows-library');
            windowLibraryModal.classList.add('open-modal');

            windowLibraryModal.addEventListener('click', (e) => {
                if (e.target.id == 'close-modal-library' /*|| e.target.id == 'windows-library'*/) {
                    windowLibraryModal.classList.remove('open-modal');
                }
            });
        }

        const btnFilesModal = document.querySelector('#button-modal-files');
        btnFilesModal.addEventListener('click', openFilesModal);

        function openFilesModal() {
            const windowFilesModal = document.querySelector('.windows-files');
            windowFilesModal.classList.add('open-modal');

            windowFilesModal.addEventListener('click', (e) => {
                if (e.target.id == 'close-modal-files' /*|| e.target.id == 'windows-files'*/) {
                    windowFilesModal.classList.remove('open-modal')
                }
            });
        }
    </script>

</div>