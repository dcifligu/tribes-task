import './bootstrap';

const searchInput = document.getElementById('searchInput');
const rows = document.querySelectorAll('table tbody tr');

searchInput.addEventListener('input', function() {
const searchText = this.value.toLowerCase();

    rows.forEach(row => {
        const cells = row.querySelectorAll('td');
            let found = false;
                cells.forEach(cell => {
                    if (cell.textContent.toLowerCase().includes(searchText)) {
                        found = true;
                    }
                });
                row.style.display = found ? 'table-row' : 'none';
            });
    });
